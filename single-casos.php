<?php
/**
 * The template for displaying all custom posts from Casos de Estudio
 *
 *
 * @package WordPress
 * @subpackage Ymedia
 */

?>

<?php get_header(); ?>
<div class="caso" data-site-body="caso">
  <div class="caso-top">
    <?php if( have_rows('hero_caso') ): while ( have_rows('hero_caso') ) : the_row(); ?>
      <div class="caso-top__video">
        <video class="video-caso" playsinline controls="true">
          <source src="<?php echo get_sub_field('video_webm_caso') ?>" type="video/webm; codecs=vp8,vorbis">
          <source src="<?php echo get_sub_field('video_ogg_caso') ?>" type="video/ogg; codecs=theora,vorbis">
          <source src="<?php echo get_sub_field('video_mp4_caso') ?>" type="video/mp4">
        </video>
        <div class="caso-top__play">
          <?php get_template_part('svg/play'); ?>
        </div>
      </div>
    <?php endwhile; endif;?>
    <div class="caso-top__info container">
      <h1 class="caso-top__tag"><?php the_field('tag_caso'); ?></h1>
    </div>
  </div>
  <div class="caso-main">
    <div class="caso-side">
      <div class="caso-side__top">
        <h2><?php the_field('nombre_caso'); ?></h2>
      </div>
      <div class="caso-side__thumb">
        <img src="<?php the_field('imagen_side_caso'); ?>" alt="">
      </div>
      <div class="caso-side__info">
        <img src="<?php the_field('logo_caso'); ?>" alt="" class="caso-side__logo">
        <div class="caso-side__section">
          <h2 class="caso-side__subtitle">Cliente</h2>
          <h2 class="caso-side__heading"><?php the_field('nombre_caso') ?></h2>
          <a class="caso-side__heading" href="<?php the_field('url_link_caso') ?>"><?php the_field('url_caso') ?></a>
        </div>
        <div class="caso-side__section">
          <h2 class="caso-side__subtitle">Campaña</h2>
          <h2 class="caso-side__heading"><?php the_field('campana_caso') ?></h2>
        </div>
        <div class="caso-side__section">
          <h2 class="caso-side__subtitle">Fecha</h2>
          <h2 class="caso-side__heading"><?php the_field('fecha_caso') ?></h2>
        </div>
        <div class="caso-side__section">
          <h2 class="caso-side__subtitle">Medios</h2>
          <h2 class="caso-side__heading"><?php the_field('medios_caso') ?></h2>
        </div>
        <div class="caso-side__social">
          <a target="_blank" href="<?php the_field('twitter_caso') ?>"><i class="fab fa-twitter"></i></a>
          <a target="_blank" href="<?php the_field('twitter_caso') ?>"><i class="fab fa-facebook-f"></i></a>
          <a target="_blank" href="<?php the_field('twitter_caso') ?>"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
    </div>
    <div class="caso-content container">
      <?php get_template_part('components/entry-casos'); ?>
    </div>
  </div>
</div>
<?php grid('gray') ?>
<?php get_footer(); ?>
