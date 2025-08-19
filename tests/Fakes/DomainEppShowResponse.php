<?php

namespace Cyberfusion\Oxxa\Tests\Fakes;

class DomainEppShowResponse
{
    public function body(): string
    {
        return '<?xml version="1.0" encoding="ISO-8859-1" ?>
            <channel>
                <order>
                    <order_id>123456</order_id>
                    <command>domain_epp_show</command>
                    <sld>example</sld>
                    <tld>org</tld>
                    <status_code>XMLOK 136</status_code>
                    <status_description>De verhuiscode is opgehaald.</status_description>
                    <price />
                    <details>EPPCODE</details>
                    <order_complete>TRUE</order_complete>
                    <done>TRUE</done>
                </order>
            </channel>';
    }
}
