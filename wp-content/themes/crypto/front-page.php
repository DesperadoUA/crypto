<?php
global $builder;
?>
<?php get_header(); ?>
<?php include 'components/h1/dal.php'; ?>
<section class="section_padding">
<?php
    include 'components/content/dal.php';
?>
</section>
<?= $builder->headingSection('LAST_NEWS'); ?>
<section class="section_padding">
    <div class="container">
        <?php include 'components/news_loop_main_page/dal.php'; ?>
    </div>
</section>
<?= $builder->headingSection('AIRDROPS'); ?>
<?php include 'components/airdrop_loop_main_page/dal.php'; ?>
<?= $builder->headingSection('GAMES'); ?>
<section class="section_padding">
    <div class="container">
        <?php include 'components/game_loop_main_page/dal.php'; ?>
    </div>
</section>
<?= $builder->headingSection('ARTICLES'); ?>
<section class="section_padding">
    <div class="container">
        <?php
            include 'components/blog_loop_main_page/dal.php';
        ?>
    </div>
</section>
<?php get_footer(); ?>

