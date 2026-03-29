<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

$priority = 0;

/**
 * Blog page
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sb_1',
	'section' => 'section_blog',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'mikael' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'blog_layout',
	'section' => 'section_blog',
	'label' => esc_html__( 'Blog Layout', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'default' => esc_html__( 'Default', 'mikael' ),
		'masonry-2' => esc_html__( 'Masonry 2 Columns', 'mikael' ),
		'masonry-3' => esc_html__( 'Masonry 3 Columns', 'mikael' ),
	),
	'default' => 'masonry-2',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'blog_type_pagination',
	'section' => 'section_blog',
	'label' => esc_html__( 'Type Pagination', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'none' => esc_html__( 'None', 'mikael' ),
		'paged' => esc_html__( 'Paged', 'mikael' ),
		'numeric' => esc_html__( 'Numeric', 'mikael' ),
	),
	'default' => 'numeric',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sb_2',
	'section' => 'section_blog',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Page Title', 'mikael' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'blog_title',
	'section' => 'section_blog',
	'label' => esc_html__( 'Blog Title', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => esc_html__( 'Recent News', 'mikael' ),
) );

/**
 * Archive page
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sa_1',
	'section' => 'section_archive',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'mikael' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'archive_layout',
	'section' => 'section_archive',
	'label' => esc_html__( 'Archive Layout', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'default' => esc_html__( 'Default', 'mikael' ),
		'masonry-2' => esc_html__( 'Masonry 2 Columns', 'mikael' ),
		'masonry-3' => esc_html__( 'Masonry 3 Columns', 'mikael' ),
	),
	'default' => 'masonry-2',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'archive_type_pagination',
	'section' => 'section_archive',
	'label' => esc_html__( 'Type Pagination', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'none' => esc_html__( 'None', 'mikael' ),
		'paged' => esc_html__( 'Paged', 'mikael' ),
		'numeric' => esc_html__( 'Numeric', 'mikael' ),
	),
	'default' => 'paged',
) );

/**
 * Search page
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'ss_1',
	'section' => 'section_search',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'mikael' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'search_layout',
	'section' => 'section_search',
	'label' => esc_html__( 'Search Layout', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'default' => esc_html__( 'Default', 'mikael' ),
		'masonry-2' => esc_html__( 'Masonry 2 Columns', 'mikael' ),
		'masonry-3' => esc_html__( 'Masonry 3 Columns', 'mikael' ),
	),
	'default' => 'masonry-2',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'search_type_pagination',
	'section' => 'section_search',
	'label' => esc_html__( 'Type Pagination', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'none' => esc_html__( 'None', 'mikael' ),
		'paged' => esc_html__( 'Paged', 'mikael' ),
		'numeric' => esc_html__( 'Numeric', 'mikael' ),
	),
	'default' => 'paged',
) );

/**
 * Single post
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'ssp_1',
	'section' => 'section_single_post',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'mikael' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'comment_placement',
	'section' => 'section_single_post',
	'label' => esc_html__( 'Comment Placement', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'top' => esc_html__( 'Top', 'mikael' ),
		'bottom' => esc_html__( 'Bottom', 'mikael' )
	),
	'default' => 'bottom',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'show_share_post',
	'section' => 'section_single_post',
	'label' => esc_html__( 'Post Share', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'mikael' ),
		'hide' => esc_html__( 'Hide', 'mikael' )
	),
	'default' => 'hide',
) );

/**
 * Page 404
 */
VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'error_image',
	'section' => 'section_404',
	'label' => esc_html__( 'Error Image', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => $theme_path_images . '404.png'
) );

VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'error_title',
	'section' => 'section_404',
	'label' => esc_html__( 'Error Title', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => esc_html__( 'Page not found', 'mikael' ),
) );

VLT_Options::add_field( array(
	'type' => 'textarea',
	'settings' => 'error_subtitle',
	'section' => 'section_404',
	'label' => esc_html__( 'Error Subtitle', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => esc_html__( 'We are sorry. But the page you are looking for cannot be found.', 'mikael' ),
) );