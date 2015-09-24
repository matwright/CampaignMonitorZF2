<?php
namespace Campaignmonitor\Transactional;

use Campaignmonitor\Transactional\Exception\TransactionalInvalidArgument;
use Campaignmonitor\Options\CampaignmonitorOptions;


class TransactionalService
{

    private $options;

    private $smartEmailObject;

    /**
     *
     * @return ApplicationOptions $options
     */
    public function getOptions()
    {
        return $this->options;
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
     * @param string $emailId            
     * @return \CS_REST_Transactional_SmartEmail
     */
    private function smartEmailObject($emailId)
    {
        if ($this->smartEmailObject instanceof \CS_REST_Transactional_SmartEmail) {
            $this->smartEmailObject->set_smartemail_id($emailId);
        } else {
            $this->smartEmailObject = new \CS_REST_Transactional_SmartEmail($emailId, $this->getOptions()->getApiKey());
        }
        return $this->smartEmailObject;
    }

    /**
     *
     * @param EmailInterface $email            
     * @param string $addToList            
     * @return bool
     * @throws TransactionalInvalidArgument
     */
    public function send(EmailInterface $email, $addToList = false)
    {
        if ($email instanceof SmartEmailInterface) {
            $smartEmail = new \CS_REST_Transactional_SmartEmail($email->getId(), $this->getOptions()->getApiKey());
            $message = [
                'To' => $email->getTo(),
                'Data' => $email->getData()
            ];
            $response = $smartEmail->send($message, $addToList);
            return $response->was_successful();
        } else {
            throw new TransactionalInvalidArgument('Invalid argument provided, only SmartEmailInterface objects currently supported');
        }
    }
}