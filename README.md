# Laravel Storyblok File Proxy

[![Latest Version on Packagist](https://img.shields.io/packagist/v/takethelead/laravel-storyblok-file-proxy.svg?style=flat-square)](https://packagist.org/packages/takethelead/laravel-storyblok-file-proxy)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/takethelead/laravel-storyblok-file-proxy/run-tests?label=tests)](https://github.com/takethelead/laravel-storyblok-file-proxy/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/takethelead/laravel-storyblok-file-proxy.svg?style=flat-square)](https://packagist.org/packages/takethelead/laravel-storyblok-file-proxy)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require takethelead/laravel-storyblok-file-proxy
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="TakeTheLead\Skeleton\SkeletonServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

``` php
$skeleton = new TakeTheLead\Skeleton();
echo $skeleton->echoPhrase('Hello, Take The Lead!');
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email info@takethelead.be instead of using the issue tracker.

## Credits

- [Joren Van Hocht](https://github.com/jorenvh)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
