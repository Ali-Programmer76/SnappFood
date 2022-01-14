<?php require_once('views/includes/public_header.php'); ?>

<div class="row justify-content-center">
    <div class="col-md-8"></div>
    <div class="col-md-4">
        <div class="alert alert-success collapse" id="cart-message"></div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="d-flex">
            <img src="<?= $product->image ?>" alt="<?= $product->title ?>" class="img-fluid buy-edit-img mx-auto">
        </div>
    </div>
    <div class="col-md-8">
        <h2 class="text-primary"><?= $product->title ?></h2>
        <h5 class="mt-3"><?= number_format($product->price) ?> تومان</h5>
        <hr class="w-100">
        <?php if (isset($product->description) && $product->description) : ?>
            <div class="my-3">
                <p><?= $product->description ?></p>
            </div>
        <?php else : ?>
            <em>بدون محتوا</em>
        <?php endif; ?>
        <hr class="w-100">
        <?php if (user()) : ?>
            <div class="row justify-content-center">
                <div class="col-md-4 mt-3">
                    <label for="count">تعداد :</label>
                    <input type="number" name="count" id="count" value="1" class="form-control">
                </div>
                <div class="w-100"></div>
                <div class="col-md-4 mt-3">
                    <a href="#" class="btn btn-primary btn-block" id="add-to-cart" data-id="<?= $product->id ?>" data-url="<?= route('cart', 'add') ?>">افزودن به سبد خرید</a>
                </div>
            </div>
        <?php else : ?>
            <div class="row justify-content-center">
                <div class="w-100">
                    <em class="text-muted">برای خرید نیاز به ایجاد یا ورود به حساب کاربری خود دارید .</em>
                </div>
                <div class="col-md-4 mt-3">
                    <a href="<?= page('account') ?>" class="btn btn-primary btn-block">ورود به حساب کاربری</a>
                </div>
                <div class="col-md-4 mt-3">
                    <a href="<?= page('register') ?>" class="btn btn-primary btn-block">ایجاد حساب کاربری</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once('views/includes/public_footer.php'); ?>