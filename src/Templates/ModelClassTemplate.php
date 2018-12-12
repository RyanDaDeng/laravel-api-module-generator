<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2018/12/7
 * Time: 下午9:07
 */

namespace TimeHunter\LaravelApiModuleGenerator\Templates;


use TimeHunter\LaravelFileGenerator\Interfaces\ClassSimpleTemplateInterface;


class ModelClassTemplate extends AbstractPatternTemplate implements ClassSimpleTemplateInterface
{

    public function getTemplateData()
    {
        return [
            'class_type' => 'class',
            'directory' => $this->folderPath . '/' . $this->moduleName . '/Models',
            'namespace' => $this->nameSpace . '\\' . $this->moduleName . '\\Models',
            'use' => [
                'Illuminate\Database\Eloquent\Model'
            ],
            'class_name' => ucwords($this->moduleName) . ucwords($this->uri),
            'extends' => 'Model',
            'implements' => [],
            'traits' => [
            ],
            'properties' => [
                'protected $table'
            ],
            'functions' => [
            ]
        ];
    }

}