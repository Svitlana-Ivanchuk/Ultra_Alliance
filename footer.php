<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ultra
 */

?>

<footer id="colophon" class="site-footer">

    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <div class="footer_logo"></div>

                <div class="footer_text">
                    Ultra Alliancе — страхові продукти. Страхування транспорту. Страхування подорожей. Страхування нерухомості. Страхування здоров'я.
                </div>

            </div>

            <div class="col-md-4">
                <h3>Про нас</h3>
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'menu-2',
                        'menu_id' => 'footer-menu-1',
                    )
                ); ?>
            </div>

            <div class="col-md-4">
                <h3>Контакти</h3>
                <ul class="footer-list">
                    <li class="footer-item">
                        <?php echo do_shortcode('[wbcr_html_snippet id="1800"]'); ?>
                        <a href="mailto:<?php echo get_bloginfo('admin_email'); ?> "><?php echo get_bloginfo('admin_email'); ?> </a>
                    </li>
                    <li class="footer-item">
                        <?php echo do_shortcode('[wbcr_html_snippet id="1802"]'); ?>
                        <a href="tel:<?php echo get_option('admin_phone'); ?> "><?php echo get_option('admin_phone'); ?> </a>
                    </li>
                    <li class="footer-item-1">
                        <h4>Головний офіс</h4>
                        <div class="tophead_addr"><?php echo get_option('main_office'); ?></div>
                    </li>
                    <li class="footer-item-1">
						<h4>Режим роботи </h4>
                        <div class="tophead_work"><?php printf(__('пн-чт 9:00-18:00, пт 9:00-16:45 <br> перерва 13:00-13:45 <br> онлайн 24/7')); ?></div>
                    </li>
                </ul>

            </div>
        </div>

        <div class="row">
            <div class="col-md-5">
                <?php echo do_shortcode('[wbcr_html_snippet id="152"]'); ?>
            </div>
            <div class="col-md-7">
                <?php echo do_shortcode('[wbcr_html_snippet id="126"]'); ?>
            </div>
        </div>


        <div class="site-info">

            <a href="/" target="_blank" style="margin-right: 10px;">Site support by ISvitlana</a>

            &copy; Ultra Alliancе <?php echo date("Y"); ?>. All rights reserved.
        </div>

    </div>
</footer><!-- #colophon -->
<?php get_template_part('template-parts/modal', 'accessibility'); ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>