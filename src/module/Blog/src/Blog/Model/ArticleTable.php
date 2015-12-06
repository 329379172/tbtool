<?php
/**
 * Created by PhpStorm.
 * User: yourfather
 * Date: 2015/6/16
 * Time: 21:27
 */

namespace Blog\Model;

use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Stdlib\Hydrator\ClassMethods;

class ArticleTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway){
        $this->tableGateway = $tableGateway;
    }

    /**
     * @param $id article id
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function findById($id){
        $result = $this->tableGateway->select(function(Select $select) use ($id){
            $select->columns([
                'id'=>'id',
                'title'=>'title',
                'content'=>'content',
                'update_time'=>'update_time',
                'create_time'=>'create_time'
            ])
            ->join(['u'=>'tbl_user'],'u.id=author',['author'=>'name'],Select::JOIN_LEFT)
            ->join(['c'=>'tbl_category'],'c.id=category',['category'=>'name'],Select::JOIN_LEFT)
            ->where->equalTo('tbl_article.id',$id);
        });
        return $result;
    }

    /**
     * @param $article Article Object
     * @return bool|int
     */
    public function insert($article){
        var_dump((new ClassMethods())->extract($article));
        if($this->tableGateway->insert((new ClassMethods())->extract($article))){
            return $this->tableGateway->lastInsertValue;
        }else{
            return false;
        }
    }

    /**
     * get all article
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function all(){
        return $this->tableGateway->select();
    }

    /**
     * delete article by id
     * @param $id article id
     * @return int
     */
    public function deleteById($id){
        return $this->tableGateway->delete('id='.$id);
    }

    public function query($sql){

    }

}