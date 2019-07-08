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
		'main'        => 'Main',
    'main small'  => 'Main small',
    'footer 1'    => 'Footer 1',
    'footer 2'    => 'Footer 2'
	));
}
add_action( 'after_setup_theme', 'ymedia_register_nav_menu' );

/* Remove Title Attribute from Menu */
function my_menu_notitle( $menu ){
  return $menu = preg_replace('/ title=\"(.*?)\"/', '', $menu );
}

add_filter( 'wp_nav_menu', 'my_menu_notitle' );
add_filter( 'wp_page_menu', 'my_menu_notitle' );
add_filter( 'wp_list_categories', 'my_menu_notitle' );

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

add_filter( 'wpcf7_validate_configuration', '__return_false' );

add_filter( 'excerpt_length', function($length) {
    return 999;
} );

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

function acf_get_posts_terms( $field ) {

  $field['choices'] = array();
  $terms = array();

  $id = get_the_ID();
  $termNames = get_the_terms( $id, 'canal_category' );

  foreach($termNames as $term){
    array_push($terms, $term->name);
  }

  if( is_array($terms) ) {
    foreach( $terms as $term ) {
      $field['choices'][$term] = $term;
    }
  }

  return $field;
}

add_filter('acf/load_field/name=main_cat_canal', 'acf_get_posts_terms');


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

  $date = $data['date'];
  if ($date == 'nodate') {
    $year  = null;
    $month = null;
    $day   = null;
  } else {
    $year  = substr($date, 0, 4);
    $month = substr($date, 5, 2);
    $day   = substr($date, 8);
  }

  if ($data['terms'] == 'empty') {
    $terms = null;
  }

  $args = array(
    'post_type' => 'canal',
    's' => $data['key'],
    'posts_per_page' => $data['posts'],
    'offset' => $data['offset'],
    'tax_query' => array(
       array(
        'taxonomy' => 'canal_category',
        'field' => 'id',
        'terms' => $terms
       ),
    ),
    'date_query' => array(
      array(
        'year'  => $year,
        'month' => $month,
        'day'   => $day,
      ),
    ),
  );

  $args1 = array(
    'post_type' => 'canal',
    's' => $data['key'],
    'posts_per_page' => -1,
    'offset' => $data['offset'],
    'tax_query' => array(
       array(
        'taxonomy' => 'canal_category',
        'field' => 'id',
        'terms' => $terms
       ),
    ),
    'date_query' => array(
      array(
        'year'  => $year,
        'month' => $month,
        'day'   => $day,
      ),
    ),
  );


  $canal = new WP_Query( $args );
  $totalPosts = new WP_Query( $args1 );

  $results = array();

  $totalCount = $totalPosts->found_posts;

  $canalResults = array();
  $termsList = array();

  if($canal->have_posts()){
    $pupu = $canal->found_posts;
    while($canal->have_posts()){

    $canal->the_post();
    $id = get_the_ID();

    $termsList = get_the_terms( $id, 'canal_category' );
    foreach($termsList as $termItem) {
      $termsList[] = array($termItem->name, get_field('color_categoria', $termItem));
    }

    $term = get_the_terms( $id, 'canal_category' )[0]->name;
    $primary = get_field('main_cat_canal', $id);

    array_push($canalResults, array(
      'title' => get_the_title(),
      'permalink' => get_the_permalink(),
      'excerpt' => get_the_excerpt(),
      'term' => $term,
      'termsList' => $termsList,
      'thumbnail' => get_the_post_thumbnail_url(),
      'date' => get_the_date( 'd-m-Y' ),
      'primary' => $primary,
    ));
  }

  $results[0] = $canalResults;
  $results[1] = $totalCount;

  return $results;
}
}


function share_buttons() {
  global $post;
  $postURL = get_permalink($post->ID);
  $postTitle = str_replace( ' ', '%20', get_the_title($post->ID));
  $twitterURL = 'https://twitter.com/intent/tweet?text='.$postTitle.'&amp;via=&amp;hashtags=&amp;url='.$postURL;
  $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$postURL;
  $emailURL = 'mailto:?Subject=' .$postTitle.'&amp;Body=Sharing%20with%20you:%20'.$postURL;
  $social = '';
  $social .= '<a class="facebook" href="'.$facebookURL.'" target="_blank"><i class="fab fa-facebook-f"></i></a>';
  $social .= '<a class="twitter" href="'. $twitterURL .'" target="_blank"><i class="fab fa-twitter"></i></a>';
  $social .= '<a class="email" href="'.$emailURL.'" target="_blank"><i class="fa fa-envelope"></i></a>';
  return $social;
};


function get_posts_dates_array() {
  $terms_date = array(
    'post_type' => array('canal'),
    'posts_per_page' => -1
  );

  $dates = array();
  $query_date = new WP_Query( $terms_date );

  if ( $query_date->have_posts() ) :
    while ( $query_date->have_posts() ) : $query_date->the_post();
      $date = get_the_date('Y-m-j');
      if(!in_array($date, $dates)){
        $dates[] = $date;
      }
    endwhile;
    wp_reset_postdata();
  endif;
  return $dates;
}

function filter_canal_by_taxonomies( $post_type, $which ) {
  if ( 'canal' !== $post_type )
    return;

  $taxonomies = array( 'canal_category');

  foreach ( $taxonomies as $taxonomy_slug ) {

    $taxonomy_obj = get_taxonomy( $taxonomy_slug );
    $taxonomy_name = $taxonomy_obj->labels->name;

    $terms = get_terms( $taxonomy_slug );

    echo "<select name='{$taxonomy_slug}' id='{$taxonomy_slug}' class='postform'>";
    echo '<option value="">' . sprintf( esc_html__( 'Todas las categorías' ), $taxonomy_name ) . '</option>';
    foreach ( $terms as $term ) {
      printf(
        '<option value="%1$s" %2$s>%3$s (%4$s)</option>',
        $term->slug,
        ( ( isset( $_GET[$taxonomy_slug] ) && ( $_GET[$taxonomy_slug] == $term->slug ) ) ? ' selected="selected"' : '' ),
        $term->name,
        $term->count
      );
    }
    echo '</select>';
  }
}
add_action( 'restrict_manage_posts', 'filter_canal_by_taxonomies' , 10, 2);



function reg_tag() {
  register_taxonomy_for_object_type('post_tag', 'clientes');
}
add_action('init', 'reg_tag');