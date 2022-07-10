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
        $query = $this->db->getPDO()->query('SELECT title, content, created_at, updated_at FROM posts');
        $posts = $query->fetchAll();
        var_dump($posts);
        
        return $this->view('posts.show', compact('id'));
    }
}
