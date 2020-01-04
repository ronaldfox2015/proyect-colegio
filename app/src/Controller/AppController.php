<?php

namespace App\Controller;


use App\Library\View\Cdn;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class AppController extends Controller
{
    private $cdn;
    /** @var $session SessionInterface */
    private $session;
    /** @var $params     ParameterBagInterface */
    private $params;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function renderApp($nameView, $parameters = [])
    {
        $parameters['isAuth'] = !empty($this->session->get('auth'));
        $cdn = new Cdn($this->getParameter('base_url'));
        $parameters['cdn'] = $cdn;
        $parameters['auth'] = !empty($this->session->get('auth'))?$this->session->get('auth'):null;
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