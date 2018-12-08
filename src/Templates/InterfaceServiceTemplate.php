<?php

namespace TimeHunter\LaravelApiModuleGenerator\Templates;


use TimeHunter\LaravelFileGenerator\Interfaces\InterfaceSimpleTemplateInterface;

class InterfaceServiceTemplate extends AbstractPatternTemplate implements InterfaceSimpleTemplateInterface
{


    public function getTemplateData()
    {
        return [
            'directory' => $this->folderPath . '/' . $this->moduleName . '/Contracts',
            'interface_name' => ucwords($this->moduleName) . 'ServiceInterface',
            'namespace' => $this->nameSpace .'\\' . $this->moduleName . '\\Contracts',
            'functions' => $this->getInterfaceFunction()
        ];
    }
}