<?php
const BLOG_POST_TYPE = 'blog';
add_action( 'init', 'register_post_type_blog' );
function register_post_type_blog():void {
    register_post_type( 'blog', [
        'label'  => null,
        'labels' => [
            'name'               => BLOG_POST_TYPE, // основное название для типа записи
            'singular_name'      => BLOG_POST_TYPE, // название для одной записи этого типа
            'add_new'            => 'Добавить Blog', // для добавления новой записи
            'add_new_item'       => 'Добавление Blog', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование Blog', // для редактирования типа записи
            'new_item'           => 'Новый Blog', // текст новой записи
            'view_item'          => 'Смотреть страницу', // для просмотра записи этого типа.
            'search_items'       => 'Искать запись', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Blog', // название меню
        ],
        'description'         => '',
        'public'              => true,
        'show_in_menu'        => null, // показывать ли в меню адмнки
        'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-welcome-write-blog',
        'hierarchical'        => false,
        'supports'            => ['title','thumbnail','excerpt','comments','revisions','page-attributes','post-formats', 'editor'],
        'taxonomies'          => array( 'category' ),
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
}
function blog_custom_fields() {
    add_post_type_support( BLOG_POST_TYPE, 'custom-fields');
}
add_action('init', 'blog_custom_fields');