<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ErrorController extends Controller
{

    public function showAction()
    {

        return $this->renderApp('exception/error404.html.twig', []);

    }
}