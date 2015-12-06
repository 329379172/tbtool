<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/8/30
 * Time: 下午1:39
 */
namespace Base\Options;

use Zend\Stdlib\AbstractOptions;

class MailOptions extends AbstractOptions
{
    public static $mailConfigKey = 'xq_mail';

    protected $mailTo;

    protected $mailFrom;

    /**
     * @return mixed
     */
    public function getMailFrom()
    {
        return $this->mailFrom;
    }

    /**
     * @param mixed $mailFrom
     */
    public function setMailFrom($mailFrom)
    {
        $this->mailFrom = $mailFrom;
    }

    /**
     * @return mixed
     */
    public function getMailTo()
    {
        return $this->mailTo;
    }

    /**
     * @param mixed $mailTo
     */
    public function setMailTo($mailTo)
    {
        $this->mailTo = $mailTo;
    }

}