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
define('DB_NAME', 'jch1179');

/** MySQL database username */
define('DB_USER', 'jch1179');

/** MySQL database password */
define('DB_PASSWORD', 'tpfus6531179@');

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
define('AUTH_KEY',         '2>VRJ}1R-_ 1Poyoxn8d0&GY8zlQ54rKAN3^@9~+[`|WfP?X]?*s%U=Pv-wRf_BM');
define('SECURE_AUTH_KEY',  '@Zf;Fh3i>3wp0In?~kH=C.It3t1lh!_MmOk2z`%/%RZhm<yl0&xi_&zFu-m(q3wn');
define('LOGGED_IN_KEY',    'xnDg4GZh}b+,`s;rBFn9k@|UVL;#d^E@B-+8`T?fpF[F(eE?KI[lrUB<qY8*cDr3');
define('NONCE_KEY',        'pZ.@t>z:`dI02~D)7nBxacW0Pma^UTczj}FX?49M7,JNT`e*A~R;=OnGGr.8ul74');
define('AUTH_SALT',        'pynlJK*3<K51MgcSFloB~rA&0CeNsM-Y#gQpw]BT1}n@8]S~3O=KKEd2>qZ_$O%H');
define('SECURE_AUTH_SALT', 'JL_AO@2U^NS?ggZoQMO3(lY/FD(F*t:b[f=%qZzn1Z MSdK4uw<PiA{0S;V!u]@|');
define('LOGGED_IN_SALT',   'M]:epkWC:$Qr7?r?u3^Nia5i3)^HuE7C#VMM^_o]4y|4ooN1Q ddF} ,q!=,pPTZ');
define('NONCE_SALT',       'jIUI&hns=#^x$cL</cLUK<Q}:K]p0W_=QlB,vF)W{+1GYsjPH#ZtV_LC{V,D,vA8');

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
