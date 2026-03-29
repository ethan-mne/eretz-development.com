<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

if ( ! function_exists( 'mikael_dynamic_css' ) ) {
	function mikael_dynamic_css( $styles ) {
		$colors = mikael_get_hsl_variables( '--vlt-color-accent', mikael_get_theme_mod('accent_color') );
		$styles .= ':root {' . $colors . '}';

		return $styles;
	}
}
add_filter( 'kirki_mikael_customize_dynamic_css', 'mikael_dynamic_css' );