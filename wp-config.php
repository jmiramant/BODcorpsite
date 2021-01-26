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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'kTsxfrbbpZ6qJnjzz6F9uPbVBCsWSkbkG10xeqHBlCGvLC+KsUatLFFbRdj02GwKimDyhR36gsGT4AeKMzt/BQ==');
define('SECURE_AUTH_KEY',  'MlxNdXzQfEJfokNY6o6kmya39B8F/4Ibh/ydjs91AdzyK+0/6yvDeJ93nbEKF+j0nT3LHaCTVtJ97sT/2QY5WA==');
define('LOGGED_IN_KEY',    '2ptxQj4Pn0tHyrp4ojBLvfxocJHXS67w7FcmwWwsZNTo0e8vPz8/d31/zLgpdXYLcatWvnVJm+AscKyHbYR8qg==');
define('NONCE_KEY',        'Hb25H/FoH2VoQ+/0b6pwoIlxMs1w6RAKERn+eL+q16EqI7jDQOtu93w6hkTdqXQre4ItaJrqyLNrrSjXdUggNw==');
define('AUTH_SALT',        '5WbQha+tEmMlJ7geJW9Pf/D5IrxrFbt+1MUAAaIWTFrFRQ2KhfVCnGaiokXq21dfISZoqPETE+F3LMbCCGefoQ==');
define('SECURE_AUTH_SALT', 'NaAzu3QOkWtf56spJ958u89YU52i1KBW+VP/Le34OzvYqJXB7746vnCtHD38vlWwocqUk19BJIApdmbSvevrCg==');
define('LOGGED_IN_SALT',   'whB4YJzcwh8xNoPBFeS1tY0MxSG+IVzxr7CrO1oUAhpw1H7sSXrKBl5/hkbtmWVM4S1gOkSd+9h4oDwfBrJWFA==');
define('NONCE_SALT',       '63PIGME6a/xzvUiOMTX9FeEq48xgV7ESRfM4IiqWIFiY7/lTeECm5/zDWFVW72KWzUj2aR5uqQDwGfofD0q7aw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
