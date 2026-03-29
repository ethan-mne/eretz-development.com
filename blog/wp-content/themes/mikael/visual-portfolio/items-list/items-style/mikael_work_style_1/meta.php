<?php
/**
 * Item meta template.
 *
 * @var $args
 * @var $opts
 * @package visual-portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

	<div class="vlt-work-content">

		<header class="vlt-work-header">

			<div class="vlt-work-meta">

				<?php if ( $opts['show_categories'] && $args['categories'] && ! empty( $args['categories'] ) ) { $count = $opts['categories_count']; ?>

					<span>

						<?php $categories = ''; foreach ( $args['categories'] as $category ) {
							if ( ! $count ) {
								break;
							}
							?>

							<?php $categories .= esc_html( $category['label'] ) . ', '; ?>

						<?php $count--; } ?>

						<?php echo rtrim( $categories, ', ' ); ?>

					</span>

				<?php } ?>

				<?php if ( $opts['show_date'] ) { ?>

					<span>

						<?php echo esc_html( $args['published'] ); ?>

					</span>

				<?php } ?>

			</div>

			<?php

			if ( $opts['show_title'] && $args['title'] ) { ?>
				<h3 class="vlt-work-title">
					<?php
					if ( $args['url'] ) {
						?>
						<a href="<?php echo esc_url( $args['url'] ); ?>"
							<?php
							if ( isset( $args['url_target'] ) && $args['url_target'] ) :
								?>
								target="<?php echo esc_attr( $args['url_target'] ); ?>"
								rel="noopener noreferrer"
								<?php
							endif;
							?>
						>
							<?php echo esc_html( $args['title'] ); ?>
						</a>
						<?php
					} else {
						echo esc_html( $args['title'] );
					}
					?>
				</h3>
				<?php

			}

			?>

		</header>
		<!-- /.vlt-work-header -->

		<footer class="vlt-work-footer">
			<?php get_template_part( 'template-parts/post/partials/partial', 'work-read-more-link' ); ?>
		</footer>
		<!-- /.vlt-work-footer -->

	</div>
	<!-- /.vlt-work-content -->

</article>
<!-- /.vlt-work -->