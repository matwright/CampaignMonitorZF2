<?php
namespace Campaignmonitor\Options;

use Zend\Stdlib\AbstractOptions;

class CampaignmonitorOptions extends AbstractOptions
{

    private $apiKey;

    /**
     *
     * @return string $apiKey
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     *
     * @param string $apiKey            
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }
}
