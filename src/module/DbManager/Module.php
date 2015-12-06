<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/8/18
 * Time: 下午4:00
 */

namespace DbManager;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements AutoloaderProviderInterface,ConfigProviderInterface
{

    public function getAutoloaderConfig(){
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                ]
            ]
        ];
    }

    public function getConfig(){
        return include __DIR__ . '/config/module.config.php';
    }

}