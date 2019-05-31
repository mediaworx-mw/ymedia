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
 <?php get_template_part('components/back'); ?>
  <div class="cliente-inner container ">
    <div class="cliente-side cliente-side--desktop">
      <?php get_template_part('components/clientes/side'); ?>
    </div>

    <div class="cliente-content ">
      <div class="cliente-top">
        <h2 class="cliente-top__title"><?php the_field('nombre_cliente'); ?></h2>
          <?php $type = get_field('tipo_de_carrusel_cliente'); ?>
          <?php $videos = get_field('hero_videos_cliente'); ?>
          <?php $images = get_field('hero_images_cliente'); ?>

          <?php if ($type == 'video'): ?>
            <!-- Video -->
            <div class="cliente-top__videos">
              <?php echo $videos[0]['video_cliente'] ?>
            </div>
            <?php if (count($videos) > 1): ?>
              <div class="cliente-top__thumbs">
                <?php foreach ( $videos as $index => $video): ?>
                  <div class="cliente-top__thumb cliente-top__thumb--video">
                    <?php echo $videos[$index]['video_cliente'] ?>
                    <div class="cliente-top__layer"></div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          <?php endif; ?>

          <?php if ($type == 'imagen'): ?>
            <!-- Images -->
            <div class="cliente-top__images" style="background-image: url(<?php echo $images[0]['image_cliente'] ?>)"></div>
            <?php if (count($images) > 1): ?>
              <div class="cliente-top__thumbs">
                <?php foreach ( $images as $index => $image): ?>
                  <div class="cliente-top__thumb cliente-top__thumb--image" data-url="<?php echo $images[$index]['image_cliente'] ?>" style="background-image: url(<?php echo $images[$index]['image_cliente'] ?>)">
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          <?php endif; ?>
      </div>

      <div class="cliente-main">
        <div class="cliente-side cliente-side--mobile">
          <?php get_template_part('components/clientes/side'); ?>
        </div>
        <?php get_template_part('components/entry-clientes'); ?>
      </div>
    </div>
  </div>

  <!-- <div class="cliente-footer">
    <div class="cliente-footer__inner container">
      <div class="cliente-footer__marca">
        <h4><?php the_field('campana_descarga','options') ?></h4>
      </div>
      <div class="cliente-footer__contacto">
        <h4 href="">Contáctenos</h4>
        <a href="<?php bloginfo('url'); ?>/contacto"> <?php get_template_part('svg/right'); ?></a>
      </div>
    </div>
  </div> -->
</div>
<?php grid('gray') ?>
<?php get_footer(); ?>
