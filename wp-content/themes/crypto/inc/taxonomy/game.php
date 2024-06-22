<?php
const GAME_TAX = 'game-tax';
add_action( 'init', 'game_taxonomy_register' );
function game_taxonomy_register():void {
    $labels = array(
        'name'                       => 'Game_tax',
        'singular_name'              => 'Game tax',
        'menu_name'                  => 'Виды игр' ,
        'all_items'                  => 'Все категории игр',
        'edit_item'                  => 'Редактировать категорию игр',
        'view_item'                  => 'Посмотреть категорию игр',
        'update_item'                => 'Сохранить категорию игр',
        'add_new_item'               => 'Добавить новую категорию игр',
        'new_item_name'              => 'Новая категория игр',
        'parent_item'                => 'Родительская категория игр',
        'parent_item_colon'          => 'Родительская категория игр:',
        'search_items'               => 'Поиск по категориям игр',
        'popular_items'              => 'Популярные Метки игр',
        'separate_items_with_commas' => 'Список Меток (разделяются запятыми)',
        'choose_from_most_used'      => 'Выбрать Метку',
        'add_or_remove_items'        => 'Добавить или удалить Метку',
        'not_found'                  => 'Меток не найдено',
        'back_to_items'              => 'Назад на страницу рубрик',
    );
    $args = array(
        'labels'                => $labels,
        'label'                 => 'Game tax',
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
    register_taxonomy(GAME_TAX, array(GAME_POST_TYPE), $args);
}

/*
 * Replace Taxonomy slug with Post Type slug in url
 */

function rewrite_game_category():void {
    $tax = get_taxonomy(GAME_TAX);
    $tax->show_admin_column = true;
    $tax->rewrite = [];
    $tax->rewrite['slug'] = 'games';
    $tax->rewrite['with_front'] = false;
    register_taxonomy(GAME_TAX, array(GAME_POST_TYPE), (array)$tax);
}
add_action('init', 'rewrite_game_category', 11);