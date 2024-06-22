<?php
global $builder;
?>
<?php get_header(); ?>
<div class="mt_30">
<?= $builder->headingSection('LAST_NEWS'); ?>
</div>
<section class="section_padding">
    <div class="container">
        <?php include 'components/news_loop_main_page/dal.php'; ?>
    </div>
</section>
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
<?php include 'components/h1/dal.php'; ?>
<section class="section_padding">
<?php
    include 'components/content/dal.php';
?>
</section>
<?php get_footer(); ?>

