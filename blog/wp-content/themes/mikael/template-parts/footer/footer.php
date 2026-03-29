<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

$acf_footer = mikael_get_theme_mod( 'page_custom_footer', true );

if ( mikael_get_theme_mod( 'footer_show', $acf_footer ) == 'show' ) {
	get_template_part( 'template-parts/footer/footer', mikael_get_theme_mod( 'footer_layout', $acf_footer ) );
}