<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="public/images/Snappfood_logo.png" alt="User Image" />
        <div>
            <p class="app-sidebar__user-name"><?= user()->fullName() ?></p>
            <p class="app-sidebar__user-designation"><?= user('type') ?></p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item <?php if ($_GET['c'] == 'app' || !$_GET['c']) : ?>active<?php endif; ?>" href="<?= route('app', 'dashboard') ?>">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">داشبورد</span>
            </a>
        </li>
        <?php if (user('type') == "admin") : ?>
            <li>
                <a class="app-menu__item <?php if ($_GET['c'] == 'blogs') : ?>active<?php endif; ?>" href="<?= route('blogs', 'all') ?>">
                    <i class="app-menu__icon fa fa-book"></i>
                    <span class="app-menu__label">مدیریت مطالب</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item <?php if ($_GET['c'] == 'products') : ?>active<?php endif; ?>" href="<?= route('products', 'all') ?>">
                    <i class="app-menu__icon fa fa-shopping-bag"></i>
                    <span class="app-menu__label">مدیریت محصولات</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item <?php if ($_GET['c'] == 'users') : ?>active<?php endif; ?>" href="<?= route('users', 'all') ?>">
                    <i class="app-menu__icon fa fa-users"></i>
                    <span class="app-menu__label">لیست کاربران</span>
                </a>
            </li>
        <?php endif; ?>
        <li>
            <a class="app-menu__item <?php if ($_GET['c'] == 'orders') : ?>active<?php endif; ?>" href="<?= route('orders', 'all') ?>">
                <i class="app-menu__icon fa fa-list"></i>
                <span class="app-menu__label">لیست سفارشات</span>
            </a>
        </li>
    </ul>
</aside>
<main class="app-content">
    <?php require_once('errors_and_messages.php'); ?>