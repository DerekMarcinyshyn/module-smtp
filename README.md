# Magento 2 Custom SMTP

[![Build Status](https://travis-ci.org/DerekMarcinyshyn/module-smtp.svg?branch=master)](https://travis-ci.org/DerekMarcinyshyn/module-smtp)

Magento 2 module which allows custom SMTP such as SendGrid, MailUp etc for sending transactional email. 

- ACL 
- Multi-store
- Tests

Admin configurations located at Stores -> Configuration -> Advanced -> System -> Custom SMTP

## Screenshot
![settings screenshot](https://raw.githubusercontent.com/DerekMarcinyshyn/module-smtp/master/settings-screenshot.jpg)

## Install

#### Composer

```bash
composer require monashee/module-smtp
```

Enable Module

```php
php bin/magento module:enable Monashee_Smtp

php bin/magento setup:upgrade

php bin/magento setup:di:compile
```

You may need to Flush Magento Cache after installation.

#### Manual Download

[Click here to download latest release](https://github.com/DerekMarcinyshyn/smtp/releases)

## Uninstall

I would suggest removing the module since it overwrites the Mail Sending Settings.

```php
php bin/magento module:disable Monashee_Smtp

php bin/magento module:uninstall Monashee_Smtp

php bin/magento setup:di:compile
```

Magento should remove it from your composer.json and composer.lock files as well as deleting from vendor folder.