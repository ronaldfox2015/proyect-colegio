<?php


namespace App\Common\Exception;


class ServiceException
{
    private $status;
    private $messages;

    /**
     * ServiceException constructor.
     * @param $status
     * @param $messages
     */
    public function __construct($status = 400, $messages = '')
    {
        $this->status = $status;
        $this->messages = $messages;
    }

}