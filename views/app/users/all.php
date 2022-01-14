<?php include_once('views/includes/header.php'); ?>
<?php include_once('views/includes/aside.php'); ?>

<div class="tile">
  <h3 class="text-center text-primary mb-3">لیست کاربران</h3>
  <div class="table-responsive-md">
    <table class="table table-bordered table-striped table-hover text-center">
      <thead>
        <tr>
          <th>شماره</th>
          <th>نام</th>
          <th>نام خانوادگی</th>
          <th>نام کاربری</th>
          <th>رمز عبور</th>
          <th>سطح دسترسی کاربر</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $key => $user) : ?>
          <tr>
            <td><?= $key += 1 ?></td>
            <td><?= $user->firstname ?></td>
            <td><?= $user->lastname ?></td>
            <td><?= $user->username ?></td>
            <td><?= $user->password ?></td>
            <td><?= $user->type ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?php include_once('views/includes/footer.php'); ?>