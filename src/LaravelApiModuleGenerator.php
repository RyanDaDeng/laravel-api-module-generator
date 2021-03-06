<?php

namespace TimeHunter\LaravelApiModuleGenerator;

use TimeHunter\LaravelApiModuleGenerator\Templates\ApiControllerClassTemplate;
use TimeHunter\LaravelApiModuleGenerator\Templates\ApiRequestClassTemplate;
use TimeHunter\LaravelApiModuleGenerator\Templates\ApiRouteTemplate;
use TimeHunter\LaravelApiModuleGenerator\Templates\FacadeClassTemplate;
use TimeHunter\LaravelApiModuleGenerator\Templates\InterfaceServiceTemplate;
use TimeHunter\LaravelApiModuleGenerator\Templates\ModelClassTemplate;
use TimeHunter\LaravelApiModuleGenerator\Templates\ProviderClassTemplate;
use TimeHunter\LaravelApiModuleGenerator\Templates\RepositoryClassTemplate;
use TimeHunter\LaravelApiModuleGenerator\Templates\RequestClassTemplate;
use TimeHunter\LaravelApiModuleGenerator\Templates\WebRouteTemplate;
use TimeHunter\LaravelApiModuleGenerator\Templates\ServiceClassTemplate;
use TimeHunter\LaravelApiModuleGenerator\Templates\WebControllerClassTemplate;
use TimeHunter\LaravelApiModuleGenerator\Templates\WebRequestClassTemplate;
use TimeHunter\LaravelFileGenerator\Facades\LaravelFileGenerator;

class LaravelApiModuleGenerator
{
    // Build wonderful things

    public function publish($schema)
    {
        foreach ($schema['modules'] as $moduleName => $value) {

            if ($value['enable'] === true) {

                foreach ($schema['modules'][$moduleName]['uri'] as $uri) {
                    if ($uri['type'] === 'web') {
                        LaravelFileGenerator::publish(new WebRequestClassTemplate($moduleName, $uri, $value['namespace'], $value['folder_path']));
                    }
                    if ($uri['type'] === 'api') {
                        LaravelFileGenerator::publish(new ApiRequestClassTemplate($moduleName, $uri, $value['namespace'], $value['folder_path']));
                    }
                }

                LaravelFileGenerator::publish(new WebControllerClassTemplate($moduleName, $value['uri'], $value['namespace'], $value['folder_path']));
                LaravelFileGenerator::publish(new ApiControllerClassTemplate($moduleName, $value['uri'], $value['namespace'], $value['folder_path']));
                LaravelFileGenerator::publish(new InterfaceServiceTemplate($moduleName, $value['uri'], $value['namespace'], $value['folder_path']));
                LaravelFileGenerator::publish(new RepositoryClassTemplate($moduleName, $value['uri'], $value['namespace'], $value['folder_path']));
                LaravelFileGenerator::publish(new FacadeClassTemplate($moduleName, $value['uri'], $value['namespace'], $value['folder_path']));
                LaravelFileGenerator::publish(new ProviderClassTemplate($moduleName, $value['uri'], $value['namespace'], $value['folder_path']));
                LaravelFileGenerator::publish(new ServiceClassTemplate($moduleName, $value['uri'], $value['namespace'], $value['folder_path']));
                LaravelFileGenerator::publish(new WebRouteTemplate($moduleName, $value['uri'], $value['namespace'], $value['folder_path']));
                LaravelFileGenerator::publish(new ApiRouteTemplate($moduleName, $value['uri'], $value['namespace'], $value['folder_path']));
                foreach ($schema['modules'][$moduleName]['models'] as $model) {
                    LaravelFileGenerator::publish(new ModelClassTemplate($moduleName, $model, $value['namespace'], $value['folder_path']));
                }
                echo "\e[0;32;25mModule: " . $moduleName . ' Generated!' . ' It is located at ' . $value['folder_path'] . "\e[0m\n";
            }else{
                echo "\e[0;34;25mModule: " . $moduleName . '  skipped!' . "\e[0m\n";
            }
        }
    }
}