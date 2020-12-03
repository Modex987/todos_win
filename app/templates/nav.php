<!-- Start Nav -->
<nav class="col-xs-4 col-sm-3 col-md-2 pt-5 hidden" id="togglerTarget">
    <!-- <div class="profile row mb-5">
        <a href="/user" class="mx-auto btn btn-outline-primary">
            <i class="fas fa-user"></i>
        </a>
    </div> -->
    <div class="profile row mb-5">
        <a href="javascript:void(0)" class="mx-auto btn btn-outline-primary">
            <?php if(isset($user->profile_img_url)): ?>
                <img src="<?= $user->profile_img_url ?>">
            <?php else: ?>
                <i class="fas fa-user"></i>
            <?php endif; ?>
        </a>
    </div>
    <div class="row">
        <span class="mx-auto">
            <span class="mb-2"><?= $nav_todos ?><a href="/todo"><i class="ml-2 fas fa-list-alt"></i></a></span><br>
            <span class="mb-2"><?= $nav_edit_profile ?><a href="/user"><i class="ml-2 fas fa-user-edit"></i></a></span><br>
            <span><?= $nav_change_lang ?><a href="/lang/change"><i class="ml-2 fas fa-sign-out-alt"></i></a></span><br>
            <span><?= $nav_logout ?><a href="/user/logout"><i class="ml-2 fas fa-sign-out-alt"></i></a></span>
        </span>
    </div>
</nav>
<!-- End Nav -->