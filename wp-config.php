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

define('FS_METHOD','direct');

define( 'DB_NAME', $_ENV["DB_NAME"] );

/** MySQL database username */
define( 'DB_USER', $_ENV["DB_USER"] );

/** MySQL database password */
define( 'DB_PASSWORD', $_ENV["DB_PASSWORD"] );

/** MySQL hostname */
define( 'DB_HOST', $_ENV["DB_HOST"] );

$_SERVER['HTTPS'] = 'on'; 
define( 'WP_SITEURL',  'https://' . $_SERVER['HTTP_HOST']);
define( 'WP_HOME',  'https://' .  $_SERVER['HTTP_HOST']);
define( 'WP_AUTO_UPDATE_CORE' , false );

//desabilita notificaoes
// define('DISALLOW_FILE_EDIT',true); // theme, plugin
// define('DISALLOW_FILE_MODS',true); // core, plugin


define( 'WPMS_ON', true ); // True turns on the whole constants support and usage, false turns it off.
define( 'WPMS_DO_NOT_SEND', false ); // Or false, in that case constant is ignored.
define( 'WPMS_MAIL_FROM', 'bounces+16343161@em7137.lojascloud.com.br' );
define( 'WPMS_MAIL_FROM_FORCE', true ); // True turns it on, false turns it off.
define( 'WPMS_MAIL_FROM_NAME', $_SERVER['HTTP_HOST'] );
define( 'WPMS_MAIL_FROM_NAME_FORCE', true ); // True turns it on, false turns it off.
define( 'WPMS_MAILER', 'sendgrid' ); // Possible values: 'mail', 'smtpcom', 'sendinblue', 'mailgun', 'sendgrid', 'gmail', 'smtp'.
define( 'WPMS_SENDGRID_API_KEY', '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' );


/** Database Charset to use in creating database tables. */

define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_general_ci');
define('WPLANG', 'pt_BR');
define( 'WP_DEBUG', false );

if($_SERVER['HTTP_HOST']=='51.222.38.90:'.$_ENV["PORT_WP"] || $_SERVER['HTTP_HOST']=='192.168.15.200:'.$_ENV["PORT_WP"])
	header('Location: https://'.$_SERVER['HTTP_HOST'].'/wp-admin/');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '_sI)jY_r}zYex.fQm9%rjPuTp#qMb:nVYaD?z@2P0I~;k&3#Iv>j{t39HMjd0gfX' );
define( 'SECURE_AUTH_KEY',  'y6|/*eAL^Mea[Tq%DXD24s;W`J]2VPSs5PJL8b:QP2c[hP9YVmT`4fJbgnCWde7=' );
define( 'LOGGED_IN_KEY',    'q-v~Kvoui.nTT+@Mnd2[.[y&=?{^<[9B[u=BnR7/L_NApK|oJkEs*O}l7:-z]uAH' );
define( 'NONCE_KEY',        'kg1d:4VBeR(i~}R.MzvkYxZO?X*?.Ep:skqZLD:`f.S|5`*l1L&-cv6B9GRo814N' );
define( 'AUTH_SALT',        '$hHn`aT8zeK-iUl45)#wRxo+,U={K-8yaUX!8~` g1%eH1Ed$Gi>H+C;W-gjL4,#' );
define( 'SECURE_AUTH_SALT', 'cB $X2$T:v4UooGi. YGDL??R++w1mO7x`!3WV+FpFRv;Caz-.&:]c5ack>]v-{.' );
define( 'LOGGED_IN_SALT',   '~ZJsJ~2+wB+7_8q4UC9xX]HBE,7]lsL#4H888SR(8X8($C,hzSInEU0c1YEAR5kZ' );
define( 'NONCE_SALT',       'Zo/|i9oeT0kZ]58vT@1bms?~U7651Qg;sjxxWiUg0}J4>6zSzI7pR)AA(+E9ll`*' );

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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
