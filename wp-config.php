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
define('DB_NAME', 'wp-vue-api');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'yRgArO~^.^&ZoKUvAw#w@;K6rgR4p;Lyq&#Ff<$}%|Sq)49t-~9$*i{9x_:L9Jtw');
define('SECURE_AUTH_KEY',  ',Ln-q<Ih` 8zOrC (BacrAF=Q/6-OY_7Hm|HI g3KSte[zw^o8VUK^;A.m#:JXar');
define('LOGGED_IN_KEY',    '/8%9,~(I_6YCAq4<>kYCSws<>GGjbFVn9W <i`(br<@f43z^)2o+T#m5]<]@v;RU');
define('NONCE_KEY',        'wy~=d2=ODu51G2+eH0P6_Fo-N3xJu;^L)U}kUbN$xQ(;3+g/pKn&92T~6wa}1P 2');
define('AUTH_SALT',        'D7 cQA6^3_b16@rC2Kj6TE7LEx<!_d1l3v/n,NyTy]idD.9T}U& pdjT5g`[R(4.');
define('SECURE_AUTH_SALT', ')J8L~J93[1NQvIVaZ#gTqY/vp#x$N6j/^(B8s<GrEZISq!&C/1}V SP_FwQ8BBZq');
define('LOGGED_IN_SALT',   'nfrPCz=?O:0$3|R~>UOqnZ@E.}{cmlBr`WVfM`.O@>hY|@uqb`cA ,OL$0X+V=<u');
define('NONCE_SALT',       '=)uKIPA>SQy2^Ya  m u@`>x(?wT(Yi@yAI>]yVqHUFcytaZi22m/c<P{-CBoE!_');

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
