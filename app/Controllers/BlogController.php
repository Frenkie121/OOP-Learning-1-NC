<?php

namespace App\Controllers;

class BlogController extends Controller
{
    public function welcome()
    {
        return $this->view('posts.welcome');
    }

    public function index()
    {
        $statement = $this->db->getPDO()->query('SELECT id, title, content, created_at, updated_at FROM posts ORDER BY created_at DESC');
        $posts = $statement->fetchAll();
        
        return $this->view('posts.index', compact('posts'));
    }

    public function show(int $id)
    {
        $statement = $this->db->getPDO()->prepare('SELECT id, title, content, created_at, updated_at FROM posts WHERE id = ?');
        $statement->execute([$id]);
        $post = $statement->fetch();

        return $this->view('posts.show', compact('post'));
    }
}
