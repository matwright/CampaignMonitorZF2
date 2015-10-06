<?php
namespace Campaignmonitor\Lists;

interface ListInterface
{

    /**
     *
     * @return string
     */
    public function getListId();

    /**
     *
     * @return string
     */
    public function getTitle();
}