<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2018/12/7
 * Time: 下午9:07
 */

namespace TimeHunter\LaravelApiModuleGenerator\Templates;


use TimeHunter\LaravelFileGenerator\Interfaces\ClassSimpleTemplateInterface;


class ProviderClassTemplate extends AbstractPatternTemplate implements ClassSimpleTemplateInterface
{

    public function getTemplateData()
    {
        $interfaceName = ucwords($this->moduleName) . 'ServiceInterface';
        $serviceClass = ucwords($this->moduleName) . 'Service';
        return [
            'class_type' => 'class',
            'directory' => $this->folderPath . '/' . $this->moduleName . '/Providers',
            'namespace' => $this->nameSpace . '\\' . $this->moduleName . '\\Providers',
            'use' => [
                $this->nameSpace . '\\' . $this->moduleName . '\\Contracts\\' . $interfaceName,
                $this->nameSpace . '\\' . $this->moduleName . '\\Services\\' . $serviceClass,
                'Illuminate\Support\ServiceProvider'
            ],
            'class_name' => ucwords($this->moduleName) . 'ServiceProvider',
            'extends' => 'ServiceProvider',
            'implements' => [
            ],
            'traits' => [
            ],
            'properties' => [
            ],
            'functions' => [
                '/**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->map();
    }',
                "public function register()
    {\n" .
                '       $this->app->singleton(' . "
            $interfaceName::class,
            $serviceClass::class
        );\n" .
                '    }' . "\n" .
                '    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . \'/../routes/web.php\');
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . \'/../routes//api.php\');
    }'

            ]
        ];
    }

}