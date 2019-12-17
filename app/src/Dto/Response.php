<?php


namespace App\Dto;


class Response
{
    private $status;
    private $data;
    private $message;

    /**
     * Response constructor.
     * @param int $status
     * @param array $data
     * @param string $message
     */
    public function __construct($status = 400, $data = [], $message = '')
    {
        $this->status = $status;
        $this->data = $data;
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return Response
     */
    public function setMessage(string $message): Response
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return Response
     */
    public function setStatus(int $status): Response
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     * @return Response
     */
    public function setData(array $data): Response
    {
        $this->data = $data;
        return $this;
    }

}