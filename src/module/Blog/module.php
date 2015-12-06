<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/6/15
 * Time: 下午2:34
 */
namespace Blog;
use Blog\Model\Article;
use Blog\Model\ArticleTable;
use Blog\Model\User;
use Blog\Model\UserTable;
use Blog\Plugin\MySmarty;
use Zend\Cache\StorageFactory;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Module implements ConfigProviderInterface,AutoloaderProviderInterface,ServiceProviderInterface{

    /**
     * Returns configuration to merge with application configuration
     *
     * @return array|\Traversable
     */
    public function getConfig(){
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * Return an array for passing to Zend\Loader\AutoloaderFactory.
     *
     * @return array
     */
    public function getAutoloaderConfig(){
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                ]
            ]
        ];
    }

    /**
     * Expected to return \Zend\ServiceManager\Config object or array to
     * seed such an object.
     *
     * @return array|\Zend\ServiceManager\Config
     */
    public function getServiceConfig(){
        return [
            'factories'=>[
                'ArticleTable' => function(ServiceLocatorInterface $sm){
                    $tableGateway = $sm->get('ArticleTableGateway');
                    $table = new ArticleTable($tableGateway);
                    return $table;
                },
                'ArticleTableGateway' => function(ServiceLocatorInterface $sm){
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Article());
                    return new TableGateway('tbl_article',$dbAdapter,null,$resultSetPrototype);
                },
                'UserTable' => function(ServiceLocatorInterface $sm){
                    $tableGateway = $sm->get('UserTableGateway');
                    $table = new UserTable($tableGateway);
                    return $table;
                },
                'UserTableGateway' => function(ServiceLocatorInterface $sm){
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new User());
                    return new TableGateway('tbl_user',$dbAdapter,null,$resultSetPrototype);
                },
                'Smarty' => function(ServiceLocatorInterface $sm){
                    $smarty = new MySmarty();
                    $smarty->debugging = false;
                    $smarty->caching = false;
                    $smarty->cache_lifetime = 120;
                    $smarty->setTemplateDir(__DIR__ . '/view/smarty/templates');
                    $smarty->setConfigDir(__DIR__ . '/view/smarty/configs');
                    $smarty->setCompileDir(__DIR__ . '/view/smarty/templates_c');
                    $smarty->setCacheDir(__DIR__ . '/view/smarty/cache');
                    return $smarty;
                }
            ]
        ];
    }


}