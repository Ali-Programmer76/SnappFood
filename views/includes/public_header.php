<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="public/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>اسنپ فود</title>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg fixed-top">
            <a class="navbar-brand" href="#"> عنوان سایت </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?php if ($_GET['p'] == "landing" || !$_GET['p']) : ?>active<?php endif; ?>">
                        <a class="nav-link" href="<?= page('landing') ?>"> صفحه اصلی </a>
                    </li>
                    <li class="nav-item <?php if ($_GET['p'] == "blogs") : ?>active<?php endif; ?>">
                        <a class="nav-link" href="<?= page('blogs') ?>">مطالب سایت</a>
                    </li>
                    <li class="nav-item <?php if ($_GET['p'] == "products") : ?>active<?php endif; ?>">
                        <a class="nav-link" href="<?= page('products') ?>">لیست غذاها</a>
                    </li>
                    <li class="nav-item <?php if ($_GET['p'] == "about_us") : ?>active<?php endif; ?>">
                        <a class="nav-link" href="<?= page('about_us') ?>">درباره ما</a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-auto">
                    <?php if (!user()) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= page('register') ?>">ثبت نام</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= page('account') ?>">ناحیه کاربری</a>
                    </li>
                    <?php if (user()) : ?>
                        <li class="nav-item shopping-cart">
                            <a class="nav-link" href="<?= page('cart') ?>">
                                <span class="badge badge-dark" id="shopping-cart-count"><?= currentCartCount(); ?></span>
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container-fluid">
        <section class="vali-content">
            <div class="vali-box main-template p-4">
                <div>
                    <?php require_once('errors_and_messages.php'); ?>
                </div>