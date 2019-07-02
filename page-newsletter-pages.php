<?php
/**
 * The template for displaying Newsletter Confirm / Cancel pages
 * Template Name: Newsletter Pages
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
    <div class="entry">
      <?php the_content(); ?>
    </div>
    <a class="button button--gray button--back" href="<?php echo get_site_url('/') ?>"><i class="fas fa-arrow-left"></i>Ir a inicio</a>
  </div>
</div>

<?php endwhile; ?>
<?php grid('gray'); ?>
<?php get_footer(); ?>
