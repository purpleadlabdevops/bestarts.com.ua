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
define( 'DB_NAME', 'bestarts' );

/** MySQL database username */
define( 'DB_USER', 'bestarts' );

/** MySQL database password */
define( 'DB_PASSWORD', 'XxhtGAo1N23myitl' );

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
define( 'AUTH_KEY',         '&(Pf)N*(P G0,=]/8[Q2{&)D,ebPisfZjZo,#M5mY8ZLzcm>s)sE{9:96&Z&g.qm' );
define( 'SECURE_AUTH_KEY',  '0_qIqecL0X1q5O](_/#G-Kp<n?a:waw3P+nqF^M05B}/Ihu&+%RbkANWqlF+MTgW' );
define( 'LOGGED_IN_KEY',    'R,_Wpbf6<W%_Cp^rN>HQ =S_k$WfIXT VZZ)_tT~Q]?8LoXd+Xb{Z2.hEkB`@>&E' );
define( 'NONCE_KEY',        './+t39d`wMJo9&b(5o$tIH }PlXGfsy3wGL/mNwnK:@;t+fEZ4=R`^q`O)[<TQ=f' );
define( 'AUTH_SALT',        'sY%vN?~@o|^^k1ALbWumJt0ElQ7sT%V{G,deRY`RW0om;w}:Y)+HnuN/KE#$a]1y' );
define( 'SECURE_AUTH_SALT', 'jC?p2{M8ksza!A|G0tNfV! `0zyL*LF;9Q_.|?f~b!]sq (D? *P+vdl%w$bKOI}' );
define( 'LOGGED_IN_SALT',   'qH<q$q/ZQGd0LXN&jO|k -27,P$Z^{l5oKfWGYolExg00`;cC(?U(b!U)?xxlrT_' );
define( 'NONCE_SALT',       '0[FmQnm>?,wq8 {=n0j&X?hGZ1PxC[GO,,&Mo434f/8U=s@_.o:J~&Q&: IOghQH' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
