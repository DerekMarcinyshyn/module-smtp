<?php
/**
 * Custom SMTP
 *
 * @author Derek Marcinyshyn <derek@marcinyshyn.com>
 * @copyright (C) 2016  Derek Marcinyshyn
 * @license Open Software License version 3.0
 */
namespace Monashee\Smtp\Mail;

use Magento\Framework\Mail\TransportInterface;
use Magento\Framework\Mail\MessageInterface;
use Monashee\Smtp\Helper\Data;

class Transport extends \Zend_Mail_Transport_Smtp implements TransportInterface
{

    /**
     * @var \Magento\Framework\Mail\MessageInterface
     */
    protected $_message;

    /**
     * @var \Monashee\Smtp\Helper\Data
     */
    protected $_dataHelper;

    /**
     * Transport constructor.
     * @param MessageInterface $message
     * @param Data $data
     */
    public function __construct(MessageInterface $message, Data $data)
    {
        if (!$message instanceof \Zend_Mail) {
            throw new \InvalidArgumentException('The message should be an instance of \Zend_Mail');
        }

        $this->_message = $message;
        $this->_dataHelper = $data;
        $this->setReturnPath();
        parent::__construct($this->_dataHelper->getConfigSmtpHost(), $this->setSmtpConfig());
    }

    /**
     * Send a mail using this transport
     *
     * @return void
     * @throws \Magento\Framework\Exception\MailException
     */
    public function sendMessage()
    {
        try {
            parent::send($this->_message);
        } catch (\Exception $e) {
            throw new \Magento\Framework\Exception\MailException(new \Magento\Framework\Phrase($e->getMessage()), $e);
        }
    }

    /**
     * Set return path of message
     */
    protected function setReturnPath()
    {
        $setReturnPath = $this->_dataHelper->getConfigSetReturnPath();
        switch ($setReturnPath) {
            case 1:
                $returnPathEmail = $this->_message->getFrom();
                break;
            case 2:
                $returnPathEmail = $this->_dataHelper->getConfigReturnPathEmail();
                break;
            default:
                $returnPathEmail = null;
                break;
        }

        if ($returnPathEmail !== null && $this->_dataHelper->getConfigSetReturnPath()) {
            $this->_message->setReturnPath($returnPathEmail);
        }

        if ($this->_message->getReplyTo() === null && $this->_dataHelper->getConfigSetReplyTo()) {
            $this->_message->setReplyTo($returnPathEmail);
        }
    }

    /**
     * Set SMTP configuration
     *
     * @return array
     */
    protected function setSmtpConfig(): array
    {
        $smtpConf = [
            'name' => $this->_dataHelper->getConfigName(),
            'auth' => strtolower($this->_dataHelper->getConfigAuth()),
            'username' => $this->_dataHelper->getConfigUsername(),
            'password' => $this->_dataHelper->getConfigPassword(),
            'port' => $this->_dataHelper->getConfigSmtpPort(),
        ];

        $ssl = $this->_dataHelper->getConfigSsl();
        if ($ssl != 'none') {
            $smtpConf['ssl'] = $ssl;
            return $smtpConf;
        }
        return $smtpConf;
    }
}