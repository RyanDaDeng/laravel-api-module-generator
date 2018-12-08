<?php
/**
 * Created by PhpStorm.
 * User: dadeng
 * Date: 2018/12/7
 * Time: 下午9:07
 */

namespace TimeHunter\LaravelApiModuleGenerator\Templates;


class AbstractPatternTemplate
{
    protected $moduleName;
    protected $uri;
    protected $nameSpace;
    protected $folderPath;

    public function __construct($moduleName, $data, $nameSpace, $folderPath)
    {
        $this->moduleName = $moduleName;
        $this->uri = $data;
        $this->nameSpace = $nameSpace;
        $this->folderPath = $folderPath;
    }


    public function getRequestName($function)
    {
        return ucwords($this->moduleName) . ucwords($function) . 'Request';
    }

    public function getRequestNameSpace()
    {
        return $this->nameSpace. '\\' . $this->moduleName . '\\Requests' . '\\';
    }

    public function getServiceFacadeNameSpace()
    {
        return $this->nameSpace. '\\'  . $this->moduleName . '\\Facades';
    }

    public function getServiceFacadeName()
    {
        return ucwords($this->moduleName) . 'Service';
    }

    public function getServiceNameSpace()
    {
        return $this->nameSpace. '\\'  . $this->moduleName . '\\Services';
    }

    public function getServiceName()
    {
        return ucwords($this->moduleName) . 'Service';
    }


    public function getFacadeAnnotations()
    {

        $data = [];
        foreach ($this->uri as $uri) {

            $str = "@method static Collection " . $uri['function'] . '(';
            $strA = $this->getParamFromUrl($uri['uri']);


            if (strcasecmp($uri['method'], 'get') === 0) {
                $total = count($uri['rules']);
                $count = 0;
                foreach ($uri['rules'] as $param => $value) {
                    $count++;
                    if ($count == $total) {
                        $strA .= '$' . $param;
                    } else {
                        $strA .= '$' . $param . ',';
                    }
                }
            }

            if (!(strcasecmp($uri['method'], 'get') === 0 || strcasecmp($uri['method'], 'delete') === 0)) {

                if ($strA) {
                    $strA .= ',';
                }
                $strA .= '$data =[]';
            }
            $str .= $strA;
            $data[] = $str . ')';
        }
        return $data;
    }


    public function getInterfaceFunction()
    {

        $data = [];
        foreach ($this->uri as $uri) {

            $str = "public function " . $uri['function'] . '(';
            $strA = $this->getParamFromUrl($uri['uri']);

            if (strcasecmp($uri['method'], 'get') === 0) {
                $total = count($uri['rules']);
                $count = 0;
                foreach ($uri['rules'] as $param => $value) {
                    $count++;
                    if ($count == $total) {
                        $strA .= '$' . $param;
                    } else {
                        $strA .= '$' . $param . ',';
                    }
                }
            }

            if (!(strcasecmp($uri['method'], 'get') === 0 || strcasecmp($uri['method'], 'delete') === 0)) {

                if ($strA) {
                    $strA .= ',';
                }
                $strA .= '$data =[]';
            }
            $str .= $strA;
            $data[] = $str . ')';
        }
        return $data;
    }


    public function getParamFromUrl($uri)
    {
        $str = '';
        if (strpos($uri, '{') !== false) {
            $explodes = explode('/', $uri);
            foreach ($explodes as $explode) {

                if (strpos($explode, '{') !== false) {
                    if ($str) {
                        $str .= ',';
                    }
                    $explode = str_replace('{', '', $explode);
                    $explode = str_replace('}', '', $explode);


                    $str .= '$' . $explode;


                }
            }
        }

        return $str;

    }

    public function getControllerFunction()
    {

        $data = [];
        foreach ($this->uri as $uri) {
            $str = "public function " . $uri['function'] . '(' . $this->getRequestName($uri['function']) . ' $request ';


            $paramsFromUrl = $this->getParamFromUrl($uri['uri']);

            if ($paramsFromUrl) {
                $str .= ',' . $paramsFromUrl;
            }


            $str .= ")\n";
            $str .= "    {\n";
            $str .= '        $request->validated();' . "\n";
            $str .= '        return ' . $this->getServiceFacadeName() . '::' . $uri['function'] . '(';

            if (strcasecmp($uri['method'], 'get') === 0) {
                $total = count($uri['rules']);
                $count = 0;
                foreach ($uri['rules'] as $param => $value) {
                    $count++;
                    if ($count == $total) {
                        $str .= '$request->query(' . "'" . $param . "'" . ')';
                    } else {
                        $str .= '$request->query(' . "'" . $param . "'" . '),';
                    }
                }
            } elseif (strcasecmp($uri['method'], 'delete') === 0) {
                $paramsFromUrl = $this->getParamFromUrl($uri['uri']);
                if ($paramsFromUrl) {
                    $str .= $paramsFromUrl;
                }
            } else {
                $paramsFromUrl = $this->getParamFromUrl($uri['uri']);
                if ($paramsFromUrl) {
                    $str .= $paramsFromUrl . ",";
                }

                $str .= ' $request->all()';
            }


            $str .= ");\n";

            $str .= "    }\n";
            $data[] = $str;

        }

        return $data;
    }


}