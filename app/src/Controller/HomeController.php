<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class HomeController extends AbstractController
{
    public function index()
    {
        $number = random_int(0, 100);

        return $this->render('home/home.html.twig', []);
    }
}