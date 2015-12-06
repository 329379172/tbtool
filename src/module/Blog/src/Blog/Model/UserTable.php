<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/6/18
 * Time: 下午2:13
 */
namespace Blog\Model;
use Zend\Cache\Storage\AdapterPluginManager;
use Zend\Db\TableGateway\TableGateway;

Class UserTable extends AdapterPluginManager{


    protected $tableGateway;

    public function __construct(TableGateway $tableGateway){
        $this->tableGateway = $tableGateway;
    }

    public function findByName($name){
        $adapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $select = $this->tableGateway->getSql()->select();
        $select->where(['name'=>$name]);
        $result = $this->tableGateway->selectWith($select);
        return $result;
    }
}