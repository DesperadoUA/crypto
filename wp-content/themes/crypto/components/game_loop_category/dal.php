<?php
global $builder;
$taxonomies = get_terms( array( 'taxonomy' => GAME_TAX ) );
$link_list = [];
foreach($taxonomies as $item) $link_list[] = new LinkItem($item->name, get_term_link($item->slug, GAME_TAX)); 
if(count($link_list)) echo $builder->categoryLinks(new LinkList($link_list));