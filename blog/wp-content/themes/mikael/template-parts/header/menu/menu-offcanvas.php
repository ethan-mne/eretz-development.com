<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

?>

<div class="vlt-offcanvas-menu">

	<div class="vlt-offcanvas-menu__header">

		<?php if ( mikael_get_theme_mod( 'offcanvas_menu_locales' ) == 'show' ) : ?>

			<nav class="vlt-offcanvas-menu__locales">
				<?php
					if ( class_exists( 'GTranslate' ) ) {
						echo do_shortcode( '[gtranslate]' );
					}
				?>
			</nav>
			<!-- /.vlt-offcanvas-menu__locales -->

		<?php else: ?>

			<span></span>

		<?php endif; ?>

		<a class="vlt-menu-burger vlt-menu-burger--opened js-offcanvas-menu-close" href="#">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
		</a>
		<!-- /.vlt-menu-burger -->

	</div>
	<!-- /.vlt-offcanvas-menu__header -->

	<nav class="vlt-offcanvas-menu__navigation">

		<?php

			$acf_onepage_navigation = mikael_get_theme_mod( 'onepage_navigation', true );

			if ( $acf_onepage_navigation ) {

				wp_nav_menu( array(
					'theme_location' => 'onepage-menu',
					'container' => false,
					'depth' => 1,
					'menu_class' => 'sf-menu sf-menu-onepage',
					'fallback_cb' => 'mikael_fallback_menu',
					'walker' => new Mikael_Custom_Walker_Nav_Menu()
				) );

			} else {

				wp_nav_menu( array(
					'theme_location' => 'primary-menu',
					'container' => false,
					'depth' => 3,
					'menu_class' => 'sf-menu',
					'fallback_cb' => 'mikael_fallback_menu',
				) );

			}

		?>

	</nav>
	<!-- /.vlt-offcanvas-menu__navigation -->

	<div class="vlt-offcanvas-menu__footer">

		<?php if ( mikael_get_theme_mod( 'offcanvas_menu_socials_list' ) ) : ?>

			<div class="vlt-offcanvas-menu__socials">

				<?php
					foreach ( mikael_get_theme_mod( 'offcanvas_menu_socials_list' ) as $socialItem ) :
						echo '<a href="' . esc_url( $socialItem[ 'social_url' ] ) . '" target="_blank">' . wp_kses_post( $socialItem[ 'social_text' ] ) . '</a>';
					endforeach;
				?>

			</div>
			<!-- /.vlt-offcanvas-menu__socials -->

		<?php endif; ?>

		<?php if ( mikael_get_theme_mod( 'offcanvas_menu_copyright' ) ) : ?>

			<div class="vlt-offcanvas-menu__copyright"><?php echo sprintf( mikael_get_theme_mod( 'offcanvas_menu_copyright' ), date( 'Y' ) ); ?></div>
			<!-- /.vlt-offcanvas-menu__copyright -->

		<?php endif; ?>

	</div>
	<!-- /.vlt-offcanvas-menu__footer -->

</div>
<!-- /.vlt-offcanvas-menu -->

<div class="vlt-site-overlay"></div>
<!-- /.vlt-site-overlay -->