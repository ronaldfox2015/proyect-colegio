<?php

namespace App\Controller;

use App\Library\View\Cdn;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\User\Auth;

class HomeController extends AppController
{
    public $serviceAuth;
    private $cdn;
    private $session;

    public function __construct(Auth $service,Cdn $cdn, SessionInterface $session)
    {
        $this->serviceAuth = $service;
        $this->cdn = $cdn;
        $this->session = $session;
        parent::__construct();
    }

    /**
     * Matches / exactly
     *
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->renderApp('home/index.html.twig',[]);
    }

    /**
     * Matches /registry exactly
     *
     * @Route("/registry", name="registry")
     */
    public function registry()
    {
        return $this->renderApp('home/registry.html.twig',[]);
    }

    /**
     * Matches /course exactly
     *
     * @Route("/course", name="course")
     */
    public function course()
    {
        return $this->renderApp('home/course.html.twig',[]);
    }

    /**
     * Matches /docente exactly
     *
     * @Route("/docente", name="teacher")
     */
    public function teacher()
    {
        $parameters['cdn'] = $this->cdn;
        $teacher = $this->session->get('auth');
        return $this->renderAppSchool('home/teacher.html.twig', $parameters);

    }

    /**
     * Matches /student exactly
     *
     * @Route("/alumno", name="student")
     */
    public function student()
    {
        $parameters['cdn'] = $this->cdn;
        $teacher = $this->session->get('auth');
        return $this->renderAppSchool('home/profile.html.twig', $parameters);

    }

}