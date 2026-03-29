<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

$size = 'mikael-800x600_crop';
$post_class = 'vlt-work vlt-work--style-masonry';

?>

<article <?php post_class( $post_class ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="vlt-work-thumbnail">
			<?php the_post_thumbnail( $size, array( 'loading' => 'lazy' ) ); ?>
			<?php get_template_part( 'template-parts/post/partials/partial', 'thumbnail-link' ); ?>
		</div>
		<!-- /.vlt-work-thumbnail -->

	<?php endif; ?>

	<div class="vlt-work-content">

		<header class="vlt-work-header">
			<?php get_template_part( 'template-parts/post/partials/partial', 'work-meta' ); ?>
			<?php get_template_part( 'template-parts/post/partials/partial', 'work-title' ); ?>
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