<?php
/**
	* ultra functions and definitions
	*
	* @link https://developer.wordpress.org/themes/basics/theme-functions/
	*
	* @package ultra
	*/

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
	* Sets up theme defaults and registers support for various WordPress features.
	*
	* Note that this function is hooked into the after_setup_theme hook, which
	* runs before the init hook. The init hook is too late for some features, such
	* as indicating support for post thumbnails.
	*/
function ultra_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on ultra, use a find and replace
		* to change 'ultra' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('ultra', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');


	add_image_size('thumb-slide1', 445, 520, true);   // slide1
	add_image_size('thumb-service', 40, 40, true);   // service


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'ultra'),
			'menu-2' => esc_html__('Footer 1', 'ultra'),
			'menu-3' => esc_html__('Footer 2', 'ultra'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'ultra_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
		* Add support for core custom logo.
		*
		* @link https://codex.wordpress.org/Theme_Logo
		*/
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'ultra_setup');

/**
	* Set the content width in pixels, based on the theme's design and stylesheet.
	*
	* Priority 0 to make it available to lower priority callbacks.
	*
	* @global int $content_width
	*/
function ultra_content_width()
{
	$GLOBALS['content_width'] = apply_filters('ultra_content_width', 640);
}
add_action('after_setup_theme', 'ultra_content_width', 0);

/**
	* Register widget area.
	*
	* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	*/
function ultra_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'ultra'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'ultra'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'ultra_widgets_init');

// Include styles and scripts
require get_template_directory() . '/inc/_scripts.php';
/**
	* Implement the Custom Header feature.
	*/
require get_template_directory() . '/inc/custom-header.php';

/**
	* Custom template tags for this theme.
	*/
require get_template_directory() . '/inc/template-tags.php';

/**
	* Functions which enhance the theme by hooking into WordPress.
	*/
require get_template_directory() . '/inc/template-functions.php';

/**
	* Customizer additions.
	*/
require get_template_directory() . '/inc/customizer.php';

/**
	* Load Jetpack compatibility file.
	*/
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

class My_Walker_Nav_Menu extends Walker_Nav_Menu
{


	public function start_lvl(&$output, $depth = 0, $args = array())
	{
		if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat($t, $depth);

		$classes = array('sub-menu');
		$class_names = implode(' ', apply_filters('nav_menu_submenu_css_class', $classes, $args, $depth));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

		if (0 == $depth) {
			$output .= '<div class="sub-menu-wrapper"><div class="container">';
		}

		$output .= "{$n}{$indent}<ul$class_names>{$n}";
	}

	public function end_lvl(&$output, $depth = 0, $args = array())
	{
		if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat($t, $depth);
		$output .= "$indent</ul>{$n}";

		if (0 == $depth) {
			$output .= '</div></div><!-- .sub-menu-wrapper -->';
		}
	}


	public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
	{
		$output .= "<li class='" . implode(" ", $item->classes) . "'>";

		if ($item->url && $item->url != '#') {
			$output .= '<a href="' . $item->url . '">';
		} else {
			$output .= '<span>';
		}

		$output .= $item->title;

		if ($item->url && $item->url != '#') {
			$output .= '</a>';
		} else {
			$output .= '</span>';
		}
	}

	public function end_el(&$output, $item, $depth = 0, $args = array())
	{
		$output .= "</li>\n";
	}

}

add_filter('get_the_archive_title', function ($title) {
	if (is_category()) {
		$title = single_cat_title('', false);
	} elseif (is_tag()) {
		$title = single_tag_title('', false);
	} elseif (is_author()) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif (is_tax()) { //for custom post types
		$title = sprintf(__('%1$s'), single_term_title('', false));
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
	}
	return $title;
});

$new_general_setting = new new_general_setting();

class new_general_setting
{
	function new_general_setting()
	{
		add_filter('admin_init', array(&$this, 'register_fields'));
	}
	function register_fields()
	{
		register_setting('general', 'admin_phone', 'esc_attr');
		add_settings_field('adm_phone', '<label for="admin_phone">' . __('Телефон', 'admin_phone') . '</label>', array(&$this, 'fields_html'), 'general');

		register_setting('general', 'main_office', 'esc_attr');
		add_settings_field('main_off', '<label for="main_office">' . __('Головний офіс', 'main_office') . '</label>', array(&$this, 'fields_addr'), 'general');
	}
	function fields_html()
	{
		$value = get_option('admin_phone', '');
		echo '<input type="text" id="admin_phone" name="admin_phone" value="' . $value . '" class="regular-text code" />';
	}
	function fields_addr()
	{
		$value_2 = get_option('main_office', '');
		echo '<input type="text" id="main_office" name="main_office" value="' . $value_2 . '" class="regular-text code" />';
	}

}
add_action('pre_get_posts', 'main_query_without_subcategory_posts');

function main_query_without_subcategory_posts($query)
{

	if (!is_admin() && $query->is_main_query()) {
		if (is_category()) {
			$current_category = get_queried_object();
			$current_cat_id = $current_category->term_id;
			$cat_args = array('parent' => $current_category->term_id, 'child_of' => $current_category->term_id, );
			$subcategories = get_categories($cat_args);
			$subcat_id = array();
			foreach ($subcategories as $subcategory) {
				$subcat_id[] = " -" . $subcategory->term_id;
			}

			$excludesubcatlist = join(',', $subcat_id);

			$query->set('posts_per_page', '5');
			$query->set('cat', '' . $current_cat_id . ',' . $excludesubcatlist . '');
		}
	}
}



/* Start Добавление пункта настройки сайта */
require_once get_stylesheet_directory() . '/inc/site_properties.php';


require get_template_directory() . '/inc/post-types.php';