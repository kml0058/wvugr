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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wvugr' );

/** MySQL database username */
define( 'DB_USER', 'mohammed' );

/** MySQL database password */
define( 'DB_PASSWORD', '96670240@Mm' );

/** MySQL hostname */
define( 'DB_HOST', 'codeomnet.fatcowmysql.com' );

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
define( 'AUTH_KEY',         'n*,aOQlSQ{F>y_Yn$(ThW6 Xz2s7=rw#P pfQOFmyY#7fpa54$MAAuF)8^H7]a9b' );
define( 'SECURE_AUTH_KEY',  'aE4#+SJ;)h^iDY{I*CqM6Ya}]j^J :S&>/|ePKQ]]QY3ediZdn_WGzAn5;WptjH:' );
define( 'LOGGED_IN_KEY',    '#9$pPbHP4?3cs+ eIOe.}C-p13Wr@Hpj6[_t,JY*_=t8[vb;aA:,658Pts4pFZD%' );
define( 'NONCE_KEY',        'm2?=#j/{2&fKzV^F5pCPPj||PQkoTj!u2[O2d(4/vpbPi/J}@I m:2{KMm`h?Rr+' );
define( 'AUTH_SALT',        '$u_|Gux=bo)*!5G/g3V,tsYzy+0MR!^9npTb}N`67g$UpYyLbD&d*TAkH66.TfJ,' );
define( 'SECURE_AUTH_SALT', 'O_/5>Z?M+G508Iqbh;DaNWy<%R[)89pAP-{S//H3V*Gy*zYfohVB_gW/NT2,>dDn' );
define( 'LOGGED_IN_SALT',   'xh2&L2 uV,%M9(W8=^eh#X/.,A$,&HQ^k,[~_@h1tScZH25MgS668o::N<`Eend+' );
define( 'NONCE_SALT',       'Z5fl9.[a}m+&&jo/!_E;Zz0O3v,G3R43~c##(pK[2jA/qOF`6101QKY?et~QiEEK' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_wvugr';

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
