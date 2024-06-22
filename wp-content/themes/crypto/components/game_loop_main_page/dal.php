<?php
global $builder;
$posts = get_public_post_id(GAME_POST_TYPE, 4);
echo $builder->gameLoop(gameCard($posts));