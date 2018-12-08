# Laravel Api Module Generator

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]


A simple laravel api module service generator to provide you with a clean and lightweight code structure.

It's just simple and NO other third party helper code.

## Demo
![](https://github.com/RyanDaDeng/design-patterns/blob/master/apimodule.gif)

## Installation

Via Composer, put it into composer require-dev list, its no needed for production

``` bash
$ composer require timehunter/laravel-api-module-generator --dev
```

Publish config

``` bash
php artisan vendor:publish --provider="TimeHunter\LaravelApiModuleGenerator\LaravelApiModuleGeneratorServiceProvider"
```

## Usage

Step 1 - make up your own config - laravelapimodulegenerator.php in config folder

Step 2 - run command:
``` bash
php artisan laravel-api-module:make
```

done...

You can also directly run the command first to see the sample result within the app folder

## About Code Structure

I try to make the structure as small as possible, there can be many extensions possibly added in. However, people usually has their own habit to create their own structure.

You can also check [laravel-file-generator](https://github.com/RyanDaDeng/laravel-file-generator)  project to create your own structure if you want. 

### routes.php

It's not connected with Laravel, it's just a sample file, you can copy/paste over to your root routes file. Delete it if not needed.

### Repository-Service Pattern vs Laravel Eloquent
There is a debate regarding the repository-service pattern in laravel...well, after reading bunch of blogs, articles and my years' experience, I can surely tell you Laravel is not designed for using PURE repository-service pattern like Java/Spring.

One big concern is that, Eloquent model uses Active Record which is completely different from Data Mapper. If you are stil deciding to make PURE repository-service pattern in Laravel, you will end up with a nightmare, massive, duplicate and ugly code as you are re-writing Eloquent model again.

However, this package still generates a Repository folders, which is simply just a query collection, nothing else. I do still prefer you put all your Eloquent-like queries into one single class, it's not about techinical SOLD principle levels, its only about code reusability and arrangement.

You can check and read blogs from online, I suggest you to see some code that people try to apply repository-service pattern in Laravel...yeah, very complicated and...my question was like why you use Laravel?

One more helpful point for you, sometimes you might do CACHE on your queries, you can check Decorator design pattern to help you set up.

### Models

As the structure is module-based, I prefer you bind $table and $connection for every models in each module folder.


## Security

If you discover any security related issues, please email ryandadeng@gmail.com instead of using the issue tracker.


## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/timehunter/laravel-api-module-generator.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/timehunter/laravel-api-module-generator.svg?style=flat-square
[link-packagist]: https://packagist.org/packages/timehunter/laravel-api-module-generator
[link-downloads]: https://packagist.org/packages/timehunter/laravel-api-module-generator


