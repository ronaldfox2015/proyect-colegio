<?php


namespace App\Library\View;


class User
{
    public function __construct()
    {
    }

    public static function redirect($rol)
    {
        $redirect = '';
        switch ($rol){
            case 'student':
                $redirect = '/alumno/perfil';
                break;
            default:
                $redirect = '';
                break;
        }
        return $redirect;
    }
}