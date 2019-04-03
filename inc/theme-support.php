<?php
/**
 * Theme Support
 *
 *
 * @package WordPress
 * @subpackage Ymedia
 */


/* Activate Nav Menu Option */
function ymedia_register_nav_menu() {
	register_nav_menus( array(
		'main' => 'Main',
    'footer 1' => 'Footer 1',
    'footer 2' => 'Footer 2'
	));
}
add_action( 'after_setup_theme', 'ymedia_register_nav_menu' );

/* Post Thumbnails and Custom Images Sizes  */
function setup() {
  add_theme_support( 'post-thumbnails' );
  add_image_size( 'ymedia', 900, 600, true );
}
add_action( 'after_setup_theme', 'setup' );


function ymedia_image_sizes_choose( $sizes ) {
  $ymedia_sizes = array(
    'ymedia' => 'Custom'
  );
  return array_merge( $sizes, $ymedia_sizes );
}
add_filter( 'image_size_names_choose', 'ymedia_image_sizes_choose' );


/* Limit Excerpt words */
function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}

/* Allow uploading SVG files */
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

/* Search Filter for Press Custom Types  */
function searchfilter($query) {
	if ($query->is_search && !is_admin() ) {
		if(isset($_GET['post_type'])) {
			$type = $_GET['post_type'];
			if($type == 'xxx') {
				$query->set('post_type',array('xxx'));
			}
		}
	}
  return $query;
}
add_filter('pre_get_posts','searchfilter');



