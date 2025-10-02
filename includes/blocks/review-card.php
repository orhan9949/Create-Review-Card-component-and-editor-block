<?php

/**
 * Review Card.
 */

namespace Base\Blocks;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Review_Card {
    /**
     * Constructor.
     */
    public function __construct() {
        add_action( 'acf/init', [ $this, 'register_block' ] );
        add_action( 'acf/init', [ $this, 'register_custom_fields' ] );
    }

    /**
     * Register block.
     */
    public function register_block() {
        if( ! function_exists( 'acf_register_block_type' ) ) {
            return;
        }

        acf_register_block_type([
            'name'              => 'review-card',
            'title'             => __( 'CN Review Card Options', 'base' ),
            'description'       => __( 'Review Card Options.', 'base' ),
            'render_template'   => 'template-parts/blocks/review-card.php',
            'post_types'        => [ 'post', 'page' ],
            'category'          => 'blocks',
            'icon'              => 'media-spreadsheet',
            'keywords'          => [ 'review', 'card' ],
            'mode'              => 'auto',
        ]);
    }

    /**
     * Register block custom fields.
     */
    public function register_custom_fields() {
        acf_add_local_field_group( [
            'key'                    => 'group_review_card_options',
            'title'                  => __( 'Review Card', 'base' ),
            'fields'                 => [
                [
                    'key'           => 'field_review_card_cover_image',
                    'label'         => __( 'Cover image', 'base' ),
                    'name'          => 'review_card_cover_image',
                    'type'          => 'image',
                    'return_format' => 'url',
                ],
                [
                    'key'           => 'field_review_card_rank',
                    'label'         => __( 'Rank', 'base' ),
                    'name'          => 'review_card_rank',
                    'type'          => 'number',
                    'default_value' => 0,
                    'min'           => 0,
                    'step'          => 1,
                ],
                [
                    'key'       => 'field_review_card_name',
                    'label'     => __( 'Name', 'base' ),
                    'name'      => 'review_card_name',
                    'type'      => 'text',
                    'required'  => 1,
                ],
                [
                    'key'           => 'field_review_card_star_rating',
                    'label'         => __( 'Star rating', 'base' ),
                    'name'          => 'review_card_star_rating',
                    'type'          => 'number',
                    'default_value' => 0,
                    'min'           => 0,
                    'max'           => 5,
                    'step'          => 1,
                ],
                [
                    'key'           => 'field_review_card_badge',
                    'label'         => __( 'Badge', 'base' ),
                    'name'          => 'review_card_badge',
                    'type'          => 'select',
                    'choices'       => [
                        'top'       => __( 'Top', 'base' ),
                        'sponsored' => __( 'Sponsored', 'base' ),
                    ],
                    'return_format' => 'array',
                    'allow_null'    => 1,
                    'ui'            => 1,
                ],
                [
                    'key'       => 'field_review_card_description',
                    'label'     => __( 'Short description', 'base' ),
                    'name'      => 'review_card_description',
                    'type'      => 'textarea',
                    'required'  => 1,
                ],
                [
                    'key'   => 'field_review_card_link',
                    'label' => __( 'Link', 'base' ),
                    'name'  => 'review_card_link',
                    'type'  => 'link',
                ],
                [
                    'key'           => 'field_review_card_features',
                    'label'         => __( 'Features', 'base' ),
                    'name'          => 'review_card_features',
                    'type'          => 'repeater',
                    'sub_fields'    => [
                        [
                            'key'   => 'field_label',
                            'label' => __( 'Label', 'base' ),
                            'name'  => 'label',
                            'type'  => 'text',
                        ],
                        [
                            'key'   => 'field_value',
                            'label' => __( 'Value', 'base' ),
                            'name'  => 'value',
                            'type'  => 'text',
                        ],
                    ],
                ],
                [
                    'key'           => 'field_review_card_logotype',
                    'label'         => __( 'Logotype', 'base' ),
                    'name'          => 'review_card_logotype',
                    'type'          => 'image',
                    'required'      => 1,
                    'return_format' => 'url',
                ],
                [
                    'key'           => 'field_review_card_pros',
                    'label'         => __( 'Pros', 'base' ),
                    'name'          => 'review_card_pros',
                    'type'          => 'repeater',
                    'sub_fields'    => [
                        [
                            'key'   => 'field_value',
                            'label' => __( 'Value', 'base' ),
                            'name'  => 'value',
                            'type'  => 'text',
                        ],
                    ],
                ],
                [
                    'key'           => 'field_review_card_cons',
                    'label'         => __( 'Cons', 'base' ),
                    'name'          => 'review_card_cons',
                    'type'          => 'repeater',
                    'sub_fields'    => [
                        [
                            'key'   => 'field_value',
                            'label' => __( 'Value', 'base' ),
                            'name'  => 'value',
                            'type'  => 'text',
                        ],
                    ],
                ],
                [
                    'key'       => 'field_review_card_full_description',
                    'label'     => __( 'Full Description', 'base' ),
                    'name'      => 'review_card_full_description',
                    'type'      => 'textarea',
                    'new_lines' => 'wpautop'
                ],
            ],
            'label_placement'       => 'top',
            'instruction_placement' => 'field',
            'location'              => [
                [
                    [
                        'param'     => 'block',
                        'operator'  => '==',
                        'value'     => 'acf/review-card',
                    ]
                ],
            ],
        ] );
    }
}

new Review_Card;