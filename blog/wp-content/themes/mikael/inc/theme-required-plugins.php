<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

/**
 * Required plugins
 */
if ( ! function_exists( 'mikael_tgm_plugins' ) ) {
	function mikael_tgm_plugins() {

		$source = 'https://vlthemes.com/plugins/';

		$plugins = array(
			array(
				'name' => esc_html__( 'Kirki', 'mikael' ),
				'slug' => 'kirki',
				'required' => true,
			),
			array(
				'name' => esc_html__( 'Mikael Helper Plugin', 'mikael' ),
				'slug' => 'mikael_helper_plugin',
				'source' => esc_url( $source . 'mikael_helper_plugin.zip' ),
				'required' => true,
				'version' => '1.0.3'
			),
			array(
				'name' => esc_html__( 'Advanced Custom Fields PRO', 'mikael' ),
				'slug' => 'advanced-custom-fields-pro',
				'source' => esc_url( $source . 'advanced-custom-fields-pro.zip' ),
				'required' => true,
			),
			array(
				'name' => esc_html__( 'Elementor Page Builder', 'mikael' ),
				'slug' => 'elementor',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Contact Form 7', 'mikael' ),
				'slug' => 'contact-form-7',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'GTranslate', 'mikael' ),
				'slug' => 'gtranslate',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Regenerate Thumbnails', 'mikael' ),
				'slug' => 'regenerate-thumbnails',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'One Click Demo Import', 'mikael' ),
				'slug' => 'one-click-demo-import',
				'required' => false,
			)
		);
		tgmpa( $plugins );
	}
}
add_action( 'tgmpa_register', 'mikael_tgm_plugins' );

/**
 * Print notice if helper plugin is not installed
 */
if ( ! function_exists( 'mikael_helper_plugin_notice' ) ) {
	function mikael_helper_plugin_notice() {
		if ( class_exists( 'VLThemesHelperPlugin' ) ) {
			return;
		}
		echo '<div class="notice notice-info is-dismissible"><p>' . sprintf( __( 'Please activate <strong>%s</strong> before your work with this theme.', 'mikael' ), 'Mikael Helper Plugin' ) . '</p></div>';
	}
}
add_action( 'admin_notices', 'mikael_helper_plugin_notice' );