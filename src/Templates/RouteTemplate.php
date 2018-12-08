<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2018/12/7
 * Time: 下午9:07
 */
namespace TimeHunter\LaravelApiModuleGenerator\Templates;


use TimeHunter\LaravelFileGenerator\Interfaces\RouteSimpleTemplateInterface;


class RouteTemplate extends AbstractPatternTemplate implements RouteSimpleTemplateInterface
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
            'directory' => $this->folderPath . '/' . $this->moduleName,
            'domain' => $this->hyphenate($this->moduleName),
            'uri' => []
        ];

        foreach ($this->uri as $uri) {
            $row = [
                'uri' => $uri['uri'],
                'method'=>$uri['method'],
                'domain' => $this->moduleName,
                'key' => $this->moduleName . '.' . $uri['function'],
                'function' => '@' . $uri['function'],
                'web_class' => $this->nameSpace .'\\' . $this->moduleName . '\\Controllers\\Web\\' . $this->moduleName . 'WebController',
                'api_class' => $this->nameSpace .'\\' . $this->moduleName . '\\Controllers\\Api\\V1\\' . $this->moduleName . 'ApiController',
            ];
            $data['uri'][] = $row;
        }

        return $data;
    }

}