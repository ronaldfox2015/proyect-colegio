<?php


namespace App\Library\View;


class Cdn
{
    private $base_url;

    public function __construct($base_url)
    {
        $this->base_url = $base_url;
    }

    public function img($name)
    {
        return sprintf('%s/static/img/%s?v=%s', $this->base_url, $name, date('YmdHis'));
    }

}