<div class="form-group">
    <h2><?= $signup_sign_up ?></h2>
</div>
<hr>
<div class="form-group">
    <label for="full_name"><?= $signup_full_name ?></label>
    <input type="text" name="full_name" class="form-control" id="full_name">
</div>
<div class="form-group">
    <label for="email"><?= $signup_email ?></label>
    <input type="email" name="email" class="form-control" id="email">
</div>
<div class="form-group mb-4">
    <label for="password"><?= $signup_password ?></label>
    <input type="password" name="password" class="form-control" id="password">
</div>
<div class="form-group mb-4">
    <label for="password_again"><?= $signup_password_again ?></label>
    <input type="password" name="password_again" class="form-control" id="password_again">
</div>
<button type="submit" name="submit" class="btn btn-outline-primary"><?= $signup_sign_up ?></button>
<hr>
<small class="float-right"><?= $signup_msg ?> <a href="javascript:void(0)"><?= $signup_login ?></a></small>