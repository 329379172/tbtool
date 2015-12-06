<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/6/24
 * Time: 上午9:58
 */
namespace Blog\Plugin;
class MySmarty extends \Smarty{

    public function display($template = NULL, $cache_id = NULL, $compile_id = NULL, $parent = NULL){
        parent::display($template, $cache_id, $compile_id,$parent);
        exit;
    }

}
