<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

?>

<?php if ( get_the_tags() ) : ?>

	<div class="vlt-post-tags">

		<h5><?php esc_html_e( 'Tags:', 'mikael' ); ?></h5>

		<?php the_tags( '', '' ); ?>

	</div>
	<!-- /.vlt-post-tags -->

<?php endif; ?>


<?php if ( function_exists( 'vlthemes_get_post_share_buttons' ) && mikael_get_theme_mod( 'show_share_post' ) == 'show' ) : ?>

	<div class="vlt-social-share">

		<h5><?php esc_html_e( 'Share:', 'mikael' ); ?></h5>

		<?php echo vlthemes_get_post_share_buttons( get_the_ID() ); ?>

	</div>
	<!-- /.vlt-social-share -->

<?php endif; ?>