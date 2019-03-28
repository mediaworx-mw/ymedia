<?php
/**
* The front page template file
* Template Name: Canal Ymedia
*
*
* @package WordPress
* @subpackage Ymedia
*/

?>

<?php get_header(); ?>
<div class="canal container-grid">
  <div class="canal__inner">
    <div class="canal-top">
      <?php get_canal_featured();?>
      <?php get_template_part('components/statistics'); ?>
    </div>
    <div class="canal-main">
      <div class="canal-main-top">
        <div class="canal-main-top__left">
          <?php get_canal(1, 1, 'big');?>
        </div>
        <div class="canal-main-top__right">
          <?php get_canal(2, 2, 'small');?>
        </div>
      </div>
      <div class="canal-main-middle">
        <?php get_canal(2, 4, 'regular');?>
      </div>
      <div class="canal-main-bottom">
         <?php get_canal(1, 6, 'small');?>
         <?php get_canal(1, 7, 'regular');?>
         <?php get_canal(1, 8, 'extra-small');?>
      </div>
    </div>
  </div>
</div>
<?php grid('gray') ?>
<?php get_footer(); ?>
