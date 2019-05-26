<?php


namespace App\Controller;

use App\Service\User\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class ApiRestController extends AbstractController
{
    public $serviceAuth;
    private $session;

    public function __construct(Auth $service, SessionInterface $session)
    {
        $this->serviceAuth = $service;
        $this->session = $session;

    }

    /**
     * Matches /user/login exactly
     *
     * @Route("/user/login", name="user-login")
     * @Method({"GET"})
     * @param Request $request
     */
    public function login(Request $request)
    {
        $user = $request->get('user', null);
        $pasword = $request->get('pasword', null);
        $rol = $request->get('rol', null);
        $servicio = $this->serviceAuth->login($user, $pasword, $rol);
        if ($servicio) {
            $this->session->set('auth', [
                'user' => $servicio
            ]);
        }
        dump($servicio);

        return new JsonResponse($request);

    }

}