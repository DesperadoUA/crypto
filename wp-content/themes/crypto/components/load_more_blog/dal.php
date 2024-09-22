<?php
global $builder;
$taxId = 0;
$total = 0;
if (is_tax()) {
    $category = get_queried_object();
    $taxId = $category->term_id;
    $args = array(
      'post_type'     => BLOG_POST_TYPE, 
      'post_status'   => 'publish', // just tried to find all published post
      'posts_per_page' => -1,  //show all
      'tax_query' => array(
        'relation' => 'AND',
        array(
          'taxonomy' => BLOG_TAX,
          'field' => 'id',
          'terms' => array( $category->term_id )
        )
      )
    );
    $query = new WP_Query( $args);
    $total = (int)$query->post_count;
} else {
    $count_posts = wp_count_posts(BLOG_POST_TYPE);
	$total = (int)$count_posts->publish;
}
if($total > NUMBER_POST_ON_QUERY_BLOG) {
    $args = new LoaderSettings(
        $taxId,
        BLOG_POST_TYPE,
        NUMBER_POST_ON_QUERY_BLOG,
        $total,
        'blog_loop'
    );
    echo $builder->loader($args);
}