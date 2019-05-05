<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AppController
{
    public function __construct()
    {

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


}