<?php
/**
* Template Page for Feedly
* Template Name: Feedly
 *
 *
 * @package WordPress
 * @subpackage Ymedia
 */

?>

<?php get_header(); ?>
<?php while(have_posts()): the_post() ?>

<div class="page feedly" data-site-body="feedly">
  <div class="page__inner container">
    <h1 class="page_title"><?php the_title(); ?></h1>

  </div>
</div>

<?php endwhile; ?>
<?php grid('gray'); ?>
<?php get_footer(); ?>
