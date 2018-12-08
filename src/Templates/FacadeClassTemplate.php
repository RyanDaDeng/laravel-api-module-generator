<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2018/12/7
 * Time: 下午9:07
 */

namespace TimeHunter\LaravelApiModuleGenerator\Templates;


use TimeHunter\LaravelFileGenerator\Interfaces\ClassSimpleTemplateInterface;


class FacadeClassTemplate extends AbstractPatternTemplate implements ClassSimpleTemplateInterface
{

    public function getTemplateData()
    {
        $interfaceName = ucwords($this->moduleName) . 'ServiceInterface';
        return [
            'class_type' => 'class',
            'directory' => $this->folderPath . '/' . $this->moduleName . '/Facades',
            'namespace' => $this->nameSpace . '\\' . $this->moduleName . '\\Facades',
            'use' => [
                $this->nameSpace . '\\' . $this->moduleName . '\\Contracts\\' . $interfaceName,
                'Illuminate\Support\Collection',
                'Illuminate\Support\Facades\Facade',
            ],
            'class_name' => ucwords($this->moduleName) . 'Service',
            'extends' => 'Facade',
            'implements' => [
            ],
            'traits' => [
            ],
            'properties' => [
            ],
            'annotations' => array_merge($this->getFacadeAnnotations()),
            'functions' => [
                "/**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return $interfaceName::class;
    }"
            ]
        ];
    }

}