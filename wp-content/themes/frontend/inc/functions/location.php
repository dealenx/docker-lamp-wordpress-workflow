<?php
include get_template_directory() . '/inc/functions/base.php';

function extract_domain($domain)
{
    if (preg_match("/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i", $domain, $matches)) {
        return $matches['domain'];
    } else {
        return $domain;
    }
}

function extract_subdomains($domain)
{
    $subdomains = $domain;
    $domain = extract_domain($subdomains);

    $subdomains = rtrim(strstr($subdomains, $domain, true), '.');

    return $subdomains;
}

//$host = explode( '.', ($_SERVER['HTTP_HOST']) );
$subdomain;
$subdomain = extract_subdomains($_SERVER['HTTP_HOST']);
/*
switch ( $_SERVER['HTTP_HOST'] ) {
    case 'spb.15dnei.ru':
        define( 'WP_HOME', 'http://spb.15dnei.ru/' );
        break;
     case 'check.15dnei.ru':
        define( 'WP_HOME', 'http://check.15dnei.ru/' );
        break;
    case 'mytest.15dnei.ru':
        define( 'WP_HOME', 'http://mytest.15dnei.ru/' );
        break;

    default:
                define( 'WP_HOME', 'http://15dnei.ru/' );
}

define('WP_SITEURL', WP_HOME);
*/


$town;
for ($i = 0; $i < count($base); $i++) {
    if ($subdomain == $base[$i]["domain"]) {
        $town = $base[$i];
    }
}
function get_cities_json()
{
    return json_encode($GLOBALS['base'], JSON_UNESCAPED_UNICODE);
}
function get_city1()
{
    return $GLOBALS['town']["city_1"];
}
function get_city2()
{
    return $GLOBALS['town']["city_2"];
}
function get_city3()
{
    return $GLOBALS['town']["city_3"];
}
function get_address()
{
    return $GLOBALS['town']["address"];
}

function get_coord1()
{
    return $GLOBALS['town']["coordinates"][0];
}

function get_coord2()
{
    return $GLOBALS['town']["coordinates"][1];
}

function get_phone()
{
    $phone = "";
    if (get_city1() == "Москва") {
        $phone = get_field('tel_group_tel_msk', 89);
    } elseif (get_city1() == "Санкт-Петербург") {
        $phone = get_field('tel_group_tel_spb', 89);
    } else {
        $phone = get_field('tel_group_tel_mos_obl', 89);
    }
    return $phone;
}
function get_phone2()
{
    $phone = "";

    if (get_city1() == "Москва") {
        $phone = get_field('tel_group_tel_msk_2', 89);
    } elseif (get_city1() == "Санкт-Петербург") {
        $phone = get_field('tel_group_tel_spb_2', 89);
    } else {
        $phone = get_field('tel_group_tel_mos_obl_2', 89);
    }

    return $phone;
}

function city_show($atts, $content = null)
{
    $atts = shortcode_atts(array(
        'town' => ''
    ), $atts);

    if ($atts['town'] == $GLOBALS['town']["domain"]) {
        return wpautop(do_shortcode($content));
    } else {
        return null;
    }
}
// [desktoponly] shortcode
add_shortcode('city', 'city_show');


add_shortcode('city_1', 'get_city1');

add_shortcode('city_2', 'get_city2');

add_shortcode('city_3', 'get_city3');

add_shortcode('address', 'get_address');

add_shortcode('phone', 'get_phone');

add_shortcode('phone2', 'get_phone2');

add_shortcode('get_cities_json', 'get_cities_json');

add_shortcode('get_coord1', 'get_coord1');

add_shortcode('get_coord2', 'get_coord2');
