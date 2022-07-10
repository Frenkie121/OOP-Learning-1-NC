<h1>Posts Dashboard</h1>

<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-default">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Published at</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($params['posts'] as $key => $post) : ?>
                <tr>
                    <td scope="row"><?= $key + 1 ?></td>
                    <td scope="row"><?= $post->title ?></td>
                    <td scope="row"><?= $post->getCreatedAt() ?></td>
                    <td>
                        <a href="" class="btn btn-primary">Edit</a>
                        <form action="/admin/posts/<?= $post->id ?>/delete" class="d-inline" method="post">
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
</table>