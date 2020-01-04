<?php


namespace App\Controller;

use App\Library\View\User;
use App\Service\User\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class ApiRestController extends Controller
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
     * @param Request $request
     */
    public function login(Request $request)
    {
        $user = $request->get('user', null);
        $password = $request->get('password', null);
        $rol = $request->get('rol', null);
        $service = $this->serviceAuth->login($user, $password, $rol);
        if ($service->getStatus()) {
            $userAuth = $service->getData();
            $this->session->set('auth', [
                'user' => $userAuth['user']
            ]);


            return new JsonResponse([
                'status' => $service->getStatus(),
                'message' => $service->getMessage(),
                'url' => User::redirect($userAuth['user']['roles']['slug'])
            ]);
        }
        $response = [
            'status' => $service->getCode(),
            'message' => $service->getMessage()
        ];
        $request->headers->set('Content-Type', 'application/json');

        return new JsonResponse($response, $service->getCode());

    }

}