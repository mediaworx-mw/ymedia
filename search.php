<?php
/**
 * The template for displaying search results pages
 *
 *
 * @package WordPress
 * @subpackage Ymedia
 */

?>

<?php get_header(); ?>
<div class="search blog category">
  <div class="container">
    <h1><?php echo sprintf( __( '%s Search Results for: ', 'crisvars' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>
    <?php get_template_part('template-parts/blog/loop-search'); ?>
  </div>
</div>

<?php get_footer(); ?>
