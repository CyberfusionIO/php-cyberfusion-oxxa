# php-cyberfusion-oxxa

PHP client for the [Oxxa API](https://www.oxxa.com/domeinnamen/api).

# Install

## Composer

Run the following command to install the package from Packagist:

```bash
composer require cyberfusion/oxxa
```

# Usage

## Getting started

```php
// Initialize the API
$oxxa = new Oxxa($username, $password);

// Perform calls to an endpoint
$available = $oxxa
    ->domain()
    ->check('cyberfusion.nl');
```

## Test mode

To test your implementation, use the test mode. All requests tell the Oxxa API that the request is a test.

Enable: 

```php
$oxxa->enableTestMode();
```

Disable:

```php
$oxxa->disableTestMode();
```

## Mock server

When testing with a mock server, you will be able to modify the base URL of the API with:

```php
$oxxa->setBaseUri('http://localhost:8080');
```

This will return the Oxxa instance, so you can chain it with other methods.

## Exceptions

In case of errors, the client throws exceptions using the `OxxaException` as base class. All exceptions have a specific  code. These can be found in the `OxxaException` class.