<?php include_once('views/includes/header.php'); ?>
<?php include_once('views/includes/aside.php'); ?>

<div class="tile text-left">
  <a href="<?= route('blogs', 'create') ?>" class="btn btn-primary">
    <i class="fa fa-plus ml-1"></i>
    تعریف مطلب جدید
  </a>
</div>
<div class="tile">
  <h3 class="text-center text-primary mb-3">لیست مطالب</h3>
  <div class="table-responsive-md">
    <table class="table table-bordered table-striped table-hover text-center">
      <thead>
        <tr>
          <th>شماره</th>
          <th>عنوان مطلب</th>
          <th>محتوا</th>
          <th>تگ ها</th>
          <th>تصویر</th>
          <th>تصویر پس زمینه</th>
          <th colspan="2">عملیات</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($blogs as $key => $blog) : ?>
          <tr>
            <td><?= $key += 1 ?></td>
            <td><?= $blog->title ?></td>
            <td><?= $blog->content ? short($blog->content) : "-" ?></td>
            <td>
              <?php if ($blog->tags) : ?>
                <?php foreach (explode(", ", $blog->tags) as $key => $tag) : ?>
                  <span class="badge badge-primary"><?= "# " . $tag ?></span>
                <?php endforeach; ?>
              <?php else : ?>
                <em>بدون تگ</em>
              <?php endif; ?>
            </td>
            <td>
              <?php if ($blog->image) : ?>
                <i class="fa fa-check text-success"></i>
              <?php else : ?>
                <i class="fa fa-times text-danger"></i>
              <?php endif; ?>
            </td>
            <td>
              <?php if ($blog->bg) : ?>
                <i class="fa fa-check text-success"></i>
              <?php else : ?>
                <i class="fa fa-times text-danger"></i>
              <?php endif; ?>
            </td>
            <td><a class="btn btn-success btn-sm" href="<?= route('blogs', 'edit', array('id' => $blog->id)) ?>">ویرایش</a></td>
            <td>
              <form action="<?= route('blogs', 'destroy', array('id' => $blog->id)) ?>" method="post">
                <button class="btn btn-danger btn-sm" type="submit" name="id" value="<?= $blog->id ?? null ?>" onclick="return confirm('آیا از حذف کردن مطمئن هستید ؟');">حذف</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?php include_once('views/includes/footer.php'); ?>