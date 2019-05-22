<?php


namespace App\Service\User;

use GuzzleHttp\Client;

class Auth extends Client
{
    public function __construct($urlService)
    {
        parent::__construct($urlService);
    }

    public function apititus()
    {
        $result = $this->get('/');

        return json_decode($result->getBody()->getContents(), true);
    }

    public function login($user, $password)
    {
        $result = $this->post('/user/login', [
            'user' => $user,
            'paswor' => $password
        ]);

        return json_decode($result->getBody()->getContents(), true);
    }
}