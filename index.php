<?php

// This is a copy of WordPress' index.php that includes the subdirectory.

define('WP_USE_THEMES', true);

// include subdirectory
require( dirname( __FILE__ ) . '/cms/wp-blog-header.php' );
