<?php

namespace App\Controllers;

use App\Models\{Post, Tag};

class BlogController extends Controller
{
    public function welcome()
    {
        $post = new Post($this->getDB());
        $posts = $post->query("SELECT * FROM posts ORDER BY created_at DESC LIMIT 5");

        return $this->view('posts.welcome', compact('posts'));
    }

    public function index()
    {
        $post = new Post($this->getDB());
        $posts = $post->all();

        return $this->view('posts.index', compact('posts'));
    }

    public function show(int $id)
    {
        $post = (new Post($this->getDB()))->findById($id);

        return $this->view('posts.show', compact('post'));
    }
    
    public function byTags(int $id)
    {
        $tag = (new Tag($this->getDB()))->findById($id);

        return $this->view('posts.bytags', compact('tag'));
    }
}
