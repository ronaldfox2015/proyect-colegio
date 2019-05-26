<?php

namespace App\Controller;


use App\Library\View\Cdn;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class AppController extends AbstractController
{
    private $cdn;

    public function __construct()
    {
    }

    public function renderApp($nameView, $parameters = [])
    {
        return $this->render('layouts/main.html.twig', [
            'viewapp' => $nameView,
            'parameters' => $parameters
        ]);
    }

    public function renderAppSchool($nameView, $parameters = [])
    {
        return $this->render('layouts/main-school.html.twig', [
            'viewapp' => $nameView,
            'parameters' => $parameters
        ]);
    }
}