<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/11/18
 * Time: 下午8:29
 */
namespace Tool\Controller;

use Zend\Http\Request;
use Zend\XmlRpc\Request\Http;
class LongDaiController extends Controller{

    public function grabRedBagAction(){

        $method = $this->getRequest()->getMethod();
        if($method === Request::METHOD_GET){
            $this->smarty->display('tool/longdai/redbag.tpl');
        }else if($method === Request::METHOD_POST){
            $longDaiService = $this->serviceLocator->get('LongDai');
            $return = [];
            $http = new Http();
            $params = json_decode($http->getRawRequest(), true);
            if($params){
                $phone = $params['phone'];
                $url = $params['url'];
                if($phone && $url){
                    $pattern = '/http:\/\/[a-zA-z\.\/0-9]+/i';
                    $matchCount = preg_match_all($pattern, $url, $urls);
                    if($matchCount > 0){
                        foreach($urls[0] as $val){
                            $ret = $longDaiService->grabRedBagByUrl($val, $phone);
                            if($ret !== false){
                                $return[] = json_decode($ret);
                            }
                        }
                        echo json_encode($return);
                        exit;
                    }
                } else {
                    exit;
                }

            } else {
                exit;
            }
        } else {
            exit;
        }
    }


}