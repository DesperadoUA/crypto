<?php
function get_public_post_id_by_rating($post_type, $limit = -1, $executeIds = []):array {
    $arr_id = [];
    $query = new WP_Query( array(
        'posts_per_page' => $limit,
        'post_type'      => $post_type,
        'post_status'    => 'publish',
        'orderby'        => 'meta_value_num',
        'order'          => 'DESC',
        'post__not_in'    => $executeIds,
        'meta_query' => array(
            array(
                'key' => '_rating',
            )
        ),
    ));
    if(empty($query->posts)) return $arr_id;
    foreach ($query->posts as $item ) $arr_id[] = $item->ID;
    return $arr_id;
}
function get_public_post_id($post_type, $limit = -1, $executeIds = []):array {
    $arr_id = [];
    $query = new WP_Query( array(
        'posts_per_page' => $limit,
        'post_type'      => $post_type,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
        'post__not_in'   => $executeIds,
    ));
    if(empty($query->posts)) return $arr_id;
    foreach ($query->posts as $item ) $arr_id[] = $item->ID;
    return $arr_id;
}
function get_img_item($img_id):ImgItem {
    $title = get_post_field( 'post_title', $img_id);
    $description = (string)get_post_field('post_content', $img_id);
    $alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
    $fullPath = wp_get_attachment_image_src($img_id, 'full');
    $mediumPath = wp_get_attachment_image_src($img_id, 'medium');
    $largePath = wp_get_attachment_image_src($img_id, 'large');
    return new ImgItem($title, $alt, $fullPath, $mediumPath, $largePath, $description);
}
class Relative {
    static function getRelativeOrderByRating($postId, $relativePostType, $relativeKey):array {
        $postsIds = [];
        $query = new WP_Query( array(
            'posts_per_page' => -1,
            'post_type'    => $relativePostType,
            'post_status'  => 'publish',
            'meta_query' => array(
                'relative' => array(
                    'key'   => '_'.$relativeKey,
                    'value' => $postId,
                ),
                'rating' => array(
                    'key'  => '_rating',
                    'type' => 'NUMERIC'
                )
            ),
            'orderby' => ['rating'=>'DESC']
        ));
        if(!empty($query->posts)) {
            foreach ($query->posts as $item) $postsIds[] = $item->ID;
        }
        return $postsIds;
    }
    static function getRelative($postId, $relativePostType, $relativeKey):array {
        $postsIds = [];
        $query = new WP_Query( array(
            'posts_per_page' => -1,
            'post_type'    => $relativePostType,
            'post_status'  => 'publish',
            'meta_query' => array(
                'relative' => array(
                    'key'   => '_'.$relativeKey,
                    'value' => $postId,
                ),
            )
        ));
        if(!empty($query->posts)) {
            foreach ($query->posts as $item) $postsIds[] = $item->ID;
        }
        return $postsIds;
    }
    static function getPostsFromTax(TaxQuerySettings $settings):array {
        $tax = get_term_by( 'term_taxonomy_id', $settings->taxId, $settings->taxonomy );
        if(!$tax) return [];
        $query = new WP_Query( array(
            'posts_per_page' => $settings->limit,
            'post_type'      => $settings->postType,
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC',
            'post__not_in'    => $settings->executeIds,
            'tax_query' => array(
                array(
                    'taxonomy' => $settings->taxonomy,
                    'field'    => 'slug',
                    'terms'    => $tax->slug
                )
            )
        ) );
        $ids = [];
        foreach ($query->posts as $post) $ids[] = $post->ID;
        return $ids;
    }
}