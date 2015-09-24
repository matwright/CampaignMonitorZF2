<?php
namespace Campaignmonitor\Transactional;

interface EmailInterface
{
    /**
     * The unique identifier for this smart email
     *
     * @return string $id
     */
    public function getId();
    
    /**
     * Set Email address, to whom the message will be sent
     *
     * @param string $to
    */
    public function setTo($to);
    
    /**
     * Get Email address, to whom the message will be sent
     *
     * @return string
    */
    public function getTo();
}