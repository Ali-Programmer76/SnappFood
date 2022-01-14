<?php include_once('views/includes/header.php'); ?>
<?php include_once('views/includes/aside.php'); ?>

<div class="tile text-left">
    <a href="<?= route('products', 'all') ?>" class="btn btn-primary">
        <i class="fa fa-list ml-1"></i>
        لیست محصولات
    </a>
</div>
<div class="tile">
    <form class="row justify-content-center" action="<?= isset($product->id) ? route('products', 'update') : route('products', 'store') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group col-md-6">
            <label for="title">عنوان محصول :</label>
            <input type="text" name="title" id="title" class="form-control" value="<?= $product->title ?? null ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="price">قیمت محصول :</label>
            <input type="number" name="price" id="price" class="form-control" value="<?= $product->price ?? null ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="image">تصویر محصول :</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group col-md-12">
            <label for="description">توضیحات :</label>
            <textarea name="description" id="description" class="form-control" rows="10"><?= $product->description ?? null ?></textarea>
        </div>
        <hr class="w-100">
        <div class="col-md-2">
            <button type="submit" name="id" value="<?= $product->id ?? null ?>" class="btn btn-primary btn-block">ثبت</button>
        </div>
    </form>
</div>
<?php if (isset($product->id) && $product->id) : ?>
    <div class="tile d-flex">
        <?php if (isset($product->image) && $product->image) : ?>
            <img src="<?= $product->image ?>" alt="<?= $product->title ?>" class="img-fluid tile-edit-img mx-auto">
        <?php else : ?>
            <div class="alert alert-warning text-center w-100">بدون تصویر</div>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php include_once('views/includes/footer.php'); ?>