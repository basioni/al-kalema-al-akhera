<?php

require_once ( get_stylesheet_directory() . '/theme-options.php' );
if ( function_exists('register_sidebars') )
	register_sidebars(2, array(
    'before_widget' => '',
    'after_widget' => '',
	'before_title' => '<h2>',
    'after_title' => '</h2>',
    ));
function iced_register_menus() {
  register_nav_menus(
    array(
      'main-menu' => 'Main Menu',
      'second-menu' => 'Second Menu'
    )
  );
}
add_action( 'init', 'iced_register_menus' );

define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', '%s/images/header.jpg'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 900);
define('HEADER_IMAGE_HEIGHT', 100);
define( 'NO_HEADER_TEXT', true );
if ( ! isset( $content_width ) )
	$content_width = 730;
add_theme_support( 'automatic-feed-links' );

function short_excerpt($before = '', $after = '', $echo = true, $length = false) {
	$title = get_the_excerpt();
	if ( $length && is_numeric($length) ) {
		$title = substr( $title, 0, $length );
	}

	if ( strlen($title)> 0 ) {
		$title = apply_filters('short_title', $before . $title . $after, $before, $after);
		if ( $echo )
		echo $title;
		else
		return $title;
	}
}
function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/images/logo.jpg) !important; }
    </style>';
}

add_action('login_head', 'my_custom_login_logo');
add_theme_support( 'post-thumbnails', array( 'post' ) ); // Add support for posts