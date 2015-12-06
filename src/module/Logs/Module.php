<?php
namespace Logs;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/8/12
 * Time: 上午10:13
 */

class Module implements  ServiceProviderInterface{

    public function getServiceConfig(){
        return [
            'factories'=> [
                'log' => function(ServiceLocatorInterface $sm){
                    $log = new Logger('api');
                    $log->pushHandler(new StreamHandler('data/api.log'), Logger::INFO);
                    return $log;
                }
            ]
        ];
    }

}