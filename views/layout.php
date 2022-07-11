<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'bootstrap.min.css' ?>">
    <title>My website in PHP</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">OOP Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/posts">Posts</a>
                    </li>
                    <?php if(isset($_SESSION['auth']) && $_SESSION['auth']): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/posts">Dashboard</a>
                        </li>
                    <?php endif ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <?php if(isset($_SESSION['auth'])): ?>
                            <a class="nav-link" href="/logout">Logout</a>
                        <?php else: ?>
                            <a class="nav-link" href="/login">Login</a>
                        <?php endif ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <?= $content ?>
    </div>
</body>
</html>