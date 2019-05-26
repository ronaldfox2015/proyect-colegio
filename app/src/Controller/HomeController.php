<?php

namespace App\Controller;

use App\Library\View\Cdn;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\User\Auth;

class HomeController extends AppController
{
    public $serviceAuth;
    private $cdn;

    public function __construct(Auth $service,Cdn $cdn)
    {
        $this->serviceAuth = $service;
        $this->cdn = $cdn;
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
        return $this->renderAppSchool('home/teacher.html.twig', $parameters);

    }


}