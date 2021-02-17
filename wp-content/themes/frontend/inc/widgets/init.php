<?php
/*
add_theme_support( 'widget-customizer' );*/

/**
 * Register a new sidebar which has dynamic layout
 */

// require get_template_directory() . '/inc/widgets/sidebar.php';
// require get_template_directory() . '/inc/widgets/site-top-col-1.php';
// require get_template_directory() . '/inc/widgets/site-top-col-2.php';
// require get_template_directory() . '/inc/widgets/site-top-col-3.php';
// require get_template_directory() . '/inc/widgets/site-top-col-4.php';

require get_template_directory() . '/inc/widgets/included-js-head.php';
require get_template_directory() . '/inc/widgets/included-js-footer.php';

// require get_template_directory() . '/inc/widgets/sidebar_column.php';
// require get_template_directory() . '/inc/widgets/site-top-column.php';

function true_remove_default_widget()
{
	unregister_widget('WP_Widget_Archives'); // Архивы
	unregister_widget('WP_Widget_Calendar'); // Календарь
	unregister_widget('WP_Widget_Categories'); // Рубрики
	unregister_widget('WP_Widget_Meta'); // Мета
	unregister_widget('WP_Widget_Pages'); // Страницы
	unregister_widget('WP_Widget_Recent_Comments'); // Свежие комментарии
	unregister_widget('WP_Widget_Recent_Posts'); // Свежие записи
	unregister_widget('WP_Widget_RSS'); // RSS
	unregister_widget('WP_Widget_Search'); // Поиск
	unregister_widget('WP_Widget_Tag_Cloud'); // Облако меток
	unregister_widget('WP_Widget_Text'); // Текст
	unregister_widget('WP_Nav_Menu_Widget'); // Произвольное меню
}

add_action('widgets_init', 'true_remove_default_widget', 20);
