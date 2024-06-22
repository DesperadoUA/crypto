<?php
global $builder;
$category = get_queried_object();
$settings = new TaxQuerySettings($category->term_id, GAME_TAX, GAME_POST_TYPE);
$posts = Relative::getPostsFromTax($settings);
echo $builder->gameLoop(gameCard($posts));