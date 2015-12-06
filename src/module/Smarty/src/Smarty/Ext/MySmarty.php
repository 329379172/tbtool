<?php
namespace Smarty\Ext;
class MySmarty extends \Smarty{

    public function display($template = NULL, $cache_id = NULL, $compile_id = NULL, $parent = NULL){
        parent::display($template, $cache_id, $compile_id,$parent);
        exit;
    }

}
