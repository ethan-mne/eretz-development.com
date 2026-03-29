<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

?>

<article <?php post_class( 'vlt-page vlt-page--empty' ); ?>>

	<?php if ( is_home() && current_user_can( 'publish_posts' ) ): ?>

		<p><?php esc_html_e( 'Ready to publish your first post?', 'mikael' ); ?></p>
		<a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>" class="vlt-btn vlt-btn--primary">
			<span class="vlt-btn__text">
				<?php esc_html_e( 'Get started here', 'mikael' ); ?>
			</span>
		</a>

	<?php elseif ( is_search() ): ?>

		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms.', 'mikael' ); ?></p>

	<?php else: ?>

		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'mikael' ); ?></p>

	<?php endif; ?>

</article>
<!-- /.vlt-page -->