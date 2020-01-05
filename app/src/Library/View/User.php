<?php


namespace App\Library\View;


class User
{
    const STUDENT = 'student';
    const TEACHER = 'teacher';

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
            case 'teacher':
                $redirect = '/profesor/perfil';
                break;
            default:
                $redirect = '';
                break;
        }
        return $redirect;
    }
}