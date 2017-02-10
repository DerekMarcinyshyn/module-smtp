<?php
/**
 * Custom SMTP
 *
 * @author Derek Marcinyshyn <derek@marcinyshyn.com>
 * @copyright (C) 2016  Derek Marcinyshyn
 * @license Open Software License version 3.0
 */
namespace Monashee\Smtp\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;

class Data extends AbstractHelper
{

    /**
     * Data constructor.
     * @param Context $context
     */
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    /**
     * Get local client name
     *
     * @param null $storeId
     * @return mixed
     */
    public function getConfigName($storeId = null)
    {
        return $this->scopeConfig
            ->getValue('system/monashee_smtp/name', \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId);
    }

    /**
     * Get system config password
     *
     * @param \Magento\Store\Model\ScopeInterface::SCOPE_STORE $store
     * @return string
     */
    public function getConfigPassword($store_id = null)
    {
        return $this->scopeConfig
            ->getValue('system/monashee_smtp/password', \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $store_id);
    }

    /**
     * Get system config username
     *
     * @param \Magento\Store\Model\ScopeInterface::SCOPE_STORE $store
     * @return string
     */
    public function getConfigUsername($store_id = null)
    {
        return $this->scopeConfig
            ->getValue('system/monashee_smtp/username', \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $store_id);
    }

    /**
     * Get system config auth
     *
     * @param \Magento\Store\Model\ScopeInterface::SCOPE_STORE $store
     * @return string
     */
    public function getConfigAuth($store_id = null)
    {
        return $this->scopeConfig
            ->getValue('system/monashee_smtp/auth', \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $store_id);
    }

    /**
     * Get system config ssl
     *
     * @param \Magento\Store\Model\ScopeInterface::SCOPE_STORE $store
     * @return string
     */
    public function getConfigSsl($store_id = null)
    {
        return $this->scopeConfig
            ->getValue('system/monashee_smtp/ssl', \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $store_id);
    }

    /**
     * Get system config host
     *
     * @param \Magento\Store\Model\ScopeInterface::SCOPE_STORE $store
     * @return string
     */
    public function getConfigSmtpHost($store_id = null)
    {
        return $this->scopeConfig
            ->getValue('system/monashee_smtp/smtphost', \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $store_id);
    }

    /**
     * Get system config port
     *
     * @param \Magento\Store\Model\ScopeInterface::SCOPE_STORE $store
     * @return string
     */
    public function getConfigSmtpPort($store_id = null)
    {
        return $this->scopeConfig
            ->getValue('system/monashee_smtp/smtpport', \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $store_id);
    }

    /**
     * Get system config reply to
     *
     * @param \Magento\Store\Model\ScopeInterface::SCOPE_STORE $store
     * @return bool
     */
    public function getConfigSetReplyTo($store_id = null)
    {
        return $this->scopeConfig
            ->getValue('system/monashee_smtp/set_reply_to', \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $store_id);
    }

    /**
     * Get system config set return path
     *
     * @param \Magento\Store\Model\ScopeInterface::SCOPE_STORE $store
     * @return int
     */
    public function getConfigSetReturnPath($store_id = null)
    {
        return $this->scopeConfig
            ->getValue('system/monashee_smtp/set_return_path', \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $store_id);
    }

    /**
     * Get system config return path email
     *
     * @param \Magento\Store\Model\ScopeInterface::SCOPE_STORE $store
     * @return string
     */
    public function getConfigReturnPathEmail($store_id = null)
    {
        return $this->scopeConfig
            ->getValue('system/monashee_smtp/return_path_email', \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $store_id);
    }
}