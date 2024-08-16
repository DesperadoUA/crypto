<?php
global $builder;
$category = get_queried_object();
$settings = new TaxQuerySettings($category->term_id, AIRDROP_TAX, AIRDROP_POST_TYPE);
$posts = Relative::getPostsFromTax($settings);
echo $builder->airdropLoop(airdropCard($posts));