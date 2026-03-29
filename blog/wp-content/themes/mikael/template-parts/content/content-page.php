<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

?>

<article <?php post_class( 'vlt-page' ); ?>>

	<div class="container">

		<div class="vlt-content-markup">

			<?php the_content(); ?>

		</div>

		<div class="clearfix"></div>

		<?php

			wp_link_pages( array(
				'before' => '<div class="vlt-link-pages"><h5>' . esc_html__( 'Pages: ', 'mikael' ) . '</h5>',
				'after' => '</div>',
				'separator' => '<span class="sep">|</span>',
				'nextpagelink' => esc_html__( 'Next page', 'mikael' ),
				'previouspagelink' => esc_html__( 'Previous page', 'mikael' ),
				'next_or_number' => 'next'
			) );

			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

		?>

	</div>

</article>
<!-- /.vlt-page -->