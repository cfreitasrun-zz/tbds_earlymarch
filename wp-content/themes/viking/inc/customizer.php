<?php
/**
 * viking Theme Customizer
 *
 * @package viking
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function viking_customize_register( $wp_customize ) {

	/** Accessibility info*/
	$wp_customize->get_section( 'colors' )->description  = __( 'Please note that changing the colors can affect accessibility.', 'viking' );

	$wp_customize->add_section( 'viking_font' , array(
	    'title'      => __( 'Fonts', 'viking' ),
		'Description' => __( 'Changing the header font can affect accessibility.', 'viking' ),
	    'priority'   => 100,
	) );
	$wp_customize->add_setting( 'viking_font' , array(
		'default'        => 'sans-serif',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'viking_font',
		array(
			'label'         => __( 'Choose a header font', 'viking' ),
			'section'       => 'viking_font',
			'settings'      => 'viking_font',
			'type'          => 'select',
			'choices'		=> array(
			'sans-serif'	=> 'sans-serif (Default)',
			'Caudex'		=> 'Caudex',
			'Eagle+Lake'	=> 'Eagle Lake',
			'Macondo'		=> 'Macondo',
			'MedievalSharp' => 'MedievalSharp',
			),
		)
	) );
}
add_action( 'customize_register', 'viking_customize_register' );

function viking_sanitize_checkbox( $input ) {
	if ( 1 === $input ) {
		return 1;
	} else {
		return '';
	}
}
