<?php include_once('views/includes/header.php'); ?>
<?php include_once('views/includes/aside.php'); ?>

<div class="tile">
  <h3 class="text-center text-primary mb-3">لیست سفارشات</h3>
  <div class="table-responsive-md">
    <table class="table table-bordered table-striped table-hover text-center">
      <thead>
        <tr>
          <th>شماره</th>
          <th>نام کاربر</th>
          <th>آدرس</th>
          <th>تاریخ</th>
          <th>مجموع (تومان)</th>
          <th>تایید پرداخت</th>
          <th>شماره پیگیری</th>
          <th>شماره مرجع</th>
          <th>جزئیات سفارش</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($orders as $key => $order) : ?>
          <tr>
            <td><?= $key += 1 ?></td>
            <td>
              <?php if ($user = $order->findUser()) : ?>
                <?= $user->fullName() ?>
              <?php else : ?>
                <span>کاربری یافت نشد</span>
              <?php endif; ?>
            </td>
            <td><?= $order->address ?></td>
            <td><?= $order->persianDate() ?></td>
            <td><?= number_format($order->total) ?></td>
            <td>
              <?php if ($order->payed) : ?>
                <i class="fa fa-check text-success"></i>
              <?php else : ?>
                <i class="fa fa-times text-danger"></i>
              <?php endif; ?>
            </td>
            <td><?= $order->system_trace_no ?? "-" ?></td>
            <td><?= $order->retrival_ref_no ?? "-" ?></td>
            <td>
              <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#order_details_<?= $order->id ?>">مشاهده</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?php foreach ($orders as $key => $order) : ?>
  <div class="modal fade" id="order_details_<?= $order->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-primary" id="exampleModalLabel">جزئیات سفارش</h5>
        </div>
        <div class="modal-body">
          <?php if (count($order->showItems())) : ?>
            <?php include('views/includes/items_table.php') ?>
          <?php else : ?>
            <div class="alert alert-warning">سبد خرید خالی شده است .</div>
          <?php endif; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<?php include_once('views/includes/footer.php'); ?>