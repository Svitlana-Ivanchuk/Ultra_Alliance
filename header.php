<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ultra
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preload" href="https://ultra-alliance.local/wp-content/themes/ultra/fonts" as="font" type="font/woff2" crossorigin="anonymous">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="page" class="site">
        <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        <div class="tophead_line">
            <div class="container">
                <!--<div class="tophead_lang"><?php do_action('wpml_add_language_selector'); ?></div>-->

                <div class="tophead_item">
                    <div>
                        <?php echo do_shortcode('[wbcr_html_snippet id="1800"]'); ?>
                        <a href="mailto:<?php echo get_bloginfo('admin_email'); ?> "><?php echo get_bloginfo('admin_email'); ?> </a>

                    </div>
                    <div>
                        <?php echo do_shortcode('[wbcr_html_snippet id="1802"]'); ?>
                        <a href="tel:<?php echo get_option('admin_phone'); ?> "><?php echo get_option('admin_phone'); ?> </a>
                    </div>

                </div>

                <div class="tophead_item">

                    <?php echo do_shortcode('[wbcr_html_snippet id="2211"]'); ?>

                </div>


                <div class="tophead_item">
                    <?php echo do_shortcode('[wbcr_html_snippet id="126"]'); ?>
                </div>



            </div>
        </div>

        <header id="masthead" class="site-header">

            <div class="topbottom_line">
                <div class="container">

                    <div class="topbottom_logo">
                        <div class="site-branding">
                            <?php the_custom_logo(); ?>
                        </div>
                    </div>

                    <div class="topbottom_menu gx-1">
                        <nav id="site-navigation" class="main-navigation">
                            <?php wp_nav_menu(
                                array(
                                    'walker' => new My_Walker_Nav_Menu(),
                                    'theme_location' => 'menu-1',
                                    'menu_id' => 'primary-menu',
                                )
                            ); ?>
                        </nav><!-- #site-navigation -->
                    </div>

                    <?php get_template_part('template-parts/search', 'form'); ?>


                </div>
            </div>

        </header><!-- #masthead -->