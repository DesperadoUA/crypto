<?php
global $builder;
if(is_single()) {
    global $post;
    if($post->post_type === ECOSYSTEM_POST_TYPE) {
        $ids = Relative::getRelative($post->ID, AIRDROP_POST_TYPE, FIELDS_KEY['RELATIVE_ECOSYSTEM']);
        echo $builder->airdropLoop(airdropCard($ids));
    }
}