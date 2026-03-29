<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

get_header();

?>

<main class="vlt-main">

	<?php

		// Elementor `single` location
		if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {
			get_template_part( 'template-parts/content/content', 'page-404' );
		}

	?>

</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>