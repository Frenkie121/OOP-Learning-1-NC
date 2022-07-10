<h1>Latests posts</h1>

<?php foreach($params['posts'] as $post) : ?>

    <div class="card mb-3">
        <div class="card-body">
            <h2><?= $post->title ?></h2>
            <small class="badge bg-info"><?= $post->getCreatedAt() ?></small>
            <p><?= $post->getReducedContent() ?></p>
            <?= $post->getButton() ?>
        </div>
    </div>

<?php endforeach ?>