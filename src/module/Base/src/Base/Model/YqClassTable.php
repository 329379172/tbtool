<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/9/17
 * Time: 上午10:36
 */
namespace Base\Model;

use Zend\Db\Sql\Where;
use Zend\Db\TableGateway\TableGateway;

class YqClassTable{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function queryByWenti($wenti){
        $select = $this->tableGateway->getSql()->select();
        $select->where(function(Where $where) use ($wenti){
            $where->like('wenti', $wenti.'%');
            return $where;
        });
        $result = $this->tableGateway->selectWith($select);
        return $result;
    }
}