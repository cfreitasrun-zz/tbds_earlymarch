<?php


function skymile_home_feature() {
	$default_features = array(
		array(
			'title' => skymile_option( 'feature_title1', __( 'Responsive Designs.', 'skymile' ) ),
			'image' => skymile_option( 'feature_image1', get_template_directory_uri() . '/assets/dummy/box-1.png' ),
			'link' => skymile_option( 'feature_link1', '#' ),
			'description' => skymile_option( 'feature_description1', 'Cloud hosting is basically the type of a web a  virtual world in order to geneate required server resource for mainly.' )
		),
		array(
			'title' => skymile_option( 'feature_title2', __( 'Responsive Designs.', 'skymile' ) ),
			'image' => skymile_option( 'feature_image2', get_template_directory_uri() . '/assets/dummy/box-2.png' ),
			'link' => skymile_option( 'feature_link2', '#' ),
			'description' => skymile_option( 'feature_description2', 'Cloud hosting is basically the type of a web a  virtual world in order to geneate required server resource for mainly.' )
		),
		array(
			'title' => skymile_option( 'feature_title3', __( 'Responsive Designs.', 'skymile' ) ),
			'image' => skymile_option( 'feature_image3', get_template_directory_uri() . '/assets/dummy/box-3.png' ),
			'link' => skymile_option( 'feature_link3', '#' ),
			'description' => skymile_option( 'feature_description3', 'Cloud hosting is basically the type of a web a  virtual world in order to geneate required server resource for mainly.' )
		),
	);
	return $default_features;
}

function skymile_default_social_icons() {
	$default_social = array(
		array(
			'type' => 'facebook',
			'link' => '#',
			'new_tab' => true,
		),
		array(
			'type' => 'twitter',
			'link' => '#',
			'new_tab' => true,
		),
		array(
			'type' => 'google_plus',
			'link' => '#',
			'new_tab' => true,
		),
		array(
			'type' => 'rss',
			'link' => '#',
			'new_tab' => true,
		),
		array(
			'type' => 'pinterest',
			'link' => '#',
			'new_tab' => true,
		),
		array(
			'type' => 'linkedin',
			'link' => '#',
			'new_tab' => true,
		),
		array(
			'type' => 'stumble_upon',
			'link' => '#',
			'new_tab' => true,
		),
	);
	return $default_social;
}
