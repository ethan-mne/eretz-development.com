<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

/**
* Theme path image
*/
$theme_path_images = MIKAEL_THEME_DIRECTORY . 'assets/img/';

/**
 * Wrapper for Kirki
 */
if ( ! class_exists( 'VLT_Options' ) ) {
	class VLT_Options {

		private static $default_options = array();

		public static function add_config( $args ) {
			if ( class_exists( 'Kirki' ) && isset( $args ) && is_array( $args ) ) {
				Kirki::add_config( 'mikael_customize', $args );
			}
		}

		public static function add_panel( $name, $args ) {
			if ( class_exists( 'Kirki' ) && isset( $args ) && is_array( $args ) ) {
				Kirki::add_panel( $name, $args );
			}
		}

		public static function add_section( $name, $args ) {
			if ( class_exists( 'Kirki' ) && isset( $args ) && is_array( $args ) ) {
				Kirki::add_section( $name, $args );
			}
		}

		public static function add_field( $args ) {
			if ( isset( $args ) && is_array( $args ) ) {
				if ( class_exists( 'Kirki' ) ) {
					Kirki::add_field( 'mikael_customize', $args );
				}
				if ( isset( $args['settings'] ) && isset( $args['default'] ) ) {
					self::$default_options[$args['settings']] = $args['default'];
				}
			}
		}

		public static function get_option( $name, $default = null ) {
			$value = get_theme_mod( $name, null );

			if ( $value === null ) {
				$value = isset( self::$default_options[$name] ) ? self::$default_options[$name] : null;
			}

			if ( $value === null ) {
				$value = $default;
			}

			return $value;
		}

	}
}

/**
 * Custom get_theme_mod
 */
if ( ! function_exists( 'mikael_get_theme_mod' ) ) {
	function mikael_get_theme_mod( $name = null, $use_acf = null, $postID = null, $acf_name = null ) {

		$value = null;

		if ( $name == null ) {
			return $value;
		}

		// try get value from meta box
		if ( $use_acf ) {
			$value = mikael_get_field( $acf_name ? $acf_name : $name, $postID );
		}

		// get value from options
		if ( $value == null ) {
			if ( class_exists( 'VLT_Options' ) ) {
				$value = VLT_Options::get_option( $name );
			}
		}

		if ( is_archive() || is_search() || is_404() ) {
			if ( class_exists( 'VLT_Options' ) ) {
				$value = VLT_Options::get_option( $name );
			}
		}

		$value = apply_filters( 'mikael/get_theme_mod', $value, $name );

		return $value;

	}
}

/**
 * Fix post ID preview
 * https://support.advancedcustomfields.com/forums/topic/preview-solution/page/3/
 */
if ( ! function_exists( 'mikael_fix_post_id_on_preview' ) ) {
	function mikael_fix_post_id_on_preview( $null, $postID ) {
		if ( is_preview() ) {
			return get_the_ID();
		}
		else {
			$acfPostID = isset( $postID->ID ) ? $postID->ID : $postID;

			if ( ! empty( $acfPostID ) ) {
				return $acfPostID;
			}
			else {
				return $null;
			}
		}
	}
}
add_filter( 'acf/pre_load_post_id', 'mikael_fix_post_id_on_preview', 10, 2 );

/**
 * Get value from acf field
 */
if ( ! function_exists( 'mikael_get_field' ) ) {
	function mikael_get_field( $name = null, $postID = null ) {

		$value = null;

		// try get value from meta box
		if ( function_exists( 'get_field' ) ) {
			if ( $postID == null ) {
				$postID = get_the_ID();
			}
			$value = get_field( $name, $postID );
		}

		return $value;

	}
}

/**
 * Get Elementor templates
 */
if ( ! function_exists( 'mikael_get_elementor_templates' ) ) {
	function mikael_get_elementor_templates( $type = null ) {

		$args = [
			'post_type' => 'elementor_library',
			'posts_per_page' => -1,
		];

		if ( $type ) {

			$args[ 'tax_query' ] = [
				[
					'taxonomy' => 'elementor_library_type',
					'field' => 'slug',
					'terms' => $type,
				],
			];

		}

		$page_templates = get_posts( $args );

		$options[0] = esc_html__( 'Select a Template', 'mikael' );

		if ( ! empty( $page_templates ) && ! is_wp_error( $page_templates ) ) {
			foreach ( $page_templates as $post ) {
				$options[ $post->ID ] = $post->post_title;
			}
		} else {

			$options[0] = esc_html__( 'Create a Template First', 'mikael' );

		}

		return $options;

	}
}

/**
 * Get hsl variables
 */
if ( ! function_exists( 'mikael_get_hsl_variables' ) ) {
	function mikael_get_hsl_variables( $name, $color ) {
		if ( class_exists( 'ariColor' ) ) {
			$color_obj = ariColor::newColor( $color );
			$new_color = "${name}-h: {$color_obj->hue};";
			$new_color .= "${name}-s: {$color_obj->saturation}%;";
			$new_color .= "${name}-l: {$color_obj->lightness}%;";
			return $new_color;
		}
		return "${name}: {$color};";
	}
}
