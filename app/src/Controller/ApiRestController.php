<?php


namespace App\Controller;

use App\Service\User\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class ApiRestController extends AbstractController
{
    public $serviceAuth;
    public function __construct(Auth $service)
    {
        $this->serviceAuth = $service;
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
        $pasword = $request->get('pasword',null);
        $rol = $request->get('rol',null);
       // $servicio = $this->serviceAuth->login($request['user'],$request['password']);
        return new JsonResponse($rol);

    }

}