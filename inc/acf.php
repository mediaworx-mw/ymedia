<?php
/**
 * ACF Functions
 *
 *
 * @package WordPress
 * @subpackage Ymedia
 */


if( function_exists('acf_add_options_page') ) {

  acf_add_options_page(array(
    'page_title'  => 'Ymedia',
    'menu_title'  => 'Ymedia',
    'menu_slug'   => 'ymedia-theme_settings',
    'capability'  => 'edit_posts',
    'position' => '2.1',
    'redirect'    => false
  ));

   acf_add_options_page(array(
    'page_title'  => 'Descarga',
    'menu_title'  => 'Descarga',
    'menu_slug'   => 'descarga-theme_settings',
    'capability'  => 'edit_posts',
    'position' => '2.1',
    'redirect'    => false
  ));

 acf_add_options_page(array(
    'page_title'  => 'Footer',
    'menu_title'  => 'Footer',
    'menu_slug'   => 'footer-theme_settings',
    'capability'  => 'edit_posts',
    'position' => '2.1',
    'redirect'    => false
  ));

}

