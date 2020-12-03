<div class="form-group">
    <h2><?= $login_log_in ?></h2>
</div>
<hr>
<div class="form-group">
    <label for="email"><?= $login_email ?></label>
    <input type="email" name="email" class="form-control" id="email">
</div>
<div class="form-group mb-4">
    <label for="password"><?= $login_password ?></label>
    <input type="password" name="password" class="form-control" id="password">
</div>
<button type="submit" name="submit" class="btn btn-outline-primary"><?= $login_log_in ?></button>
<hr>
<small class="float-right"><?= $login_msg ?> <a href="javascript:void(0)"><?= $login_signup ?></a></small>