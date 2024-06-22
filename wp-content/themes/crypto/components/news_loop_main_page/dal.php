<?php
global $builder;
$posts = get_public_post_id('news', 5);
echo $builder->newsLoop(newsCard($posts));