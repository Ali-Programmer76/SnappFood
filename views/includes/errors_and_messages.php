<?php if (isset($_SESSION['message']) && $_SESSION['message']) : ?>
    <div class="alert alert-success">
        <?= flash('message')  ?>
    </div>
<?php endif; ?>
<?php if (isset($_SESSION['errors']) && is_array($_SESSION['errors']) && count($_SESSION['errors'])) : ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($_SESSION['errors'] as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<?= $_SESSION['errors'] = null ?>