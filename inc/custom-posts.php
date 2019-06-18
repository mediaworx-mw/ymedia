<?php
/**
 * Custom Post Types
 *
 *
 * @package WordPress
 * @subpackage Ymedia
 */

function ymedia_post_types() {

  //Canal Ymedia
  register_post_type( 'canal', array(
      'show_ui'               => true,
      'supports'              => array('title', 'editor', 'excerpt', 'thumbnail', 'author'),
      'taxonomies'            => array('canal_category'),
      'public'                => true,
      'labels'                => array(
        'name'                  => 'Canal',
        'singular_name'         => 'Canal Ymedia',
        'archives'              => 'Canal Archives',
        'all_items'             => 'All Canal',
        'add_new_item'          => 'Add New Canal',
        'new_item'              => 'New Canal',
        'edit_item'             => 'Edit Canal'
      )
  ));

  register_taxonomy( 'canal_category', ['canal'], array(
    'hierarchical'               => true,
    'show_admin_column'          => true,
    'show_in_rest'               => true,
    'labels'                     => array(
      'name'                       => _x( 'Categories', 'Taxonomy General Name'),
      'singular_name'              => _x( 'Category', 'Taxonomy Singular Name'),
      'menu_name'                  => __( 'Categories'),
      'add_new_item'               => __( 'Add New Category'),
      'edit_item'                  => __( 'Edit Category'),
      'view_item'                  => __( 'View Category'),
    )
  ));

  register_taxonomy( 'canal_tag', ['canal'], array(
    'labels'                       => array(
      'name'                       => _x( 'Tags', 'Taxonomy General Name'),
      'singular_name'              => _x( 'Tag', 'Taxonomy Singular Name'),
      'menu_name'                  => __( 'Tags'),
      'all_items'                  => __( 'All Tags'),
      'new_item_name'              => __( 'New Tag Name'),
      'add_new_item'               => __( 'Add New Tag'),
      'edit_item'                  => __( 'Edit Tag'),
      'update_item'                => __( 'Update Tag'),
      'view_item'                  => __( 'View Tag')
    ),
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_in_rest'               => true,
    'update_count_callback'      => '_update_post_term_count',
    'query_var'                  => true,
    'rewrite'                    => array( 'slug' => 'tag' )
  ));

  //Corporativo
  register_post_type( 'corporativo', array(
    'supports'              => array('title'),
    'taxonomies'            => array('corporativo_category'),
    'hierarchical'          => false,
    'public'                => true,
    'labels'                => array(
      'name'                  => 'Corporativo',
      'singular_name'         => 'Corporativo',
      'archives'              => 'Corporativo Archives',
      'all_items'             => 'All Corporativo',
      'add_new_item'          => 'Add New Corporativo'
    )
  ));

  //Clientes
  register_post_type( 'clientes', array(
    'supports'              => array('title', 'editor'),
    'taxonomies'            => array('clientes_category'),
    'public'                => true,
    'show_ui'               => true,
    'labels'                => array(
      'name'                  => 'Clientes',
      'singular_name'         => 'Cliente',
      'menu_name'             => 'Clientes',
      'name_admin_bar'        => 'Clientes',
      'all_items'             => 'All Clientes',
      'add_new_item'          => 'Add New Clientes',
      'new_item'              => 'New Clientes',
      'edit_item'             => 'Edit Clientes',
      'filter_items_list'     => 'Filter corporativo list'
    )
  ));

}

add_action('init', 'ymedia_post_types');