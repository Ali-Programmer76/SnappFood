<?php require_once('views/includes/public_header.php'); ?>

<form action="<?= route('account', 'register') ?>" method="POST">
    <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>ایجاد حساب کاربری</h3>
    <div class="row justify-content-around">
        <div class="form-group col-md-2">
            <label class="control-label">نام :</label>
            <input class="form-control" name="firstname" value="<?= old('firstname'); ?>" type="text" required placeholder="نام">
        </div>
        <div class="form-group col-md-2">
            <label class="control-label">نام خانوادگی :</label>
            <input class="form-control" name="lastname" value="<?= old('lastname'); ?>" type="text" required placeholder="نام خانوادگی">
        </div>
        <div class="form-group col-md-2">
            <label class="control-label">نام کاربری :</label>
            <input class="form-control" name="username" value="<?= old('username'); ?>" type="text" required placeholder="نام کاربری">
        </div>
        <div class="form-group col-md-2">
            <label class="control-label">رمز عبور :</label>
            <input class="form-control" name="password" type="password" required placeholder="رمز عبور">
        </div>
        <div class="form-group col-md-2">
            <label class="control-label">تکرار رمز عبور :</label>
            <input class="form-control" name="password_confirm" type="password" required placeholder="تکرار رمز عبور">
        </div>
        <hr class="w-100">
        <div class="form-group col-md-2 btn-container">
            <button class="btn btn-primary btn-block">ثبت نام</button>
        </div>
    </div>
</form>

<?php require_once('views/includes/public_footer.php'); ?>