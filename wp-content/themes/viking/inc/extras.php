<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package viking
 */

/**
 * Adds custom classes to the array of body classes.
 */
function viking_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'viking_body_classes' );

add_filter( 'get_the_excerpt', 'viking_custom_excerpt_more',100 );
add_filter( 'excerpt_more', 'viking_excerpt_more',100 );
add_filter( 'the_content_more_link', 'viking_content_more', 100 );

function viking_continue_reading( $id ) {
	return '<a href="' . get_permalink( $id ) . '">' . esc_html__( 'Continue reading: ', 'viking' ) . get_the_title( $id ) . '</a>';
}

function viking_excerpt_more( $more ) {
	global $id;
	return '... ' . viking_continue_reading( $id );
}

function viking_content_more( $more ) {
	global $id;
	return viking_continue_reading( $id );
}

function viking_custom_excerpt_more( $output ) {
	if ( has_excerpt() && !is_attachment() ) {
		global $id;
		$output .= ' ' . viking_continue_reading( $id );
	}
	return $output;
}
