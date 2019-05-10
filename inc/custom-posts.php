<?php
/**
 * Custom Post Types
 *
 *
 * @package WordPress
 * @subpackage Ymedia
 */


//Custom Post Type: Canal Ymedia
function custom_canal() {

  $labels = array(
    'name'                  => 'Canal Ymedia',
    'singular_name'         => 'Canal Ymedia',
    'menu_name'             => 'Canal Ymedia',
    'name_admin_bar'        => 'Canal Ymedia',
    'archives'              => 'Canal Archives',
    'attributes'            => 'Item Attributes',
    'parent_item_colon'     => 'Parent Canal:',
    'all_items'             => 'All Canal',
    'add_new_item'          => 'Add New Canal',
    'add_new'               => 'Add New',
    'new_item'              => 'New Canal',
    'edit_item'             => 'Edit Canal',
    'update_item'           => 'Update Canal',
    'view_item'             => 'View Canal',
    'view_items'            => 'View Canal',
    'search_items'          => 'Search Canal',
    'not_found'             => 'Not found',
    'not_found_in_trash'    => 'Not found in Trash',
    'featured_image'        => 'Featured Image',
    'set_featured_image'    => 'Set featured image',
    'remove_featured_image' => 'Remove featured image',
    'use_featured_image'    => 'Use as featured image',
    'insert_into_item'      => 'Insert into item',
    'uploaded_to_this_item' => 'Uploaded to this product',
    'items_list'            => 'Canal list',
    'items_list_navigation' => 'Canal list navigation',
    'filter_items_list'     => 'Filter canal list',
  );
  $args = array(
    'label'                 => 'canal',
    'description'           => 'Custom Posts for Canal',
    'labels'                => $labels,
    'supports'              => array('title', 'editor', 'excerpt', 'thumbnail', 'author'),
    'taxonomies'            => array('canal_category'),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'show_in_rest'          => true,
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => false,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type( 'canal', $args );

}
add_action( 'init', 'custom_canal', 0 );



function custom_canal_taxonomy() {
  $labels = array(
    'name'                       => _x( 'Categories', 'Taxonomy General Name'),
    'singular_name'              => _x( 'Category', 'Taxonomy Singular Name'),
    'menu_name'                  => __( 'Categories'),
    'all_items'                  => __( 'All Categories'),
    'parent_item'                => __( 'Parent Category'),
    'parent_item_colon'          => __( 'Parent Category:'),
    'new_item_name'              => __( 'New Category Name'),
    'add_new_item'               => __( 'Add New Category'),
    'edit_item'                  => __( 'Edit Category'),
    'update_item'                => __( 'Update Category'),
    'view_item'                  => __( 'View Category'),
    'separate_items_with_commas' => __( 'Separate items with commas'),
    'add_or_remove_items'        => __( 'Add or remove items'),
    'choose_from_most_used'      => __( 'Choose from the most used' ),
    'popular_items'              => __( 'Popular Category'),
    'search_items'               => __( 'Search Categories'),
    'not_found'                  => __( 'Not Found'),
    'no_terms'                   => __( 'No categories'),
    'items_list'                 => __( 'Categories list'),
    'items_list_navigation'      => __( 'Categories list navigation'),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => false,
    'rewrite'                    => false,
    'query_var'                  => true,
    'show_in_rest'               => true,
  );
  register_taxonomy( 'canal_category', ['canal'], $args );

}
add_action( 'init', 'custom_canal_taxonomy', 0 );

function custom_canal_tags() {
  $labels = array(
    'name'                       => _x( 'Tags', 'Taxonomy General Name'),
    'singular_name'              => _x( 'Tag', 'Taxonomy Singular Name'),
    'menu_name'                  => __( 'Tags'),
    'all_items'                  => __( 'All Tags'),
    'parent_item'                => __( 'Parent Tag'),
    'parent_item_colon'          => __( 'Parent Tag:'),
    'new_item_name'              => __( 'New Tag Name'),
    'add_new_item'               => __( 'Add New Tag'),
    'edit_item'                  => __( 'Edit Tag'),
    'update_item'                => __( 'Update Tag'),
    'view_item'                  => __( 'View Tag'),
    'separate_items_with_commas' => __( 'Separate items with commas'),
    'add_or_remove_items'        => __( 'Add or remove items'),
    'choose_from_most_used'      => __( 'Choose from the most used' ),
    'popular_items'              => __( 'Popular Tag'),
    'search_items'               => __( 'Search Tag'),
    'not_found'                  => __( 'Not Found'),
    'no_terms'                   => __( 'No categories'),
    'items_list'                 => __( 'Categories list'),
    'items_list_navigation'      => __( 'Categories list navigation'),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => false,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => false,
    'show_in_rest'               => true,
    'update_count_callback'      => '_update_post_term_count',
    'query_var'                  => true,
    'rewrite'                    => array( 'slug' => 'tag' )
  );
  register_taxonomy( 'canal_tag', array( 'canal' ), $args );

}
add_action( 'init', 'custom_canal_tags', 0 );


//Custom Post Type: Casos de Estudio
function custom_casos() {

  $labels = array(
    'name'                  => 'Casos',
    'singular_name'         => 'Caso',
    'menu_name'             => 'Casos de Estudio',
    'name_admin_bar'        => 'Casos',
    'archives'              => 'Casos Archives',
    'attributes'            => 'Casos Attributes',
    'parent_item_colon'     => 'Parent Casos:',
    'all_items'             => 'All Casos',
    'add_new_item'          => 'Add New Casos',
    'add_new'               => 'Add New',
    'new_item'              => 'New Casos',
    'edit_item'             => 'Edit Casos',
    'update_item'           => 'Update Casos',
    'view_item'             => 'View Casos',
    'view_items'            => 'View Casos',
    'search_items'          => 'Search Casos',
    'not_found'             => 'Not found',
    'not_found_in_trash'    => 'Not found in Trash',
    'featured_image'        => 'Featured Image',
    'set_featured_image'    => 'Set featured image',
    'remove_featured_image' => 'Remove featured image',
    'use_featured_image'    => 'Use as featured image',
    'insert_into_item'      => 'Insert into item',
    'uploaded_to_this_item' => 'Uploaded to this caso',
    'items_list'            => 'Casos list',
    'items_list_navigation' => 'Casos list navigation',
    'filter_items_list'     => 'Filter casos list',
  );
  $args = array(
    'label'                 => 'casos',
    'description'           => 'Custom Posts for Casos',
    'labels'                => $labels,
    'supports'              => array('title', 'editor'),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => false,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type( 'casos', $args );

}
add_action( 'init', 'custom_casos', 0 );



//Custom Post Type: Corporativo
function custom_corporativo() {

  $labels = array(
    'name'                  => 'Corporativo',
    'singular_name'         => 'Corporativo',
    'menu_name'             => 'Corporativo',
    'name_admin_bar'        => 'Corporativo',
    'archives'              => 'Corporativo Archives',
    'attributes'            => 'Item Attributes',
    'parent_item_colon'     => 'Parent Corporativo:',
    'all_items'             => 'All Corporativo',
    'add_new_item'          => 'Add New Corporativo',
    'add_new'               => 'Add New',
    'new_item'              => 'New Corporativo',
    'edit_item'             => 'Edit Corporativo',
    'update_item'           => 'Update Corporativo',
    'view_item'             => 'View Corporativo',
    'view_items'            => 'View Corporativo',
    'search_items'          => 'Search Corporativo',
    'not_found'             => 'Not found',
    'not_found_in_trash'    => 'Not found in Trash',
    'featured_image'        => 'Featured Image',
    'set_featured_image'    => 'Set featured image',
    'remove_featured_image' => 'Remove featured image',
    'use_featured_image'    => 'Use as featured image',
    'insert_into_item'      => 'Insert into item',
    'uploaded_to_this_item' => 'Uploaded to this product',
    'items_list'            => 'Corporativo list',
    'items_list_navigation' => 'Corporativo list navigation',
    'filter_items_list'     => 'Filter corporativo list',
  );
  $args = array(
    'label'                 => 'corporativo',
    'description'           => 'Custom Posts for Corporativo',
    'labels'                => $labels,
    'supports'              => array('title'),
    'taxonomies'            => array('corporativo_category'),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => false,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type( 'corporativo', $args );

}
add_action( 'init', 'custom_corporativo', 0 );



//Custom Post Type: Clientes
function custom_clientes() {

  $labels = array(
    'name'                  => 'Clientes',
    'singular_name'         => 'Cliente',
    'menu_name'             => 'Clientes',
    'name_admin_bar'        => 'Clientes',
    'archives'              => 'Clientes Archives',
    'attributes'            => 'Item Attributes',
    'parent_item_colon'     => 'Parent Clientes:',
    'all_items'             => 'All Clientes',
    'add_new_item'          => 'Add New Clientes',
    'add_new'               => 'Add New',
    'new_item'              => 'New Clientes',
    'edit_item'             => 'Edit Clientes',
    'update_item'           => 'Update Clientes',
    'view_item'             => 'View Clientes',
    'view_items'            => 'View Clientes',
    'search_items'          => 'Search Clientes',
    'not_found'             => 'Not found',
    'not_found_in_trash'    => 'Not found in Trash',
    'featured_image'        => 'Featured Image',
    'set_featured_image'    => 'Set featured image',
    'remove_featured_image' => 'Remove featured image',
    'use_featured_image'    => 'Use as featured image',
    'insert_into_item'      => 'Insert into item',
    'uploaded_to_this_item' => 'Uploaded to this cliente',
    'items_list'            => 'Clientes list',
    'items_list_navigation' => 'Clientes list navigation',
    'filter_items_list'     => 'Filter corporativo list',
  );
  $args = array(
    'label'                 => 'clientes',
    'description'           => 'Custom Posts for Clientes',
    'labels'                => $labels,
    'supports'              => array('title', 'editor'),
    'taxonomies'            => array('clientes_category'),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => false,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type( 'clientes', $args );

}
add_action( 'init', 'custom_clientes', 0 );
