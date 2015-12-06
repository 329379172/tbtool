<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/8/30
 * Time: 下午2:08
 */
namespace Base\Service\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Base\Options\MailOptions as MailOptionsObj;
class MailOptions implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config')['xq_mail'];
        return new MailOptionsObj(isset($config) ? $config : []);
    }
}