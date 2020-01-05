<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class learningWorkshopController extends AppController
{
    public function __construct(SessionInterface $session)
    {
        parent::__construct($session);
    }

    /**
     * Matches /taller exactly
     *
     * @Route("/taller", name="learning-workshop")
     */
    public function index()
    {
        return $this->renderApp('learning-workshop/learning-workshop.html.twig',[]);
    }

}