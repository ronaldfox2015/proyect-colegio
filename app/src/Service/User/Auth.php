<?php

namespace App\Service\User;

use App\Dto\Response;
use ErrorException;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ServerException;
use http\Exception\BadConversionException;
use http\Exception\BadMessageException;
use http\Exception\InvalidArgumentException;

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
            $message = !empty($message['message']) ? $message['message']:'';
            return new Response($result->getStatusCode(), $response, $message);

        } catch (Exception $exception) {
            return new Response(false, [], $exception->getMessage(), $exception->getCode());
//            throw new ErrorException($exception->getMessage(),$exception->getCode());
        }
        return new Response();
        }
    }