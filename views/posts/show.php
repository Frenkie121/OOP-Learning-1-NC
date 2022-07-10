<?php $post = $params['post'] ?>

<h1><?= $post->title ?></h1>

<div class="card mb-3">
        <div class="card-body">
            <small><?= $post->created_at ?></small>
            <p><?= $post->content ?></p>
            <a href="/posts" class="btn btn-primary">Back</a>
        </div>
    </div>