<?php
/**
 * The template for displaying the footer
 *
 * @package Goodcolors
 */
?>

<footer class="footer">
    <div class="footer-top">
        <?php if (is_active_sidebar('footer-top')) : ?>
            <?php dynamic_sidebar('footer-top'); ?>
        <?php else : ?>
            <div class="footer-quote">
                <h2>THIS IS THE FOOTER, ON MY FIRST THEME</h2>
            </div>
            <div class="newsletter">
                <div class="newsletter-input">
                    <input type="email" placeholder="enter your email address ...">
                    <span class="submit-arrow">→</span>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="footer-content">
        <?php if (is_active_sidebar('footer-bottom')) : ?>
            <?php dynamic_sidebar('footer-bottom'); ?>
        <?php else : ?>
            <div class="footer-section">
                <h3>HARMO</h3>
                <div class="address">
                    5 Nairobi<br>
                    45454
                </div>
            </div>

            <div class="footer-section">
                <nav class="footer-nav">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">HOME</a>
                    <a href="#">PROJECTS</a>
                    <a href="#">MEMBERS</a>
                </nav>
            </div>

            <div class="footer-section">
                <nav class="footer-nav">
                    <a href="#">OUR MISSION</a>
                    <a href="#">OUR PROCESS</a>
                    <a href="#">OUR TEAM</a>
                </nav>
            </div>

            <div class="footer-section">
                <nav class="footer-nav">
                    <a href="#">MAGAZINE</a>
                    <a href="mailto:info@helena.org">@harmo@gmail.com</a>
                    <a href="mailto:press@helena.org">@harmo@gmail.com</a>
                </nav>
            </div>
        <?php endif; ?>
    </div>

    <div class="footer-bottom">
        <div class="copyright">©<?php echo date("Y"); ?> harmo@gmail.com</div>
        <div class="social-links">
            <a href="#">INSTAGRAM</a>
            <span>•</span>
            <a href="#">TWITTER</a>
            <span>•</span>
            <a href="#">LINKEDIN</a>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
