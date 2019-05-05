<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class controlFollowUpController extends AppController
{
    public function __construct()
    {

    }

    /**
     * Matches /sistemas exactly
     *
     * @Route("/sistemas", name="control-follow-u-list")
     */
    public function index()
    {
        return $this->renderApp('control-follow-up/index.html.twig',[]);
    }

    /**
     * Matches /editar-informe exactly
     *
     * @Route("/editar-informe", name="edit-report")
     */
    public function editReport()
    {
        return $this->renderApp('control-follow-up/edit-report.html.twig',[]);
    }
}