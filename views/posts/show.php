<?php $post = $params['post'] ?>

<h1><?= $post->title ?></h1>

<div class="card mb-3">
    <div class="card-body">
        <small class="badge bg-info"><?= $post->getCreatedAt() ?></small>
        <div>
            <?php foreach($post->getTags() as $tag) : ?>
                <a href="/tags/<?= $tag->id ?>/posts"><?= $tag->name ?></a>
            <?php endforeach ?>
        </div>
        <p><?= $post->content ?></p>
        <a href="/posts" class="btn btn-secondary">Back</a>
    </div>
</div>