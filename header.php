<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header">
    <div class="logo">
        <?php 
        if (has_custom_logo()) {
            the_custom_logo();
        } else {
            echo '<h1>' . get_theme_mod('guru_logo_text', 'LOGO') . '</h1>';
        }
        ?>
    </div>
    <div class="time" id="currentTime">16:07</div>
    <button class="menu-toggle" id="menuToggle">
        <div class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </button>
</header>
