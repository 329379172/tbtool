<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/6/15
 * Time: 下午2:54
 */
namespace Api\Controller;
include __DIR__ . '/../Plugin/simple_html_dom.php';
use Zend\Cache\Storage\Adapter\Redis;
use Zend\Cache\Storage\Adapter\RedisOptions;
use Zend\Http\Header\UserAgent;
use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{

    function getTaobaoUserInfoAction()
    {
        if(!($this->getRequest()->getQuery('token') == $this->getServiceLocator()->get('config')['api_token'])){
            echo "";
            exit;
        }
        $log = $this->getServiceLocator()->get('log');
        $log->addInfo('取淘宝信息'.$this->params('name') . "\t"  . $this->getRequest()->getServer('REMOTE_ADDR') . "\t" . $this->getRequest()->getHeaders()->get('User-Agent')->getFieldValue());

        $nick = urlencode($this->params('name'));
        //$redis = $this->getServiceLocator()->get('Redis');
        //$redis = new Redis();
        //if ($redis->getItem(md5($nick))) {
          //  echo $redis->getItem(md5($nick));
            //exit;
        //}
        $headers = [
            'Origin' => 'http://www.131458.com',
            'Referer' => 'http://www.131458.com/',
            'Content-Type' => 'application/json; charset=UTF-8'
        ];
        $data = "{'nick':'" . $nick . "'}";
        $response = \Requests::post('http://www.131458.com/handler/load.aspx/Load', $headers, $data);
        $d = json_decode($response->body, true);
        $session = $response->cookies['ASP.NET_SessionId']->value;
        if (is_array($d) && !empty($d['d'])) {
            $tokenResponse = \Requests::get('http://123.57.144.6:3000/token?d=' . $d['d'] . '&c=vvl');
            $headers = [
                'Cookie' => 'ASP.NET_SessionId=' . $session
            ];
            $url = 'http://www.131458.com/handler/TaobaoInfo.ashx?tbNickInfoJson=' . $nick . '&token=' . $tokenResponse->body . '&_=' . (time() * 1000);
            $taobaoInfoResponse = \Requests::get($url, $headers);
            $url = 'http://www.131458.com/handler/TaobaoInfo.ashx?nickCode=' . $nick . '&token=' . $tokenResponse->body . '&_=' . (time() * 1000);
            $taobaoInfoResponse2 = \Requests::get($url, $headers);

            $document = str_get_html($taobaoInfoResponse2->body);
            $info = [];
            $info['nickName'] = $document->find('.inq_02_L_001')[0]->find('a')[0]->text();
            $info['registerTime'] = $document->find('.inq_02_L_002')[0]->find('span')[0]->text();
            $info['realName'] = $document->find('.inq_02_L_003')[0]->find('span')[0]->text();
            $info['address'] = $document->find('.inq_02_L_004')[1]->find('span')[0]->text();
            $info['zhongping'] = $document->find('#zhongpingNumber')[0]->text();
            $info['chapingNumber'] = $document->find('#chapingNumber')[0]->text();
            $info['bili'] = $document->find('#zcbl')[0]->text();
            $info['buyerLevel'] = $document->find('.inq_04_001')[0]->find('img')[0]->attr['src'];
            $dom = $document->find('.inq_04_001')[0]->find('a');
            if (count($dom) > 0) {
                $info['buyerVipLevel'] = $document->find('.inq_04_001')[0]->find('a')[0]->find('img')[0]->attr['title'];
            }
            $info['buyerCredit'] = $document->find('.inq_04_001')[0]->find('b[name=p]')[0]->text();
            $info['buyerWeek'] = $document->find('.inq_04_001')[1]->find('.qq')[0]->text();
            $info['buyerMonth'] = $document->find('.inq_04_001')[2]->find('.qq')[0]->text();
            $info['buyerHalfYear'] = $document->find('.inq_04_001')[3]->find('.qq')[0]->text();
            $info['buyerHalfYearAgo'] = $document->find('.inq_04_001')[4]->find('.qq')[0]->text();
            $info['buyerEveryWeek'] = $document->find('.inq_04_001')[5]->find('#bc')[0]->text();

            $info['sellerLevel'] = $document->find('.inq_04_001')[6]->find('img')[0]->attr['src'];
            $info['sellerCredit'] = $document->find('.inq_04_001')[6]->find('b')[0]->text();
            $info['sellerWeek'] = $document->find('.inq_04_001')[7]->find('b')[0]->text();
            $info['sellerMonth'] = $document->find('.inq_04_001')[8]->find('b')[0]->text();
            $info['sellerHalfYear'] = $document->find('.inq_04_001')[9]->find('b')[0]->text();
            $info['sellerHalfYearAgo'] = $document->find('.inq_04_001')[10]->find('b')[0]->text();
            $infojson = json_decode($taobaoInfoResponse->body, true);
            $info['SecurityLevel'] = str_get_html(urldecode($infojson[0]['SecurityLevel']))->find('img')[0]->attr['src'];
            $ret = json_encode($info);
            echo $ret;
            //$redis->setItem(md5($nick), $ret);
        } else {
            echo '';
        }
        exit;
    }

    public function getPostCodeAction()
    {
        if(!($this->getRequest()->getQuery('token') == $this->getServiceLocator()->get('config')['api_token'])){
            echo "-1";
            exit;
        }
        $log = $this->getServiceLocator()->get('log');
        $log->addInfo('取邮编'.$this->params('name') . "\t"  . $this->getRequest()->getServer('REMOTE_ADDR') . "\t" . $this->getRequest()->getHeaders()->get('User-Agent')->getFieldValue());

        $query = urlencode(iconv('utf-8', 'gbk', $this->params('name')));
        $response = \Requests::get('http://opendata.baidu.com/post/s?wd=' . $query . '&rn=20');
        $document = str_get_html($response->body);
        $listData = $document->find('.list-data ul li a');
        if (count($listData) > 0) {
            $text = $listData[0]->text();
            $arr = explode(iconv('utf-8', 'gbk', ' '), $text);
            $index = $arr[count($arr) - 1];
            echo json_encode([$index => iconv('gbk', 'utf-8', $arr[1])], JSON_UNESCAPED_UNICODE);
            exit;
        }

        $tableData = $document->find('.table-data .table-list tbody tr');
        $retArr = [];
        if (count($tableData) > 1) {
            for ($i = 1; $i < count($tableData); $i++) {
                $index = $tableData[$i]->find('td')[0]->text();
                $retArr[$index] = iconv('gbk', 'utf-8', $tableData[$i]->find('td')[1]->text());
            }
            echo json_encode($retArr, JSON_UNESCAPED_UNICODE);
            exit;
        }
        exit;
    }

    public function getPlaceAction()
    {
        if(!($this->getRequest()->getQuery('token') == $this->getServiceLocator()->get('config')['api_token'])){
            echo "";
            exit;
        }
        $log = $this->getServiceLocator()->get('log');
        $log->addInfo('搜索小区'.$this->params('name') . "\t"  . $this->getRequest()->getServer('REMOTE_ADDR') . "\t" . $this->getRequest()->getHeaders()->get('User-Agent')->getFieldValue());

        $query = urlencode(iconv('utf-8', 'gbk', $this->params('name')));
        $data = [
            'newmap' => 1,
            'reqflag' => 'pcmap',
            'biz' => 1,
            'from' => 'webmap',
            'da_par' => 'baidu',
            'pcevaname' => 'pc3',
            'qt' => 's',
            'da_src' => 'searchBox.button',
            'wd' => $query,
            'c' => 131,
            'src' => 0,
            'wd2' => '',
            'sug' => 0,
            'l' => 19,
            'b' => '',
            'from' => 'webmap',
            'force' => 'newsample',
            'sug_forward' => '',
            'tn' => 'B_NORMAL_MAP',
            'nn' => '0',
            'ie' => 'utf-8',
            't' => time() * 1000
        ];
        $params = [];
        foreach ($data as $key => $val) {
            $params[] = $key . '=' . $val;
        }
        $url = 'http://map.baidu.com/?' . join('&', $params);
        $response = \Requests::get($url);

        $resData = json_decode($response->body, true);
        $ret = [];
        if (is_array($resData)) {
            if (is_array($resData['content'])) {
                $ret[] = '当前城市:' . $resData['current_city']['up_province_name'] . '-' . $resData['current_city']['name'];
                foreach ($resData['content'] as $key => $val) {
                    $ret[] = $val['name'] . '---' . $val['addr'];
                }
                echo join("\r\n", $ret);
                exit;
            }
        }
        echo 'error';
        exit;
    }

    public function getRandomPlaceAction()
    {
        if(!($this->getRequest()->getQuery('token') == $this->getServiceLocator()->get('config')['api_token'])){
            echo "-1";
            exit;
        }
        $limit = $this->params('limit');
        if (empty($limit)) {
            $limit = 10;
        }
        $communityTable = $this->getServiceLocator()->get('CommunityTable');
        $result = $communityTable->getRandom($limit);
        $ret = [];
        while ($row = $result->current()) {
            //if(preg_match('/.*楼$/', $row->getAddr()) > 0){
                $matched = preg_match('/([^\d]+)(\d+[^\d]+)/', $row->getName(), $match);
                //print_r($match);
                if($matched){
                    $ret[] = $row->getId() . '--' . $match[1] . '--' . $match[2] . '--' . $row->getName() . '--' . $row->getAddr();
                }else{
                    $ret[] = $row->getId() . '--null--null--' . $row->getName() . '--' . $row->getAddr();
                }
            //}
            $result->next();
        }
        echo join("\r\n", $ret);
        $log = $this->getServiceLocator()->get('log');
        $log->addInfo('随机取小区'.$limit.'个' . "\t"  . $this->getRequest()->getServer('REMOTE_ADDR') . "\t" . $this->getRequest()->getHeaders()->get('User-Agent')->getFieldValue());
        exit;
    }

    public function placeLookedAction()
    {
        if(!($this->getRequest()->getQuery('token') == $this->getServiceLocator()->get('config')['api_token'])){
            echo "-1";
            exit;
        }
        $id = $this->params('id');
        if(empty($id)){
            echo 0;
        }
        $communityTable = $this->getServiceLocator()->get('CommunityTable');
        $log = $this->getServiceLocator()->get('log');
        echo $communityTable->setLooked($id);
        $log->addInfo('设置已查看过的小区，id='.$id . "\t"  . $this->getRequest()->getServer('REMOTE_ADDR') . "\t" . $this->getRequest()->getHeaders()->get('User-Agent')->getFieldValue());
        exit;
    }


    public function releaseOrderAction(){
        if(!($this->getRequest()->getQuery('token') == $this->getServiceLocator()->get('config')['api_token'])){
            echo "";
            exit;
        }
        $log = $this->getServiceLocator()->get('log');
        $action = $this->params('act');
        $db = $this->getServiceLocator()->get('ReleaseOrderTable');
        switch($action){
            case 'add':
                //print_r($_GET);
                $query = $this->getRequest()->getQuery()->toArray();
                if(array_key_exists('token', $query)){
                    unset($query['token']);
                }
                echo $db->add($query);
                $log->addInfo('添加放单信息' . json_encode($query) . "\t"  . $this->getRequest()->getServer('REMOTE_ADDR') . "\t" . $this->getRequest()->getHeaders()->get('User-Agent')->getFieldValue());
                break;
            case 'select':
                $ret = $db->select();
                $orders = [];
                foreach($ret as $key => $val){
                    $tmp = $val->toArray();
                    if($tmp['createTime']){
                        $tmp['createTime'] = date('Y-m-d H:i:s', $tmp['createTime']);
                    }
                    $orders[] = $tmp;
                }
                echo json_encode($orders);
                $log->addInfo('查询放单信息' . "\t"  . $this->getRequest()->getServer('REMOTE_ADDR') . "\t" . $this->getRequest()->getHeaders()->get('User-Agent')->getFieldValue());
                break;
            case 'delete':
                $id = intval($this->getRequest()->getQuery('id'));
                $log->addInfo('删除放单信息,id:' . $id . "\t"  . $this->getRequest()->getServer('REMOTE_ADDR') . "\t" . $this->getRequest()->getHeaders()->get('User-Agent')->getFieldValue());
                if($id){
                    echo $db->del($id);
                }else{
                    echo -1;
                }
                break;
            case 'save':
                $query = $this->getRequest()->getQuery()->toArray();
                if(array_key_exists('token', $query)){
                    unset($query['token']);
                }
                $log->addInfo('保存放单信息,id:' . json_encode($query) . "\t"  . $this->getRequest()->getServer('REMOTE_ADDR') . "\t" . $this->getRequest()->getHeaders()->get('User-Agent')->getFieldValue());
                if(intval($query['id'])){
                    $query['id'] = intval($query['id']);
                    echo $db->save($query);
                }else{
                    echo -1;
                }
                break;
        }
        exit;
    }

    public function examAction(){
        $method = $this->getRequest()->getMethod();
        if($method == 'GET'){
            $smarty = $this->getServiceLocator()->get('Smarty');
            $smarty->display('api/exam.tpl');
        }else if($method == 'POST'){
            $yqClassTable = $this->getServiceLocator()->get('YqClassTable');
            $query = $this->getRequest()->getQuery('q');
            if($query){
                $result = $yqClassTable->queryByWenti($query);
                $ret = [];
                foreach($result as $key => $val){
                    $ret[] = [
                        $val->getWenti(),
                        $val->getDaan()
                    ];
                }
                echo json_encode($ret);
            }
        }
        exit;
    }


    public function phpinfoAction(){
        if(!($this->getRequest()->getQuery('token') == $this->getServiceLocator()->get('config')['api_token']))
            $return = '';
        else
            $return = phpinfo();
        echo $return;
        exit;
    }
}