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
#define('DB_NAME', 'inspiredbyzuck');
define('DB_NAME', $_SERVER['RDS_DB_NAME']);

/** MySQL database username */
#define('DB_USER', 'inspiredbyzuck');
define('DB_USER', $_SERVER['RDS_USERNAME']);

/** MySQL database password */
#define('DB_PASSWORD', 'Vhpr23iwSM');
define('DB_PASSWORD', $_SERVER['RDS_PASSWORD']);

/** MySQL hostname */
#define('DB_HOST', 'localhost');
define('DB_HOST', $_SERVER['RDS_HOSTNAME'] . ':' . $_SERVER['RDS_PORT']);


/** Secure rds connection*/
#define('MYSQL_SSL_CA', $_SERVER['HTTPS']);
#define( 'MYSQL_CLIENT_FLAGS', MYSQLI_CLIENT_SSL );


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
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

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

<?php
 
// we need to include the file below because the activate_plugin() function isn't normally defined in the front-end
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
// activate pre-bundled plugins
activate_plugin( 'search-replace/search-replace.php' );
activate_plugin( 'really-simple-ssl/rlrsssl-really-simple-ssl.php' );
activate_plugin( 'amazon-s3-and-cloudfront/wordpress-ssl.php' );
 
?>



#<?php
// get already activated plugins
#$plugins = get_option('active_plugins');
#if($plugins){
 #   $puginsToActiv = array('Plugin1', 'Plugin2', 'Plugin3');
 #   foreach ($puginsTostActiv as $plugin){
  #      if (!in_array($plugin, $plugins)) {
   #          array_push($plugins,$plugin);
    #   }
   # }
#}
# ?>

# function run_activate_plugin( $plugin ) {
 #   $current = get_option( 'active_plugins' );
  #  $plugin = plugin_basename( trim( $plugin ) );

   # if ( !in_array( $plugin, $current ) ) {
    #    $current[] = $plugin;
     #   sort( $current );
     #   do_action( 'activate_plugin', trim( $plugin ) );
     #   update_option( 'active_plugins', $current );
     #   do_action( 'activate_' . trim( $plugin ) );
     #   do_action( 'activated_plugin', trim( $plugin) );
   # }

   # return null;
# }
# run_activate_plugin( 'akismet/akismet.php' );
