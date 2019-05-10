<?php
/**
 * The template for displaying all custom posts from Clientes
 *
 *
 * @package WordPress
 * @subpackage Ymedia
 */

?>

<?php get_header(); ?>
<div class="cliente" data-site-body="cliente">
  <div class="cliente-top">
    <?php if( have_rows('hero_cliente') ): while ( have_rows('hero_cliente') ) : the_row(); ?>
      <?php if( get_row_layout() == 'imagen_cliente' ): ?>
        <div class="cliente-top__image" style="background-image: url(<?php echo get_sub_field('imagen_item_cliente') ?>)">
        </div>
      <?php elseif( get_row_layout() == 'video_cliente' ): ?>
        <div class="cliente-top__video">
          <video class="video-cliente" playsinline controls="true">
            <source src="<?php echo get_sub_field('video_webm_cliente') ?>" type="video/webm; codecs=vp8,vorbis">
            <source src="<?php echo get_sub_field('video_ogg_cliente') ?>" type="video/ogg; codecs=theora,vorbis">
            <source src="<?php echo get_sub_field('video_mp4_cliente') ?>" type="video/mp4">
          </video>
          <div class="cliente-top__play">
            <?php get_template_part('svg/play'); ?>
          </div>
        </div>
      <?php endif ?>
    <?php endwhile; endif;?>
    <div class="cliente-top__info container">
      <h1 class="cliente-top__tag"><?php the_field('tag_cliente'); ?></h1>
    </div>
  </div>
  <div class="cliente-main ">
    <div class="cliente-side">
      <div class="cliente-side__top">
        <h2><?php the_field('nombre_cliente'); ?></h2>
      </div>
      <div class="cliente-side__thumb">
        <img src="<?php the_field('imagen_side_cliente'); ?>" alt="">
      </div>
      <div class="cliente-side__info">
        <img src="<?php the_field('logo_cliente'); ?>" alt="" class="cliente-side__logo">
        <div class="cliente-side__section">
          <h2 class="cliente-side__subtitle">Cliente</h2>
          <h2 class="cliente-side__heading"><?php the_field('nombre_cliente') ?></h2>
          <a class="cliente-side__heading" href="<?php the_field('url_link_cliente') ?>"><?php the_field('url_cliente') ?></a>
        </div>
        <div class="cliente-side__section">
          <h2 class="cliente-side__subtitle">Campaña</h2>
          <h2 class="cliente-side__heading"><?php the_field('campana_cliente') ?></h2>
        </div>
        <div class="cliente-side__section">
          <h2 class="cliente-side__subtitle">Fecha</h2>
          <h2 class="cliente-side__heading"><?php the_field('fecha_cliente') ?></h2>
        </div>
        <div class="cliente-side__section">
          <h2 class="cliente-side__subtitle">Medios</h2>
          <h2 class="cliente-side__heading"><?php the_field('medios_cliente') ?></h2>
        </div>
        <div class="cliente-side__social">
          <a target="_blank" href="<?php the_field('twitter_cliente') ?>"><i class="fab fa-twitter"></i></a>
          <a target="_blank" href="<?php the_field('twitter_cliente') ?>"><i class="fab fa-facebook-f"></i></a>
          <a target="_blank" href="<?php the_field('twitter_cliente') ?>"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
    </div>
    <div class="cliente-content container">
      <?php get_template_part('components/entry-clientes'); ?>
    </div>
  </div>
  <div class="cliente-footer ">
    <div class="cliente-footer__inner container">
      <div></div>
      <div class="cliente-footer__descarga">
        <h3><?php the_field('descarga_descarga','options') ?></h3>
        <a href="<?php the_field('archivo_descarga','options') ?>"><?php get_template_part('svg/descarga'); ?></a>
      </div>

      <div class="cliente-footer__marca">
        <h4><?php the_field('campana_descarga','options') ?></h4>
      </div>
      <div class="cliente-footer__contacto">
        <h4 href="">Contáctenos</h4>
        <a href="<?php bloginfo('url'); ?>/contacto"> <?php get_template_part('svg/right'); ?></a>
      </div>
    </div>
  </div>
</div>
<?php grid('gray') ?>
<?php get_footer(); ?>
