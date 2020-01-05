<?php


namespace App\Controller;


use App\Library\View\Cdn;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ExceptionController extends AppController
{
    public function showException()
    {


        return $this->renderApp('exception/error404.html.twig', []);
    }
}