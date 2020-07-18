# UDS integration for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/altynbek07/laravel-uds.svg?style=flat-square)](https://packagist.org/packages/altynbek07/laravel-uds)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/altynbek07/laravel-uds/run-tests?label=tests)](https://github.com/altynbek07/laravel-uds/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/altynbek07/laravel-uds.svg?style=flat-square)](https://packagist.org/packages/altynbek07/laravel-uds)

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
return [
    /**
     * Your company ID from UDS
     */
    'id' => env('UDS_ID'),
    /**
     * Your API Key from UDS
     */
    'key' => env('UDS_KEY'),
];
```

## Usage

```php
$uds = new Altynbek07\Uds();
echo $uds->echoPhrase('Hello, Altynbek07!');
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
