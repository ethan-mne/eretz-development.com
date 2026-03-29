<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

/**
 * ACF in Admin Panel
 */
if ( ! function_exists( 'mikael_acf_in_admin_panel' ) ) {
	function mikael_acf_in_admin_panel() {
		return mikael_get_theme_mod( 'acf_show_admin_panel' ) == 'show' ? true : false;
	}
}
add_filter( 'mikael/acf_show_admin_panel', 'mikael_acf_in_admin_panel' );

/**
 * Add body class
 */
if ( ! function_exists( 'mikael_add_body_class' ) ) {
	function mikael_add_body_class( $classes ) {
		$classes[] = '';
		if ( ! wp_is_mobile() ) {
			$classes[] = 'no-mobile';
		} else {
			$classes[] = 'is-mobile';
		}

		// preloader
		if ( mikael_get_theme_mod( 'preloader' ) == 'show' ) {
			$classes[] = 'animsition';
		}

		return $classes;
	}
}
add_filter( 'body_class', 'mikael_add_body_class' );

/**
 * Add html class
 */
if ( ! function_exists( 'mikael_add_html_class' ) ) {
	function mikael_add_html_class( $classes = '' ) {
		$classes .= ' is-dark';

		if ( mikael_get_theme_mod( 'custom_cursor' ) == 'enable' ) {
			$classes .= ' vlt-is--custom-cursor';
		}

		return apply_filters( 'mikael/add_html_class', mikael_sanitize_class( $classes ) );
	}
}

/**
 * Get post password form
 */
if ( ! function_exists( 'mikael_get_post_password_form' ) ) {
	function mikael_get_post_password_form() {
		global $post;
		$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
		$output = '<form class="vlt-post-password-form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">';
		$output .= '<h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>' . esc_html__( 'Password Protected', 'mikael' ) . '</h4>';
		$output .= '<p>' . esc_html__( 'This content is restricted access, please type the password below and get access.', 'mikael' ) . '</p>';
		$output .= '<div class="vlt-form-group">';
		$output .= '<input name="post_password" id="' . $label . '" type="password" size="20" placeholder="' . esc_attr__( 'Password:' , 'mikael' ) . '">';
		$output .= '<button class="vlt-btn vlt-btn--primary"><span class="vlt-btn__text">' . esc_html__( 'Get Access' , 'mikael' ) . '</span></button>';
		$output .= '</div>';
		$output .= '</form>';
		return apply_filters( 'mikael/get_post_password_form', $output );
	}
}
add_filter( 'the_password_form', 'mikael_get_post_password_form' );

/**
 * Admin logo link
 */
if ( ! function_exists( 'mikael_change_admin_logo_link' ) ) {
	function mikael_change_admin_logo_link() {
		return home_url( '/' );
	}
}
add_filter( 'login_headerurl', 'mikael_change_admin_logo_link' );

/**
 * Comment form fields order
 */
if ( ! function_exists( 'mikael_comment_form_fields' ) ) {
	function mikael_comment_form_fields( $comment_fields ) {
		if ( mikael_get_theme_mod( 'comment_placement' ) == 'bottom' ) {
			$keys = array_keys( $comment_fields );
			if ( 'comment' == $keys[0] ) {
				$comment_fields['comment'] = array_shift( $comment_fields );
			}
		}
		return $comment_fields;
	}
}
add_filter( 'comment_form_fields', 'mikael_comment_form_fields' );

/**
 * Remove comment notes
 */
add_filter( 'comment_form_logged_in', '__return_empty_string' );

/**
 * Add comma to tag widget
 */
if ( ! function_exists( 'mikael_filter_tag_cloud' ) ) {
	function mikael_filter_tag_cloud( $args ) {
		$args['smallest'] = .75;
		$args['largest'] = .75;
		$args['unit'] = 'rem';
		$args['orderby'] = 'count';
		$args['order'] = 'DESC';
		$args['separator']= '';
		return $args;
	}
}
add_filter( 'widget_tag_cloud_args', 'mikael_filter_tag_cloud' );


/**
 * Custom select for ACF
 */
if ( ! function_exists( 'mikael_add_custom_select_to_acf' ) ) {
	function mikael_add_custom_select_to_acf( $field, $type = null ) {

		// reset choices
		$field['choices'] = [];

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

		$field['choices'][0] = esc_html__( 'Select a Template', 'mikael' );

		if ( ! empty( $page_templates ) && ! is_wp_error( $page_templates ) ) {
			foreach ( $page_templates as $post ) {
				$field['choices'][$post->ID] = $post->post_title;
			}
		} else {
			$field['choices'][0] = esc_html__( 'Create a Template First', 'mikael' );
		}

		// return the field
		return $field;

	}
}
add_filter( 'acf/load_field/name=footer_template', 'mikael_add_custom_select_to_acf' );

/**
 * Remove cf7 autop
 */
add_filter( 'wpcf7_autop_or_not', '__return_false' );

/**
 * Override Elementor template
 */
add_filter( 'template_include', function( $template ) {
	if ( false !== strpos( $template, '/templates/canvas.php' ) ) {
		$template = MIKAEL_REQUIRE_DIRECTORY . 'template-canvas-page.php';
	}
	return $template;
}, 12 );