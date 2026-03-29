<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

define( 'MIKAEL_THEME_DIRECTORY', trailingslashit( get_template_directory_uri() ) );
define( 'MIKAEL_REQUIRE_DIRECTORY', trailingslashit( get_template_directory() ) );
define( 'MIKAEL_DEVELOPMENT', false );

/**
 * After setup theme
 */
if ( ! function_exists( 'mikael_setup' ) ) {
	function mikael_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Ducky, use a find and replace
		 * to change 'mikael' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mikael', get_template_directory() . '/languages' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1920, 9999 );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'post-formats', array(
			'gallery',
			'link',
			'quote',
			'video',
			'audio'
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name' => esc_html__( 'Small', 'mikael' ),
					'shortName' => esc_html__( 'S', 'mikael' ),
					'size' => 14,
					'slug' => 'small',
				),
				array(
					'name' => esc_html__( 'Normal', 'mikael' ),
					'shortName' => esc_html__( 'M', 'mikael' ),
					'size' => 16,
					'slug' => 'normal',
				),
				array(
					'name' => esc_html__( 'Large', 'mikael' ),
					'shortName' => esc_html__( 'L', 'mikael' ),
					'size' => 28,
					'slug' => 'large',
				),
				array(
					'name' => esc_html__( 'Huge', 'mikael' ),
					'shortName' => esc_html__( 'XL', 'mikael' ),
					'size' => 38,
					'slug' => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => esc_html__( 'First', 'mikael' ),
				'slug' => 'first',
				'color' => mikael_get_theme_mod( 'accent_color' ),
			),
			array(
				'name' => esc_html__( 'White', 'mikael' ),
				'slug' => 'white',
				'color' => '#ffffff',
			)
		) );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Gutenberg
		add_theme_support( 'align-wide' );

		// register nav menus
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary Menu', 'mikael' ),
			'onepage-menu' => esc_html__( 'Onepage Menu', 'mikael' ),
			'navbar-menu' => esc_html__( 'Navbar Menu', 'mikael' ),
		) );

		// 800x600
		add_image_size( 'mikael-800x600_crop', 800, 600, true );
		add_image_size( 'mikael-800x600', 800 );

		// 1280x720
		add_image_size( 'mikael-1280x720_crop', 1280, 720, true );
		add_image_size( 'mikael-1280x720', 1280 );

		// 1920x1080
		add_image_size( 'mikael-1920x1080_crop', 1920, 1080, true );
		add_image_size( 'mikael-1920x1080', 1920 );

	}
}
add_action( 'after_setup_theme', 'mikael_setup' );

/**
 * Content width
 */
if ( ! function_exists( 'mikael_content_width' ) ) {
	function mikael_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'mikael/content_width', 1140 );
	}
}
add_action( 'after_setup_theme', 'mikael_content_width', 0 );

/**
 * Import ACF fields
 */
if ( ! MIKAEL_DEVELOPMENT ) {
	function mikael_acf_show_admin_panel() {
		return apply_filters( 'mikael/acf_show_admin_panel', false );
	}
	add_filter( 'acf/settings/show_admin', 'mikael_acf_show_admin_panel' );
}

if ( ! MIKAEL_DEVELOPMENT ) {
	require_once MIKAEL_REQUIRE_DIRECTORY . 'inc/helper/custom-fields/custom-fields.php';
}

if ( ! function_exists( 'mikael_acf_save_json' ) ) {
	function mikael_acf_save_json( $path ) {
		$path = MIKAEL_REQUIRE_DIRECTORY . 'inc/helper/custom-fields';
		return $path;
	}
}
add_filter( 'acf/settings/save_json', 'mikael_acf_save_json' );

if ( MIKAEL_DEVELOPMENT ) {
	if ( ! function_exists( 'mikael_acf_load_json' ) ) {
		function mikael_acf_load_json( $paths ) {
			unset( $paths[0] );
			$paths[] = MIKAEL_REQUIRE_DIRECTORY . 'inc/helper/custom-fields';
			return $paths;
		}
	}
	add_filter( 'acf/settings/load_json', 'mikael_acf_load_json' );
}

/**
 * Include Kirki fields
 */
require_once MIKAEL_REQUIRE_DIRECTORY . 'inc/framework/customizer-helper.php';
require_once MIKAEL_REQUIRE_DIRECTORY . 'inc/framework/customizer.php';
require_once MIKAEL_REQUIRE_DIRECTORY . 'inc/framework/customizer-dynamic-css.php';

/**
 * Required files
 */
$mikael_theme_includes = array(
	'required-plugins',
	'enqueue',
	'includes',
	'demo-import',
	'functions',
	'actions',
	'filters',
	'portfolio',
	'menus'
);

foreach ( $mikael_theme_includes as $file ) {
	require_once MIKAEL_REQUIRE_DIRECTORY . 'inc/theme-' . $file . '.php';
}

// Unset the global variable.
unset( $mikael_theme_includes );