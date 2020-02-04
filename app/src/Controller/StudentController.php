<?php


namespace App\Controller;

use App\Library\View\Cdn;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class StudentController extends AuthController
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
     * Matches /student/profile exactly
     *
     * @Route("/alumno/perfil", name="student-profile")
     * @param Request $request
     */
    public function index(Request $request)
    {
        $parameters['cdn'] = $this->cdn;

        return $this->renderApp('student/profile.html.twig', $parameters);

    }

    /**
     * Matches /alumno/cursos exactly
     *
     * @Route("/alumno/cursos", name="courses")
     * @param Request $request
     */
    public function courses(Request $request)
    {
        $parameters['cdn'] = $this->cdn;


        return $this->renderApp('student/courses.html.twig', $parameters);

    }

    /**
     * Matches /alumno/notas exactly
     *
     * @Route("/alumno/notas", name="academic-qualification")
     * @param Request $request
     */
    public function academicQualification(Request $request)
    {
        $parameters['cdn'] = $this->cdn;

        return $this->renderApp('student/academic-qualification.html.twig', $parameters);

    }
}