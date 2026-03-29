<?php

/**
 * @author: VLThemes
 * @version: 1.0.5
 */

$priority = 0;

/**
 * Action block
 */
VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'popup_cf7_shortcode',
	'section' => 'section_action_block',
	'label' => esc_html__( 'CF7 Shortcode', 'mikael' ),
	'priority' => $priority++,
	'transport' => 'auto',
) );