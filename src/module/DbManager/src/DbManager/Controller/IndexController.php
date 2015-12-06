<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/8/18
 * Time: 下午4:03
 */

namespace DbManager\Controller;

include __DIR__ . '/../Plugin/MySQLDump.php';

use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;
use Zend\Mime\Message;
use Zend\Mime\Mime;
use Zend\Mime\Part;
use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{

    public function backupAction()
    {
        $log = $this->getServiceLocator()->get('log');
        $log->addInfo('备份数据'. "\t"  . $this->getRequest()->getServer('REMOTE_ADDR') . "\t" . $this->getRequest()->getHeaders()->get('User-Agent')->getFieldValue());
        $dbconf = $this->getServiceLocator()->get('config')['mysqli'];
        $dump = new \MySQLDump(new \mysqli($dbconf['host'], $dbconf['username'], $dbconf['password'], $dbconf['dbname']));
        $filename = date("Y-m-d_H-i-s")."-db.sql";
        $tmpFile = (dirname(__FILE__))."\\".$filename;
        $dump->save($tmpFile);
        $body = new Message();
        $part = new Part();
        $part->setType(Mime::TYPE_OCTETSTREAM);
        $part->setContent(file_get_contents($tmpFile));
        $part->setDisposition(Mime::DISPOSITION_ATTACHMENT);
        $part->setFileName($filename);
        $part2 = new Part();
        $part2->setType(Mime::TYPE_TEXT);
        $part2->setContent('小秋来发数据了');
        $body->addPart($part);
        $body->addPart($part2);
        $newmessage = new \Zend\Mail\Message();
        $newmessage->addTo($this->getServiceLocator()->get('MailOptions')->getMailTo());
        $newmessage->addFrom($this->getServiceLocator()->get('MailOptions')->getMailFrom());
        $newmessage->setBody($body);
        $newmessage->setSubject('备份数据');

        $transport = new SmtpTransport();
        $options = new SmtpOptions($this->getServiceLocator()->get('config')['mail']);
        $transport->setOptions($options);
        try{
            $transport->send($newmessage);
            echo 1;
        }catch (\Exception $e){
            echo -1;
        }
        exit;
    }
}