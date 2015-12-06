<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/6/30
 * Time: 下午4:47
 */
namespace Redis;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Cache\StorageFactory;

class Module implements ConfigProviderInterface,ServiceProviderInterface{

    public function getConfig(){
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig(){
        return [
            'factories' => [
                'Redis' => function(ServiceLocatorInterface $sm){
                    return StorageFactory::factory($sm->get('config')['Redis']);
                }
            ]
        ];
    }

}