<?php
global $builder;
$posts = get_public_post_id(GAME_POST_TYPE, 16);
echo $builder->gameLoop(gameCard($posts));