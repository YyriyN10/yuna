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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'myguttenberg' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'myDBpass100!' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '|GcZz=mC* bZe`m]q<*FEK|R&&x!.L=RJhNYpW._r`mD=|k/{0%E=:0S8xs@|ADv' );
define( 'SECURE_AUTH_KEY',  'a-G!~y7Zd vod*DMfG%u9m;CdU,^o%$4V/ycz&4v,K~[1rU1m+uCCO4`VrP^]Iy*' );
define( 'LOGGED_IN_KEY',    ',}NKm@4Z%CV)y09(*{fJgLO6[)tALjD+#08zN.C-6,~Gg0K$Evb6x!B`HsX,T*)X' );
define( 'NONCE_KEY',        'f]9E[ }]eq. zFmdtr@<<:C^iJ.J2l45sA]dNK|C<Jn@EJ6OXxHtTP18tCN&ViC5' );
define( 'AUTH_SALT',        '}&gXE-q=CJVB2a>~i`OS! 5|%)df?Mti6no]*Q%TM`(cfI(L(>+I$$0;w]%#UUj/' );
define( 'SECURE_AUTH_SALT', '-/^a+5R}_,i]H(eJ4cJ!nE-.|?_SG-Osj3Xd~M|JpaLT1TNPaEjX[^V$P,z+ON -' );
define( 'LOGGED_IN_SALT',   '/F5&dE:GKal1k(1u_h.?gX&~##G3g@(MKw.)8v=[t+}mGhB,v?H7ddR!eS$vH%3(' );
define( 'NONCE_SALT',       'mZ~b}W|h88^A/U)?+ 5h?j67nU-jlyzV&Ui?wE+SV-J$A,UIP0FRR}(lX4!GF/Ib' );

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

	/** Загрузка плагинов и обновлений без FTP. */
	define('FS_METHOD', 'direct');

	/* Отключение редактирования файлов в админке WP */
	define('DISALLOW_FILE_EDIT', true);