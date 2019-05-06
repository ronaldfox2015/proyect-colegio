<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class learningWorkshopController extends AppController
{
    /**
     * Matches /taller exactly
     *
     * @Route("/taller", name="learning-workshop")
     */
    public function index()
    {
        return $this->renderApp('learning-workshop/index.html.twig',[]);
    }

}