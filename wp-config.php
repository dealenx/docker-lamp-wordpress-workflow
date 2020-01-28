<?php

// environment variables
require 'env.php';
if (
    !isset($_ENV['ENVIRONMENT']) ||
    !isset($_ENV['MYSQL_DATABASE']) ||
    !isset($_ENV['MYSQL_USER']) ||
    !isset($_ENV['MYSQL_PASSWORD']) ||
    !isset($_ENV['MYSQL_HOST']) ||
    !isset($_ENV['FORCE_SSL']) ||
    !isset($_ENV['ENABLE_EXTERNAL_CACHING']) ||
    !isset($_ENV['DEBUG_MODE']) ||
    !isset($_ENV['DEBUG_SHOW_ERRORS'])
) throw new Exception('invalid or missing environment config');

// composer autoloader
require 'vendor/autoload.php';

// URL
$protocol = $_ENV['FORCE_SSL'] ? 'https' : 'http';
$httpHost = $_SERVER['HTTP_HOST'];
$baseUrl = $protocol . '://' . $httpHost;
define('WP_HOME', $baseUrl);
define('WP_SITEURL', WP_HOME . '/cms');

// set alternative wp-content directory
define('WP_CONTENT_DIR', __DIR__ . '/wp-content');
define('WP_CONTENT_URL', WP_HOME . '/wp-content');

// limit revisions
// define('WP_POST_REVISIONS', 3);

// alternate wp cron
// define('ALTERNATE_WP_CRON', true);

// WPMU
// define('WP_ALLOW_MULTISITE', true);

// force language
// define('WPLANG', 'de_DE');

// default theme
// define('WP_DEFAULT_THEME', 'theme');

// debugging
if ($_ENV['DEBUG_MODE']) {
    define('WP_DEBUG', true);
    define('SAVEQUERIES', true);

    if ($_ENV['DEBUG_SHOW_ERRORS']) {
        error_reporting(1);
        @ini_set('display_errors', 1);
    }
    else {
        error_reporting(0);
        @ini_set('display_errors', 0);
    }
}
else {
    define('WP_DEBUG', false);
    define('SAVEQUERIES', false);
    error_reporting(0);
    @ini_set('display_errors', 0);
}

// SECURITY

// SSL
define('FORCE_SSL_ADMIN', !!$_ENV['FORCE_SSL']);

// disallow file edit from wp-admin
define('DISALLOW_FILE_EDIT', true);

// pepper: https://api.wordpress.org/secret-key/1.1/salt/
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

// caching
define('WP_CACHE', !!$_ENV['ENABLE_CACHING']);

// raise memory limits
// $memoryLimit = '256M';
// define('WP_MEMORY_LIMIT', $memoryLimit);
// define('WP_MAX_MEMORY_LIMIT', $memoryLimit); // admin area only

// MySQL settings
define('DB_NAME', $_ENV['MYSQL_DATABASE']);
define('DB_USER', $_ENV['MYSQL_USER']);
define('DB_PASSWORD', $_ENV['MYSQL_PASSWORD']);
define('DB_HOST', $_ENV['MYSQL_HOST']);
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

// table prefix
$table_prefix  = 'wp_';

// FTP settings
if (isset($_ENV['FTP_HOST'])) define('FTP_HOST', $_ENV['FTP_HOST']);
if (isset($_ENV['FTP_USER'])) define('FTP_USER', $_ENV['FTP_USER']);
if (isset($_ENV['FTP_PASSWORD'])) define('FTP_PASS', $_ENV['FTP_PASSWORD']);
if (isset($_ENV['FTP_USE_SSL'])) define('FTP_SSL', !!$_ENV['FTP_USE_SSL']);
if (isset($_ENV['FS_METHOD'])) define('FS_METHOD', $_ENV['FS_METHOD']);
if (isset($_ENV['FTP_WORDPRESS_PATH'])) define('FTP_BASE', $_ENV['FTP_WORDPRESS_PATH']);
if (isset($_ENV['FTP_WPCONTENT_PATH'])) define('FTP_CONTENT_DIR', $_ENV['FTP_WPCONTENT_PATH']);
if (isset($_ENV['FTP_PLUGINS_PATH'])) define('FTP_PLUGIN_DIR ', $_ENV['FTP_PLUGINS_PATH']);
if (isset($_ENV['FTP_PUBLIC_KEY_FILE_PATH'])) define('FTP_PUBKEY', $_ENV['FTP_PUBLIC_KEY_FILE_PATH']);
if (isset($_ENV['FTP_PRIVATE_KEY_FILE_PATH'])) define('FTP_PRIKEY', $_ENV['FTP_PRIVATE_KEY_FILE_PATH']);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/cms/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
