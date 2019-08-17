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
define('DB_NAME', 'mwdomain_wp8');

/** MySQL database username */
define('DB_USER', 'mwdomain_wp8');

/** MySQL database password */
define('DB_PASSWORD', 'W.ECU4XgANcsq4Muxg539');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'My4uKRjF5rxotJ6V8em7uwSLtFVnCNXEe3vi8nbRC9w9Dr2j00NaONFpZ2eFcxBt');
define('SECURE_AUTH_KEY',  'XrIhINxm2dCyY0aACT5cNuxdjzpa0GTirkGgPKmBC7ZnS5Oziu3IsQDsuriPcAb6');
define('LOGGED_IN_KEY',    'ZIncddEjg71Ll8sqiKGOQT6QptIBVIHxLiZ4hQGaea1th9gPsc9TLbCPfRmEEn0g');
define('NONCE_KEY',        '9zUbvb9DDRH25XoT79FcktbvzZqxRIrCmtJdGHtBzQqfETHWPZFrWTIBNK9blIN9');
define('AUTH_SALT',        'WokBOlM8sxNQ8Yc1UOV1POwAmueQxTXzvx04XxpfvtD10oMz7CMj6rRQcBIpmjRa');
define('SECURE_AUTH_SALT', 'YMMKEiZY9YnViLPcvyOMxvosTBioAXoBN6htm58vURlewe2oCjrzdMfRMrAxBGFa');
define('LOGGED_IN_SALT',   'kd9OBYTAPhnPy2IzFyyw4yCKRRl3fCVk9SeNZUCp4Vxm34P1ZXIU6Y4x7AoCxgYZ');
define('NONCE_SALT',       'uk4wPBjscTdF0pPuMTHqxfHM4yAOzKs75CeMvv04M9SbU213ew8CKZYoJlWfvo9e');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);

define('WP_HOME','https://www.ymedia.es/wpsite');
define('WP_SITEURL','https://www.ymedia.es');


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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
