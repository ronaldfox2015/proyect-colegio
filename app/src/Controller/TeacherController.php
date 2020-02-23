<?php


namespace App\Controller;


use App\Library\View\Cdn;
use App\Library\View\Breadcrumb;
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
        return $this->renderApp('teacher/profile.html.twig', [
            'cdn' => $this->cdn,
            'activate' => true,
            'isTeacher' => true
        ]);

    }

    /**
     * Matches /profesor/record-de-notas exactly
     *
     * @Route("/profesor/record-de-notas", name="note-record")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function noteRecord(Request $request)
    {
        return $this->renderApp('teacher/note-record.html.twig', [
            'cdn' => $this->cdn,
            'activate' => true,
            'isTeacher' => true,
            'noteRecord' => true
        ]);

    }

    /**
     * Matches /evaluation exactly
     *
     * @Route("/teacher/cursos", name="teacher-courses")
     */
    public function student()
    {
        $parameters['cdn'] = $this->cdn;
        $parameters['activate'] = true;
        $parameters['isTeacher'] = true;
        $parameters['teacherCourses'] = true;

        return $this->renderApp('teacher/courses.html.twig', $parameters);

    }

    /**
     * Matches /evaluation exactly
     *
     * @Route("/teacher/informes", name="teacher-reports")
     */
    public function reports()
    {
        $parameters['cdn'] = $this->cdn;
        $parameters['activate'] = true;
        $parameters['isTeacher'] = true;
        $parameters['teacherReports'] = true;

        return $this->renderApp('teacher/reports.html.twig', $parameters);

    }


    /**
     * Matches /sistemas exactly
     *
     * @Route("/teacher/sistemas", name="teacher-control-follow-u-list")
     */
    public function controlFollowUList()
    {
        return $this->renderApp('teacher/control-follow-up.html.twig',[
            'activate' => true,
            'isTeacher' => true,
            'teacherControlFollowUList' => true
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
            'activate' => 'active',
            'breadcrumb' => new Breadcrumb($this->generateUrl('teacher-control-follow-u-list'))
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