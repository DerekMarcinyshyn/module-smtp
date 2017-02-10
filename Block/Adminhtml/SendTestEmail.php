<?php
/**
 * Custom SMTP
 *
 * @author Derek Marcinyshyn <derek@marcinyshyn.com>
 * @copyright (C) 2016  Derek Marcinyshyn
 * @license Open Software License version 3.0
 */
namespace Monashee\Smtp\Block\Adminhtml;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class SendTestEmail extends Field
{

    /**
     * @var string
     */
    protected $_template = 'send-test-email.phtml';

    /**
     * Add Test email button
     *
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $originalData = $element->getOriginalData();
        $label = $originalData['button_label'];

        $this->addData([
            'button_label'  => __($label),
            'button_url'    => $this->getUrl('monashee_smtp/email/test'),
            'html_id'       => $element->getHtmlId()
        ]);

        return $this->_toHtml();
    }
}
