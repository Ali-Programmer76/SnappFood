<?php require_once('views/includes/public_header.php'); ?>

<?php if ($order->countItems()) : ?>
    <?php require_once('views/includes/items_table.php') ?>
    <form class="row" action="<?= route('cart', 'pay') ?>" method="post">
        <div class="col-md-8 mx-auto my-2">
            <label for="address">آدرس خود را وارد کنید :</label>
            <input type="text" name="address" id="address" placeholder="آدرس" class="form-control" required>
        </div>
        <div class="w-100"></div>
        <div class="col-md-2 mx-auto my-2">
            <button type="submit" class="btn btn-primary btn-block">تایید و پرداخت</button>
        </div>
    </form>
<?php else : ?>
    <div class="alert alert-warning">سبد خرید شما خالی می باشد .</div>
<?php endif; ?>

<?php require_once('views/includes/public_footer.php'); ?>