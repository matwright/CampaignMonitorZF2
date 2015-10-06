<?php
namespace Campaignmonitor\Lists;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Campaignmonitor\Lists\ListsService;

class ListsServiceFactory implements FactoryInterface
{

    /**
     * {@inheritDoc}
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new ListsService($serviceLocator->get('campaignmonitor_options'));
    }
}