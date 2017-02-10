<?php
/**
 * Custom SMTP
 *
 * @author Derek Marcinyshyn <derek@marcinyshyn.com>
 * @copyright (C) 2016  Derek Marcinyshyn
 * @license Open Software License version 3.0
 */
namespace Monashee\Smtp\Model\Config\Source;

class Authtype implements \Magento\Framework\Option\ArrayInterface
{

    /**
     * Return system config settings
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'none', 'label' => __('None')],
            ['value' => 'ssl', 'label' => __('SSL')],
            ['value' => 'tls', 'label' => __('TLS')]
        ];
    }
}
