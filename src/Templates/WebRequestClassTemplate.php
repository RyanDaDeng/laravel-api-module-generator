<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2018/12/7
 * Time: 下午9:07
 */

namespace TimeHunter\LaravelApiModuleGenerator\Templates;


use TimeHunter\LaravelFileGenerator\Interfaces\ClassSimpleTemplateInterface;


class WebRequestClassTemplate extends AbstractPatternTemplate implements ClassSimpleTemplateInterface
{
    public function printArray($data)
    {
        $arrayPrinter = "[\n";
        $total = count($data);
        $count = 0;
        foreach ($data as $key => $rule) {
            $count++;
            if ($total === $count) {
                $arrayPrinter .= sprintf("          '%s'=>'%s'\n", $key, $rule);
            } else {
                $arrayPrinter .= sprintf("          '%s'=>'%s',\n", $key, $rule);
            }
        }
        $arrayPrinter .= "      ]";
        return $arrayPrinter;
    }

    public function getTemplateData()
    {
        return [
            'class_type' => 'class',
            'directory' => $this->folderPath . '/' . $this->moduleName.'/Requests/Web',
            'namespace' => $this->nameSpace .'\\'. $this->moduleName.'\\Requests\\Web',
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