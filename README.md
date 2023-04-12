# PHP SDK for Hyperzod

This is the official PHP SDK for Hyperzod.

## Installation

You can install the package via composer:

```bash
composer require hyperzod/hyperzod-sdk-php
```

## Usage

You can use the sdk to call the Hyperzod API (Eg: Updating the order status).

```php
$client = HyperzodClient($api_key, $env, $token = null);
$response = $client->order->updateOrderStatus($payload);
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email siddiquiazam966@gmail.com instead of using the issue tracker.

## Credits

- [Azam Siddiqui](https://github.com/siddiquiazam)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
