<?php
/**
 * This file contains required settings for the general options panel.
 *
 * @package edulife
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$section_id = 'colors';


edulife_register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'custom_control'    => 'WP_Customize_Color_Control',
		'name'              => 'edulife_theme_options[primary_color]',
		'default'           => $defaults['primary_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'label'             => esc_html__( 'Primary Color', 'edulife' ),
		'section'           => $section_id,
	)
);



edulife_register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'custom_control'    => 'WP_Customize_Color_Control',
		'name'              => 'edulife_theme_options[secondary_color]',
		'default'           => $defaults['secondary_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'label'             => esc_html__( 'Secondary Color', 'edulife' ),
		'section'           => $section_id,
	)
);

