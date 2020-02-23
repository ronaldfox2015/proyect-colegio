<?php


namespace App\Library\View;


class Breadcrumb
{
    private $router;

    public function __construct()
    {
        $this->router = '';
    }

    public function subMenu($href = '', $name = '', $router = '')
    {
        switch ($router){
            case '/teacher/sistemas':
                return $name;
                break;
        }
        return sprintf('<a href="%s">%s</a>', $href, $name);


    }
}