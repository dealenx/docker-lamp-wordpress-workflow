<?php
function true_sanitize_copyright( $value ) {
	return strip_tags( stripslashes( $value ) ); // обрезаем слеши и HTML-теги
}

function init_setting($wp_customize, $true_transport,$true_display_options, $id, $label, $default_value, $type_field = 'text') {

    // Текст копирайта в футере
	$wp_customize->add_setting(
		$id, // id
		array(
			'default'            =>  $default_value, // текст по умолчанию
			'sanitize_callback'  => 'true_sanitize_copyright', // функция, обрабатывающая значение поля при сохранении
			'transport'          => $true_transport
		)
    );
    
    
	$wp_customize->add_control(
		$id, // id
		array(
			'section'  => $true_display_options, // id секции
			'label'    =>  $label,
			'type'     => $type_field// текстовое поле
		)
	);
}


function true_customizer_init( $wp_customize ) {
 
	//$true_transport = 'refresh'; // описание этой переменной чуть ниже
       $true_transport = 'postMessage';

 
    $contacts_id_section = 'true_display_options_caontacts';
	// Добавляем собственную секцию настроек
	$wp_customize->add_section(
		$contacts_id_section, // id секции, должен прописываться во всех настройках, которые в неё попадают
		array(
			'title'     => 'Контакты',
			'priority'  => 200, // приоритет расположения относительно других секций
			'description' => 'Настройке текст для контактов' // описание не обязательное
		)
	);

    
    init_setting($wp_customize, $true_transport, $contacts_id_section, 'common_email', 'E-mail', 'pochta@yandex.ru');
    init_setting($wp_customize, $true_transport, $contacts_id_section, 'messenger_telegram', 'Telegram канал', '@telegramkanal');
    init_setting($wp_customize, $true_transport, $contacts_id_section, 'messenger_telegram_url', 'Telegram ссылки', '#');

}
 
add_action( 'customize_register', 'true_customizer_init' );
 
