<?php
/**
 * Custom SMTP
 *
 * @author Derek Marcinyshyn <derek@marcinyshyn.com>
 * @copyright (C) 2016  Derek Marcinyshyn
 * @license Open Software License version 3.0
 */
namespace Monashee\Smtp\Test\Unit\Helper;

use Monashee\Smtp\Helper\Data;

class DataTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Data
     */
    protected $_dataHelper;

    /**
     * Is called before running a test
     */
    protected function setUp()
    {
        $objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->_dataHelper = $objectManager->getObject(Data::class);
    }

    /**
     * Test if class exists
     */
    public function testExists()
    {
        $this->assertTrue(class_exists(Data::class));
    }
}
