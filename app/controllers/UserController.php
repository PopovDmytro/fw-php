<?php

namespace app\controllers;

use app\models\User;
use fw\core\base\View;

class UserController extends AppController
{

    function signupAction() {
        if(!empty($_POST)){
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if(!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }
            $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            if($user->save('user')){
                $_SESSION['success'] = "You are success registered";
            } else {
                $_SESSION['error'] = "Error ! Please try later";
            }
            redirect();
            exit;
        }
        View::setMeta('Registry');
    }

    function loginAction() {

    }

    function logoutAction() {

    }
}