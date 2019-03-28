<?php
/**
 * Query Functions
 *
 *
 * @package WordPress
 * @subpackage Ymedia
 */


function get_canal_featured() {
  $args = array(
    'post_type' => 'canal',
    'showposts' => 1
  );
  $the_query = new WP_Query( $args);
  if ($the_query->have_posts()): while ($the_query->have_posts()) : $the_query->the_post();
   $src = get_template_directory();
    include($src.'/components/canal/canal-article-featured.php');
  endwhile; endif;
  wp_reset_query();
}

function get_canal($numposts, $offset, $class) {
  $args = array(
    'post_type' => 'canal',
    'showposts' => $numposts,
    'offset' => $offset
  );
  $the_query = new WP_Query( $args);
  if ($the_query->have_posts()): while ($the_query->have_posts()) : $the_query->the_post();
    $src = get_template_directory();
    include($src.'/components/canal/canal-article.php');
  endwhile; endif;
  wp_reset_query();
}


