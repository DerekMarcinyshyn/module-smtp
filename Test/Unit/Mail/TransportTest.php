<?php
/**
 * Custom SMTP
 *
 * @author Derek Marcinyshyn <derek@marcinyshyn.com>
 * @copyright (C) 2016  Derek Marcinyshyn
 * @license Open Software License version 3.0
 */
namespace Monashee\Smtp\Test\Unit\Mail;

use Monashee\Smtp\Mail\Transport;

class TransportTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var transport
     */
    protected $_transport;

    /**
     * @var \PHPUnit_Framework_MockObject
     */
    protected $_messageMock;

    protected $_dataHelperMock;

    /**
     * Is called before running a test
     */
    protected function setUp()
    {
        $this->_messageMock = $this->getMock('\Magento\Framework\Mail\Message', [], [], '', false);
        $this->_dataHelperMock = $this->getMock('\Monashee\Smtp\Helper\Data', [], [], '', false);
        $this->_transport = new \Monashee\Smtp\Mail\Transport($this->_messageMock, $this->_dataHelperMock);
    }

    /**
     * Test if class exists
     */
    public function testExists()
    {
        $this->assertTrue(class_exists(Transport::class));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage The message should be an instance of \Zend_Mail
     */
    public function testTransportWithIncorrectMessageObject()
    {
        $this->_messageMock = $this->getMock('\Magento\Framework\Mail\MessageInterface');
        $this->_transport = new \Monashee\Smtp\Mail\Transport($this->_messageMock, $this->_dataHelperMock);
    }

    /**
     * @covers \Monashee\Smtp\Mail\Transport::sendMessage
     * @expectedException \Magento\Framework\Exception\MailException
     * @expectedExceptionMessage No body specified
     */
    public function testSendMessageBrokenMessage()
    {
        $this->_messageMock->expects($this->any())
            ->method('getParts')
            ->will($this->returnValue(['a', 'b']));

        $this->_transport->sendMessage();
    }
}
