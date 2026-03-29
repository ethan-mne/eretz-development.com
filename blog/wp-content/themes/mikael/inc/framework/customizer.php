<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

if ( ! function_exists( 'mikael_kirki_styling' ) ) {
	function mikael_kirki_styling( $config ) {
		return wp_parse_args( array(
			'disable_loader' => true,
		), $config );
	}
}
add_filter( 'kirki_config', 'mikael_kirki_styling' );

/**
* Add config
*/
VLT_Options::add_config( array(
	'capability' => 'edit_theme_options',
	'option_type' => 'theme_mod',
) );

$first_level = 10;
$second_level = 10;

/**
 * General
 */
VLT_Options::add_panel( 'panel_core', array(
	'title' => esc_html__( 'Core Options', 'mikael' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-admin-generic',
) );

VLT_Options::add_section( 'core_general', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'General Options', 'mikael' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-admin-generic',
) );

VLT_Options::add_section( 'core_fixed_socials', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'Fixed Socials', 'mikael' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-twitter',
) );

VLT_Options::add_section( 'core_selection', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'Selection', 'mikael' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-editor-underline',
) );

VLT_Options::add_section( 'core_scrollbar', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'Scrollbar', 'mikael' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-sort',
) );

VLT_Options::add_section( 'core_login_logo', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'Login Page', 'mikael' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-lock',
) );

require_once MIKAEL_REQUIRE_DIRECTORY . 'inc/framework/setup/section-core.php';

/**
 * Header
 */
VLT_Options::add_panel( 'panel_header_general', array(
	'title' => esc_html__( 'Header Options', 'mikael' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-arrow-up-alt',
) );

VLT_Options::add_section( 'section_header_general', array(
	'panel' => 'panel_header_general',
	'title' => esc_html__( 'General Options', 'mikael' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-admin-generic',
) );

VLT_Options::add_section( 'section_offcanvas_menu', array(
	'panel' => 'panel_header_general',
	'title' => esc_html__( 'Offcanvas Menu', 'mikael' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-arrow-right',
) );

require_once MIKAEL_REQUIRE_DIRECTORY . 'inc/framework/setup/section-header.php';

/**
 * Footer
 */
VLT_Options::add_section( 'section_footer_general', array(
	'title' => esc_html__( 'Footer Options', 'mikael' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-arrow-down-alt',
) );

require_once MIKAEL_REQUIRE_DIRECTORY . 'inc/framework/setup/section-footer.php';

/**
 * Pages
 */
VLT_Options::add_panel( 'panel_page', array(
	'title' => esc_html__( 'Page Options', 'mikael' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-admin-page',
) );

VLT_Options::add_section( 'section_blog', array(
	'panel' => 'panel_page',
	'title' => esc_html__( 'Blog Options', 'mikael' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-admin-post',
) );

VLT_Options::add_section( 'section_archive', array(
	'panel' => 'panel_page',
	'title' => esc_html__( 'Archive Options', 'mikael' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-category',
) );

VLT_Options::add_section( 'section_search', array(
	'panel' => 'panel_page',
	'title' => esc_html__( 'Search Options', 'mikael' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-search',
) );

VLT_Options::add_section( 'section_single_post', array(
	'panel' => 'panel_page',
	'title' => esc_html__( 'Single Post', 'mikael' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-welcome-write-blog',
) );

VLT_Options::add_section( 'section_404', array(
	'panel' => 'panel_page',
	'title' => esc_html__( 'Page 404', 'mikael' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-warning',
) );

require MIKAEL_REQUIRE_DIRECTORY . 'inc/framework/setup/section-pages.php';

/**
 * Typography
 */
VLT_Options::add_panel( 'panel_typography', array(
	'title' => esc_html__( 'Typography Options', 'mikael' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-editor-bold',
) );

VLT_Options::add_section( 'typography_fonts', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'General Fonts', 'mikael' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-editor-bold',
) );

VLT_Options::add_section( 'typography_text', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Text Options', 'mikael' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-text',
) );

VLT_Options::add_section( 'typography_headings', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Heading Options', 'mikael' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-editor-textcolor',
) );

VLT_Options::add_section( 'typography_blockquote', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Blockquote Options', 'mikael' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-editor-quote',
) );

VLT_Options::add_section( 'typography_buttons', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Button Options', 'mikael' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-admin-links',
) );

VLT_Options::add_section( 'typography_input', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Input Options', 'mikael' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-edit',
) );

VLT_Options::add_section( 'typography_widget', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Widget Options', 'mikael' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-welcome-widgets-menus',
) );

VLT_Options::add_section( 'typography_additional', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Additional Options', 'mikael' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-plus-alt',
) );

require_once MIKAEL_REQUIRE_DIRECTORY . 'inc/framework/setup/section-typography.php';

/**
 * Action Block
 */
VLT_Options::add_section( 'section_action_block', array(
	'title' => esc_html__( 'Action Block', 'mikael' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-feedback',
) );

require_once MIKAEL_REQUIRE_DIRECTORY . 'inc/framework/setup/section-action-block.php';

/**
 * Advanced
 */
VLT_Options::add_section( 'section_advanced', array(
	'title' => esc_html__( 'Advanced', 'mikael' ),
	'priority' => 9999,
	'icon' => 'dashicons-star-filled',
) );

require_once MIKAEL_REQUIRE_DIRECTORY . 'inc/framework/setup/section-advanced.php';