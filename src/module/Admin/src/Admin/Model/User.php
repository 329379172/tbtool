<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/8/4
 * Time: 15:47
 */

namespace Admin\Model;

class User
{
    public $id;
    public $name;
    public $password;
    public $create_time;

    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->name = (!empty($data['name'])) ? $data['name'] : null;
        $this->password  = (!empty($data['password'])) ? $data['password'] : null;
        $this->create_time  = (!empty($data['create_time'])) ? $data['create_time'] : null;
    }
}