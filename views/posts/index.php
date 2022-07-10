<h1>Latests posts</h1>

<?php foreach($params['posts'] as $post) : ?>

    <div class="card mb-3">
        <div class="card-body">
            <h2><?= $post->title ?></h2>
            <div>
                <?php foreach($post->getTags() as $tag) : ?>
                    <a href="/tags/<?= $tag->id ?>/posts"><?= $tag->name ?></a>
                <?php endforeach ?>
            </div>
            <small class="text-info">Published at <?= $post->getCreatedAt() ?></small>
            <p><?= $post->getReducedContent() ?></p>
            <?= $post->getButton() ?>
        </div>
    </div>

<?php endforeach ?>