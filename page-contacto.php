<?php
/**
* Template Page for Contacto
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
  <div class="contacto__content container">
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
    <div class="contacto-video"></div>
    <div class="contacto-maps">
      <div class="contacto-maps__maps">

        <div class="contacto-maps__map overgrid">
          <div class="contacto-maps__map-inner">
            <?php if( have_rows('madrid_mapa_contacto') ): while ( have_rows('madrid_mapa_contacto') ) : the_row();?>
              <div class="contacto-maps__info">
                <h2>Madrid</h2>
                <h3><?php the_sub_field('direccion1_madrid_contacto'); ?></h3>
                <h4><?php the_sub_field('direccion2_madrid_contacto'); ?></h4>
                <div class="contacto-maps__info-bottom">
                  <a href="tel:<?php the_sub_field('telefono_madrid_contacto'); ?>"><?php the_sub_field('telefono_madrid_contacto'); ?></a>
                  <a href="mailto:<?php the_sub_field('email_madrid_contacto'); ?>"><?php the_sub_field('email_madrid_contacto'); ?></a>
                </div>
              </div>
             <?php endwhile; endif; ?>
          </div>
        </div>


        <div class="contacto-maps__map overgrid">
          <div class="contacto-maps__map-inner">
            <?php if( have_rows('barcelona_mapa_contacto') ): while ( have_rows('barcelona_mapa_contacto') ) : the_row();?>
              <div class="contacto-maps__info">
                <h2>Barcelona</h2>
                <h3><?php the_sub_field('direccion1_barcelona_contacto'); ?></h3>
                <h4><?php the_sub_field('direccion2_barcelona_contacto'); ?></h4>
                <div class="contacto-maps__info-bottom">
                  <a href="tel:<?php the_sub_field('telefono_barcelona_contacto'); ?>"><?php the_sub_field('telefono_barcelona_contacto'); ?></a>
                  <a href="mailto:<?php the_sub_field('email_barcelona_contacto'); ?>"><?php the_sub_field('email_barcelona_contacto'); ?></a>
                </div>
              </div>
             <?php endwhile; endif; ?>
          </div>
        </div>
    </div>
  </div>
</div>
<?php grid('gray');?>


<?php get_footer();?>
