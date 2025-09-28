<?php
// Theme setup
function digitalproduct_theme_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('woocommerce');
    add_theme_support('custom-logo');
    
    // Register menus
    register_nav_menus(array(
        'primary' => 'Primary Menu',
        'footer' => 'Footer Menu'
    ));
}
add_action('after_setup_theme', 'digitalproduct_theme_setup');

// Enqueue styles and scripts
function digitalproduct_scripts() {
    // Enqueue CSS
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/custom.css');
    
    // Enqueue JavaScript
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'digitalproduct_scripts');

// Custom post type for products
function create_digital_products_cpt() {
    register_post_type('digital_product',
        array(
            'labels' => array(
                'name' => __('Digital Products'),
                'singular_name' => __('Digital Product')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'menu_icon' => 'dashicons-products'
        )
    );
}
add_action('init', 'create_digital_products_cpt');
?>
