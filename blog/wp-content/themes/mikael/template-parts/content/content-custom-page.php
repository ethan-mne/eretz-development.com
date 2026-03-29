<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

?>

<article <?php post_class( 'vlt-page vlt-page--custom' ); ?>>

	<div class="container">

		<?php the_content(); ?>

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
		?>

	</div>

</article>
<!-- /.vlt-page -->