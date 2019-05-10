<?php
/**
* Template Page for Clientes
* Template Name: Clientes
*
*
* @package WordPress
* @subpackage Ymedia
*/

?>

<?php get_header(); ?>
<div class="clientes" data-site-body="clientes">
<div class="clientes-top">
    <div class="clientes-top__info container">
      <h1 class="clientes-top__tag"><?php the_field('tag_clientes'); ?></h1>
      <a href="<?php bloginfo('url'); ?>/casos-de-estudio" class="clientes-top__casos">+ Casos de Estudio</a>
    </div>
  </div>
  <div class="clientes-list overgrid">
    <div class="clientes-list__inner container">
      <?php if( have_rows('clientes') ): while ( have_rows('clientes') ) : the_row(); ?>
        <?php if( get_row_layout() == 'cuadro_clientes' ): ?>
          <div class="clientes-list__block clientes-list__square"></div>
        <?php elseif( get_row_layout() == 'lista_clientes' ): ?>
          <?php
            $post_object = get_sub_field('cliente_clientes');
            if( $post_object ):
              $post = $post_object;
              setup_postdata( $post );
          ?>

            <?php $interna = get_field('pagina_interna_cliente'); ?>
            <?php if ($interna) : ?>
              <a href="<?php the_permalink(); ?>" class="clientes-list__block clientes-list__client">
                <img src="<?php the_field('logo_cliente'); ?>" alt="<?php the_field('nombre_cliente'); ?>">
              </a>
            <?php else: ?>
              <a class="clientes-list__block clientes-list__client clientes-list__client--nolink">
                <img src="<?php the_field('logo_cliente'); ?>" alt="<?php the_field('nombre_cliente'); ?>">
              </a>
            <?php endif; ?>
            <?php wp_reset_postdata();?>
          <?php endif; ?>

        <?php endif ?>

      <?php endwhile; endif;?>
    </div>
  </div>

  <div class="clientes-bottom overgrid">
    <div class="clientes-bottom__inner container ">
      <div class="clientes-bottom__tag">
        <h2><?php the_field('tag_bottom_clientes') ?></h2>
      </div>
      <div class="clientes-bottom__colofon">
        <p>
        <?php the_field('texto_final_clientes') ?></p>
      </div>
    </div>
  </div>
  <div class="clientes-footer">
    <div class="clientes-footer__inner container">
      <div class="clientes-footer__tag">
        <h2><?php the_field('tag_descarga', 'options') ?></h2>
      </div>
      <div class="clientes-footer__descarga">
        <h3><?php the_field('descarga_descarga','options') ?></h3>
        <a href="<?php the_field('archivo_descarga','options') ?>">
          <?php get_template_part('svg/descarga'); ?>
        </a>
      </div>
      <div class="clientes-footer__marca">
        <h4><?php the_field('campana_descarga','options') ?></h4>
      </div>
      <div class="clientes-footer__contacto">
        <h4 href="">Contáctenos</h4>
        <a href="<?php bloginfo('url'); ?>/contacto"> <?php get_template_part('svg/right'); ?></a>
      </div>
    </div>
  </div>
</div>
 <?php grid('gray') ?>
<?php get_footer(); ?>
