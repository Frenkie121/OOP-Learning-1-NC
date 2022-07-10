<?php

namespace App\Controllers;

class Controller
{
    public function view(string $path, array $params = null)
    {
        // Mise en tampon des variables params (pour les parametres de routes) et content pour le layout.
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';
        
        if ($params) {
            $params = extract($params);
        }
        $content = ob_get_clean();
        require VIEWS . 'layout.php';
    }
}
