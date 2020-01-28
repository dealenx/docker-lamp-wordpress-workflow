<?php

// Environment-specific settings only! Put other settings directly in wp-config.php.

// general settings
if (!isset($_ENV['ENVIRONMENT']))                   $_ENV['ENVIRONMENT'] = 'local'; // local, staging, production
if (!isset($_ENV['FORCE_SSL']))                     $_ENV['FORCE_SSL'] = false; // enable on production!
if (!isset($_ENV['ENABLE_EXTERNAL_CACHING']))       $_ENV['ENABLE_EXTERNAL_CACHING'] = false; // activate when using a caching plugin
if (!isset($_ENV['DEBUG_MODE']))                    $_ENV['DEBUG_MODE'] = false; // disable on production
if (!isset($_ENV['DEBUG_SHOW_ERRORS']))             $_ENV['DEBUG_SHOW_ERRORS'] = false;

// MySQL
if (!isset($_ENV['MYSQL_DATABASE']))                $_ENV['MYSQL_DATABASE'] = 'docker';
if (!isset($_ENV['MYSQL_USER']))                    $_ENV['MYSQL_USER'] = 'docker';
if (!isset($_ENV['MYSQL_PASSWORD']))                $_ENV['MYSQL_PASSWORD'] = 'docker';
if (!isset($_ENV['MYSQL_HOST']))                    $_ENV['MYSQL_HOST'] = 'mysql';


// FTP
if (!isset($_ENV['FTP_HOST']))                      $_ENV['FTP_HOST'] = '';
if (!isset($_ENV['FTP_USER']))                      $_ENV['FTP_USER'] = '';
if (!isset($_ENV['FTP_PASSWORD']))                  $_ENV['FTP_PASSWORD'] = '';
if (!isset($_ENV['FTP_USE_SSL']))                   $_ENV['FTP_USE_SSL'] = true;
if (!isset($_ENV['FS_METHOD']))                     $_ENV['FS_METHOD'] = 'direct';
if (!isset($_ENV['FTP_WORDPRESS_PATH']))            $_ENV['FTP_WORDPRESS_PATH'] = '';
if (!isset($_ENV['FTP_WPCONTENT_PATH']))            $_ENV['FTP_WPCONTENT_PATH'] = '';
if (!isset($_ENV['FTP_PLUGINS_PATH']))              $_ENV['FTP_PLUGINS_PATH'] = '';
if (!isset($_ENV['FTP_PUBLIC_KEY_FILE_PATH']))      $_ENV['FTP_PUBLIC_KEY_FILE_PATH'] = '';
if (!isset($_ENV['FTP_PRIVATE_KEY_FILE_PATH']))     $_ENV['FTP_PRIVATE_KEY_FILE_PATH'] = '';
