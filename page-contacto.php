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
      <!--<a href="<?php bloginfo('url')?>/trabaja-con-ymedia" class="contacto-top__link">Trabaja con Ymedia +</a>-->
    </div>
  </div>
  <div class="contacto__content container">
    <div class="contacto-form">
      <div class="contacto-form__header">
        <h2>Dejanos una nota, sugerencia o consulta.</h2>
      </div>
      <div class="contacto-form__form contact-form">
      <?php echo do_shortcode('[contact-form-7 id="287" title="Contacto"]'); ?>
      </div>
    </div>
    <div class="contacto-video">
      <video data-keepplaying class="contacto-video__vid" poster="<?php echo get_field('hero'.$id.'_home') ?>" playsinline autoplay muted loop>
        <source src="<?php echo get_field('video_webm_contacto') ?>" type="video/webm">
        <source src="<?php echo get_sub_field('video_ogg_contacto') ?>" type="video/ogg; codecs=theora,vorbis">
        <source src="<?php echo get_field('video_mp4_contacto') ?>" type="video/mp4">
      </video>
    </div>
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
