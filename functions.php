<?php
function guru_enqueue_assets() {
    wp_enqueue_style('guru-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', false);
    wp_enqueue_style('guru-style', get_template_directory_uri() . '/assets/css/menu.css', array(), '1.0');
    wp_enqueue_script('guru-script', get_template_directory_uri() . '/assets/js/menu.js', array(), '1.0', true);
    wp_enqueue_style('footer-style', get_template_directory_uri() . '/assets/css/footer.css', array(), '1.0');
}
add_action('wp_enqueue_scripts', 'guru_enqueue_assets');

// Register a new menu location for the footer
function register_footer_menu() {
    register_nav_menu('footer-menu', __('Footer Menu'));
}
add_action('init', 'register_footer_menu');

// Add theme support for custom logo
add_theme_support('custom-logo');

// Add Customizer settings for logo
function guru_customize_register($wp_customize) {
    // Add setting for logo image
    $wp_customize->add_setting('guru_logo', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Add control for logo image
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'guru_logo', array(
        'label' => __('Logo Image', 'guru'),
        'section' => 'title_tagline',
        'settings' => 'guru_logo',
    )));

    // Add setting for logo text
    $wp_customize->add_setting('guru_logo_text', array(
        'default' => 'LOGO',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Add control for logo text
    $wp_customize->add_control('guru_logo_text', array(
        'label' => __('Logo Text', 'guru'),
        'section' => 'title_tagline',
        'type' => 'text',
    ));
}
add_action('customize_register', 'guru_customize_register');

// Add Customizer setting for custom JavaScript
function guru_customize_register_custom_js($wp_customize) {
    $wp_customize->add_section('guru_custom_js_section', array(
        'title' => __('Custom JavaScript', 'guru'),
        'priority' => 160,
    ));

    $wp_customize->add_setting('guru_custom_js', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('guru_custom_js', array(
        'label' => __('Add your custom JavaScript here', 'guru'),
        'section' => 'guru_custom_js_section',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'guru_customize_register_custom_js');

// Add Customizer setting for page title display
function guru_customize_register_page_title($wp_customize) {
    $wp_customize->add_section('guru_page_title_section', array(
        'title' => __('Page Title Display', 'guru'),
        'priority' => 160,
    ));

    $wp_customize->add_setting('guru_page_title_display', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('guru_page_title_display', array(
        'label' => __('Display Page Title', 'guru'),
        'section' => 'guru_page_title_section',
        'type' => 'checkbox',
    ));
}
add_action('customize_register', 'guru_customize_register_page_title');

// Enqueue custom JavaScript
function guru_enqueue_custom_js() {
    $custom_js = get_theme_mod('guru_custom_js');
    if ($custom_js) {
        wp_add_inline_script('guru-script', $custom_js);
    }
}
add_action('wp_enqueue_scripts', 'guru_enqueue_custom_js');

// Register widget area for secondary menu
function guru_widgets_init() {
    register_sidebar(array(
        'name' => __('Secondary Menu', 'guru'),
        'id' => 'secondary-menu',
        'description' => __('Add widgets here to appear in your footer secondary menu.', 'guru'),
        'before_widget' => '<div class="secondary-menu-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'guru_widgets_init');

// Register widget areas for footer sections
function guru_footer_widgets_init() {
    register_sidebar(array(
        'name' => __('Footer Top', 'guru'),
        'id' => 'footer-top',
        'description' => __('Add widgets here to appear in the top section of the footer.', 'guru'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Footer Bottom', 'guru'),
        'id' => 'footer-bottom',
        'description' => __('Add widgets here to appear in the bottom section of the footer.', 'guru'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'guru_footer_widgets_init');
