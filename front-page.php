<?php
/**
* The front page template file
* Template Name: Inicio
*
*
* @package WordPress
* @subpackage Ymedia
*/

?>

<?php get_header(); ?>
<div class="home" data-site-body="home">
  <div class="home-section home1">
    <?php video('1') ?>
    <?php $title1 = get_field('title1_home'); $text1 = get_field('text1_home'); ?>
    <?php home_tag($title1, $text1) ?>
    <?php /*counter('01', '1') */?>
    <?php grid('gray') ?>
  </div>
  <div class="home-section home2">
 <?php video('2') ?>
    <?php $title2 = get_field('title2_home'); $text2 = get_field('text2_home'); ?>
    <?php home_tag($title2, $text2) ?>
    <?php /*counter('02', '2') */?>
    <?php grid('gray') ?>
  </div>
  <div class="home-section home3">
    <?php video('3') ?>
    <?php $title3 = get_field('title3_home'); $text3 = get_field('text3_home'); ?>
    <?php home_tag($title3, $text3) ?>
    <?php /*counter('03', '3') */?>
    <?php grid('gray') ?>
  </div>
</div>
<?php get_footer(); ?>
