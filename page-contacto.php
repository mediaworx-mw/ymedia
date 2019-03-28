<?php
/**
* The front page template file
* Template Name: Contacto
*
*
* @package WordPress
* @subpackage Ymedia
*/

?>

<?php get_header(); ?>
<div class="contacto" data-site-body="contacto">
  <div class="contacto-top">
    <div class="contacto-top__inner container">
      <h1 class="contacto-top__title"><?php the_field('titulo_contacto') ?></h1>
    </div>
  </div>
  <div class="contacto__content">
    <div class="contacto-form">
      <div class="contacto-form__header">
        <h2>Dejanos una nota, sugerencia o consulta.</h2>
      </div>
      <div class="contacto-form__form">
      <?php
        //Localhost
        echo do_shortcode('[contact-form-7 id="287" title="Contacto"]');

        //Staging MediaWorx
       // echo do_shortcode('[contact-form-7 id="432" title="Contacto"]')
      ?>


      </div>
    </div>
    <div class="contacto-maps">
      <div class="contacto-maps__header">
        <h2>Visítanos</h2>
      </div>
      <div class="contacto-maps__maps">
        <div class="contacto-maps__map">

        </div>
        <div class="contacto-maps__map">

        </div>
      </div>
    </div>
  </div>
</div>
<?php grid('gray');?>
<?php get_footer();?>
