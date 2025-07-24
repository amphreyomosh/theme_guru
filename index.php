<?php get_header(); ?>

<main class="main-content">
    <!-- WordPress Loop -->
    <?php if (get_theme_mod('guru_page_title_display', true)) : ?>
        <h1><?php the_title(); ?></h1>
    <?php endif; ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <p><?php the_content(); ?></p>
    <?php endwhile; endif; ?>
</main>
<div class="menu-overlay" id="menuOverlay">
    <div class="magazine-label">THE MAGAZINE</div>
    <div class="menu-content">
        <div class="menu-left">
            <nav>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer-menu',
                    'container' => false,
                    'menu_class' => 'menu-nav'
                ));
                ?>
            </nav>
            <div class="secondary-menu">
                <?php if (is_active_sidebar('secondary-menu')) : ?>
                    <?php dynamic_sidebar('secondary-menu'); ?>
                <?php else : ?>
                    <a href="#mission">OUR MISSION</a>
                    <a href="#process">OUR PROCESS</a>
                    <a href="#team">OUR TEAM</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="menu-right">
            <div class="quote-section">
                <div class="quote">
                    <?php echo get_theme_mod('footer_quote', '"There is a tendency in our planning to confuse the unfamiliar with the improbable."'); ?>
                </div>
                <div class="quote-author">
                    <?php echo get_theme_mod('footer_quote_author', 'THOMAS SCHELLING'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
