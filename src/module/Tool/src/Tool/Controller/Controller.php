<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/11/18
 * Time: 下午8:22
 */

namespace Tool\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;

class Controller extends AbstractActionController{

    protected $smarty;

    /**
     * @return mixed
     */
    public function getSmarty()
    {
        return $this->smarty;
    }

    /**
     * @param mixed $smarty
     */
    public function setSmarty($smarty)
    {
        $this->smarty = $smarty;
    }

    public function onDispatch(MvcEvent $e){
        $this->smarty = $this->serviceLocator->get('Smarty');
        parent::onDispatch($e);
    }




}