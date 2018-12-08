<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2018/12/7
 * Time: 下午9:07
 */

namespace TimeHunter\LaravelApiModuleGenerator\Templates;


use TimeHunter\LaravelFileGenerator\Interfaces\ClassSimpleTemplateInterface;


class RequestClassTemplate extends AbstractPatternTemplate implements ClassSimpleTemplateInterface
{
    use GeneratorHelper;

    public function getTemplateData()
    {
        return [
            'class_type' => 'class',
            'directory' => $this->folderPath . '/' . $this->moduleName.'/Requests',
            'namespace' => $this->nameSpace .'\\'. $this->moduleName.'\\Requests',
            'use' => [
                'Illuminate\Foundation\Http\FormRequest'
            ],
            'class_name' =>ucwords($this->moduleName).ucwords($this->uri['function']).'Request' ,
            'extends' => 'FormRequest',
            'implements' => [],
            'traits' => [
            ],
            'properties' => [
            ],
            'functions' => [
                '
    public function authorize()
    {
        return true;
    }',
                "public function rules()
    {
        return " . $this->printArray($this->uri['rules']) . ";
    }"
            ]
        ];
    }

}