<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2018/12/7
 * Time: 下午9:07
 */

namespace TimeHunter\LaravelApiModuleGenerator\Templates;


use TimeHunter\LaravelFileGenerator\Interfaces\ClassSimpleTemplateInterface;


class ServiceClassTemplate extends AbstractPatternTemplate implements ClassSimpleTemplateInterface
{

    public function getTemplateData()
    {
        $interfaceName = ucwords($this->moduleName) . 'ServiceInterface';
        $repo = ucwords($this->moduleName) . 'Repository';
        return [

            'class_type' => 'class',
            'directory' => $this->folderPath . '/' . $this->moduleName.'/Services',
            'namespace' => $this->nameSpace .'\\' . $this->moduleName.'\\Services',
            'use' => [
                $this->nameSpace .'\\'. $this->moduleName . '\\Contracts\\' . $interfaceName,
                $this->nameSpace .'\\' . $this->moduleName . '\\Repositories\\' . $repo
            ],
            'class_name' =>ucwords($this->moduleName).'Service',
            'extends' => '',
            'implements' => [ $interfaceName],
            'traits' => [
            ],
            'properties' => [
                'private $repository'
            ],
            'functions' => [
                'public function __construct('.$repo.' $repository)
    {
        $this->repository = $repository;
    }'
            ]
        ];
    }

}