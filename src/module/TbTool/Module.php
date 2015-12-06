<?php
/**
 * Created by PhpStorm.
 * User: linfeiyang
 * Date: 2015/11/5
 * Time: 20:16
 */
namespace TbTool;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\DependencyIndicatorInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements ConfigProviderInterface, AutoloaderProviderInterface, ServiceProviderInterface,DependencyIndicatorInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.conf.php';
    }

    public function getServiceConfig()
    {
        return [];
    }

    public function getModuleDependencies()
    {
        return [
            'Base',
            'Smarty'
        ];
    }

    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                ]
            ]
        ];
    }
}
