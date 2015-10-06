<?php
namespace Campaignmonitor;

use Campaignmonitor\Options\CampaignmonitorOptions;

trait CampaignMonitorServiceInterfaceTrait
{

    private $options;


    /**
     *
     * @return CampaignmonitorOptions $options
     */
    public function getOptions()
    {
        return $this->options;
    }

    
}