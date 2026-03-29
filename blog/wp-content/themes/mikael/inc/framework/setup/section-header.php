<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

$priority = 0;

/**
 * Header general
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_1',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'mikael' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_show',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Header Show', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'mikael' ),
		'hide' => esc_html__( 'Hide', 'mikael' ),
	),
	'default' => 'show',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_2',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Navigation', 'mikael' ) . '</div>',
	'priority' => $priority++,
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
	),
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_opaque',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Navigation Opaque', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'mikael' ),
		'disable' => esc_html__( 'Disable', 'mikael' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_transparent',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Transparent', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'mikael' ),
		'disable' => esc_html__( 'Disable', 'mikael' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
	),
	'default' => 'enable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_transparent_always',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Transparent Always', 'mikael' ),
	'description' => esc_html__( 'Transparent also after page scrolled down.', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'mikael' ),
		'disable' => esc_html__( 'Disable', 'mikael' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_sticky',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Sticky', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'mikael' ),
		'disable' => esc_html__( 'Disable', 'mikael' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
	),
	'default' => 'enable',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_3',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Logo', 'mikael' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'navigation_logo',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Logo', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'navigation_logo_white',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Logo White', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'navigation_logo_height',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Logo Height', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
	'output' => array(
		array(
			'element' => '.vlt-header .vlt-navbar-logo img',
			'property' => 'height'
		)
	)
) );

/**
 * Offcanvas menu
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'som_1',
	'section' => 'section_offcanvas_menu',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Locales', 'mikael' ) . '</div>',
	'priority' => $priority++,
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'offcanvas_menu_locales',
	'section' => 'section_offcanvas_menu',
	'label' => esc_html__( 'Locales Show', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'mikael' ),
		'hide' => esc_html__( 'Hide', 'mikael' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'som_2',
	'section' => 'section_offcanvas_menu',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Socials', 'mikael' ) . '</div>',
	'priority' => $priority++,
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
) );

VLT_Options::add_field( array(
	'type' => 'repeater',
	'settings' => 'offcanvas_menu_socials_list',
	'section' => 'section_offcanvas_menu',
	'label' => esc_html__( 'Social List', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'row_label' => array(
		'type' => 'text',
		'value' => esc_html__( 'social', 'mikael' )
	),
	'fields' => array(
		'social_text' => array(
			'type' => 'textarea',
			'label' => esc_html__( 'Social Text', 'mikael' ),
		),
		'social_url' => array(
			'type' => 'text',
			'label' => esc_html__( 'Social Url', 'mikael' )
		),
	),
	'default' => '',
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'som_3',
	'section' => 'section_offcanvas_menu',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Copyright', 'mikael' ) . '</div>',
	'priority' => $priority++,
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
) );

VLT_Options::add_field( array(
	'type' => 'textarea',
	'settings' => 'offcanvas_menu_copyright',
	'section' => 'section_offcanvas_menu',
	'label' => esc_html__( 'Copyright', 'mikael' ),
	'description' => esc_html__( 'Enter footer copyright. (%s) symbol generate current year.', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '© %s Copiright.<br>All rights reserved.',
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
) );