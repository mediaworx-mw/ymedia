<?php
/**
* The Category Ymedia template file
* Template Name: Canal Ymedia Category
*
*
* @package WordPress
* @subpackage Ymedia
*/

?>

<?php get_header(); ?>

<?php $category = get_queried_object()->term_id; ?>
<div class="canal">
   <?php get_template_part('components/sidebar'); ?>
    <div class="canal-top">
      <?php get_canal_featured_category($category);?>
      <?php get_template_part('components/statistics'); ?>
    </div>
    <div class="canal-main">
      <div class="canal-main-top">
        <div class="canal-main-top__left">
          <?php get_canal_category(1, 1, 'big', $category);?>
        </div>
        <div class="canal-main-top__right">
          <?php get_canal_category(2, 2, 'small', $category);?>
        </div>
      </div>
      <div class="canal-main-middle">
        <?php get_canal_category(2, 4, 'regular', $category);?>
      </div>
      <div class="canal-main-bottom">
         <?php get_canal_category(1, 6, 'small', $category);?>
         <?php get_canal_category(1, 7, 'regular', $category);?>
         <?php get_canal_category(1, 8, 'extra-small', $category);?>
      </div>
    </div>
</div>
<?php get_footer(); ?>