<?php
/**
 * Custom SMTP
 *
 * @author Derek Marcinyshyn <derek@marcinyshyn.com>
 * @copyright (C) 2016  Derek Marcinyshyn
 * @license Open Software License version 3.0
 */
namespace Monashee\Smtp\Test\Unit\Mail;

use Monashee\Smtp\Mail\SendTest;

class SendTestTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var sendTest
     */
    protected $_sendTest;

    /**
     * Is called before running a test
     */
    protected function setUp()
    {
        $objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->_sendTest = $objectManager->getObject(SendTest::class);
    }

    /**
     * Test if class exists
     */
    public function testExists()
    {
        $this->assertTrue(class_exists(SendTest::class));
    }
}
