<?php

namespace Cyberfusion\Oxxa\Endpoints;

use Cyberfusion\Oxxa\Contracts\Endpoint as EndpointContract;
use Cyberfusion\Oxxa\DataTransferObjects\Price;
use Cyberfusion\Oxxa\Enum\StatusCode;
use Cyberfusion\Oxxa\Enum\Toggle;
use Cyberfusion\Oxxa\Exceptions\DomainNotInAdministrationException;
use Cyberfusion\Oxxa\Exceptions\DomainNotMutatableException;
use Cyberfusion\Oxxa\Exceptions\InsufficientFundsException;
use Cyberfusion\Oxxa\Exceptions\InvalidAdminIdentityException;
use Cyberfusion\Oxxa\Exceptions\InvalidBillingIdentityException;
use Cyberfusion\Oxxa\Exceptions\InvalidCredentialsException;
use Cyberfusion\Oxxa\Exceptions\InvalidNameserverGroupException;
use Cyberfusion\Oxxa\Exceptions\InvalidRegistrantIdentityException;
use Cyberfusion\Oxxa\Exceptions\InvalidTechIdentityException;
use Cyberfusion\Oxxa\Exceptions\UnableToPerformRequestException;
use Cyberfusion\Oxxa\Models\SslProduct;
use Cyberfusion\Oxxa\Support\OxxaResult;
use Symfony\Component\DomCrawler\Crawler;

class ProductEndpoint extends Endpoint implements EndpointContract
{
    /**
     * @throws DomainNotInAdministrationException
     * @throws InvalidRegistrantIdentityException
     * @throws InsufficientFundsException
     * @throws DomainNotMutatableException
     * @throws InvalidTechIdentityException
     * @throws InvalidBillingIdentityException
     * @throws InvalidNameserverGroupException
     * @throws InvalidAdminIdentityException
     * @throws UnableToPerformRequestException
     * @throws InvalidCredentialsException
     */
    public function sslProducts(array $additionalParameters = []): OxxaResult
    {
        $xml = $this
            ->client
            ->request(array_merge(['command' => 'ssl_product_list'], $additionalParameters));

        $statusCode = $this->getStatusCode($xml);
        $statusDescription = $this->getStatusDescription($xml);
        if ($statusCode !== StatusCode::STATUS_SSL_PRODUCTS_RETRIEVED) {
            return new OxxaResult(
                success: false,
                message: $statusDescription,
                status: $statusCode,
            );
        }

        $products = [];
        $xml
            ->filter('channel > order > details > ssl > ssl')
            ->each(function (Crawler $sslNode) use (&$products) {
                $pricing = [];
                if ($sslNode->filter('pricing > period')->count() !== 0) {
                    $sslNode
                        ->filter('pricing > period')
                        ->each(function (Crawler $periodNode) use (&$pricing) {
                            $priceExtraDomainNode = $periodNode->filter('price_extra_domain');

                            $pricing[] = new Price(
                                period: (int) $periodNode->attr('months'),
                                price: (float) $periodNode->filter('price')->text(),
                                priceAdditional: $priceExtraDomainNode->count() && $priceExtraDomainNode->text() !== ''
                                    ? (float) $periodNode->filter('price_extra_domain')->text()
                                    : null,
                            );
                        });
                }

                $products[] = new SslProduct(
                    id: (int) $sslNode->filter('id')->text(),
                    name: $sslNode->filter('name')->text(),
                    type: $sslNode->filter('config > type')->text(),
                    pricing: $pricing,
                    wildcard: Toggle::toBoolean($sslNode->filter('config > wildcard')->text()),
                    priceExtraDomain: $sslNode->filter('config > price_extra_domain')->count()
                        ? Toggle::toBoolean($sslNode->filter('config > price_extra_domain')->text())
                        : Toggle::DISABLED,
                    cnameAuth: Toggle::toBoolean($sslNode->filter('config > cname_auth')->text()),
                    warranty: (int) $sslNode->filter('config > warranty')->text(),
                    greenBar: Toggle::toBoolean($sslNode->filter('config > greenbar')->text()),
                    vendor: $sslNode->filter('config > vendor')->text(),
                    deliveryTime: $sslNode->filter('config > delivery_time')->text(),
                    amountDomains: (int) $sslNode->filter('config > domains')->text(),
                    amountMaxDomains: (int) $sslNode->filter('config > domains_max')->text(),
                    info: $sslNode->filter('info')->text(),
                );
            });

        return new OxxaResult(
            success: true,
            message: $statusDescription,
            data: [
                'products' => $products,
            ],
            status: $statusCode,
        );
    }
}
