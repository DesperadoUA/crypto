<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_settings' );
function crb_attach_theme_settings():void {
    Container::make( 'theme_options', __( 'Settings' ) )
        ->add_fields(array(
            Field::make('text', SETTINGS_KEYS['FOOTER_TEXT'], 'Footer text'),
        ));
}