<?php
/**
 * Created by PhpStorm.
 * User: linfeiyang
 * Date: 2015/11/5
 * Time: 20:31
 */
namespace TbTool\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class TestController extends AbstractActionController
{

    public function indexAction()
    {
        echo 'test success';
        exit();
    }
}