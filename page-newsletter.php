<?php
/**
* Template Page for NewsLetter
* Template Name: Newsletter
*
* @package WordPress
* @subpackage Ymedia
*/

?>

<?php get_header(); ?>
<div class="newsletter" id="fullpageNews" data-site-body="newsletter">
  <div class="newsletter__inner container">
    <h1 class="newsletter__title">Newsletter</h1>
    <div class="contact-form newsletter-form">
      <?php echo do_shortcode('[contact-form-7 id="490" title="Suscripcion"]'); ?>
    </div>
  </div>
  <script>
    const $firstLabel = document.querySelector('.wpcf7-mailpoetsignup').getElementsByTagName('label')[1];
    $firstLabel.parentNode.removeChild($firstLabel);
  </script>
</div>
<?php grid('gray');?>
<?php get_footer(); ?>