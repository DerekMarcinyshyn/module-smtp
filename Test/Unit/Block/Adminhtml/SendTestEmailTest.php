<?php
/**
 * Custom SMTP
 *
 * @author Derek Marcinyshyn <derek@marcinyshyn.com>
 * @copyright (C) 2016  Derek Marcinyshyn
 * @license Open Software License version 3.0
 */
namespace Monashee\Smtp\Test\Unit\Block\Adminhtml;

use Monashee\Smtp\Block\Adminhtml\SendTestEmail;

class SendTestEmailTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SendTestEmail
     */
    protected $_sendTestEmail;

    protected function setUp()
    {
        $objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->_sendTestEmail = $objectManager->getObject(SendTestEmailTest::class);
    }

    public function testSendTestEmailExists()
    {
        $this->assertTrue(class_exists(SendTestEmailTest::class));
    }
}
