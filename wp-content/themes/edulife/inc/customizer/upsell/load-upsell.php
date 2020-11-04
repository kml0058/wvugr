<?php
/**
 * Loads the upsell button in customizer.
 *
 * @package edulife
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Loads upsell scripts when customizer loads.
 */
function business_class_load_upsell_scripts() {
	wp_enqueue_style( 'edulife-upsell', get_template_directory_uri() . '/inc/customizer/upsell/lib/upgrade.css', array(), '1.0.0', 'all' );
	wp_enqueue_script( 'edulife-upsell', get_template_directory_uri() . '/inc/customizer/upsell/lib/upgrade.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'business_class_load_upsell_scripts' );



/**
 * Load upsell.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function business_class_load_upsell( $wp_customize ) {

	require_once get_template_directory() . '/inc/customizer/upsell/lib/class-edulife-customizer-upsell.php';

	if ( class_exists( 'Edulife_Customizer_Upsell' ) ) {
		$wp_customize->register_section_type( 'Edulife_Customizer_Upsell' );

		$wp_customize->add_section(
			new Edulife_Customizer_Upsell(
				$wp_customize,
				'edulife_pro',
				array(
					'title'       => esc_html__( 'Edulife Pro', 'edulife' ),
					'button_text' => esc_html__( 'Buy Pro', 'edulife' ),
					'button_url'  => 'https://bunnytemplates.com/downloads/edulife-pro',
					'priority'    => 1,
				)
			)
		);
	}

}
add_action( 'customize_register', 'business_class_load_upsell' );
