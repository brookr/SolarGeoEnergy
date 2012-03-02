<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don"t have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
if (isset($_SERVER["DATABASE_URL"])) {
  $db = parse_url($_SERVER["DATABASE_URL"]);
  define("DB_NAME", trim($db["path"],"/"));
  define("DB_USER", $db["user"]);
  define("DB_PASSWORD", $db["pass"]);
  define("DB_HOST", $db["host"]);
}
else {
  die("Your DATABASE_URL does not appear to be correctly specified.");
}

/** Database Charset to use in creating database tables. */
define("DB_CHARSET", "utf8");

/** The Database Collate type. Don"t change this if in doubt. */
define("DB_COLLATE", "");

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define("AUTH_KEY",         ";xu|*j$t?IiAPR$! ^I=zD9L+}#ha?hx.@FzA:[b-7?@+RtC;<,V7uN4+#C@38G}");
define("SECURE_AUTH_KEY",  "Pbx[}[#n;:,#& lyy=;&RXq4r!_IomCGTV5En+3bDL?ody`i@MCS0$Z+hK^r:]P)");
define("LOGGED_IN_KEY",    "6H)N|?UaZcQ6&}o*|!i h^Rpps}Vw>a%E{0h(1D(-mTHM7eA 8sKI/k;1 !3+R_Q");
define("NONCE_KEY",        "W.8FH8-S+yud3JIz!c.wH}~D?1J93(lmst0UX^^Nlz t|%02UPd||-OY&miSet-W");
define("AUTH_SALT",        "fk/Q0F)EkEpC:_#QI7JUIJiMIEz+^~Kf^XAOjOVMn5ysR<}%=[[[@0xmF ]2j|V`");
define("SECURE_AUTH_SALT", "F6zg+!DLuKL:!0ZYKFE*kCk|BM3{Xhm,R6TQBw94ZY=u&Klz^lyIs+D&Cc@09*=I");
define("LOGGED_IN_SALT",   "}7O+5AeyQ-^DK1Z*# ->UuQoY:jq8oPC8PGM0:DRNY62=.(<;*8ZoW}H`)+-o~f`");
define("NONCE_SALT",       "##M=Rd8!x4n|($S)&rq7XLGTxt?f=V>/2h[:?K$!J8>n_/1BxUuv-N2DH<d0E=L|");
/**#@-*/

define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME']);
define('WP_HOME', 'http://' . $_SERVER['SERVER_NAME']);

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = "wp_";

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to "de_DE" to enable German
 * language support.
 */
define("WPLANG", "");

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define("WP_DEBUG", strpos($_SERVER['SERVER_NAME'], ".dev"));

/* That"s all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined("ABSPATH") )
	define("ABSPATH", dirname(__FILE__) . "/");

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . "wp-settings.php");
