# Laravel Api Module Generator

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]


A simple laravel api module service generator to provide you with a clean and lightweight code structure.

It's just simple and NO other third party helper code

## Installation

Via Composer

``` bash
$ composer require-dev timehunter/laravel-api-module-generator
```

Publish config

``` bash
php artisan vendor:publish --provider="TimeHunter\laravel-api-module-generator\laravel-api-module-generatorServiceProvider"
```

## Usage

Step 1 - make your own config

Step 2 - run command:
``` bash
php artisan laravel-api-module:make
```

done...

You can also directly run the command first to see the sample result within the app folder

## Security

If you discover any security related issues, please email ryandadeng@gmail.com instead of using the issue tracker.


## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/timehunter/laravel-api-module-generator.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/timehunter/laravel-api-module-generator.svg?style=flat-square
[link-packagist]: https://packagist.org/packages/timehunter/laravel-api-module-generator
[link-downloads]: https://packagist.org/packages/timehunter/laravel-api-module-generator


