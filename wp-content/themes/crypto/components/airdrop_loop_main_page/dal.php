<?php
global $builder;
$ids = get_public_post_id_by_rating(AIRDROP_POST_TYPE, 5);
echo $builder->airdropLoop(airdropCard($ids));