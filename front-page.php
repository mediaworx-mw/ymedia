<?php
/**
* The front page file
* Template Name: Inicio
*
*
* @package WordPress
* @subpackage Ymedia
*/

?>

<?php get_header(); ?>
<div class="home" id="home" data-site-body="home">
  <?php for ($i = 1; $i <= 3; $i++): ?>
    <div class="home-section home<?php echo $i; ?> section">
      <?php video($i); ?>
      <div class="home-section__inner container">
        <?php
          $title = get_field('title'.$i.'_home');
          $text = get_field('text'.$i.'_home');
          home_tag($title, $text);
          counter('0'.$i, $i);
        ?>
      </div>
      <?php grid('gray'); ?>
  </div>
  <?php endfor; ?>
</div>
<?php get_template_part('components/cookies') ?>
<?php get_footer(); ?>