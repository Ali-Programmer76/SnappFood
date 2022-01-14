<?php include_once('views/includes/header.php'); ?>
<?php include_once('views/includes/aside.php'); ?>

<div class="tile text-left">
    <a href="<?= route('blogs', 'all') ?>" class="btn btn-primary">
        <i class="fa fa-list ml-1"></i>
        لیست مطالب
    </a>
</div>
<div class="tile">
    <form class="row justify-content-center" action="<?= isset($blog->id) ? route('blogs', 'update') : route('blogs', 'store') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group col-md-6">
            <label for="title">عنوان مطلب :</label>
            <input type="text" name="title" id="title" class="form-control" value="<?= $blog->title ?? null ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="image">تصویر :</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="bg">تصویر پس زمینه :</label>
            <input type="file" name="bg" id="bg" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="tags">تگ ها ( با enter از یکدیگر جدا کنید ) :</label>
            <textarea name="tags" id="tags" class="form-control" rows="10"><?= isset($blog->id) ? $blog->tagsForTextArea() : null ?></textarea>
        </div>
        <div class="form-group col-md-9">
            <label for="content">محتوا :</label>
            <textarea name="content" id="content" class="form-control" rows="10"><?= $blog->content ?? null ?></textarea>
        </div>
        <hr class="w-100">
        <div class="col-md-2">
            <button type="submit" name="id" value="<?= $blog->id ?? null ?>" class="btn btn-primary btn-block">ثبت</button>
        </div>
    </form>
</div>
<?php if (isset($blog->id) && $blog->id) : ?>
    <div class="row">
        <div class="col-md-6">
            <div class="tile d-flex">
                <?php if (isset($blog->image) && $blog->image) : ?>
                    <img src="<?= $blog->image ?>" alt="<?= $blog->title ?>" class="img-fluid tile-edit-img mx-auto">
                <?php else : ?>
                    <div class="alert alert-warning text-center w-100">بدون تصویر</div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="tile d-flex">
                <?php if (isset($blog->bg) && $blog->bg) : ?>
                    <img src="<?= $blog->bg ?>" alt="<?= $blog->title ?>" class="img-fluid tile-edit-img mx-auto">
                <?php else : ?>
                    <div class="alert alert-warning text-center w-100">بدون تصویر پس زمینه</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php include_once('views/includes/footer.php'); ?>