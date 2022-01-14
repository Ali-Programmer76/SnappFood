<?php require_once('views/includes/public_header.php'); ?>

<div class="row justify-content-center">
    <div class="col-md-4">
        <form action="<?= route('account', 'login') ?>" method="POST">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>ورود به حساب کاربری</h3>
            <div class="form-group">
                <label class="control-label">نام کاربری :</label>
                <input class="form-control" name="username" type="text" required placeholder="نام کاربری">
            </div>
            <div class="form-group">
                <label class="control-label">رمز عبور :</label>
                <input class="form-control" name="password" type="password" required placeholder="رمز عبور">
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block">ورود</button>
            </div>
        </form>
    </div>
</div>

<?php require_once('views/includes/public_footer.php'); ?>