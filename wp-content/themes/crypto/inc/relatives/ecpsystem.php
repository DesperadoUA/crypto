<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'relative_ecosystem' );
function relative_ecosystem():void {
    $arrPostTypes = [GAME_POST_TYPE, AIRDROP_POST_TYPE];
    $posts = get_posts( array(
        'numberposts' => -1,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'include'     => array(),
        'exclude'     => array(),
        'meta_key'    => '',
        'meta_value'  => '',
        'post_type'   => ECOSYSTEM_POST_TYPE,
        'suppress_filters' => true,
        ) );

        $data = [];
        foreach ($posts as $item) $data[$item->ID] = $item->post_title;

        Container::make( 'post_meta', __( 'Relative Ecosystem' ) )
            ->show_on_post_type($arrPostTypes)
            ->add_fields(array(
                Field::make('multiselect', FIELDS_KEY['RELATIVE_ECOSYSTEM'], 'Список экосистем')
                    ->add_options($data)
        ));
}