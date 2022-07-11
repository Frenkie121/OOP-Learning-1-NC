<h1>Login</h1>

<?php App\Helper::flashMessage('error', 'danger') ?>

<form action="/login" method="post">
    <div class="form-group mb-2">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Type name">
      <small id="helpId" class="form-text text-muted">Not too long</small>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Type Password">
    </div>
    <div class="form-group mt-2">
        <button type="submit" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">Submit</button>
    </div>
</form>

<?php App\Helper::unsetMessage('error') ?>