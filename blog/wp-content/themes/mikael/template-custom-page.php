<?php

/**
 * Template Name: Custom Page
 * @author: VLThemes
 * @version: 1.0.5
 */

get_header();

?>

<main class="vlt-main">

	<?php

		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content/content', 'custom-page' );
		endwhile;

	?>

</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>