<?php

add_action('wp_enqueue_scripts', 'jannah_child_scripts', 80);
function jannah_child_scripts()
{

    /* THIS WILL ALLOW ADDING CUSTOM CSS TO THE style.css */
    wp_enqueue_style('jannah-child-css', get_stylesheet_directory_uri() . '/style.css', '');

    /* Uncomment this line if you want to add custom javascript */
    //wp_enqueue_script( 'jannah-child-js', get_stylesheet_directory_uri() .'/js/scripts.js', '', false, true );
}

// Функции и хуки для WP-Recall
// Удалим блок информации о добавлении в закладки
remove_filter('the_content', 'get_notifi_bkms', 20);

// Удалим блок рейтинга, чтобы потом вывести в другом месте
remove_filter('the_content', 'rcl_post_content_rating', 10);

// Удалим блок автора. Например чтобы потом вывести в другом месте
function otfm_remove_author_block()
{
    if (!is_admin()) {
        remove_filter('the_content', 'rcl_author_info', 70);
    }
}

add_action('wp', 'otfm_remove_author_block');

// Разное
// Область виджетов внутри поста
register_sidebar(array(
    'name' => __('Установка модов'),
    'id' => 'postin-widget-area',
    'description' => __('Установка модов'),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3><a href="#">',
    'after_title' => '</a></h3>',
));

// php в виджетах
function php_in_widgets($widget_content)
{
    if (strpos($widget_content, '<' . '?') !== false) {
        ob_start();
        eval('?' . '>' . $widget_content);
        $widget_content = ob_get_contents();
        ob_end_clean();
    }
    return $widget_content;
}

add_filter('widget_text', 'php_in_widgets', 99);