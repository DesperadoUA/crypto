<?php
const NEWS_TAX = 'news-tax';
add_action( 'init', 'news_taxonomy_register' );
function news_taxonomy_register():void {
    $labels = array(
        'name'                       => 'News_tax',
        'singular_name'              => 'News tax',
        'menu_name'                  => 'Виды news' ,
        'all_items'                  => 'Все категории news',
        'edit_item'                  => 'Редактировать категорию news',
        'view_item'                  => 'Посмотреть категорию news',
        'update_item'                => 'Сохранить категорию news',
        'add_new_item'               => 'Добавить новую категорию news',
        'new_item_name'              => 'Новая категория news',
        'parent_item'                => 'Родительская категория news',
        'parent_item_colon'          => 'Родительская категория news:',
        'search_items'               => 'Поиск по категориям news',
        'popular_items'              => 'Популярные Метки news',
        'separate_items_with_commas' => 'Список Меток (разделяются запятыми)',
        'choose_from_most_used'      => 'Выбрать Метку',
        'add_or_remove_items'        => 'Добавить или удалить Метку',
        'not_found'                  => 'Меток не найдено',
        'back_to_items'              => 'Назад на страницу рубрик',
    );
    $args = array(
        'labels'                => $labels,
        'label'                 => 'News tax',
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
    register_taxonomy(NEWS_TAX, array(NEWS_POST_TYPE), $args);
}

/*
 * Replace Taxonomy slug with Post Type slug in url
 */

function rewrite_news_category():void {
    $tax = get_taxonomy(NEWS_TAX);
    $tax->show_admin_column = true;
    $tax->rewrite = [];
    $tax->rewrite['slug'] = NEWS_TAX;
    $tax->rewrite['with_front'] = false;
    register_taxonomy(NEWS_TAX, array(NEWS_POST_TYPE), (array)$tax);
}
add_action('init', 'rewrite_news_category', 11);
