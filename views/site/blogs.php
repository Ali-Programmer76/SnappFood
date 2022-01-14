<?php require_once('views/includes/public_header.php'); ?>

<div class="row justify-content-around">
    <?php foreach ($blogs as $key => $blog) : ?>
        <div class="col-md-6">
            <div class="tile">
                <div class="text-center p-1">
                    <h3 class="tile-edit-color"><?= $blog->title ?></h3>
                </div>
                <hr>
                <div class="tile-body">
                    <?php if (isset($blog->image) && $blog->image) : ?>
                        <div class="text-center">
                            <img src="<?= $blog->image ?>" alt="<?= $blog->title ?>" class="img-fluid tile-edit-img">
                        </div>
                    <?php endif; ?>
                    <?php if (isset($blog->content) && $blog->content) : ?>
                        <div class="my-3">
                            <p><?= short($blog->content, 200) ?></p>
                        </div>
                    <?php else : ?>
                        <em>بدون محتوا</em>
                    <?php endif; ?>
                    <hr>
                    <div class="text-center">
                        <a href="" class="btn btn-primary">ادامه مطلب</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require_once('views/includes/public_footer.php'); ?>