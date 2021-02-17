<?php

// Получение всех постов рубрики, но без постов дочерних  рубрик
function query_only_parent_posts_all($id)
{
    $args = array(
        'category__in' => array($id)
    );
    return new WP_Query($args);
}

// Получение постов рубрики размерности $n, но без постов дочерних  рубрик
function query_only_parent_posts_list($id, $n)
{
    $args = array(
        'category__in' => array($id),
        'showposts' => $n,
    );
    return new WP_Query($args);
}

// Получение всех постов в том числе из дочерних рубрик
function query_cat_posts_with_childs_all($id)
{
    $args = array(
        'cat' => $id,
        'showposts' => $n,
    );
    return new WP_Query($args);
}
// Получение списка постов размерности $n в том числе из дочерних рубрик
function query_cat_posts_with_childs_list($id, $n)
{
    $args = array(
        'cat' => $id,
        'showposts' => $n,
    );
    return new WP_Query($args);
}
