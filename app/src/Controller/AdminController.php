<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AdminController extends AppController
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
        parent::__construct($session);
    }

    /**
     * Matches /docente exactly
     *
     * @Route("/admin", name="admin")
     */
     public function index()
    {
        return $this->renderAppSchool('admin/index.html.twig', []);
    }
}