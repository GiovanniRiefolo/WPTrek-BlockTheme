<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP Trek FSE
 * @since 1.0.0
 */

/**
 * Theme setup
 */
if (!function_exists('wptrek_setup')) {
    function wptrek_setup()
    {
        // Load theme translated strings
        load_theme_textdomain('wptrek', get_template_directory() . '/languages');

        // Add support for block styles.
        add_theme_support('wp-block-styles');

        // Enqueue editor styles.
        add_editor_style('assets/styles/editor.css');
    }
}
add_action('after_setup_theme', 'wptrek_setup');

/**
 * Enqueue styles and scripts
 */
if (!function_exists('wptrek_styles')) {
    function wptrek_styles()
    {
        // Styles and scripts enqueue
        wp_enqueue_style('wptrek-style', get_theme_file_uri('assets/styles/global.css'), wp_get_theme()->get('Version'));
    }
}
add_action('wp_enqueue_scripts', 'wptrek_styles');

/**
 * Enqueue editor scripts
 */
if (!function_exists('wptrek_editor_enqueue')) {
    function wptrek_editor_enqueue()
    {
        // Custom editor enqueue
        wp_enqueue_script('wptrek-editor', get_theme_file_uri('assets/scripts/editor.js'), array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'));
    }
}
add_action('enqueue_block_editor_assets', 'wptrek_editor_enqueue');


/**
 * Preload the main font of your theme.
 *
 * @package WP Trek FSE
 * @since 1.0.0
 */
if (!function_exists('wptrek_preload_webfonts')) {

    function wptrek_preload_webfonts()
    {
        ?>
        <link rel="preload"
              href="<?= esc_url(get_theme_file_uri('assets/fonts/')); ?>"
              as="font" type="font/woff2" crossorigin>
        <?php
    }
}
add_action('wp_head', 'wptrek_preload_webfonts');

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';