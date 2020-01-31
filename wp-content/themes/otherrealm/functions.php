<?php
/**
 * otherrealm functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package otherrealm
 */
function get_attachment_url_by_slug($slug) {
	$args = array(
	  'post_type' => 'attachment',
	  'name' => sanitize_title($slug),
	  'posts_per_page' => 1,
	  'post_status' => 'inherit',
	);
	$_header = get_posts($args);
	$header = $_header ? array_pop($_header) : null;
	return $header ? wp_get_attachment_url($header->ID) : '';
}
class OtherWalks extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$title = $item->title;
		$permalink = $item->url;
		$slug = $item->slug;
		//'<img class="menuImg" src="' . get_attachment_url_by_slug('internet') . '">'
		$output .= "<li class='" . implode(" ", $item->classes) . "'>";
		//Add SPAN if no Permalink
		if ($permalink && $permalink != '#') {
			$output .= '<a href="' . $permalink . '">';
		} else {
			$output .= '<span>';
		}
		if ($depth == 0) {
			$output .= '<img class="menuImg" src="' . get_site_url() . '/wp-content/uploads/' . $title . '.png">';
		}
		$output .= $title;
//		$output.="<pre>".$item->ID. var_dump(get_attached_media('',$item->ID))."</pre>";
		if ($permalink && $permalink != '#') {
			$output .= '</a>';
		} else {
			$output .= '</span>';
		}
	}
}
if (!function_exists('otherrealm_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function otherrealm_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on otherrealm, use a find and replace
		 * to change 'otherrealm' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('otherrealm', get_template_directory() . '/languages');
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

// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
		  'menu-1' => esc_html__('Primary', 'otherrealm'),
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
		  'search-form',
		  'comment-form',
		  'comment-list',
		  'gallery',
		  'caption',
		));

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('otherrealm_custom_background_args', array(
		  'default-color' => 'ffffff',
		  'default-image' => '',
		)));

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');
		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support('custom-logo', array(
		  'height' => 250,
		  'width' => 250,
		  'flex-width' => true,
		  'flex-height' => true,
		));
	}
endif;
add_action('after_setup_theme', 'otherrealm_setup');
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function otherrealm_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('otherrealm_content_width', 640);
}
add_action('after_setup_theme', 'otherrealm_content_width', 0);
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function otherrealm_widgets_init() {
	register_sidebar(array(
	  'name' => esc_html__('Sidebar', 'otherrealm'),
	  'id' => 'sidebar-1',
	  'description' => esc_html__('Add widgets here.', 'otherrealm'),
	  'before_widget' => '<section id="%1$s" class="widget %2$s">',
	  'after_widget' => '</section>',
	  'before_title' => '<h2 title="about" class="sidebartitle">',
	  'after_title' => '</h2>',
	));
}
add_action('widgets_init', 'otherrealm_widgets_init');
/**
 * Enqueue scripts and styles.
 */
function otherrealm_scripts() {
	wp_enqueue_style('otherrealm-style', get_stylesheet_uri());
	wp_enqueue_style('otherrealm-main', get_template_directory_uri() . '/layouts/otherrealm.css');
	wp_enqueue_style('otherrealm-menu', get_template_directory_uri() . '/layouts/menu.css');
	wp_enqueue_script('jquery-3.4.1.min', get_template_directory_uri() . '/js/jquery-3.4.1.min.js', array('jquery'), '20200127', true);
	wp_enqueue_script('otherrealm-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);
	wp_enqueue_script('otherrealm-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);
	wp_enqueue_script('otherrealmFunctions', get_template_directory_uri() . '/js/otherrealmFunctions.js', array('jquery'), '20200127', true);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'otherrealm_scripts');

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