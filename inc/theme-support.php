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
    'main small' => 'Main small',
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


//Custom Endpoint for Canal Ymedia

add_action('rest_api_init', 'customApi');

function customApi() {
  register_rest_route('canal_ymedia', 'search', array(
    'methods' => WP_REST_SERVER::READABLE,
    'callback' => 'queryParameters'
  ));
}

function queryParameters($data) {
  $terms = (string)$data['terms'];
  $terms = explode(',', $terms);
  // $date = $data['date'];
  // $year  = substr($date, 0, 4);
  // $month = substr($date, 5, 2);
  // $day   = substr($date, 8);

  $canal = new WP_Query(array(
    'post_type' => 'canal',
    's' => $data['key'],
    'posts_per_page' => $data['num'],
    'tax_query' => array(
       array(
        'taxonomy' => 'canal_category',
        'field' => 'id',
        'terms' => $terms
       ),
    )

  ));

  $canalResults = array();

  while($canal->have_posts()){
    $canal->the_post();

    $id = get_the_ID();
    $term = get_the_terms( $id, 'canal_category' )[0];
    $color = get_field('color_categoria', $term);

    array_push($canalResults, array(
      'title' => get_the_title(),
      'permalink' => get_the_permalink(),
      'excerpt' => get_the_excerpt(),
      'term' => $term,
      'thumbnail' => get_the_post_thumbnail_url(),
      'date' => get_the_date( 'd-m-Y' ),
      'color' => $color
    ));
  }

  return $canalResults;
}




