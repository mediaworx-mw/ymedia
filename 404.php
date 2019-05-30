<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Ymedia
 */

?>

<?php get_header(); ?>
  <div class="page">
    <div class="page__inner container--single">
      <h1 class="page__page-title">
        404 <br> Page not found!
      </h1>
      <figure class="page__page-thumb">
        <?php the_post_thumbnail() ?>
      </figure>
      <div class="entry-content" style="text-align: center">
        <h2>We can't find the page you are looking for</h2>
        <p>Please try with different terms</p>
      </div>
    </div>
  </div>
<?php get_footer(); ?>
