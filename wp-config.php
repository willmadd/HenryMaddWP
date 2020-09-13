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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */




define('RELOCATE',true);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'henrymaddwp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'pV+Xypv=l9>a.mF5auR+.@ RYDTlVl^b8`A^>tuihzJM`*Gzf-Z@FuC+5E94I!}n' );
define( 'SECURE_AUTH_KEY',  'cd^<~O:4bU?_])e&quhCym]6L{,$SG6l7;;A`-KVLz4:4T(Zqln2(h7D=EtsT>}r' );
define( 'LOGGED_IN_KEY',    'Ky6+cv#Wf1t@hK3>sk% qoT6XcmHj,QpdK*jAR&GzEKX<w.OIYZz>|7:Ou:HdNk_' );
define( 'NONCE_KEY',        'ZQ-]FM}puv5`XYc8[Ok4K)*rt#DgV%7<{YEGoXIY!I}vKa)Pnq6S/]AFzCv:.?)Y' );
define( 'AUTH_SALT',        'JhU7sux{eJ).N)Es4scX)HG.|8ZaylrZ*SD#d s}eaC=&/Q@HR=9)h3X=O7^y(A3' );
define( 'SECURE_AUTH_SALT', 'q;.Vm&einCFin1}*+GHMZ:7W,AOvP@ZW{O~fpgOw;.]mLL*bwV1wN:T{|)|f3,hp' );
define( 'LOGGED_IN_SALT',   '?O{sKHSt7[f#1KBQoz1/P?e*fMy_}Q*V|Em]?FTE6e)J^}T9phO/Bc F,!k0&09A' );
define( 'NONCE_SALT',       'sXk8S~K-LBzO,Nha e=~kyli{C[8;r<&oN[rq~I<)LT[Z.x}b)` Z3n3A)MLLM;%' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
