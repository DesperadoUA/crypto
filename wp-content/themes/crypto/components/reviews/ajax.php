<?php
$_POST = !empty($_POST) ? $_POST : json_decode(file_get_contents('php://input'), true);
include $_SERVER['DOCUMENT_ROOT'].'/wp-config.php';
$id = $_POST['postId'];
$name = $_POST['name'];
$email = $_POST['email'];
$text = $_POST['text'];
$parent_id = $_POST['parentIdComment'];

if(is_category($id)) $id = 1;
$comment_data = [
    'comment_post_ID'      => $id,
    'comment_author'       => $name,
    'comment_author_email' => $email,
    'comment_content'      => $text,
    'comment_parent'       => $parent_id,
    'comment_approved'     => 0,
];
wp_insert_comment( $comment_data );
$data['result'] = true;
echo json_encode($data);