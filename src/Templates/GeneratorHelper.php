<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2018/12/8
 * Time: 下午7:07
 */
namespace TimeHunter\LaravelApiModuleGenerator\Templates;
trait GeneratorHelper
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
}
