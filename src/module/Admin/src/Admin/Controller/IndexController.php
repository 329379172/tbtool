<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/6/15
 * Time: 下午2:54
 */
namespace Admin\Controller;

use Zend\Cache\Storage\Adapter\Session;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\SessionManager;
use Zend\Session\Storage\ArrayStorage;

class IndexController extends AbstractActionController{
    protected $userTable;

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
            $error = null;
            $name = $request->getPost('name');
            $password = $request->getPost('password');
            $success = false;
            if (!$name || !$password) {
                $error = '用户名和密码不能为空';
            } else {
                $tableGateway = $this->getServiceLocator()->get('Admin\Model\UserTable');
                $users = $tableGateway->findByName($name);
                $password_additional = $this->getServiceLocator()->get('config')['password_additional'];
                $realPassword = md5($password . $password_additional);
                if ($users->password === $realPassword) {

                    $session = new SessionManager();
                    $user = $users->username;
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
            if ($success) {
                $this->redirect()->toUrl('/admin');
            } else {
                $smarty->assign('error', $error);
                $smarty->display('admin/login.tpl');
            }
        }

    }

    public function testAction()
    {
        $userTable = $this->getServiceLocator()->get('Admin\Model\UserTable');
        $data = $userTable->fetchAll();
        foreach ($data as $item){
            echo $item->name.'-----';
            echo $item->password;
        }
        exit;
    }
}