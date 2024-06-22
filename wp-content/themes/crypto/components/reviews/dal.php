<?php
global $builder;
global $post;
$commentList = new ReviewItemList();
$childrenCommentList = new ReviewItemList();
$reviewPostSettings = new ReviewPostSettings(
    $post->ID,
    get_the_title($post->ID)
);
$args = array(
    'number'  => 100,
    'orderby' => 'comment_date',
    'order'   => 'DESC',
    'status'  => 'approve',
    'post_id' => $post->ID,
    'type'    => ''
);
$comments = get_comments($args);
foreach ($comments as $comment) {
    if($comment->comment_parent === '0') {
        $commentList->posts[] = new ReviewItem(
            $comment->comment_ID,
            $comment->comment_parent,
            $comment->comment_author,
            $comment->comment_content,
            mb_strimwidth($comment->comment_date, 0, 10)
        );
    }
}
$args = array(
    'number'  => 100,
    'orderby' => 'comment_date',
    'order'   => 'ASC',
    'status'  => 'approve',
    'post_id' => $post->ID,
    'type'    => ''
);
$comments_asc = get_comments($args);
foreach ($comments_asc as $comment) {
    if($comment->comment_parent !== '0') {
        $childrenCommentList->posts[] = new ReviewItem(
            $comment->comment_ID,
            $comment->comment_parent,
            $comment->comment_author,
            $comment->comment_content,
            mb_strimwidth($comment->comment_date, 0, 10)
        );
    }
}
foreach($commentList->posts as $parent) {
    foreach($childrenCommentList->posts as $children) {
        if($parent->id === $children->parentId) $parent->relativeComments->posts[] = $children;
    }
}
echo $builder->reviews($reviewPostSettings, $commentList);
