<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

$size = 'mikael-1280x720_crop';
$post_class = 'vlt-post vlt-post--style-default';

?>

<article <?php post_class( $post_class ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="vlt-post-thumbnail">

			<?php the_post_thumbnail( $size, array( 'loading' => 'lazy' ) ); ?>
			<?php get_template_part( 'template-parts/post/partials/partial', 'thumbnail-link' ); ?>
			<?php if ( is_sticky() ) { echo '<span class="badge"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg></span>'; } ?>

		</div>
		<!-- /.vlt-post-thumbnail -->

	<?php endif; ?>

	<div class="vlt-post-content">

		<header class="vlt-post-header">
			<?php get_template_part( 'template-parts/post/partials/partial', 'post-meta' ); ?>
			<?php get_template_part( 'template-parts/post/partials/partial', 'post-title' ); ?>
		</header>
		<!-- /.vlt-post-header -->

		<div class="vlt-post-excerpt">
			<?php echo mikael_get_trimmed_content( get_the_content(), 45 ); ?>
		</div>
		<!-- /.vlt-post-excerpt -->

		<footer class="vlt-post-footer">
			<?php get_template_part( 'template-parts/post/partials/partial', 'post-read-more' ); ?>
		</footer>
		<!-- /.vlt-post-footer -->

	</div>
	<!-- /.vlt-post-content -->

</article>
<!-- /.vlt-post -->