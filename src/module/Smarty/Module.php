<?php

namespace Smarty;

use Smarty\Ext\MySmarty;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Module implements ConfigProviderInterface,ServiceProviderInterface,AutoloaderProviderInterface{

    public function getConfig(){
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig(){
        return [
            'factories' => [
                'Smarty' => function(ServiceLocatorInterface $sm){
                    $config = $sm->get('config');
                    $smarty = new MySmarty();
                    $smarty->debugging = $config['debugging'];
                    $smarty->caching = $config['caching'];
                    $smarty->cache_lifetime = $config['cache_lifetime'];
                    $smarty->setTemplateDir($config['templateDir']);
                    $smarty->setConfigDir($config['configDir']);
                    $smarty->setCompileDir($config['compileDir']);
                    $smarty->setCacheDir($config['cacheDir']);
                    $smarty->setLeftDelimiter($config['leftDelimiter']);
                    $smarty->setRightDelimiter($config['rightDelimiter']);
                    return $smarty;
                }
            ]
        ];
    }


    public function getAutoloaderConfig(){
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                ]
            ]
        ];
    }

}