<?php


namespace App\Controller;


use App\Library\View\Cdn;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class TeacherController extends AuthController
{
    public $serviceAuth;
    private $cdn;
    private $session;

    public function __construct(Cdn $cdn,SessionInterface $session)
    {
        $this->cdn = $cdn;
        $this->session = $session;

        parent::__construct($session);
    }

    /**
     * Matches /teacher/profile exactly
     *
     * @Route("/profesor/perfil", name="teacher-profile")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $parameters['cdn'] = $this->cdn;

        return $this->renderApp('teacher/profile.html.twig', $parameters);

    }

    /**
     * Matches /evaluation exactly
     *
     * @Route("/teacher/evaluation", name="evaluation")
     */
    public function student()
    {
        $parameters['cdn'] = $this->cdn;
        return $this->renderApp('teacher/evaluation.html.twig', $parameters);

    }

    /**
     * Matches /sistemas exactly
     *
     * @Route("/teacher/sistemas", name="teacher-control-follow-u-list")
     */
    public function controlFollowUList()
    {

        return $this->renderApp('teacher/control-follow-up.html.twig',[
            'activate' => 'active'
        ]);
    }

    /**
     * Matches /editar-informe exactly
     *
     * @Route("/teacher/editar-informe", name="teacher-edit-report")
     */
    public function editReport()
    {
        return $this->renderApp('control-follow-up/edit-report.html.twig',[
            'activate' => 'active'
        ]);
    }

    /**
     * Matches /taller exactly
     *
     * @Route("/teacher/taller", name="teacher-learning-workshop")
     */
    public function taller()
    {
        return $this->renderApp('teacher/learning-workshop.html.twig',[]);
    }
}