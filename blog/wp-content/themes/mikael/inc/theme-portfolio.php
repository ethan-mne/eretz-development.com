<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

/**
 * Disable FontAwesome 5
 */
add_filter( 'vpf_enqueue_plugin_font_awesome', '__return_false' );

/**
 * Add new item styles
 */
if ( ! function_exists( 'mikael_vpf_extend_items_styles' ) ) {
	function mikael_vpf_extend_items_styles( $items_styles ) {
		$custom_style = [];

		$custom_style['mikael_work_style_1'] = array(
			'title' => esc_html__( '[Mikael] Work Style 1', 'mikael' ),
			'builtin_controls' => array(
				'show_title' => true,
				'show_categories' => true,
				'show_date' => true,
				'show_excerpt' => false,
				'show_icons' => false,
				'align' => false,
			),
		);
		return array_merge( $items_styles, $custom_style );
	}
}
add_filter( 'vpf_extend_items_styles', 'mikael_vpf_extend_items_styles' );