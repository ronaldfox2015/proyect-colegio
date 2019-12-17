<?php

namespace App\Service\User;

use App\Dto\Response;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;

/**
 * Class Auth
 * @package App\Service\User
 */
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

    /**
     * @param $user
     * @param $password
     * @param $rol
     * @return Response
     */
    public function login($user, $password, $rol)
    {
        try {
            $result = $this->post('/v1/user/auth/login', [
                'json' => [
                    'user' => $user,
                    'password' => $password,
                    'rol' => $rol
                ]
            ]);
            $response = json_decode($result->getBody()->getContents(), true);
            return new Response($result->getStatusCode(), $response, 'se grabo');

        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
        return new Response();
    }
}