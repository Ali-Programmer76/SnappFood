<?php include_once('views/includes/header.php'); ?>
<?php include_once('views/includes/aside.php'); ?>

<div class="tile text-left">
  <a href="<?= route('products', 'create') ?>" class="btn btn-primary">
    <i class="fa fa-plus ml-1"></i>
    تعریف محصول جدید
  </a>
</div>
<div class="tile">
  <h3 class="text-center text-primary mb-3">لیست محصولات</h3>
  <div class="table-responsive-md">
    <table class="table table-bordered table-striped table-hover text-center">
      <thead>
        <tr>
          <th>شماره</th>
          <th>عنوان محصول</th>
          <th>قیمت محصول</th>
          <th>توضیحات</th>
          <th>تصویر</th>
          <th colspan="2">عملیات</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($products as $key => $product) : ?>
          <tr>
            <td><?= $key += 1 ?></td>
            <td><?= $product->title ?></td>
            <td><?= $product->price ?></td>
            <td><?= $product->description ? short($product->description) : "-" ?></td>
            <td>
              <?php if ($product->image) : ?>
                <i class="fa fa-check text-success"></i>
              <?php else : ?>
                <i class="fa fa-times text-danger"></i>
              <?php endif; ?>
            </td>
            <td><a class="btn btn-success btn-sm" href="<?= route('products', 'edit', array('id' => $product->id)) ?>">ویرایش</a></td>
            <td>
              <form action="<?= route('products', 'destroy', array('id' => $product->id)) ?>" method="post">
                <button class="btn btn-danger btn-sm" type="submit" name="id" value="<?= $product->id ?? null ?>" onclick="return confirm('آیا از حذف کردن مطمئن هستید ؟');">حذف</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?php include_once('views/includes/footer.php'); ?>