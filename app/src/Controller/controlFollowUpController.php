<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class controlFollowUpController extends AppController
{
    public $activate;

    public function __construct(SessionInterface $session)
    {
        $this->activate = '';
        parent::__construct($session);
    }

    /**
     * Matches /sistemas exactly
     *
     * @Route("/sistemas", name="control-follow-u-list")
     */
    public function index()
    {

        return $this->renderApp('control-follow-up/index.html.twig',[
            'activate' => 'active'
        ]);
    }

    /**
     * Matches /editar-informe exactly
     *
     * @Route("/editar-informe", name="edit-report")
     */
    public function editReport()
    {
        return $this->renderApp('control-follow-up/edit-report.html.twig',[
            'activate' => 'active'
        ]);
    }
}