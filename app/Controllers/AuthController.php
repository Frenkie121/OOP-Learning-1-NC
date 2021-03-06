<?php

namespace App\Controllers;

use App\Models\User;
use App\Validation\Validator;

class AuthController extends Controller
{
    public function loginForm()
    {
        return $this->view('auth.login');
    }

    public function login()
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'name' => ['required', 'min:5'],
            'password' => ['required']
        ]);

        if ($errors) {
            $_SESSION['errors'][] = $errors;
            header('Location: /login');
            exit;
        }
        
        $user = (new User($this->getDB()))->getName($_POST['name']);

        if (password_verify($_POST['password'], $user->password)) {
            $_SESSION['auth'] = boolval($user->admin);
            $_SESSION['success'] = 'You\'ve been successfully logged in.';
            return $user->admin ? header('Location: /admin/posts') : header('Location: /posts');
        } else {
            $_SESSION['error'] = 'This account doesn\'t exists in our records.';
            return header('Location: /login');
        }
    }

    public function logout()
    {
        session_destroy();
        
        return header('Location: /');
    }
}
