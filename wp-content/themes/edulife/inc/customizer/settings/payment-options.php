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

$panel_id   = 'edulife_general_options';
$section_id = 'edulife_general_options_payment_options';


$wp_customize->add_section(
	$section_id,
	array(
		'title' => __( 'Payment Options', 'edulife' ),
		'panel' => $panel_id,
	)
);



edulife_register_option(
	$wp_customize,
	array(
		'type'              => 'checkbox',
		'name'              => 'edulife_theme_options[payment_option_visa]',
		'sanitize_callback' => 'wp_validate_boolean',
		'default'           => true,
		'label'             => esc_html__( 'VISA', 'edulife' ),
		'section'           => $section_id,
	)
);




edulife_register_option(
	$wp_customize,
	array(
		'type'              => 'checkbox',
		'name'              => 'edulife_theme_options[payment_option_paypal]',
		'sanitize_callback' => 'wp_validate_boolean',
		'default'           => true,
		'label'             => esc_html__( 'PayPal', 'edulife' ),
		'section'           => $section_id,
	)
);




edulife_register_option(
	$wp_customize,
	array(
		'type'              => 'checkbox',
		'name'              => 'edulife_theme_options[payment_option_jcb]',
		'sanitize_callback' => 'wp_validate_boolean',
		'default'           => true,
		'label'             => esc_html__( 'JCB', 'edulife' ),
		'section'           => $section_id,
	)
);




edulife_register_option(
	$wp_customize,
	array(
		'type'              => 'checkbox',
		'name'              => 'edulife_theme_options[payment_option_ico_mastercard]',
		'sanitize_callback' => 'wp_validate_boolean',
		'default'           => true,
		'label'             => esc_html__( 'Master Card', 'edulife' ),
		'section'           => $section_id,
	)
);
