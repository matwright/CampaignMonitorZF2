<?php
namespace Campaignmonitor\Subscribers;

use Campaignmonitor\Options\CampaignmonitorOptions;
use Campaignmonitor\CampaignMonitorServiceInterface;
use Campaignmonitor\CampaignMonitorServiceInterfaceTrait;
use Campaignmonitor\Lists\ListInterface;

class SubscribersService implements CampaignMonitorServiceInterface
{
    use CampaignMonitorServiceInterfaceTrait;

    protected $subscriberObject;

    /**
     *
     * @param string $listId            
     * @return \CS_REST_Subscribers
     */
    public function subscriberObject($listId)
    {
        if ($this->subscriberObject instanceof \CS_REST_Subscribers) {
            $this->subscriberObject->set_list_id($listId);
        } else {
            $this->subscriberObject = new \CS_REST_Subscribers($listId, $this->getOptions()->getApiKey());
        }
        return $this->subscriberObject;
    }

    /**
     *
     * @param ApplicationOptions $options            
     */
    public function __construct(CampaignmonitorOptions $options)
    {
        $this->options = $options;
    }

    /**
     *
     * @param SubscriberInterface $user            
     * @param string $listId            
     * @return boolean
     */
    public function unsubscribe(SubscriberInterface $user, ListInterface $list)
    {
        $response = $this->subscriberObject($list->getListId())->delete($user->getEmailAddress());
        return $response->was_successful();
    }

    /**
     *
     * @param SubscriberInterface $user            
     * @param string $listId            
     * @return boolean
     */
    public function subscribe(SubscriberInterface $user, ListInterface $list)
    {
        $response = $this->subscriberObject($list->getListId())->add($user->getEmailAddress());
        return $response->was_successful();
    }
}