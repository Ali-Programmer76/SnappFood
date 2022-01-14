<?php require_once('views/includes/public_header.php'); ?>

<div class="row justify-content-around">
    <?php foreach ($products as $key => $product) : ?>
        <div class="col-md-6">
            <div class="tile">
                <div class="text-center p-1">
                    <h3 class="tile-edit-color"><?= $product->title ?></h3>
                </div>
                <hr>
                <div class="tile-body">
                    <?php if (isset($product->image) && $product->image) : ?>
                        <div class="text-center">
                            <img src="<?= $product->image ?>" alt="<?= $product->title ?>" class="img-fluid tile-edit-img">
                        </div>
                    <?php endif; ?>
                    <?php if (isset($product->description) && $product->description) : ?>
                        <div class="my-3">
                            <p><?= short($product->description, 200) ?></p>
                        </div>
                    <?php else : ?>
                        <em>بدون محتوا</em>
                    <?php endif; ?>
                    <hr>
                    <div class="text-center">
                        <a href="<?= page('product', array('id' => $product->id)) ?>" class="btn btn-primary">مشاهده جزئیات</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require_once('views/includes/public_footer.php'); ?>