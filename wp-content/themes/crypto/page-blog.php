<?php get_header(); ?>
<?php include 'components/h1/dal.php'; ?>
<?php include 'components/breadcrumb/dal.php'; ?>
<?php include 'components/blog_loop_category/dal.php'; ?>
    <section class="section_padding">
        <div class="container">
            <?php include 'components/blog_loop_blog_page/dal.php'; ?>
        </div>
    </section>
    <?php include 'components/load_more_blog/dal.php'; ?>
    <div class="section_padding">
        <?php include 'components/content/dal.php'; ?>
    </div>
<?php get_footer(); ?>