<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/8/30
 * Time: 下午2:17
 */
namespace Base\Controller;

use Base\Options\MailOptions;
use Zend\Mvc\Controller\AbstractActionController;

class TestController extends AbstractActionController
{

    public function testAction()
    {
        //$mailOptions = $this->getServiceLocator()->get('MailOptions');
        //echo $mailOptions->getMailFrom();
        //echo '<br/>';
        //echo $mailOptions->getMailTo();
        $redis = $this->getServiceLocator()->get('redis-cli');
        //var_dump($redis);
        //$redis->set('foo', 'bar');
        $value = $redis->get('foo');
        echo $value;
        exit;
    }

    public function routeAction()
    {
        $smarty = $this->getServiceLocator()->get("Smarty");
        $route = [
            'phpinfo' => '/api/phpinfo',
            'taobaoinfo' => '/api/taobao/info/[:name]',
            'postCode' => '/api/postcode/[:name]',
            'randomPlace' => '/api/randomPlace/[:limit]',
            'placeLooked' => '/api/placeLooked/[:id]',
            'releaseOrder' => '/api/release/[:act]',
            'exam' => '/api/yangqiong/exam'
        ];
        $smarty->assign('routes', $route);
        $smarty->display('test/route.tpl');
    }


}