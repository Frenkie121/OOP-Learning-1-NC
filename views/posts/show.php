<?php $post = $params['post'] ?>

<h1><?= $post->title ?></h1>

<div class="card mb-3">
        <div class="card-body">
            <small class="badge bg-info"><?= $post->getCreatedAt() ?></small>
            <p><?= $post->content ?></p>
            <a href="/posts" class="btn btn-secondary">Back</a>
        </div>
    </div>