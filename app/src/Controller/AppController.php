<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class AppController extends AbstractController
{
    public function renderApp($nameView, $parameters = [])
    {
        return $this->render('layouts/main.html.twig', [
            'viewapp' => $nameView,
            'parameters' => $parameters
        ]);
    }
}