<?php
/**
 * Custom SMTP
 *
 * @author Derek Marcinyshyn <derek@marcinyshyn.com>
 * @copyright (C) 2016  Derek Marcinyshyn
 * @license Open Software License version 3.0
 */
namespace Monashee\Smtp\Test\Unit\Controller\Adminhtml\Email;

use Monashee\Smtp\Controller\Adminhtml\Email\Test;

class TestTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Monashee\Smtp\Controller\Adminhtml\Email\Test */
    protected $_controller;

    /** @var \PHPUnit_Framework_MockObject_MockObject|\Magento\Framework\App\ResponseInterface */
    protected $_responseMock;

    protected function setUp()
    {
        $this->_responseMock = $this->getMockBuilder('Magento\Framework\App\Response\Http')
            ->disableOriginalConstructor()
            ->setMethods([])
            ->getMock();

        $contextMock = $this->getMock('Magento\Backend\App\Action\Context', [], [], '', false);
        $contextMock->expects($this->any())->method('getResponse')->willReturn($this->_responseMock);
        $args = ['context' => $contextMock];

        $objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->_controller = $objectManager->getObject(Test::class, $args);
    }

    public function testExists()
    {
        $this->assertTrue(class_exists(Test::class));
    }

    public function testSendMessage()
    {
        $this->_responseMock->expects($this->once())->method('setBody')->willReturn(true);
        $this->_controller->execute();
    }
}
