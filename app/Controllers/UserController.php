<?php

namespace App\Controllers;

use App\models\User;
use App\Validation\Validator;

class UserController extends BaseController {

    public function login()
    {
        return $this->view('auth.login');
    }

    public function loginPost()
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'username' => ['required', 'min:3'],
            'password' => ['required']
        ]);

        if ($errors) {
            $_SESSION['errors'][] = $errors;
            header('Location:'. BASE_URL .'login');
            exit;
        }

        $user = (new User($this->getDB()))->getByUsername($_POST['username']);

        if (password_verify($_POST['password'], $user->password)) {
            $_SESSION['auth'] = (int) $user->admin;
            return header('Location:'. BASE_URL);
        } else {
            return header('Location:'. BASE_URL .'login');
        }
    }

    public function logout()
    {
        unset($_SESSION['auth']);

        return header('Location:'. BASE_URL .'');
    }
}
