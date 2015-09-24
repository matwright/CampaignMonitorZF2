<?php
namespace Campaignmonitor\Transactional;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class TransactionalServiceFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new TransactionalService($serviceLocator->get('campaignmonitor_options'));
    }
}