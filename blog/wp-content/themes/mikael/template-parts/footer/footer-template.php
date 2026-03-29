<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

$footer_class = 'vlt-footer vlt-footer--template';

$acf_footer = mikael_get_theme_mod( 'page_custom_footer', true );

if ( mikael_get_theme_mod( 'footer_sticky', $acf_footer ) == 'enable' ) {
	$footer_class .= ' vlt-footer--sticky';
}

$footer_template = mikael_get_theme_mod( 'footer_template', $acf_footer );

?>

<footer class="<?php echo mikael_sanitize_class( $footer_class ); ?>">

	<?php echo mikael_render_elementor_template( $footer_template ); ?>

</footer>
<!-- /.vlt-footer -->