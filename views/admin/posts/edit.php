<?php $post = $params['post'] ?>

<h1>Edit Post : <?= $post->title ?></h1>

<div class="container">
    <form action="/admin/posts/<?= $post->id ?>" method="post">
        <div class="form-group row">
            <label for="title" class="col-sm-1-12 col-form-label">Title</label>
            <div class="col-sm-1-12">
                <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?= $post->title ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="content" class="col-sm-1-12 col-form-label">Content</label>
            <div class="col-sm-1-12">
                <textarea class="form-control" name="content" id="content" rows="3"><?= $post->content ?></textarea>
            </div>
        </div>
        <div class="form-group row mt-2">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>