<?php
/**
 * Monashee SMTP
 *
 * @author Derek Marcinyshyn <derek@marcinyshyn.com>
 * @copyright (C) 2016  Derek Marcinyshyn
 * @license Open Software License version 3.0
 */
namespace Monashee\Smtp\Controller\Adminhtml\Email;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Object;
use Magento\Framework\View\Result\PageFactory;
use Monashee\Smtp\Mail\SendTest;

class Test extends Action
{

    /**
     * @var PageFactory
     */
    protected $_resultPageFactory;

    /**
     * @var SendTest
     */
    protected $_sendTest;

    /**
     * Constructor
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param SendTest $sendTest
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        SendTest $sendTest
    ) {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_sendTest = $sendTest;
        parent::__construct($context);
    }

    /**
     * Execute view action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $this->getResponse()->setBody($this->_sendTest->send($this->getRequest()));
    }

    /**
     * Is the user allowed to view
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Monashee_Smtp::config_monashee_smtp');
    }
}
