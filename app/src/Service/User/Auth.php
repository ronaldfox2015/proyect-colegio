<?php


namespace App\Service\User;

use GuzzleHttp\Client;

class Auth extends Client
{
    public function __construct($urlService )
    {
//        parent::__construct($config);
        dump($urlService);
        //parent::__construct($config);
    }

    public function calculate()
    {
        // TODO: Implement calculate() method.
        return 1;
    }
}