<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_pakora_hut');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'O-{dT^+Qxt0#g]nn(j.zRx_ADn>V!yN*c:H$=WLu!EaFR_Fyr?/zI2CiE?@6)UC3');
define('SECURE_AUTH_KEY',  '3id=aebHL ivc9X>VOOH/KzhJqanYb}4+DQFIVU&s|E+!4daD3=06Lk988(^36$u');
define('LOGGED_IN_KEY',    'HTqZd#+X&vLlex9B`Ct/2 J/,Xr6Ek-R4g.bfPa7|MR.|S7tAbg`as2dt3,iPBQG');
define('NONCE_KEY',        'G2(%Q+*:Q#|n16/biR*%o^^vEfcfm>/Cf+%O85q/)b=$>E[hcJ+UJdj]w/H`y^bv');
define('AUTH_SALT',        ';Fv++ihIp:~>RoMZ*cF.H}*$ |+y!P$YxTuC$-q|#Tw8}a61j7:i,;,eDfBmcxV+');
define('SECURE_AUTH_SALT', 'n-7x1thKsn|zb3SPeMto7X+tsUGxZu)sez5> tC~TJT`)aB5eatc:;(jx+R#s[?7');
define('LOGGED_IN_SALT',   '7])c*u$lrSs-;QZNYU6#n&&RvW7+]b62b2<+m=UVu[v!(p+Gse;]45!J*gC3i-~r');
define('NONCE_SALT',       '-L*SC_7*rESq{!<1QWdjcP_v5n_^GXo?*=Q-D_iG610Jr6s-TL7(<`9t&ejVlc$I');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
