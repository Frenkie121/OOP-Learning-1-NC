<?php $tag = $params['tag'] ?>

<h1>Posts for tag <?= $tag->name ?></h1>

<?php foreach($tag->getPosts() as $post) : ?>

    <div class="card mb-3">
        <div class="card-body">
            <a href="/posts/<?= $post->id ?>"><?= $post->title ?></a>
        </div>
    </div>

<?php endforeach ?>