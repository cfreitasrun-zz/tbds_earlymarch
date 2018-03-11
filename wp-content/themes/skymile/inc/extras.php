<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package skymile
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function skymile_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'skymile_page_menu_args' );


/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function skymile_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}
	
	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'skymile' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'skymile_wp_title', 10, 2 );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function skymile_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'skymile_setup_author' );


/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'skymile_register_required_plugins');

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function skymile_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(        
        array(
            'name' => 'Kirki',
            'slug' => 'kirki',
            'required' => false,
        ),
    ); 

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id' => 'skymile', // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '', // Default absolute path to bundled plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'has_notices' => true, // Show admin notices or not.
        'dismissable' => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false, // Automatically activate plugins after installation or not.
        'message' => '', // Message to output right before the plugins table.

            /*
              'strings'      => array(
              'page_title'                      => __( 'Install Required Plugins', 'skymile' ),
              'menu_title'                      => __( 'Install Plugins', 'skymile' ),
              'installing'                      => __( 'Installing Plugin: %s', 'skymile' ), // %s = plugin name.
              'oops'                            => __( 'Something went wrong with the plugin API.', 'skymile' ),
              'notice_can_install_required'     => _n_noop(
              'This theme requires the following plugin: %1$s.',
              'This theme requires the following plugins: %1$s.',
              'skymile'
              ), // %1$s = plugin name(s).
              'notice_can_install_recommended'  => _n_noop(
              'This theme recommends the following plugin: %1$s.',
              'This theme recommends the following plugins: %1$s.',
              'skymile'
              ), // %1$s = plugin name(s).
              'notice_cannot_install'           => _n_noop(
              'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
              'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
              'skymile'
              ), // %1$s = plugin name(s).
              'notice_ask_to_update'            => _n_noop(
              'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
              'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
              'skymile'
              ), // %1$s = plugin name(s).
              'notice_ask_to_update_maybe'      => _n_noop(
              'There is an update available for: %1$s.',
              'There are updates available for the following plugins: %1$s.',
              'skymile'
              ), // %1$s = plugin name(s).
              'notice_cannot_update'            => _n_noop(
              'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
              'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
              'skymile'
              ), // %1$s = plugin name(s).
              'notice_can_activate_required'    => _n_noop(
              'The following required plugin is currently inactive: %1$s.',
              'The following required plugins are currently inactive: %1$s.',
              'skymile'
              ), // %1$s = plugin name(s).
              'notice_can_activate_recommended' => _n_noop(
              'The following recommended plugin is currently inactive: %1$s.',
              'The following recommended plugins are currently inactive: %1$s.',
              'skymile'
              ), // %1$s = plugin name(s).
              'notice_cannot_activate'          => _n_noop(
              'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
              'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
              'skymile'
              ), // %1$s = plugin name(s).
              'install_link'                    => _n_noop(
              'Begin installing plugin',
              'Begin installing plugins',
              'skymile'
              ),
              'update_link' 					  => _n_noop(
              'Begin updating plugin',
              'Begin updating plugins',
              'skymile'
              ),
              'activate_link'                   => _n_noop(
              'Begin activating plugin',
              'Begin activating plugins',
              'skymile'
              ),
              'return'                          => __( 'Return to Required Plugins Installer', 'skymile' ),
              'plugin_activated'                => __( 'Plugin activated successfully.', 'skymile' ),
              'activated_successfully'          => __( 'The following plugin was activated successfully:', 'skymile' ),
              'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'skymile' ),  // %1$s = plugin name(s).
              'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'skymile' ),  // %1$s = plugin name(s).
              'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'skymile' ), // %s = dashboard link.
              'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'skymile' ),

              'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
              ),
             */
    );

    tgmpa($plugins, $config);
}
