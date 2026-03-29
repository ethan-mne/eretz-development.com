<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

$footer_class = 'vlt-footer vlt-footer--default';

$acf_footer = mikael_get_theme_mod( 'page_custom_footer', true );

if ( mikael_get_theme_mod( 'footer_fixed', $acf_footer ) == 'enable' ) {
	$footer_class .= ' vlt-footer--fixed';
}

if ( is_404() ) {
	$footer_class .= ' vlt-footer--fixed';
}

?>

<footer class="<?php echo mikael_sanitize_class( $footer_class ); ?>">

	<?php if ( mikael_get_theme_mod( 'footer_copyright' ) ) : ?>

		<div class="vlt-footer-copyright"><?php echo sprintf( mikael_get_theme_mod( 'footer_copyright' ), date( 'Y' ) ); ?></div>
		<!-- /.vlt-footer-copyright -->

	<?php endif; ?>

</footer>
<!-- /.vlt-footer -->