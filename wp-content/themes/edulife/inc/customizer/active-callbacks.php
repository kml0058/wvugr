<?php
/**
 * This file contains all the required active callback functions for the customizer settings.
 * 
 * @package edulife
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


function edulife_customizer_is_top_bar_enabled( $control ) {
	$enable_top_bar = $control->manager->get_setting( 'edulife_theme_options[enable_top_bar]' )->value();
	return $enable_top_bar;
}


function edulife_customizer_is_header_cta_enabled( $control ) {
	return $control->manager->get_setting( 'edulife_theme_options[enable_header_cta_btn]' )->value();
}


function edulife_customizer_is_notice_enable( $control ) {
	return $control->manager->get_setting( 'edulife_theme_options[enable_notice]' )->value();
}


function edulife_customizer_is_payment_link_enable( $control ) {
	return $control->manager->get_setting( 'edulife_theme_options[enable_notice]' )->value();
}
