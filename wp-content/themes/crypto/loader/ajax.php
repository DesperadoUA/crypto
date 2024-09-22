<?php
$_POST = !empty($_POST) ? $_POST : json_decode(file_get_contents('php://input'), true);
include $_SERVER['DOCUMENT_ROOT'].'/wp-config.php';
switch ($_POST['postType']) {
    case BLOG_POST_TYPE:
        $response = ['status' => SUCCESS_STATUS, 'data' => []];
        if((int)$_POST['taxId'] === 0) {
            $offset = NUMBER_POST_ON_QUERY_BLOG * ($_POST['currentPage'] - 1);
            $posts = get_public_post_id(BLOG_POST_TYPE, NUMBER_POST_ON_QUERY_BLOG, [], $offset);
            $response['data'] = blogCard($posts);
        } else {
            $offset = NUMBER_POST_ON_QUERY_BLOG * ($_POST['currentPage'] - 1);
            $settings = new TaxQuerySettings($_POST['taxId'], BLOG_TAX, BLOG_POST_TYPE, NUMBER_POST_ON_QUERY_BLOG, [], $offset);
            $posts = Relative::getPostsFromTax($settings);
            $response['data'] = blogCard($posts);
        }
        echo json_encode($response);
        break;
    default:  echo json_encode([ 'status' => ERROR_STATUS ]);
}