<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'lang_translate' );
function lang_translate() {
    $hreflangConfig = [
        'ru' => 'ru',
        'uk' => 'uk',
    ];
    Container::make( 'post_meta', 'Lang translate' )
        ->show_on_post_type(ALL_POST_TYPES)
        ->add_fields( array(
             Field::make( 'complex', FIELDS_KEY['LANG_TRANSLATE'], 'Lang translate')
                  ->add_fields( array(
                        Field::make( 'select', 'hreflang', 'hreflang' )
                                        ->add_options($hreflangConfig)->set_width( 50 ),
                        Field::make('text', 'link', 'Link on post')->set_width( 50 ),
                     )
                  ),
        ));
}