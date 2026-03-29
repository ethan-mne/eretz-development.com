<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

/**
 * Register sidebars
 */
if ( ! function_exists( 'mikael_register_sidebar' ) ) {
	function mikael_register_sidebar() {
		register_sidebar( array(
			'name' => esc_html__( 'Blog Sidebar', 'mikael' ),
			'id' => 'blog_sidebar',
			'description' => esc_html__( 'Blog Widget Area', 'mikael' ),
			'before_widget' => '<div id="%1$s" class="vlt-widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="vlt-widget__title">',
			'after_title' => '</h5>'
		) );
	}
}
add_action( 'widgets_init', 'mikael_register_sidebar' );

/**
 * Fixed socials
 */
if ( ! function_exists( 'mikael_fixed_socials' ) ) {
	function mikael_fixed_socials() {

		// fixed action block
		if ( ! is_page_template( 'template-fullpage-slider.php' ) && mikael_get_theme_mod( 'popup_cf7_shortcode' ) ) {
			echo '<div class="vlt-fixed-action-block vlt-fixed-action-block--contact-form">';
			echo '<a href="#" data-bs-toggle="modal" data-bs-target="#vlt-contact-form">';
			echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>';
			echo '</a>';
			echo '</div>';
		}

		// fixed socials
		if ( mikael_get_theme_mod( 'fixed_socials_show' ) == 'show' && mikael_get_theme_mod( 'fixed_socials_list' ) ) :
			echo '<div class="vlt-fixed-socials">';

			foreach ( mikael_get_theme_mod( 'fixed_socials_list' ) as $socialItem ) :
				echo '<a href="' . esc_url( $socialItem[ 'social_url' ] ) . '" target="_blank">' . wp_kses_post( $socialItem[ 'social_text' ] ) . '</a>';
			endforeach;

			echo '</div>';

		endif;

	}
}
add_action( 'wp_body_open', 'mikael_fixed_socials' );

/**
 * Change admin logo
 */
if ( ! function_exists( 'mikael_change_admin_logo' ) ) {
	function mikael_change_admin_logo() {
		if ( ! mikael_get_theme_mod( 'login_logo_image' ) ) {
			return;
		}
		$image_url = mikael_get_theme_mod( 'login_logo_image' );
		$image_w = mikael_get_theme_mod( 'login_logo_image_width' );
		$image_h = mikael_get_theme_mod( 'login_logo_image_height' );
		echo '<style type="text/css">
			h1 a {
				background: transparent url(' . esc_url( $image_url ) . ') 50% 50% no-repeat !important;
				width:' . esc_attr( $image_w ) . '!important;
				height:' . esc_attr( $image_h ) . '!important;
				background-size: cover !important;
			}
		</style>';
	}
}
add_action( 'login_head', 'mikael_change_admin_logo' );

/**
 * Prints Tracking code
 */
if ( ! function_exists( 'mikael_print_tracking_code' ) ) {
	function mikael_print_tracking_code() {
		$tracking_code = mikael_get_theme_mod( 'tracking_code' );
		if ( ! empty( $tracking_code ) ) {
			echo '' . $tracking_code;
		}
	}
}
add_action( 'wp_head', 'mikael_print_tracking_code' );