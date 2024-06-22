<?php
global $builder;
$category = get_queried_object();
$settings = new TaxQuerySettings($category->term_id, NEWS_TAX, 'news');
$posts = Relative::getPostsFromTax($settings);
echo $builder->newsLoop(newsCard($posts));