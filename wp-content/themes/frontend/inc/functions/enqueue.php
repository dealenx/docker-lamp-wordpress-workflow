<?php



add_action( 'wp_head', 'theme_styles' );


function theme_styles(){
    /*
     * This if() statement is unnecessary, as wp_enqueue_scripts
     * doesn't fire on the admin pages.
     * if( is_admin() ) {
     *   return;
     * }
     */

	

	
    // CSS
	wp_enqueue_style(
		'app_css',
		get_template_directory_uri() . '/dist/app.css'
	);
}



add_action( 'wp_enqueue_scripts', 'theme_styles' );



function theme_scripts(){
    /*
     * This if() statement is unnecessary, as wp_enqueue_scripts
     * doesn't fire on the admin pages.
     * if( is_admin() ) {
     *   return;
     * }
     */

	 wp_enqueue_script('app-vendor', get_template_directory_uri() . '/dist/vendor.js');
	
    // JS
	wp_enqueue_script(
		'app_main',
		get_template_directory_uri() . '/dist/app.js',
		['jquery'],
		"",
		false
	);

	
}


add_action('wp_enqueue_scripts', "theme_scripts" );



function add_async_attribute($tag, $handle) {
	// add script handles to the array below
	$scripts_to_async = array('app_main');
	
	foreach($scripts_to_async as $async_script) {
	   if ($async_script === $handle) {
		  return str_replace(' src', ' async="async" src', $tag);
	   }
	}
	return $tag;
 }
 add_filter('script_loader_tag', 'add_async_attribute', 10, 2);



function add_defer_attribute($tag, $handle) {
	// add script handles to the array below
	$scripts_to_defer = array('app-vendor');
	
	foreach($scripts_to_defer as $defer_script) {
	   if ($defer_script === $handle) {
		  return str_replace(' src', ' defer="defer" src', $tag);
	   }
	}
	return $tag;
 }

 add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);

