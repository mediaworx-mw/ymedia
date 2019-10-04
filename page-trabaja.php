<?php
/**
* Template Page for Trabaja con Ymedia
* Template Name: Trabaja
*
*
* @package WordPress
* @subpackage Ymedia
*/

?>

<?php get_header(); ?>
<div class="trabaja" data-site-body="trabaja">

  <div class="trabaja-top">
    <div class="trabaja-top__inner container">
      <h1 class="trabaja-top__title"><span>La diferencia la hace el talento y la calidad humana</span></h1>
       <!--<a href="<?php echo bloginfo('url')?>/contacto" class="trabaja-top__link">Contacto +</a>-->
      <div class="trabaja-top__intro">
        <p>Estamos buscando constantemente gente que encaje en ymedia. Buscamos gente activa, gente despierta, personas que saben lo que hacen y que conocen el sector. Déjanos tus datos y ven a formar parte de nuestro gran equipo.</p>
      </div>
    </div>
  </div>

  <div class="trabaja-content">
    <div class="trabaja-content__inner container">
      <h3 class="trabaja-content__title">Comparte tus datos</h3>
    </div>
  </div>

  <div class="trabaja-form">
    <div class="trabaja-form__inner container">
      <div class="trabaja-form__form contact-form">
        <?php  echo do_shortcode('[contact-form-7 id="461" title="Trabaja"]') ?>
       </div>
    </div>
  </div>

</div>
 <?php grid('gray') ?>
<?php get_footer(); ?>
