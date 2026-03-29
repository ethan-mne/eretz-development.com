<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

get_header();

get_template_part( 'template-parts/page-title/page-title', 'blog' );

?>

<main class="vlt-main vlt-main--padding">

	<?php

		// Elementor `archive` location
		if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'archive' ) ) {
			get_template_part( 'template-parts/archive/archive', 'blog' );
		}

	?>

</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>