<?php
/**
 * Cauley & Co. Functions
 */

/* Hide Admin Bar */
show_admin_bar(false);

/* Page Excerpt Box */
function roots_page_excerpt() {
     add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'roots_page_excerpt' );

/* Custom Post for Main Page */
function create_post_type() {
  register_post_type( 'main_page',
		array(
			'labels' => array(
				'name' => __( 'Main Page Post' ),
				'singular_name' => __( 'MainPage' )
			),
		'public' => true,
		'has_archive' => true,
		'supports' => array('title', 'editor', 'thumbnail')
		)
	);
}
add_action( 'init', 'create_post_type' );

/* Multiple Excerpt Lengths */
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}
