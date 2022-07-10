<?php $tag = $params['tag'] ?>

<h1>Post for tag <?= $tag->name ?></h1>

<?php foreach($tag->getPosts as $post) : ?>

    <div class="card mb-3">
        <div class="card-body">
            <h2><?= $post->title ?></h2>
            <small class="text-info">Published at <?= $post->getCreatedAt() ?></small>
            <p><?= $post->getReducedContent() ?></p>
            <?= $post->getButton() ?>
        </div>
    </div>

<?php endforeach ?>