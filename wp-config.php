<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'tinybirddesignstudio');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'o+5:HVR9w `d#jnBBlb_hog#$*o$>Mxr%YrZ&F4UZuTDHql(~P|YLX6l}Y]+s2#h');
define('SECURE_AUTH_KEY',  'JegU-9.J%ZgjKf,9eCa2v^Or_?Zx25w}`1HfI^PLZy4;,vF;fH0.jl4eMhOy!iS<');
define('LOGGED_IN_KEY',    'Yr;OqjD?ZXX7#>.^D%BR2n]4{EqY<oA`ie@5eFa@;- oa:#g3wx9t)`*hnc>&8Xu');
define('NONCE_KEY',        'L[V_sN@G;DC9)2bHfR6gbr`8.yo(&A}::0Q8b~CDlUE6rN3gB}st(_JL4tu_Cg}=');
define('AUTH_SALT',        'G,lkk|qW{+4A8oNI/d!dW(4r+1X#2]m(?w iYb9=F2Z&;-)u[(5 pR)+Hn=_alji');
define('SECURE_AUTH_SALT', 'v9^T{1vrS%c,.t+&N<!X/(#}aZV0xlWSIq0|d1z,(V8tq-c$4@8iglp`@53!9m0M');
define('LOGGED_IN_SALT',   'NY,FjO2MXieF.R~g#V694sbsT.hCur&9[zSq]>}k*-OQv>M^hT_ tcnO_OAtgH`~');
define('NONCE_SALT',       '}T-w#*0xp4,]i!3T1Qg |5/|t^#p5!6eRxCNByS^AZ>`>?(6gKJY3UI>!:-:#U;$');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
