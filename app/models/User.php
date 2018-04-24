<?php


namespace app\models;


use fw\core\base\Model;

class User extends Model
{
    public $attributes = [
        'login' => '',
        'password' => '',
        'email' => '',
        'name' => ''
    ];

    public $rules = [
      'required' => [
          ['login'],
          ['password'],
          ['email'],
          ['name'],
      ],
        'email' => [
            ['email']
        ],
        'lengthMin' => [
            ['password', 6]
        ]
    ];

    function checkUnique() {
        $user = \R::findOne('user', 'login = ? OR email = ? LIMIT 1', [$this->attributes['login'], $this->attributes['email']]);
        if ($user) {
            if($user->login == $this->attributes['login']){
                $this->errors['unique'][] = 'That login is taken';
            }
            if($user->email == $this->attributes['email']){
                $this->errors['unique'][] = 'That email is taken';
            }
            return false;
        }
        return true;
    }

    function login() {
        $login = !empty(trim($_POST['login'])) ? trim($_POST['login']) : null;
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;
        if($login && $password) {
            $user = \R::findOne('user', 'login = ? ', [$login]);
            if($user) {
                if(password_verify($password, $user->password)){
                    foreach ($user as $k => $v) {
                        if($k != 'password') {
                            $_SESSION['user'][$k] = $v;
                        }
                    }
                    return true;
                }
            }
        }
        return false;
    }
}