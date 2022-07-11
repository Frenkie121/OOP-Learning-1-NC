<?php

namespace App\Controllers;

use App\Models\User;

class AuthController extends Controller
{
    public function loginForm()
    {
        return $this->view('auth.login');
    }

    public function login()
    {
        $user = (new User($this->getDB()))->getName($_POST['name']);

        if (password_verify($_POST['password'], $user->password)) {
            $_SESSION['auth'] = boolval($user->admin);
            $_SESSION['success'] = 'You\'ve been successfully logged in.';
            return $user->admin ? header('Location: /admin/posts') : header('Location: /posts');
        } else {
            $_SESSION['error'] = 'Error when attempt to login.';
            return header('Location: /login');
        }
    }

    public function logout()
    {
        session_destroy();
        
        return header('Location: /');
    }
}
