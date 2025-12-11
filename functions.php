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
