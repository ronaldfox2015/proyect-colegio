<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class controlFollowUpController extends AppController
{
    public $activate;
    public function __construct()
    {
        $this->activate = '';
    }

    /**
     * Matches /sistemas exactly
     *
     * @Route("/sistemas", name="control-follow-u-list")
     */
    public function index()
    {
//        $ch = curl_init();
//
//        curl_setopt($ch, CURLOPT_HEADER, 0);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
//        curl_setopt($ch, CURLOPT_URL, "https://api.aptitus.com/locations?q=peru");
//
//        $data = curl_exec($ch);
//        curl_close($ch);
//
//        var_dump($data);exit;
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