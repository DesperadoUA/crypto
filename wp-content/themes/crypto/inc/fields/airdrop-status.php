<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'airdrop_status' );
function airdrop_status() {
    Container::make( 'post_meta', 'Airdrop status' )
        ->show_on_post_type([AIRDROP_POST_TYPE])
        ->add_fields( array(
           Field::make( 'select', FIELDS_KEY['AIRDROP_STATUS'], 'Статус' )
                ->add_options( array(
                    'NEW'    => 'Новый',
                    'ACTIVE' => 'Активный',
                    'GONE'   => 'Прошедший',
                    'COMING' => 'Предстоящий',
                ) )
        ));
}