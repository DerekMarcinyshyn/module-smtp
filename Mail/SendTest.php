<?php
/**
 * Monashee SMTP
 *
 * @author Derek Marcinyshyn <derek@marcinyshyn.com>
 * @copyright (C) 2016  Derek Marcinyshyn
 * @license Open Software License version 3.0
 */
namespace Monashee\Smtp\Mail;

use Monashee\Smtp\Helper\Data;

class SendTest
{

    /**
     * @var Data
     */
    protected $_dataHelper;

    /**
     * SendTest constructor.
     * @param Data $data
     */
    public function __construct(Data $data)
    {
        $this->_dataHelper = $data;
    }

    /**
     * Send the test message
     *
     * @param $request
     * @return \Magento\Framework\Phrase|string
     */
    public function send($request)
    {
        $storeId = $request->getPost('store', null);
        $username = $request->getPost('username');
        $password = $request->getPost('password');

        if(!$request->getPost('store', false)){
            if(empty($username) || empty($password)){
                return __('Please enter a valid username/password');
            }
        }

        $password = ($password == '******') ? $this->_dataHelper->getConfigPassword($storeId) : $password;
        $to = $request->getPost('email') ? $request->getPost('email') : $username;

        // SMTP server configuration
        list($smtpHost, $smtpConf) = $this->smtpConfig($request, $username, $password);

        try {
            $transport = new \Zend_Mail_Transport_Smtp($smtpHost, $smtpConf);
            $mail = $this->createMessage($request, $username, $to);
            if (!$mail->send($transport) instanceof \Zend_Mail){}
            return __('Sent... Please check your email') . ' ' . $to;
        } catch (\Exception $e) {
            return __($e->getMessage());
        }
    }

    /**
     * @param $request
     * @param $username
     * @param $to
     * @return \Zend_Mail
     */
    protected function createMessage($request, $username, $to): \Zend_Mail
    {
        $from = trim($request->getPost('from_email'));
        $from = \Zend_Validate::is($from, 'EmailAddress') ? $from : $username;
        $mail = new \Zend_Mail();
        $mail->setFrom($from, 'Magento SMTP Test');
        $mail->addTo($to, $to);
        $mail->setSubject('Test from Magento Custom SMTP');
        $mail->setBodyText('Looks like it the test worked. Cheers.');
        return $mail;
    }

    /**
     * @param $request
     * @param $username
     * @param $password
     * @return array
     */
    protected function smtpConfig($request, $username, $password): array
    {
        $smtpHost = $request->getPost('smtphost');
        $smtpConf = [
            'name' => $request->getPost('name'),
            'auth' => strtolower($request->getPost('auth')),
            'username' => $username,
            'password' => $password,
            'port' => $request->getPost('smtpport')
        ];

        $ssl = $request->getPost('ssl');
        if ($ssl != 'none') {
            $smtpConf['ssl'] = $ssl;
            return array($smtpHost, $smtpConf);
        }
        return array($smtpHost, $smtpConf);
    }
}