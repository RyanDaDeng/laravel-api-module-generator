<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2018/12/7
 * Time: 下午9:07
 */

namespace TimeHunter\LaravelApiModuleGenerator\Templates;


use TimeHunter\LaravelFileGenerator\Interfaces\ClassSimpleTemplateInterface;


class ApiControllerClassTemplate extends AbstractPatternTemplate implements ClassSimpleTemplateInterface
{


    public function getTemplateData()
    {

        $requests = [];
        foreach ($this->uri as $uri) {
            if ($uri['type'] === 'api') {
                $requests[] = $this->getApiRequestNameSpace() . $this->getRequestName($uri['function']);
            }
        }
        return [
            'class_type' => 'class',
            'directory' => $this->folderPath . '/' . $this->moduleName . '/Controllers/Api/V1',
            'namespace' => $this->nameSpace .'\\' . $this->moduleName . '\\Controllers\\Api\\V1',
            'use' => array_merge([
                'App\Http\Controllers\Controller',
                $this->getServiceFacadeNameSpace() . '\\' . $this->getServiceFacadeName(),
            ], $requests),
            'class_name' => ucwords($this->moduleName) . 'ApiController',
            'extends' => 'Controller',
            'implements' => [
            ],
            'traits' => [
            ],
            'properties' => [
            ],
            'functions' =>   $this->getControllerFunction()
        ];
    }

}