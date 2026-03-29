<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

$priority = 0;

/**
 * Advanced
 */
VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'custom_cursor',
	'section' => 'section_advanced',
	'label' => esc_html__( 'Custom Cursor', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'disable' => esc_html__( 'Disable', 'mikael' ),
		'enable' => esc_html__( 'Enable', 'mikael' ),
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'jquery_in_footer',
	'section' => 'section_advanced',
	'label' => esc_html__( 'Load jQuery in footer', 'mikael' ),
	'description' => esc_html__( 'Solves render-blocking issue, however can cause plugin conflicts.', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'disable' => esc_html__( 'Disable', 'mikael' ),
		'enable' => esc_html__( 'Enable', 'mikael' ),
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'acf_show_admin_panel',
	'section' => 'section_advanced',
	'label' => esc_html__( 'Show ACF in Admin Panel', 'mikael' ),
	'description' => esc_html__( 'This field enable tab for ACF Professional in your dashboard.', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'hide' => esc_html__( 'Hide', 'mikael' ),
		'show' => esc_html__( 'Show', 'mikael' ),
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'mobile_status_bar_color',
	'section' => 'section_advanced',
	'label' => esc_html__( 'Mobile Status Bar Colors', 'mikael' ),
	'description' => esc_html__( 'Field for address bar or device status bar to match your brand colors.', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '#c3323a',
) );