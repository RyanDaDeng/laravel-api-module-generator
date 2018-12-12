<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2018/12/7
 * Time: 下午9:07
 */

namespace TimeHunter\LaravelApiModuleGenerator\Templates;


use TimeHunter\LaravelFileGenerator\Interfaces\RouteSimpleTemplateInterface;


class WebRouteTemplate extends AbstractPatternTemplate implements RouteSimpleTemplateInterface
{

    public function hyphenate($str, array $noStrip = [])
    {
        // non-alpha and non-numeric characters become spaces
        $str = preg_replace('/[^a-z0-9' . implode("", $noStrip) . ']+/i', ' ', $str);
        $str = trim($str);
        $str = str_replace(" ", "-", $str);
        $str = strtolower($str);

        return $str;
    }

    public function getTemplateData()
    {
        $data = [
            'directory' => $this->folderPath . '/' . $this->moduleName . '/routes',
            'prefix' => $this->hyphenate($this->moduleName).'/web',
            'middleware' => ['web', 'auth'],
            'namespace' => $this->nameSpace . '\\' . $this->moduleName . '\\Controllers\\Web',
            'route_name' => 'web',
            'uri' => [

            ]
        ];


        foreach ($this->uri as $uri) {

            if ($uri['type'] === 'web') {
                $row = [
                    'uri' => $uri['uri'],
                    'method' => $uri['method'],
                    'key' => $this->moduleName . '.' . $uri['function'],
                    'function' => '@' . $uri['function'],
                    'class' => $this->moduleName . 'WebController',
                ];
                $data['uri'][] = $row;
            }

        }

        return $data;
    }

}