<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2018/12/7
 * Time: 下午9:07
 */

namespace TimeHunter\LaravelApiModuleGenerator\Templates;


use TimeHunter\LaravelFileGenerator\Interfaces\ClassSimpleTemplateInterface;


class RepositoryClassTemplate extends AbstractPatternTemplate implements ClassSimpleTemplateInterface
{

    public function getTemplateData()
    {
        return [
            'class_type' => 'class',
            'directory' => $this->folderPath . '/' . $this->moduleName . '/Repositories',
            'namespace' => $this->nameSpace .'\\' . $this->moduleName . '\\Repositories',
            'use' => [
                'Illuminate\Support\Collection'
            ],
            'class_name' => ucwords($this->moduleName) . 'Repository',
            'extends' => '',
            'implements' => [
            ],
            'traits' => [
            ],
            'properties' => [
            ],
            'functions' => [
                '/**
     * @return Collection
     */
    public function queryOne(){
        return collect();
    }

    /**
     * @return Collection
     */
    public function queryTwo(){
        return collect();
    }'
            ]
        ];
    }

}