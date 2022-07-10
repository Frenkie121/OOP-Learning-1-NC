<?php

namespace App\Controllers;

class BlogController extends Controller
{
    public function index()
    {
        return $this->view('posts.index');
    }

    public function show(int $id)
    {
        return $this->view('posts.show', compact('id'));
    }
}