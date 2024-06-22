<?php
const AIRDROP_TAX = 'airdrop-tax';
add_action( 'init', 'airdrop_taxonomy_register' );
function airdrop_taxonomy_register():void {
    $labels = array(
        'name'                       => 'Airdrop_tax',
        'singular_name'              => 'Airdrop tax',
        'menu_name'                  => 'Виды airdrop' ,
        'all_items'                  => 'Все категории airdrop',
        'edit_item'                  => 'Редактировать категорию airdrop',
        'view_item'                  => 'Посмотреть категорию airdrop',
        'update_item'                => 'Сохранить категорию airdrop',
        'add_new_item'               => 'Добавить новую категорию airdrop',
        'new_item_name'              => 'Новая категория airdrop',
        'parent_item'                => 'Родительская категория airdrop',
        'parent_item_colon'          => 'Родительская категория airdrop:',
        'search_items'               => 'Поиск по категориям airdrop',
        'popular_items'              => 'Популярные Метки airdrop',
        'separate_items_with_commas' => 'Список Меток (разделяются запятыми)',
        'choose_from_most_used'      => 'Выбрать Метку',
        'add_or_remove_items'        => 'Добавить или удалить Метку',
        'not_found'                  => 'Меток не найдено',
        'back_to_items'              => 'Назад на страницу рубрик',
    );
    $args = array(
        'labels'                => $labels,
        'label'                 => 'Airdrop tax',
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
    register_taxonomy(AIRDROP_TAX, array(AIRDROP_POST_TYPE), $args);
}

/*
 * Replace Taxonomy slug with Post Type slug in url
 */

function rewrite_airdrop_category():void {
    $tax = get_taxonomy(AIRDROP_TAX);
    $tax->show_admin_column = true;
    $tax->rewrite = [];
    $tax->rewrite['slug'] = 'airdrops';
    $tax->rewrite['with_front'] = false;
    register_taxonomy(AIRDROP_TAX, array(AIRDROP_POST_TYPE), (array)$tax);
}
add_action('init', 'rewrite_airdrop_category', 11);