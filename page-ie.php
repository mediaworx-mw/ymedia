<?php
/**
 * The template for displaying all pages
 *
 *
 * @package WordPress
 * @subpackage Ymedia
 */

?>

<?php get_header(); ?>
<?php while(have_posts()): the_post() ?>

<div class="page">
  <div class="page__inner container">
    <h1 class="page__title">Por favor actualice la version de su navegador.</h1>


  </div>
</div>

<?php endwhile; ?>
<?php grid('gray'); ?>
<?php get_footer(); ?>
