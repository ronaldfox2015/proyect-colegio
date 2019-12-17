<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class AuthController extends AppController
{
    public function __construct(SessionInterface $session)
    {
        $sessionAuth = $session->get('auth');
        if (empty($sessionAuth)) {
           // $baseUrl = $this->container->getParameter('base_url');
                var_dump($this->container->get('aws_default_region'));
            return $this->redirect('/', 301);

        }
    }
}