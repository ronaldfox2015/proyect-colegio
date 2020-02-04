<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AppController
{
    /** @var $session SessionInterface */
    private $session;

    public function __construct(SessionInterface $session)
    {
        parent::__construct($session);
        $this->session = $session->get('auth');
        if (empty($this->session)) {
            var_dump($this->getParameter('base_url'));exit;
            return $this->redirect($this->getParameter('base_url'), 301);
        }
        
    }

    /**
     * Matches /close exactly
     *
     * @Route("/close", name="close")
     * @param SessionInterface $session
     */
    public function close(SessionInterface $session)
    {
        $session->remove('auth');

        return $this->redirect($this->getParameter('base_url'), 301);

    }
}