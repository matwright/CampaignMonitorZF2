<?php
namespace Campaignmonitor\Options\Factory;

use Campaignmonitor\Options\CampaignmonitorOptions;
use Zend\ServiceManager\FactoryInterface;

class CampaignmonitorOptionsFactory implements FactoryInterface
{

    /**
     * Create mailboxOptions giving him config
     *
     * (non-PHPdoc)
     *
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     * @return MailboxOptions
     */
    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator)
    {
        
        $config = $serviceLocator->get('Config');
        $options = $config['campaignmonitor'];
        $smtpOptions = new CampaignmonitorOptions($options);
        return $smtpOptions;
    }
}