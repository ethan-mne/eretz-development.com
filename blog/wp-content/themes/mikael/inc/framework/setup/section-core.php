<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

$priority = 0;

/**
 * General
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sg_1',
	'section' => 'core_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Colors', 'mikael' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'background',
	'settings' => 'body_background',
	'section' => 'core_general',
	'label' => esc_html__( 'Site Background', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'background-color' => '#ffffff',
		'background-image' => '',
		'background-repeat' => 'no-repeat',
		'background-position' => 'center center',
		'background-size' => 'cover',
		'background-attachment' => 'scroll',
	),
	'output' => array(
		array(
			'element' => 'body, .vlt-main'
		),
		array(
			'element' => '.edit-post-visual-editor.editor-styles-wrapper',
			'context' => array( 'editor' ),
		),
	),
) );

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'accent_color',
	'section' => 'core_general',
	'label' => esc_html__( 'Accent Color', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '#c3323a',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sg_2',
	'section' => 'core_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Preloader', 'mikael' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'preloader',
	'section' => 'core_general',
	'label' => esc_html__( 'Preloader', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'mikael' ),
		'hide' => esc_html__( 'Hide', 'mikael' ),
	),
	'default' => 'show'
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sg_3',
	'section' => 'core_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Additional', 'mikael' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'code',
	'settings' => 'tracking_code',
	'section' => 'core_general',
	'label' => esc_html__( 'Tracking Code', 'mikael' ),
	'description' => esc_html__( 'Copy and paste your tracking code here.', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'language' => 'php',
	),
	'default' => '',
) );

/**
 * Fixed socials
 */
VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'fixed_socials_show',
	'section' => 'core_fixed_socials',
	'label' => esc_html__( 'Socials Show', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'mikael' ),
		'hide' => esc_html__( 'Hide', 'mikael' ),
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'repeater',
	'settings' => 'fixed_socials_list',
	'section' => 'core_fixed_socials',
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
			'setting' => 'fixed_socials_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
) );

/**
 * Selection
 */
VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'selection_text_color',
	'section' => 'core_selection',
	'label' => esc_html__( 'Selection Text Color', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'alpha' => false
	),
	'default' => '#ffffff',
	'output' => array(
		array(
			'element' => '::selection',
			'property' => 'color',
			'suffix' => '!important'
		),
		array(
			'element' => '::-moz-selection',
			'property' => 'color',
			'suffix' => '!important'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'selection_background_color',
	'section' => 'core_selection',
	'label' => esc_html__( 'Selection Background Color', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'alpha' => true
	),
	'default' => '#c3323a',
	'output' => array(
		array(
			'element' => '::selection',
			'property' => 'background-color',
			'suffix' => '!important'
		),
		array(
			'element' => '::-moz-selection',
			'property' => 'background-color',
			'suffix' => '!important'
		)
	)
) );

/**
 * Scrollbar
 */
VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'custom_scrollbar',
	'section' => 'core_scrollbar',
	'label' => esc_html__( 'Custom Scrollbar', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'mikael' ),
		'disable' => esc_html__( 'Disable', 'mikael' )
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'custom_scrollbar_track_color',
	'section' => 'core_scrollbar',
	'label' => esc_html__( 'Track Color', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'alpha' => false
	),
	'default' => '#222222',
	'output' => array(
		array(
			'element' => '::-webkit-scrollbar',
			'property' => 'background-color'
		)
	),
	'active_callback' => array(
		array(
			'setting' => 'custom_scrollbar',
			'operator' => '==',
			'value' => 'enable'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'custom_scrollbar_bar_color',
	'section' => 'core_scrollbar',
	'label' => esc_html__( 'Bar Color', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'alpha' => false
	),
	'default' => '#c3323a',
	'output' => array(
		array(
			'element' => '::-webkit-scrollbar-thumb',
			'property' => 'background-color'
		)
	),
	'active_callback' => array(
		array(
			'setting' => 'custom_scrollbar',
			'operator' => '==',
			'value' => 'enable'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'slider',
	'settings' => 'custom_scrollbar_width',
	'section' => 'core_scrollbar',
	'label' => esc_html__( 'Bar Width', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'min' => '0',
		'max' => '16',
		'step' => '2'
	),
	'default' => '5',
	'output' => array(
		array(
			'element' => '::-webkit-scrollbar',
			'property' => 'width',
			'units' => 'px'
		)
	),
	'active_callback' => array(
		array(
			'setting' => 'custom_scrollbar',
			'operator' => '==',
			'value' => 'enable'
		)
	)
) );

/**
 * Admin logo
 */
VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'login_logo_image',
	'section' => 'core_login_logo',
	'label' => esc_html__( 'Authorization Logo', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => $theme_path_images . 'vlthemes.png',
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'login_logo_image_height',
	'section' => 'core_login_logo',
	'label' => esc_html__( 'Logo Height', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '115px',
	'active_callback' => array(
		array(
			'setting' => 'login_logo_image',
			'operator' => '!=',
			'value' => ''
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'login_logo_image_width',
	'section' => 'core_login_logo',
	'label' => esc_html__( 'Logo Width', 'mikael' ),
	'transport' => 'auto',
	'priority' => $priority++,
	'default' => '102px',
	'active_callback' => array(
		array(
			'setting' => 'login_logo_image',
			'operator' => '!=',
			'value' => ''
		)
	)
) );

/**
 * Admin logo
 */
VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'login_logo_image',
	'section' => 'core_login_logo',
	'label' => esc_html__( 'Authorization Logo', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => $theme_path_images . 'vlthemes.png',
) );