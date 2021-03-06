<?php
/**
 * Front End Enqueue Functions
 *
 *
 * @package WordPress
 * @subpackage Ymedia
 */

function ymedia_load_scripts(){
	wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.0.8/css/all.css');
  wp_enqueue_style( 'flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css');
	wp_enqueue_style( 'main-css', get_template_directory_uri() . '/public/css/app.css', array(), '1.0.0', 'all' );
  wp_register_script( 'fullpage-js', 'https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.5/fullpage.min.js', false, '1.0.0', false );
  wp_enqueue_script( 'fullpage-js' );
  wp_register_script( 'three-js', 'https://cdnjs.cloudflare.com/ajax/libs/three.js/102/three.min.js', false, '1.0.0', true );
  wp_enqueue_script( 'three-js' );
  wp_register_script( 'main-js', get_template_directory_uri() . '/public/js/app.js', false, '1.0.0', true );
	wp_enqueue_script( 'main-js' );
  wp_localize_script( 'main-js', 'ymediaData', array('root_url' => get_site_url()));
}

add_action( 'wp_enqueue_scripts', 'ymedia_load_scripts' );
