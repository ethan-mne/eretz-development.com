<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

/**
 * Enqueue assets
 */
if ( ! class_exists( 'MikaelThemeEnqueueAssets' ) ) {
	class MikaelThemeEnqueueAssets {

		public function __construct() {
			$theme_info = wp_get_theme();
			$this->assets_dir = MIKAEL_THEME_DIRECTORY . 'assets/';
			$this->customizer_frontend_css = MIKAEL_THEME_DIRECTORY .'inc/framework/customizer-frontend.css';
			$this->customizer_editor_css = MIKAEL_THEME_DIRECTORY .'inc/framework/customizer-editor.css';
			$this->theme_version = $theme_info[ 'Version' ];
			$this->init_assets();
		}

		public function fonts_url() {
			$fonts_url = '';
			$fonts = [];
			$display = 'swap';
			$fonts[] = 'Inter:400,500,600,700';

			if ( $fonts ) {
				$fonts_url = add_query_arg( array(
					'family' => implode( '&family=', $fonts ),
					'display' => urlencode( $display )
				), 'https://fonts.googleapis.com/css2?family=' );
			}

			return $fonts_url;
		}

		public function init_assets() {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_scripts' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_styles' ) );
			add_action( 'wp_default_scripts', array( $this, 'enqueue_default_scripts' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
			add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_gutenberg_editor_styles' ) );
		}

		public function enqueue_default_scripts( $wp_scripts ) {

			if ( is_admin() ) {
				return;
			}

			if ( mikael_get_theme_mod( 'jquery_in_footer' ) == 'disable' ) {
				return;
			}

			$wp_scripts->add_data( 'jquery', 'group', 1 );
			$wp_scripts->add_data( 'jquery-core', 'group', 1 );
			$wp_scripts->add_data( 'jquery-migrate', 'group', 1 );

		}

		public function enqueue_frontend_scripts() {

			if ( is_singular() && comments_open() ) {
				wp_enqueue_script( 'comment-reply' );
			}

			// Enqueue default scripts
			wp_enqueue_script( 'imagesloaded' );

			// Enqueue scripts
			wp_enqueue_script( 'animsition', $this->assets_dir .'vendors/js/animsition.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'popper', $this->assets_dir .'vendors/js/popper.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'bootstrap', $this->assets_dir .'vendors/js/bootstrap.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'isotope', $this->assets_dir . 'vendors/js/isotope.pkgd.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'gsap', $this->assets_dir .'vendors/js/gsap.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'superclick', $this->assets_dir .'vendors/js/superclick.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'pagepiling', $this->assets_dir .'vendors/js/jquery.pagepiling.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'numerator', $this->assets_dir .'vendors/js/jquery-numerator.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'swiper', $this->assets_dir .'vendors/js/swiper-bundle.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'fitvids', $this->assets_dir .'vendors/js/fitvids.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'fancybox', $this->assets_dir .'vendors/js/jquery.fancybox.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'inview', $this->assets_dir .'vendors/js/jquery.inview.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'jarallax', $this->assets_dir . 'vendors/js/jarallax.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'jarallax-video', $this->assets_dir . 'vendors/js/jarallax-video.js', [ 'jquery' ], $this->theme_version, true );

			// Enqueue theme helper script
			wp_enqueue_script( 'vlt-helpers', $this->assets_dir . 'scripts/helpers.js', [ 'jquery' ], $this->theme_version, true );

			// Enqueue controllers
			wp_enqueue_script( 'vlt-controllers', $this->assets_dir . 'scripts/controllers.js', [ 'jquery' ], $this->theme_version, true );

		}

		public function enqueue_gutenberg_editor_styles() {
			wp_enqueue_style( 'vlt-gutenberg', $this->assets_dir .'css/gutenberg-style.css', [], $this->theme_version );
		}

		public function enqueue_admin_styles() {
			wp_enqueue_style( 'vlt-admin-style', $this->assets_dir .'css/admin.css', [], $this->theme_version );
			if ( ! class_exists( 'Kirki' ) ) {
				wp_enqueue_style( 'vlt-google-fonts-editor', $this->fonts_url(), false, $this->theme_version );
				wp_enqueue_style( 'vlt-customizer-editor', $this->customizer_editor_css, [], $this->theme_version );
			}
		}

		public function enqueue_admin_scripts() {
			wp_enqueue_script( 'vlt-admin-script', $this->assets_dir .'scripts/admin.js', [ 'jquery' ], $this->theme_version, true );
		}

		public function enqueue_frontend_styles() {

			wp_enqueue_style( 'style', get_stylesheet_uri() );

			wp_enqueue_style( 'animate', $this->assets_dir . 'vendors/css/animate.css', [], $this->theme_version );
			wp_enqueue_style( 'animsition', $this->assets_dir . 'vendors/css/animsition.css', [], $this->theme_version );
			wp_enqueue_style( 'fancybox', $this->assets_dir . 'vendors/css/jquery.fancybox.css', [], $this->theme_version );
			wp_enqueue_style( 'pagepiling', $this->assets_dir . 'vendors/css/jquery.pagepiling.css', [], $this->theme_version );
			wp_enqueue_style( 'swiper', $this->assets_dir . 'vendors/css/swiper-bundle.css', [], $this->theme_version );

			// Icons and fonts
			wp_enqueue_style( 'socicons', $this->assets_dir . 'fonts/socicons/socicon.css', [], $this->theme_version );

			wp_enqueue_style( 'vlt-main-css', $this->assets_dir .'css/main.css', [], $this->theme_version );

			if ( ! class_exists( 'Kirki' ) ) {
				wp_enqueue_style( 'vlt-google-fonts-frontend', $this->fonts_url(), false, $this->theme_version );
				wp_enqueue_style( 'vlt-customizer-frontend', $this->customizer_frontend_css, [], $this->theme_version );
			}

		}

	}

	new MikaelThemeEnqueueAssets;

}