<?php

namespace App\Controllers;

class BlogController
{
    public function index()
    {
        echo 'Liste des articles';
    }

    public function show(int $id)
    {
        echo 'Article numero ' . $id;
    }
}