<?php

namespace App\Service\User;

use Exception;
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

    public function login($user, $password, $rol)
    {
        try{
            $result = $this->post('/v1/user/login', [
                'json' => [
                    'user' => $user,
                    'password' => $password,
                    'rol' => $rol
                ]
            ]);
            return json_decode($result->getBody()->getContents(), true);

        } catch (Exception $exception) {
            return false;
        }
        return false;
    }
}