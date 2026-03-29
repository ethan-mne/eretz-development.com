<?php
define( 'WP_CACHE', true );
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u662656180_wxxTM' );

/** Database username */
define( 'DB_USER', 'u662656180_MdCIr' );

/** Database password */
define( 'DB_PASSWORD', 'MCkvlVmaue' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '|d&Q~A}/$rj?m],/z>vpNscJ,W7*CP=-;pZcyhT@9OmZ&iJQG4?b|P=~`tl;Y1Nz' );
define( 'SECURE_AUTH_KEY',   'V1d0kl6QwVF:Eh ^4?:T>O8qoX4e!N(q(&g09kg3$PQ$$Evkxa}.s6~]PuT/9!c.' );
define( 'LOGGED_IN_KEY',     'iXrf`p75Fy8;}3;iOY{N2^4Bm|`7{$*Bl5t/$?r%ot@KPZ++;lf/90_Pkr$Y;iLJ' );
define( 'NONCE_KEY',         '{u6[rtWUm~dVs;-;z<inLbDZ[4-aG1G`w@6-wl <#:yd[<x),s|~#Y7{~zYrpH$)' );
define( 'AUTH_SALT',         'hA9`iVC 6pB^5bH.SrCZb0=+xuDp!P/QooZwN3Xnv&6irt<8;;AwkuZ-^_N0zEWz' );
define( 'SECURE_AUTH_SALT',  ')}O-|v~4Z02H`y2ao).@Id5KZ^GxR=_<+[JY{_{fR`HQxP=oluK6>}$4-8)f!s>{' );
define( 'LOGGED_IN_SALT',    '/at$:#h|yolct07U2x)9*GT;=B%wI&pWKL!<R!dql5sR?T2A0ZC^5Dt4Zweb_[!g' );
define( 'NONCE_SALT',        'geIb)/aXA&G{L*IaUWd;|eY?E.YLj~[DUgec1X|fQaYfa3.{P?<j$LUAdj[R57G+' );
define( 'WP_CACHE_KEY_SALT', '>ev92F)y1@Tz&eekC-nU`2J%4n-`MM:8A2&yJNz.s~CEtotr[t~vF_@45v|#uSop' );


/**#@-*/

/**
 * WordPress database table prefix.
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


/* Add any custom values between this line and the "stop editing" line. */



define( 'WP_AUTO_UPDATE_CORE', 'minor' );
define( 'FS_METHOD', 'direct' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
