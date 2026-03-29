<?php
/**
 * Item image template.
 *
 * @var $args
 * @var $opts
 * @package visual-portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<article class="vlt-work vlt-work--style-masonry">

	<div class="vlt-work-thumbnail">

		<div class="vp-portfolio__item-img-wrap">
			<div class="vp-portfolio__item-img">
				<?php
				if ( $args['url'] ) {
					?>
					<a href="<?php echo esc_url( $args['url'] ); ?>">
						<?php echo wp_kses( $args['image'], $args['image_allowed_html'] ); ?>
					</a>
					<?php
				} else {
					echo wp_kses( $args['image'], $args['image_allowed_html'] );
				}
				?>
			</div>
		</div>

	</div>
	<!-- /.vlt-work-thumbnail -->
