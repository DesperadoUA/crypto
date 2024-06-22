<?php
global $builder;
$posts = get_public_post_id('news', 15);
echo $builder->newsLoop(newsCard($posts));