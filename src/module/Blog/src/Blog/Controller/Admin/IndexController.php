<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/6/15
 * Time: 下午2:54
 */
namespace Blog\Controller\Admin;

use Zend\Cache\Storage\Adapter\Session;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\SessionManager;
use Zend\Session\Storage\ArrayStorage;

class IndexController extends AbstractActionController{

    public function indexAction(){

        $smarty = $this->getServiceLocator()->get('Smarty');
        $smarty->display('admin/index.tpl');

        exit;

    }

    public function loginAction(){
        $request = $this->getRequest();
        $smarty = $this->getServiceLocator()->get('Smarty');
        if ($request->isGet()) {
            $smarty->assign('error', null);
            $smarty->display('admin/login.tpl');
        }else{
            $success = true;
            $error = null;
            $name = $request->getPost('name');
            $password = $request->getPost('password');
            $success = false;
            if (!$name || !$password) {
                $error = '用户名和密码不能为空';
            } else {
                $tableGateway = $this->getServiceLocator()->get('UserTable');
                $users = $tableGateway->findByName($name);
                if ($users->count() != 1) {
                    $error = '用户名或密码不正确';
                } else {
                    $password_additional = $this->getServiceLocator()->get('config')['password_additional'];
                    $realPassword = md5($password . $password_additional);
                    if ($users->current()->getPassword() === $realPassword) {
                        $session = new SessionManager();
                        $user = $users->current();
                        $storage = new ArrayStorage(['user' => $user]);
                        if ($session->setStorage($storage)) {
                            $success = true;
                        } else {
                            $error = '写入session失败';
                        }
                    } else {
                        $error = '密码不正确';
                    }
                }
            }
            if ($success) {
                $this->redirect()->toUrl('/admin');
            } else {
                $smarty->assign('error', $error);
                $smarty->display('admin/login.tpl');
            }
        }

    }
}