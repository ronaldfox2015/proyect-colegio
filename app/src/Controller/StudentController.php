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

        $teacher = $this->session->get('auth');

        return $this->renderAppSchool('student/profile.html.twig', $parameters);

    }
}