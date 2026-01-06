<?php
/**
 * Mycobio Bricks Child Theme functions
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * 1. Assets
 */
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style(
        'mycobio-bricks-child',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get( 'Version' )
    );
}, 20);

/**
 * 2. ACF JSON
 */
add_filter( 'acf/settings/save_json', function( $path ) {
    return get_stylesheet_directory() . '/acf-json';
} );

add_filter( 'acf/settings/load_json', function( $paths ) {
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
} );

/**
 * 3. FIX FRAMES / BRICKS ALLOWED TAGS (Bricks 1.10.3+)
 */
add_filter( 'bricks/allowed_html_tags', function( $allowed_html_tags ) {

    // Tags commonly needed by Woo/Frames templates
    $additional_tags = [
        'form',
        'input',
        'select',
        'option',
        'textarea',
        'button',
        'label',
    ];

    // Add any missing tags without duplicating
    foreach ( $additional_tags as $tag ) {
        if ( ! in_array( $tag, $allowed_html_tags, true ) ) {
            $allowed_html_tags[] = $tag;
        }
    }

    return $allowed_html_tags;
} );

