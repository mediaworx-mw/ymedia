<?php
/**
 * Template Page for Error 404
 * Template Name: Error 404
 *
 *
 * @package WordPress
 * @subpackage Ymedia
 */

?>

<?php get_header(); ?>
<div class="page-404">
  <div class="page-404__inner container">
    <h1 class="page__title"><span style="font-size: 4rem">Error 404. Ups!!</h1>
    <?php  $errorVideo = get_field('error_404', 'option'); ?>
    <div class="page-404__video">
      <video playsinline autoplay muted loop>
        <source src="<?php echo $errorVideo['video_404_webm'] ?>" type="video/webm">
        <source src="<?php echo $errorVideo['video_404_ogv'] ?>" type="video/ogg; codecs=theora,vorbis">
        <source src="<?php echo $errorVideo['video_404_mp4'] ?>" type="video/mp4">
      </video>
    </div>
  </div>
</div>
<?php grid('gray'); ?>
<?php get_footer(); ?>