<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

?>

<article <?php post_class( 'vlt-page vlt-page--404' ); ?>>

	<div class="container">

		<?php
			if ( mikael_get_theme_mod( 'error_image' ) ) {
				echo '<img src="' . esc_url( mikael_get_theme_mod( 'error_image' ) ) . '" alt="404" loading="lazy">';
			}
		?>

		<h1><?php echo esc_html( mikael_get_theme_mod( 'error_title' ) ); ?></h1>

		<p><?php echo wp_kses_post( mikael_get_theme_mod( 'error_subtitle' ) ); ?></p>

		<a class="vlt-btn vlt-btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<span class="vlt-btn__text">
				<?php esc_html_e( 'Back to Home', 'mikael' ); ?>
			</span>
		</a>

	</div>

</article>
<!-- /.vlt-page--404 -->