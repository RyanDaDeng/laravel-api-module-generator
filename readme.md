# Laravel Api Module Generator

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]


## IMPORTANT UPDATE

I am working on a new open source project which will re-organise and re-write [Laravel Module](https://github.com/nWidart/laravel-modules) with my own open-source projects, the version will contain more features covered, e.g. support Admin custom setting JSONs, vuejs simple admin, api generators etc.

Please be mind, if you have any issues related to this package, please submit tickets I will only update if there is bugs.

## DESCRIPTION

This is an initial version, I will keep adding new features in in the following days.

A simple laravel api module service generator to provide you with a clean and lightweight code structure.

It's just simple and NO other third party helper code.

IMPORTANT: This package is not aimed at setting up a module, this is only for you to quickly create a structure and make it as your own starting point.

## Demo
(The Demo might be slightly different to your actual result)

![](https://github.com/RyanDaDeng/design-patterns/blob/master/apimodule.gif)

    |-- Module
        |-- Contracts
        |-- Controllers
            |--  Api
                |--  V1
            |--  Web
        |-- Facades
        |-- Models
        |-- Providers
        |-- Repositories
        |-- Requests
        	|--  Api
                |--  V1
            |--  Web
        |-- Services
            
            
## Installation

- Laravel > 5.4

Via Composer, put it into composer require-dev list, its not needed for production

``` bash
$ composer require timehunter/laravel-api-module-generator --dev
```

Publish config

``` bash
php artisan vendor:publish --provider="TimeHunter\LaravelApiModuleGenerator\LaravelApiModuleGeneratorServiceProvider"
```

Optional:

For API routes, you might need to comment out the following line which is a hard-coded value to system's default API namespace.

In RouteServiceProvider.php:
``` bash
        Route::prefix('api')
             ->middleware('api')
//             ->namespace($this->namespace) comment out this line
             ->group(base_path('routes/api.php'));
```             
             
## Usage

Step 1 - make up your own config - laravelapimodulegenerator.php in config folder

Step 2 - run command:
``` bash
php artisan laravel-api-module:make
```

done...

You can also directly run the command first to see the sample result within the app folder

If you want to use Service and Facade, add them in your config/app.php folder.

Also remember to copy/paste routes.php to your root routes folder.


## About Folder Structure

I try to make the structure as small as possible, there can be many extensions possibly added in. However, people usually has their own habit to create their own structure.

You can also check [laravel-file-generator](https://github.com/RyanDaDeng/laravel-file-generator)  project to create your own structure if you want. 

### routes.php

It's not connected with Laravel, it's just a sample file, you can copy/paste over to your root routes file. Delete it if not needed.

### Repository-Service Pattern vs Laravel Eloquent
There is a debate about whether to implement the repository-service pattern in laravel or not...well, after reading a bunch of blogs, articles and my years' experiences, I can surely tell you Laravel is not designed for using PURE repository-service pattern like Java/Spring.

One big concern is that, Eloquent model uses Active Record which is completely different from Data Mapper. If you are still deciding to make PURE repository-service pattern in Laravel, you will end up with a nightmare, massive, duplicate and ugly code as you are re-writing Eloquent model again.

However, this package still generates a Repository folder that is simply just a query collection, nothing else. I do still prefer you put all your Eloquent-like queries into one single class, it's not about technical SOLD principle levels, its only about code reusability and arrangement.

You can google and read blogs from online, there are some open-source projects available that people try to apply repository-service pattern in Laravel...yeah, very complicated and...my question was like why do you use Laravel in the first place..?

Sometimes you might do CACHE on your queries, you can check Decorator design pattern to help you set up.

### Facade Service

The Facade service is one of powerful Laravel features. (note: Laravel's Facade class is not standard Facade design pattern as we knew).

The sturcture takes repositories(query collection) as paramters, so all you have to do is that put all your business logic in the Service class. Also, all your queires go to Repository. You might notice that there is an interface attached to Service, this is only easier for you to quickly generate service functions, you can remove it if you want. 

One endpoint by default would be mapped with one service function right now.


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


