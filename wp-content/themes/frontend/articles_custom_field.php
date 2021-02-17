<?php
add_action( 'init', 'articles_register_products' ); // Использовать функцию только внутри хука init

function articles_register_products() {
	$labels = array(
		'name' => 'Полезные статьи',
		'singular_name' => 'Статья', // админ панель Добавить->Функцию
		'add_new' => 'Добавить статью',
		'add_new_item' => 'Добавить новую статью', // заголовок тега <title>
		'edit_item' => 'Редактировать статью',
		'new_item' => 'Новая статья',
		'all_items' => 'Все статьи',
		'view_item' => 'Просмотр статей на сайте',
		'search_items' => 'Искать статьи',
		'not_found' =>  'Статей не найдено.',
		'not_found_in_trash' => 'В корзине нет статей.',
		'menu_name' => 'Полезные статьи' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true, // благодаря этому некоторые параметры можно пропустить
		'menu_icon' => 'dashicons-nametag', // иконка корзины
		'menu_position' => 5,
		'has_archive' => true,
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments'),
		'taxonomies' => array('articles')
	);
	register_post_type('articles',$args);
}
