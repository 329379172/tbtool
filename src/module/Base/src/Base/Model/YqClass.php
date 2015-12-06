<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/9/17
 * Time: 上午10:32
 */
namespace Base\Model;

class YqClass{

    protected $id;

    protected $zhangjie;

    protected $xuhao;

    protected $wenti;

    protected $xuanxiang;

    protected $daan;

    protected $huidaren;

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
    public function getZhangjie()
    {
        return $this->zhangjie;
    }

    /**
     * @param mixed $zhangjie
     */
    public function setZhangjie($zhangjie)
    {
        $this->zhangjie = $zhangjie;
    }

    /**
     * @return mixed
     */
    public function getXuhao()
    {
        return $this->xuhao;
    }

    /**
     * @param mixed $xuhao
     */
    public function setXuhao($xuhao)
    {
        $this->xuhao = $xuhao;
    }

    /**
     * @return mixed
     */
    public function getWenti()
    {
        return $this->wenti;
    }

    /**
     * @param mixed $wenti
     */
    public function setWenti($wenti)
    {
        $this->wenti = $wenti;
    }

    /**
     * @return mixed
     */
    public function getXuanxiang()
    {
        return $this->xuanxiang;
    }

    /**
     * @param mixed $xuanxiang
     */
    public function setXuanxiang($xuanxiang)
    {
        $this->xuanxiang = $xuanxiang;
    }

    /**
     * @return mixed
     */
    public function getDaan()
    {
        return $this->daan;
    }

    /**
     * @param mixed $daan
     */
    public function setDaan($daan)
    {
        $this->daan = $daan;
    }

    /**
     * @return mixed
     */
    public function getHuidaren()
    {
        return $this->huidaren;
    }

    /**
     * @param mixed $huidaren
     */
    public function setHuidaren($huidaren)
    {
        $this->huidaren = $huidaren;
    }

    public function exchangeArray($data){
        $this->id = (!empty($data['id'])) ? $data['id'] : null;
        $this->zhangjie = (!empty($data['zhangjie'])) ? $data['zhangjie'] : null;
        $this->xuhao = (!empty($data['xuhao'])) ? $data['xuhao'] : null;
        $this->wenti = (!empty($data['wenti'])) ? $data['wenti'] : null;
        $this->xuanxiang = (!empty($data['xuanxiang'])) ? $data['xuanxiang'] : null;
        $this->daan = (!empty($data['daan'])) ? $data['daan'] : null;
        $this->huidaren = (!empty($data['huidaren'])) ? $data['huidaren'] : null;
    }


}