<?php include_once('views/includes/header.php'); ?>
<?php include_once('views/includes/aside.php'); ?>

<div class="tile">
    <form class="row justify-content-center" action="<?= route('account', 'update') ?>" method="post">
        <div class="form-group col-md-3">
            <label for="firstname">نام :</label>
            <input type="text" name="firstname" id="firstname" class="form-control" value="<?= $user->firstname ?>" required>
        </div>
        <div class="form-group col-md-3">
            <label for="lastname">نام خانوادگی :</label>
            <input type="text" name="lastname" id="lastname" class="form-control" value="<?= $user->lastname ?>" required>
        </div>
        <div class="form-group col-md-3">
            <label for="username">نام کاربری :</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= $user->username ?>" required>
        </div>
        <div class="form-group col-md-4">
            <label for="newPassword">رمز عبور جدید :</label>
            <input type="password" name="newPassword" id="newPassword" class="form-control">
            <small class="text-muted">در صورتی که قصد تغییر رمز را ندارید ، میتوانید این فیلد را خالی بگذارید .</small>
        </div>
        <div class="form-group col-md-4">
            <label for="confirmPassword">تکرار رمز عبور جدید :</label>
            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control">
            <small class="text-muted">در صورتی که قصد تغییر رمز را ندارید ، میتوانید این فیلد را خالی بگذارید .</small>
        </div>
        <div class="form-group col-md-6">
            <label for="currentPassword">رمز عبور فعلی :</label>
            <input type="password" name="currentPassword" id="currentPassword" class="form-control" required>
        </div>
        <hr class="w-100">
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary btn-block">ویرایش</button>
        </div>
    </form>
</div>

<?php include_once('views/includes/footer.php'); ?>