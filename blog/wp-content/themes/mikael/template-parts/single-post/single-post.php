<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

$size = 'mikael-1280x720_crop';
$post_class = 'vlt-post vlt-post--style-single';

while ( have_posts() ) : the_post();

?>

<article <?php post_class( $post_class ); ?>>

	<div class="container">

		<div class="vlt-post-header">

			<div class="row">

				<div class="col-md-10 offset-md-1">

					<?php get_template_part( 'template-parts/single-post/partials/partial-post', 'title' ); ?>
					<?php get_template_part( 'template-parts/single-post/partials/partial-post', 'meta' ); ?>

				</div>

			</div>

		</div>
		<!-- /.vlt-post-header -->

		<?php if ( has_post_thumbnail() ) : ?>

			<div class="vlt-post-thumbnail">
				<?php the_post_thumbnail( $size, array( 'loading' => 'lazy' ) ); ?>
			</div>
			<!-- /.vlt-post-thumbnail -->

		<?php endif; ?>

		<div class="vlt-post-content clearfix">

			<div class="row">

				<div class="col-md-10 offset-md-1">

					<?php get_template_part( 'template-parts/single-post/partials/partial-post', 'content' ); ?>

				</div>

			</div>

		</div>
		<!-- /.vlt-post-content -->

		<footer class="vlt-post-footer">

			<div class="row">

				<div class="col-md-10 offset-md-1">

					<?php get_template_part( 'template-parts/single-post/partials/partial-post', 'footer' ); ?>

				</div>

			</div>

		</footer>
		<!-- /.vlt-post-footer -->

	</div>

	<?php if ( comments_open() || get_comments_number() ) : ?>

		<div class="container">

			<div class="row">

				<div class="col-md-10 offset-md-1">

					<?php comments_template(); ?>

				</div>

			</div>

		</div>

	<?php endif; ?>

</article>

<?php

endwhile;