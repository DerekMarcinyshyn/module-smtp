<?php
/**
 * Custom SMTP
 *
 * @author Derek Marcinyshyn <derek@marcinyshyn.com>
 * @copyright (C) 2016  Derek Marcinyshyn
 * @license Open Software License version 3.0
 */
namespace Monashee\Smtp\Test\Unit\Model\Config\Source;

use Monashee\Smtp\Model\Config\Source\Authtype;

class SendTestEmailTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Authtype
     */
    protected $_authtype;

    protected function setUp()
    {
        $objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->_authtype = $objectManager->getObject(Authtype::class);
    }

    public function testAuthtypeExists()
    {
        $this->assertTrue(class_exists(Authtype::class));
    }

    public function testOptionArray()
    {
        $this->assertArrayHasKey(0, $this->_authtype->toOptionArray());
        $this->assertArrayHasKey('value', $this->_authtype->toOptionArray()[0]);
    }
}
