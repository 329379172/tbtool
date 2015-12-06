<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/11/25
 * Time: 下午8:06
 */
namespace Base\Service\Factory;

use Predis\Client;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RedisFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $redisConfig = $serviceLocator->get('config')['redis'];
        if ($redisConfig) {
            return new Client($redisConfig);
        } else {
            return false;
        }

    }

}