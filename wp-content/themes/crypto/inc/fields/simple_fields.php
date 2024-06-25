<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
add_action('carbon_fields_register_fields', 'input_fields');
function input_fields() {
    $data = [
        [
            'container_label' => 'Meta title',
            'label' => 'Meta title',
            'post_types' => ALL_POST_TYPES,
            'key' => FIELDS_KEY['META_TITLE'],
            'editor' => 'text',
            'default' => ''
        ],
        [
            'container_label' => 'Meta description',
            'label' => 'Meta description',
            'post_types' => ALL_POST_TYPES,
            'key' => FIELDS_KEY['DESCRIPTION'],
            'editor' => 'text',
            'default' => ''
        ],
        [
            'container_label' => 'Meta keywords',
            'label' => 'Meta keywords',
            'post_types' => ALL_POST_TYPES,
            'key' => FIELDS_KEY['KEYWORDS'],
            'editor' => 'text',
            'default' => ''
        ],
        [
            'container_label' => 'Index',
            'label' => 'Index',
            'post_types' => ALL_POST_TYPES,
            'key' => FIELDS_KEY['INDEX_SEO'],
            'editor' => 'checkbox',
            'default' => true
        ],
        [
            'container_label' => 'Follow',
            'label' => 'Follow',
            'post_types' => ALL_POST_TYPES,
            'key' => FIELDS_KEY['FOLLOW'],
            'editor' => 'checkbox',
            'default' => true
        ],
        [
            'container_label' => 'H1',
            'label' => 'H1',
            'post_types' => ALL_POST_TYPES,
            'key' => FIELDS_KEY['H1'],
            'editor' => 'text',
            'default' => ''
        ],
        [
            'container_label' => 'Ref',
            'label' => 'ref link',
            'post_types' => [GAME_POST_TYPE, AIRDROP_POST_TYPE],
            'key' => FIELDS_KEY['REF'],
            'editor' => 'text',
            'default' => ''
        ],
        [
            'container_label' => 'Bonus',
            'label' => 'bonus',
            'post_types' => [GAME_POST_TYPE, AIRDROP_POST_TYPE],
            'key' => FIELDS_KEY['BONUS'],
            'editor' => 'text',
            'default' => ''
        ],
        [
            'container_label' => 'Rating',
            'label' => 'max 100',
            'post_types' => [AIRDROP_POST_TYPE],
            'key' => FIELDS_KEY['RATING'],
            'editor' => 'text',
            'default' => ''
        ],
        [
            'container_label' => 'Project award',
            'label' => 'Общая награда проекта',
            'post_types' => [AIRDROP_POST_TYPE],
            'key' => FIELDS_KEY['PROJECT_AWARD'],
            'editor' => 'text',
            'default' => ''
        ]
    ];
    foreach ($data as $item) {
        Container::make('post_meta', $item['container_label'])
        ->show_on_post_type($item['post_types'])
        ->add_fields(array(
            Field::make($item['editor'], $item['key'], $item['label'])->set_default_value($item['default'])
        ));
    }

    $categoryFields = [
        [
            'container_label' => 'Meta title',
            'label' => 'Meta title',
            'taxonomies' => ALL_TAXONOMIES,
            'key' => FIELDS_KEY['META_TITLE'],
            'editor' => 'text',
            'default' => ''
        ],
        [
            'container_label' => 'Meta description',
            'label' => 'Meta description',
            'taxonomies' => ALL_TAXONOMIES,
            'key' => FIELDS_KEY['DESCRIPTION'],
            'editor' => 'text',
            'default' => ''
        ],
        [
            'container_label' => 'Meta keywords',
            'label' => 'Meta keywords',
            'taxonomies' => ALL_TAXONOMIES,
            'key' => FIELDS_KEY['KEYWORDS'],
            'editor' => 'text',
            'default' => ''
        ],
        [
            'container_label' => 'Index',
            'label' => 'Index',
            'taxonomies' => ALL_TAXONOMIES,
            'key' => FIELDS_KEY['INDEX_SEO'],
            'editor' => 'checkbox',
            'default' => true
        ],
        [
            'container_label' => 'Follow',
            'label' => 'Follow',
            'taxonomies' => ALL_TAXONOMIES,
            'key' => FIELDS_KEY['FOLLOW'],
            'editor' => 'checkbox',
            'default' => true
        ],
        [
            'container_label' => 'H1',
            'label' => 'H1',
            'taxonomies' => ALL_TAXONOMIES,
            'key' => FIELDS_KEY['H1'],
            'editor' => 'text',
            'default' => ''
        ],
        [
            'container_label' => 'Content',
            'label' => 'Content',
            'taxonomies' => ALL_TAXONOMIES,
            'key' => FIELDS_KEY['CONTENT'],
            'editor' => 'rich_text',
            'default' => ''
        ],
    ];
    foreach ($categoryFields as $item) {
        Container::make('term_meta', $item['container_label'])
        ->show_on_taxonomy($item['taxonomies'])
        ->add_fields(array(
            Field::make($item['editor'], $item['key'], $item['label'])->set_default_value($item['default'])
            )
        );
    }
}