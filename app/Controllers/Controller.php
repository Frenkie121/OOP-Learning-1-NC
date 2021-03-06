<?php

namespace App\Controllers;

use Database\DBConnection;

abstract class Controller
{

    public function __construct(protected DBConnection $db)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    protected function view(string $path, array $params = null)
    {
        // Mise en tampon des variables params (pour les parametres de routes) et content pour le layout.
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';
        $content = ob_get_clean();
        require VIEWS . 'layout.php';
    }

    public function getDB()
    {
        return $this->db;
    }

    protected function isAdmin()
    {
        return (isset($_SESSION['auth']) && $_SESSION['auth']) ? true : header('Location: /login');
    }
}
