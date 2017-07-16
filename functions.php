<?php

add_action( 'wp_enqueue_scripts', 'jannah_child_scripts', 80 );
function jannah_child_scripts() {

	/* THIS WILL ALLOW ADDING CUSTOM CSS TO THE style.css */
	wp_enqueue_style( 'jannah-child-css', get_stylesheet_directory_uri().'/style.css', '' );

	/* Uncomment this line if you want to add custom javascript */
	//wp_enqueue_script( 'jannah-child-js', get_stylesheet_directory_uri() .'/js/scripts.js', '', false, true );
}
// Функции и хуки для WP-Recall

// Удалим блок информации о добавлении в закладки
remove_filter('the_content','get_notifi_bkms',20);

// Удалим блок рейтинга, чтобы потом вывести в другом месте
remove_filter('the_content', 'rcl_post_content_rating',10);