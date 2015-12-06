<?php
/**
 * Created by PhpStorm.
 * User: linfeiyang
 * Date: 2015/11/5
 * Time: 20:36
 */
namespace TbTool\Controller;
use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends ExtActionController{

    public function indexAction(){
        $this->getServiceLocator()->get("Smarty")->display('tb-tool/index.tpl');
        exit();
    }




}