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
        $serviceClass = ucwords($this->moduleName).'Service';
        return [
            'class_type' => 'class',
            'directory' => $this->folderPath . '/' . $this->moduleName . '/Providers',
            'namespace' => $this->nameSpace .'\\'. $this->moduleName . '\\Providers',
            'use' => [
                $this->nameSpace .'\\' . $this->moduleName . '\\Contracts\\' . $interfaceName,
                $this->nameSpace .'\\' . $this->moduleName . '\\Services\\' . $serviceClass,
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
    }',
                "public function register()
    {\n".
        '       $this->app->singleton('."
            $interfaceName::class,
            $serviceClass::class
        );\n".
    '   }'

            ]
        ];
    }

}