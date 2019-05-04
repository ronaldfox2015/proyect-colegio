<?php

namespace App\Controller;

class HomeController extends AppController
{
    public function __construct()
    {

    }

    public function index()
    {

        return $this->renderapp('home/index.html.twig',[]);
    }
}