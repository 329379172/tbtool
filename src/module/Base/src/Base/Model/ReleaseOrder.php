<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/8/13
 * Time: 上午10:08
 */
namespace Base\Model;

class ReleaseOrder{

    protected $id;

    protected $qtnc;

    protected $tbnc;

    protected $ip;

    protected $qq;

    protected $benjin;

    protected $yongjin;

    protected $lian;

    protected $createTIme;

    protected $pay;

    protected $free;

    protected $bianhao;

    protected $ordertime;

    /**
     * @return mixed
     */
    public function getOrdertime()
    {
        return $this->ordertime;
    }

    /**
     * @param mixed $ordertime
     */
    public function setOrdertime($ordertime)
    {
        $this->ordertime = $ordertime;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getQtnc()
    {
        return $this->qtnc;
    }

    /**
     * @param mixed $qtnc
     */
    public function setQtnc($qtnc)
    {
        $this->qtnc = $qtnc;
    }

    /**
     * @return mixed
     */
    public function getTbnc()
    {
        return $this->tbnc;
    }

    /**
     * @param mixed $tbnc
     */
    public function setTbnc($tbnc)
    {
        $this->tbnc = $tbnc;
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param mixed $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @return mixed
     */
    public function getQq()
    {
        return $this->qq;
    }

    /**
     * @param mixed $qq
     */
    public function setQq($qq)
    {
        $this->qq = $qq;
    }

    /**
     * @return mixed
     */
    public function getBenjin()
    {
        return $this->benjin;
    }

    /**
     * @param mixed $benjin
     */
    public function setBenjin($benjin)
    {
        $this->benjin = $benjin;
    }

    /**
     * @return mixed
     */
    public function getYongjin()
    {
        return $this->yongjin;
    }

    /**
     * @param mixed $yongjin
     */
    public function setYongjin($yongjin)
    {
        $this->yongjin = $yongjin;
    }

    /**
     * @return mixed
     */
    public function getLian()
    {
        return $this->lian;
    }

    /**
     * @param mixed $lian
     */
    public function setLian($lian)
    {
        $this->lian = $lian;
    }

    /**
     * @return mixed
     */
    public function getCreateTIme()
    {
        return $this->createTIme;
    }

    /**
     * @param mixed $createTIme
     */
    public function setCreateTIme($createTIme)
    {
        $this->createTIme = $createTIme;
    }

    /**
     * @return mixed
     */
    public function getPay()
    {
        return $this->pay;
    }

    /**
     * @param mixed $pay
     */
    public function setPay($pay)
    {
        $this->pay = $pay;
    }

    /**
     * @return mixed
     */
    public function getFree()
    {
        return $this->free;
    }

    /**
     * @param mixed $free
     */
    public function setFree($free)
    {
        $this->free = $free;
    }

    /**
     * @return mixed
     */
    public function getBianhao()
    {
        return $this->bianhao;
    }

    /**
     * @param mixed $bianhao
     */
    public function setBianhao($bianhao)
    {
        $this->bianhao = $bianhao;
    }


    public function exchangeArray($data){
        $this->id = (!empty($data['id'])) ? $data['id'] : null;
        $this->qtnc = (!empty($data['qtnc'])) ? $data['qtnc'] : null;
        $this->tbnc = (!empty($data['tbnc'])) ? $data['tbnc'] : null;
        $this->ip = (!empty($data['ip'])) ? $data['ip'] : null;
        $this->qq = (!empty($data['qq'])) ? $data['qq'] : null;
        $this->benjin = (!empty($data['benjin'])) ? $data['benjin'] : null;
        $this->yongjin = (!empty($data['yongjin'])) ? $data['yongjin'] : null;
        $this->lian = (!empty($data['lian'])) ? $data['lian'] : null;
        $this->pay = (!empty($data['pay'])) ? $data['pay'] : null;
        $this->free = (!empty($data['free'])) ? $data['free'] : null;
        $this->bianhao = (!empty($data['bianhao'])) ? $data['bianhao'] : null;
        $this->createTime = (!empty($data['createTime'])) ? $data['createTime'] : null;
        $this->ordertime = (!empty($data['ordertime'])) ? $data['ordertime'] : null;
    }

    public function toArray(){
        return [
            'id' => (!empty($this->id)) ? $this->id : null,
            'qtnc' => (!empty($this->qtnc)) ? $this->qtnc : null,
            'tbnc' => (!empty($this->tbnc)) ? $this->tbnc : null,
            'ip' => (!empty($this->ip)) ? $this->ip : null,
            'qq' => (!empty($this->qq)) ? $this->qq : null,
            'benjin' => (!empty($this->benjin)) ? $this->benjin : null,
            'yongjin' => (!empty($this->yongjin)) ? $this->yongjin : null,
            'lian' => (!empty($this->lian)) ? $this->lian : null,
            'pay' => (!empty($this->pay)) ? $this->pay : null,
            'free' => (!empty($this->free)) ? $this->free : null,
            'bianhao' => (!empty($this->bianhao)) ? $this->bianhao : null,
            'createTime' => (!empty($this->createTime)) ? $this->createTime : null,
            'ordertime' => (!empty($this->ordertime)) ? $this->ordertime : null,
        ];
    }

}