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
    <h1 class="page__title"><?php the_title(); ?></h1>

    <div class="entry">
      <?php the_content(); ?>
    </div>
  </div>
</div>

<?php endwhile; ?>
<?php grid('gray'); ?>
<?php get_footer(); ?>
