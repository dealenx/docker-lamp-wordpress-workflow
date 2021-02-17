<?php

function get_shortcode_acf($shortcode, $name, $id)
{
    add_shortcode($shortcode, function () use ($name, $id) {
        return get_field($name, $id);
    });
}

function the_shortcode_acf($shortcode, $name, $id)
{
    add_shortcode($shortcode, function () use ($name, $id) {
        return the_field($name, $id);
    });
}

/* CONTACTS */

get_shortcode_acf('email', 'email_company', 89);



/* SOCIALS */

get_shortcode_acf('soc_vk', 'soc_vk', 89);

get_shortcode_acf('soc_fb', 'soc_fb', 89);

get_shortcode_acf('soc_instagram', 'soc_instagram', 89);

get_shortcode_acf('soc_youtube', 'soc_youtube', 89);

/* Мессенжеры */

get_shortcode_acf('messenger_telegram', 'messenger_telegram', 89);

get_shortcode_acf('messenger_viber', 'messenger_viber', 89);

get_shortcode_acf('messenger_whatsapp', 'messenger_whatsapp', 89);

get_shortcode_acf('messenger_desc', 'messenger_desc', 89);

get_shortcode_acf('title_seo', 'title_seo', 13);

the_shortcode_acf('desc_seo', 'desc_seo', 13);

the_shortcode_acf('payment', 'payment', 21);
the_shortcode_acf('delivery', 'delivery', 21);
