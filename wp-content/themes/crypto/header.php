<!DOCTYPE html>
<html dir="ltr" lang="<?php echo HTML_ATTRS[LANG]; ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap" rel="stylesheet" disabled>
    <?php
    include 'components/head/dal.php';
    include 'components/canonical/view.php';
    include 'components/hreflang/dal.php';
    include 'components/styles/dal.php';
    ?>
</head>
<body>
<header class="header" name="top">
    <div class="container header_container">
        <?php include 'components/header/logo/dal.php' ?>
        <div>
            <button class="menu_toggle" type="button" id="burger"></button>
            <?php include 'components/header/menu/dal.php' ?>
        </div>
    </div>
</header>
<main>


