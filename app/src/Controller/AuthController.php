<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\ControllerTrait;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AppController
{
    use ControllerTrait;
    /** @var $session SessionInterface */
    private $session;

    public function __construct(SessionInterface $session)
    {
        parent::__construct($session);
        $this->session = $session->get('auth');
        if (empty($this->session)) {
            return new RedirectResponse('http://local.webcolegio.com', 200);
        }
    }

    /**
     * Matches /close exactly
     *
     * @Route("/close", name="close")
     * @param SessionInterface $session
     * @return RedirectResponse
     */
    public function close(SessionInterface $session)
    {
        $session->remove('auth');

        return $this->redirect($this->getParameter('base_url'), 301);

    }
}