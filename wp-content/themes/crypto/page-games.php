<?php get_header(); ?>
<?php include 'components/h1/dal.php'; ?>
<?php include 'components/game_loop_category/dal.php'; ?>
<section class="section_padding">
    <div class="container">
        <?php include 'components/game_loop_games_page/dal.php'; ?>
    </div>
</section>
<div class="section_padding">
    <?php include 'components/content/dal.php';?>
</div>
<?php get_footer(); ?>