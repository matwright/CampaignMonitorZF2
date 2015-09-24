<?php
namespace Campaignmonitor\Transactional;

interface SmartEmailInterface extends EmailInterface
{
    

    /**
     * Array of fields to populate data fields in the smart email template
     *
     * @return array
     */
    public function getData();
}