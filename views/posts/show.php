<?php $post = $params['post'] ?>

<h1><?= $post->title ?></h1>

<div class="card mb-3">
    <div class="card-body">
        <small class="badge bg-info"><?= $post->getCreatedAt() ?></small>
        <div>
            <?php foreach($post->getTags() as $tag) : ?>
                <span class="badge bg-success"><a href="/tags/<?= $tag->id ?>/posts" class="text-white"><?= $tag->name ?></a></span>
            <?php endforeach ?>
        </div>
        <p><?= $post->content ?></p>
        <a href="/posts" class="btn btn-secondary">Back</a>
    </div>
</div>