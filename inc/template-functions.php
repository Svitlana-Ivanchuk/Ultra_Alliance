<?php
/**
	* Functions which enhance the theme by hooking into WordPress
	*
	* @package ultra
	*/

/**
	* Adds custom classes to the array of body classes.
	*
	* @param array $classes Classes for the body element.
	* @return array
	*/
function ultra_body_classes($classes)
{
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar('sidebar-1')) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter('body_class', 'ultra_body_classes');

/**
	* Add a pingback url auto-discovery header for single posts, pages, or attachments.
	*/
function ultra_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('wp_head', 'ultra_pingback_header');


function ultra_preload_fonts()
{
	?>
	<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/fonts" as="font" type="font/woff2" crossorigin="anonymous">
	<?php
}
add_action('wp_head', 'ultra_preload_fonts');