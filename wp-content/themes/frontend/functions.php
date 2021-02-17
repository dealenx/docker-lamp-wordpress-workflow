<?php
// require get_template_directory() . '/inc/functions/endpoints.php';
require get_template_directory() . '/inc/widgets/init.php';
require get_template_directory() . '/inc/customizer/init.php';
require_once __DIR__ . '/inc/functions/enqueue.php';

// require get_template_directory() . '/inc/functions/location.php';

/*require get_template_directory() . '/articles_custom_field.php';*/

function wp_corenavi($wp_query_par = "")
{
    if(gettype($wp_query_par) === string) {
        global $wp_query;
    } else {
        $wp_query = $wp_query_par;
    }
    
    $pages = '';
    $max = $wp_query->max_num_pages;
    if (!$current = get_query_var('paged')) $current = 1;
    $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
    $a['total'] = $max;
    $a['current'] = $current;

    $total = 0; //1 - выводить текст "Страница N из N", 0 - не выводить
    $a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
    $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
    $a['prev_text'] = 'Предыдущая страница'; //текст ссылки "Предыдущая страница"
    $a['next_text'] = 'Следующая страница'; //текст ссылки "Следующая страница"

    if ($max > 1) echo '<div class="cat-nav">';
    if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>' . "\r\n";
    echo $pages . paginate_links($a);
    if ($max > 1) echo '</div>';
}



function hm_get_template_part($file, $template_args = array(), $cache_args = array())
{
    $template_args = wp_parse_args($template_args);
    $cache_args = wp_parse_args($cache_args);
    if ($cache_args) {
        foreach ($template_args as $key => $value) {
            if (is_scalar($value) || is_array($value)) {
                $cache_args[$key] = $value;
            } else if (is_object($value) && method_exists($value, 'get_id')) {
                $cache_args[$key] = call_user_method('get_id', $value);
            }
        }
        if (($cache = wp_cache_get($file, serialize($cache_args))) !== false) {
            if (!empty($template_args['return']))
                return $cache;
            echo $cache;
            return;
        }
    }
    $file_handle = $file;
    do_action('start_operation', 'hm_template_part::' . $file_handle);
    if (file_exists(get_stylesheet_directory() . '/' . $file . '.php'))
        $file = get_stylesheet_directory() . '/' . $file . '.php';
    elseif (file_exists(get_template_directory() . '/' . $file . '.php'))
        $file = get_template_directory() . '/' . $file . '.php';
    ob_start();
    $return = require($file);
    $data = ob_get_clean();
    do_action('end_operation', 'hm_template_part::' . $file_handle);
    if ($cache_args) {
        wp_cache_set($file, $data, serialize($cache_args), 3600);
    }
    if (!empty($template_args['return']))
        if ($return === false)
            return false;
        else
            return $data;
    echo $data;
}

add_theme_support('post-thumbnails');


/* Для шаблонов категорий */

// function my_single_template($single) {
//     global $wp_query, $post;
//     foreach((array)get_the_category() as $cat) {
//         if(file_exists(get_template_directory() . '/single-' . $cat->slug . '.php')) {
//             return get_template_directory() . '/single-' . $cat->slug . '.php';
//         } elseif(file_exists('/single-' . $cat->term_id . '.php')) {
//             return get_template_directory() . '/single-' . $cat->term_id . '.php';
//         }
//     }
// } 
// add_filter('single_template', 'my_single_template');



function content_short_desc($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
      array_pop($content);
      $content = implode(" ",$content).'...';
    } else {
      $content = implode(" ",$content);
    }
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
  }
  


add_filter('comment_form_fields', 'kama_reorder_comment_fields' );
function kama_reorder_comment_fields( $fields ){
	// die(print_r( $fields )); // посмотрим какие поля есть

	$new_fields = array(); // сюда соберем поля в новом порядке

	$myorder = array('author','email','comment'); // нужный порядок

	foreach( $myorder as $key ){
		$new_fields[ $key ] = $fields[ $key ];
		unset( $fields[ $key ] );
	}

	// если остались еще какие-то поля добавим их в конец
	if( $fields )
		foreach( $fields as $key => $val )
			$new_fields[ $key ] = $val;

	return $new_fields;
}

add_filter('comment_form_default_fields', 'remove_website_field');
function remove_website_field($fields){
    if(isset($fields['url']))
    unset($fields['url']);
    return $fields;
}


// add_action( 'template_redirect', 'redirect_404_to_any_url' );
// /**
//  * @author    Brad Dalton
//  * @example   http://wpsites.net/wordpress-tips/redirect-404-page-not-found-to-any-url/
//  * @copyright 2014 WP Sites
//  */
// function redirect_404_to_any_url() {
//     if ( is_404() ) :
//       wp_redirect( 'http://example.com/', 301 ); 
// 	  exit;
//     endif;
// }



function theme_init(){
    load_theme_textdomain('translate', get_template_directory() . '/languages');
}
add_action ('init', 'theme_init');