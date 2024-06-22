<?php
const BLOG_TAX = 'blog-tax';
add_action( 'init', 'blog_taxonomy_register' );
function blog_taxonomy_register():void {
    $labels = array(
        'name'                       => 'Blog_tax',
        'singular_name'              => 'Blog tax',
        'menu_name'                  => 'Виды blog' ,
        'all_items'                  => 'Все категории blog',
        'edit_item'                  => 'Редактировать категорию blog',
        'view_item'                  => 'Посмотреть категорию blog',
        'update_item'                => 'Сохранить категорию blog',
        'add_new_item'               => 'Добавить новую категорию blog',
        'new_item_name'              => 'Новая категория blog',
        'parent_item'                => 'Родительская категория blog',
        'parent_item_colon'          => 'Родительская категория blog:',
        'search_items'               => 'Поиск по категориям blog',
        'popular_items'              => 'Популярные Метки blog',
        'separate_items_with_commas' => 'Список Меток (разделяются запятыми)',
        'choose_from_most_used'      => 'Выбрать Метку',
        'add_or_remove_items'        => 'Добавить или удалить Метку',
        'not_found'                  => 'Меток не найдено',
        'back_to_items'              => 'Назад на страницу рубрик',
    );
    $args = array(
        'labels'                => $labels,
        'label'                 => 'Blog tax',
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_rest'          => false,
        'rest_base'             => 'url_rest',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
        'show_tagcloud'         => true,
        'show_in_quick_edit'    => true,
        'meta_box_cb'           => null,
        'show_admin_column'     => true,
        'description'           => '',
        'hierarchical'          => true,
        'update_count_callback' => '',
        'query_var'             => false,
        'rewrite'               => true,
        'sort'                  => true,
        '_builtin'              => false,
    );
    register_taxonomy(BLOG_TAX, array(BLOG_POST_TYPE), $args);
}

/*
 * Replace Taxonomy slug with Post Type slug in url
 */

function rewrite_blog_category():void {
    $tax = get_taxonomy(BLOG_TAX);
    $tax->show_admin_column = true;
    $tax->rewrite = [];
    $tax->rewrite['slug'] = 'articles';
    $tax->rewrite['with_front'] = false;
    register_taxonomy(BLOG_TAX, array(BLOG_POST_TYPE), (array)$tax);
}
add_action('init', 'rewrite_blog_category', 11);