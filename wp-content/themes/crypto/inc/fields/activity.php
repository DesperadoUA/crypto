<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'activity' );
function activity() {
    Container::make( 'post_meta', 'Activity' )
        ->show_on_post_type([AIRDROP_POST_TYPE])
        ->add_fields( array(
           Field::make( 'multiselect', FIELDS_KEY['ACTIVITY'], 'Активности' )
                ->add_options( array(
                    'TESTNETS' => 'Тестнеты',
                    'CONTENT' => 'Контент',
                    'NFT' => 'NFT',
                    'TRADING' => 'Трейдинг',
                    'OTHER' => 'Другое',
                    'STAKING' => 'Стейкинг',
                    'COMMUNITY' => 'Коммьюнити',
                    'TASKS' => 'Задания',
                    'QUIZ' => 'Квизы',
                    'AIRDROPS' => 'Аирдропы',
                    'AMBASSADORS' => 'Амбассадоры',
                    'MAINNET' => 'Мейннет'
                ) )
        ));
}