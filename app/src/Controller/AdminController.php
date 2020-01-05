<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AppController
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
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