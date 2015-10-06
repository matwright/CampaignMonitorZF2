<?php
namespace Campaignmonitor\Lists;

use Campaignmonitor\Options\CampaignmonitorOptions;
use Campaignmonitor\CampaignMonitorServiceInterface;
use Campaignmonitor\CampaignMonitorServiceInterfaceTrait;

class ListsService implements CampaignMonitorServiceInterface
{
    use CampaignMonitorServiceInterfaceTrait;

    protected $listsObject;

    /**
     *
     * @param string $listId            
     * @return \CS_REST_Lists
     */
    public function listsObject($listId)
    {
        if ($this->listsObject instanceof \CS_REST_Lists) {
            $this->listsObject->set_list_id($listId);
        } else {
            $this->listsObject = new \CS_REST_Lists($listId, $this->getOptions()->getApiKey());
        }
        return $this->listsObject;
    }

    /**
     *
     * @param ApplicationOptions $options            
     */
    public function __construct(CampaignmonitorOptions $options)
    {
        $this->options = $options;
    }

}