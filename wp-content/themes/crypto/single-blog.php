<?php get_header(); ?>
    <?php include 'components/h1/dal.php'; ?>
    <?php include 'components/breadcrumb/dal.php'; ?>
    <?php include 'components/banner/dal.php'; ?>
    <div class="section_padding">
        <?php include 'components/content/dal.php'; ?>
    </div>
    <?php include 'components/faq/dal.php'; ?>
    <?= $builder->headingSection('ARTICLES'); ?>
    <div class="section_padding">
        <div class="container">
            <?php include 'components/blog_loop_posts/dal.php'; ?>
        </div>
    </div>
    <?php include 'components/reviews/dal.php'; ?>
<?php get_footer(); ?>