<?php
/**
 * Created by PhpStorm.
 * User: linfeiyang
 * Date: 2015/11/19
 * Time: 22:08
 */
namespace Base\Service;

use \Requests;

class LongDaiService
{

    private $responseCache;

    public function grabRedBagByUrl($url, $phone)
    {
        $response = Requests::get($url);
        $this->responseCache = $response;
        $shareRed = $this->getShareRed();
        if ($shareRed && trim($shareRed)) {
            $grabResponse = Requests::post('http://m.longdai.com/grabRedReward?phone='. $phone . '&shareRed=' . $shareRed);
            return $grabResponse->body;
        } else {
            return false;
        }
        //return $response->url;
    }

    public function getRealUrl($url)
    {
        $response = Requests::get($url);
        $this->responseCache = $response;
        return $response->url;
    }

    public function getShareRed()
    {
        if (!$this->responseCache) {
            return false;
        }
        if (!$this->responseCache->url) {
            return false;
        }
        $preg = '/^http:\/\/m\.longdai\.com\/shareRedReward\?shareRed\=(.*?)$/i';
        $isMatch = preg_match($preg, $this->responseCache->url, $match);
        if ($isMatch === 1) {
            if (count($match) == 2) {
                return $match[1];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


}