<?php get_header(); ?>
    <?php include 'components/h1/dal.php'; ?>
    <?php include 'components/breadcrumb/dal.php'; ?>
    <div class="section_padding">
        <?php include 'components/content/dal.php'; ?>
    </div>
    <div class="mt_30">
        <?= $builder->headingSection('LAST_NEWS'); ?>
    </div>
    <div class="section_padding">
        <div class="container">
            <?php include 'components/news_loop_posts/dal.php'; ?>
        </div>
    </div>
    <?= $builder->headingSection('ARTICLES'); ?>
    <div class="section_padding">
        <div class="container">
            <?php include 'components/blog_loop_posts/dal.php'; ?>
        </div>
    </div>
    <?= $builder->headingSection('AIRDROPS'); ?>
    <div class="section_padding">
        <?php include 'components/airdrop_loop_posts/dal.php'; ?>
    </div>
<?php get_footer(); ?>