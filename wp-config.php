<?php
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
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          '5->J,vN[EY6rP,=56ld@[s{.v1]#NbJqwB#xT0ycK$!_*D|X@o|gbi`}9_QSHWMk' );
define( 'SECURE_AUTH_KEY',   '[9yR_({u2hm!_9y`(;VKI<OIpeBqo5&=D3w/HiXB6v[CRr1kJuz(?|?`Da^`>Z{E' );
define( 'LOGGED_IN_KEY',     'rb,rA4h+1ku0I]4gC6c_c=@0gBr*d)BiMqoUJO8~ilOO7l.bg/%nf{*7{Ua>-!ej' );
define( 'NONCE_KEY',         'JE[2iC-Y9}GvOWfr2XJ]gQ:I/ga[C&08M9Hvpo fGZcJt!A6)7PNLU 1]rlp??<4' );
define( 'AUTH_SALT',         'NYz.GrCrrBP^3A7B&}PJ6JQj(.~p?|Hz|<Qr|p nlC{K-A*Jb)/aSyu~pU,<Jv=K' );
define( 'SECURE_AUTH_SALT',  '.=(-(pj/^hK:LJt3khg& jX6BE39[XclW ^E`UFLHmMbKr4l.Ndu%q1-,I+Ai]LO' );
define( 'LOGGED_IN_SALT',    'VgCC/M-=0Y[IZ:3WRdda+|}X:4+QbsRbdY|i<%1<LFsQq<HNa4=o<_=:w-bNm2u|' );
define( 'NONCE_SALT',        '1)T|r$2U4B>k9(^*!)H=H^% $g g?|K5(`UAq<g+g+].P1 b!w]X-lM#R }6w%Ns' );
define( 'WP_CACHE_KEY_SALT', '[w};sBy*&;,7jn&tLc2(1)Bohw3,<-F;uOQZ#6^0V.S*4y*[*Et]J-Gop&^ZLQ8^' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
