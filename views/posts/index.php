<h1>Latests posts</h1>

<?php foreach($params['posts'] as $post) : ?>

    <div class="card mb-3">
        <div class="card-body">
            <h2><?= $post->title ?></h2>
            <small><?= $post->created_at ?></small>
            <p><?= $post->content ?></p>
            <a href="/posts/<?= $post->id ?>" class="btn btn-primary">Read more</a>
        </div>
    </div>

<?php endforeach ?>