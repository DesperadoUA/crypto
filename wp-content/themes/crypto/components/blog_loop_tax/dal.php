<?php
global $builder;
$category = get_queried_object();
$settings = new TaxQuerySettings($category->term_id, BLOG_TAX, BLOG_POST_TYPE);
$posts = Relative::getPostsFromTax($settings);
echo $builder->blogLoop(blogCard($posts));