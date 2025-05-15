<?php
/**
 * Enqueue scripts and styles.
 */
function ultra_scripts()
{

 wp_deregister_script('jquery');
 wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), false, NULL, true);
 wp_enqueue_script('jquery');

 // CSS стилі
 wp_enqueue_style('ultra-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), _S_VERSION);
 wp_enqueue_style('ultra-style', get_stylesheet_uri(), array(), _S_VERSION);
 wp_enqueue_style('ultra-swiper', get_template_directory_uri() . '/css/swiper.css', array(), _S_VERSION);
 wp_enqueue_style('ultra-modal-accessibility', get_template_directory_uri() . '/css/modal-accessibility.css', array(), _S_VERSION);
 wp_enqueue_style('ultra-search', get_template_directory_uri() . '/css/search.css', array(), _S_VERSION);
 wp_enqueue_style('ultra-header', get_template_directory_uri() . '/css/header.css', array(), _S_VERSION);
 wp_enqueue_style('ultra-footer', get_template_directory_uri() . '/css/footer.css', array(), _S_VERSION);
 wp_enqueue_style('ultra-information', get_template_directory_uri() . '/css/information.css', array(), _S_VERSION);
 wp_enqueue_style('ultra-mobile', get_template_directory_uri() . '/css/mobile.css', array(), _S_VERSION);
 wp_enqueue_style('ultra-tablet', get_template_directory_uri() . '/css/tablet.css', array(), _S_VERSION);
 wp_enqueue_style('ultra-desktop', get_template_directory_uri() . '/css/desktop.css', array(), _S_VERSION);
 wp_enqueue_style('ultra-services-page', get_template_directory_uri() . '/css/services-page.css', array(), _S_VERSION);
 wp_enqueue_style('ultra-services-single', get_template_directory_uri() . '/css/service-single.css', array(), _S_VERSION);
 wp_enqueue_style('ultra-products', get_template_directory_uri() . '/css/products.css', array(), _S_VERSION);
 wp_enqueue_style('ultra-product-single', get_template_directory_uri() . '/css/product-single.css', array(), _S_VERSION);
 //    wp_enqueue_style( 'ultra-slider', get_template_directory_uri() . '/css/bootstrap-slider.css', array(), _S_VERSION );
 //    wp_enqueue_style( 'ultra-grid', get_template_directory_uri() . '/css/bootstrap-grid.css', array(), _S_VERSION );

 // JS-скрипти
 wp_enqueue_script('ultra-global', get_template_directory_uri() . '/js/global.js', [], _S_VERSION, true);

 // Локалізація: глобальні дані для всіх скриптів
 wp_localize_script('ultra-global', 'ultraData', [
  'spriteUrl' => get_template_directory_uri() . '/img/sprite.svg',
  'ajaxUrl' => admin_url('admin-ajax.php'),
  'themeUrl' => get_template_directory_uri(),
  'nonce' => wp_create_nonce('ultra_nonce')
 ]);
 wp_enqueue_script('ultra-swiper', get_template_directory_uri() . '/js/swiper.js', array(), _S_VERSION, true);
 wp_enqueue_script('ultra-bootstrap', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), _S_VERSION, true);
 wp_enqueue_script('ultra-isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), _S_VERSION, true);
 wp_enqueue_script('ultra-input', get_template_directory_uri() . '/js/jquery.inputmask.min.js', array(), _S_VERSION, true);
 wp_enqueue_script('ultra-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
 wp_enqueue_script('modal-accessibility.js', get_template_directory_uri() . '/js/modal-accessibility.js', array(), _S_VERSION, true);
 wp_enqueue_script('ultra-product-single.js', get_template_directory_uri() . '/js/product-single.js', array(), _S_VERSION, true);
 //    wp_enqueue_script( 'ultra-slider', get_template_directory_uri() . '/js/bootstrap-slider.min.js', array(), _S_VERSION, true );
 //wp_enqueue_script('search.js', get_template_directory_uri() . '/js/search.js', array(), _S_VERSION, true);

 // Коментарі
 if (is_singular() && comments_open() && get_option('thread_comments')) {
  wp_enqueue_script('comment-reply');
 }
}
add_action('wp_enqueue_scripts', 'ultra_scripts');