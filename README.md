# UDS integration for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/altynbek07/laravel-uds.svg?style=flat-square)](https://packagist.org/packages/altynbek07/laravel-uds)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/altynbek07/laravel-uds/run-tests?label=tests)](https://github.com/altynbek07/laravel-uds/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/altynbek07/laravel-uds.svg?style=flat-square)](https://packagist.org/packages/altynbek07/laravel-uds)

<p align="center">
    <img src="./img/uds-horizontal.svg" height="100" />
</p>

This package is the bridge between UDS and Laravel.

## Installation

You can install the package via composer:

```bash
composer require altynbek07/laravel-uds
```

You should set these environment variables in your `.env` file:

```env
UDS_ID=YourCompanyId
UDS_KEY=YourApiKey
```

You can publish the config file with:

```bash
php artisan vendor:publish --provider="Altynbek07\Uds\UdsServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
<?php

return [
    /**
     * Your company ID from UDS
     */
    'id' => env('UDS_ID'),
    /**
     * Your API Key from UDS
     */
    'key' => env('UDS_KEY'),
    /**
     * This is the API URI path where Uds will be accessible from. Feel free
     * to change this path to anything you like.
     */
    'path' => env('UDS_PATH', 'api/uds'),
    /**
     * These middleware will be assigned to every Uds route, giving you
     * the chance to add your own middleware to this list or change any of
     * the existing middleware. Or, you can simply stick with this list.
     */
    'middleware' => [
        'api',
        // 'auth:api'
    ],
];
```

## Usage

You can use the methods from `\Altynbek07\Uds\Facades\Uds` anywhere you want, or you can send a request to the API routes from anywhere you want (for example, from the front via axios).

### Available Methods

#### Get company settings

Docs: https://docs.uds.app/#tag/Settings

```php
<?php

namespace Altynbek07\Uds\Facades\Uds;

$settings = Uds::settings();
```

#### Create transaction

Docs: https://docs.uds.app/#tag/Operations/paths/~1operations/post

```php
<?php

namespace Altynbek07\Uds\Facades\Uds;

$data = [
    'code' => '3485bf3c-5f9b-42a7-9f25-f102fe464256',
    'receipt' => [
        'total' => 900,
        'cash' => 600,
        'points' => 300
    ]
];

$transaction = Uds::createTransaction($data);
```

#### Refund transaction

Docs: https://docs.uds.app/#tag/Operations/paths/~1operations~1{id}~1refund/post

```php
<?php

namespace Altynbek07\Uds\Facades\Uds;

$id = 113327216;

$transaction = Uds::refundTransaction($id);
```

#### Get transaction information

Docs: https://docs.uds.app/#tag/Operations/paths/~1operations~1calc/post

```php
<?php

namespace Altynbek07\Uds\Facades\Uds;

$data = [
    'code' => '123456',
    'receipt' => [
        'total' => 900,
        'points' => 0
    ]
];

$transaction = Uds::getTransactionInformation($data);
```

#### Find customer

Docs: https://docs.uds.app/#tag/Customers/paths/~1customers~1find/get

```php
<?php

namespace Altynbek07\Uds\Facades\Uds;

$data = [
    'code' => '123456',
    'exchangeCode' => true
    'total' => 900
];

$customer = Uds::customersFind($data);
```

#### Get customer information

Docs: https://docs.uds.app/#tag/Customers/paths/~1customers~1{id}/get

```php
<?php

namespace Altynbek07\Uds\Facades\Uds;

$id = 9099536206450;

$customer = Uds::customers($id);
```

### Available API Routes

#### Get company settings

Docs: https://docs.uds.app/#tag/Settings

```
# GET
/api/uds/settings
```

#### Create transaction

Docs: https://docs.uds.app/#tag/Operations/paths/~1operations/post

```
# POST
/api/uds/operations
```

#### Refund transaction

Docs: https://docs.uds.app/#tag/Operations/paths/~1operations~1{id}~1refund/post

```
# POST
/api/uds/operations/{id}/refund
```

#### Get transaction information

Docs: https://docs.uds.app/#tag/Operations/paths/~1operations~1calc/post

```
# POST
/api/uds/operations/calc
```

#### Find customer

Docs: https://docs.uds.app/#tag/Customers/paths/~1customers~1find/get

```
# GET
/api/uds/customers/find?code=123456&exchangeCode=true
```

#### Get customer information

Docs: https://docs.uds.app/#tag/Customers/paths/~1customers~1{id}/get

```
# GET
/api/uds/customers/{id}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email altynbek.kazezov.97@gmail.com instead of using the issue tracker.

## Credits

-   [Altynbek](https://github.com/altynbek07)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
