<?php
/**
* The front page template file
* Template Name: Canal Ymedia
*
*
* @package WordPress
* @subpackage Ymedia
*/

?>

<?php get_header(); ?>
<div class="canal" data-site-body="canal">
  <?php get_template_part('components/topbar'); ?>
   <div class="canal-featured">
      <div class="canal-featured__bottom">
       <h2 class="canal-featured__bottom-title">Destacados <i class="fas fa-angle-down"></i></h2>
      </div>
      <div class="canal-featured__list container">
        <?php
        $args1 = array(
          'posts_per_page' => 4,
          'post_type' => 'canal',
          'meta_key'    => 'destacado_canal',
          'meta_value'  => true
        );
        $query1 = new WP_Query( $args1 );
        ?>
        <?php if ($query1->have_posts()): while ($query1->have_posts()) :
          $query1->the_post(); ?>
            <?php get_template_part('components/canal/canal-article-featured'); ?>
        <?php endwhile; endif; ?>
        <?php wp_reset_postdata(); ?>
      </div>

    </div>
  <div class="canal-main">
    <div class="canal-main__inner container">


      <div class="canal-main__list"></div>
      <div class="canal-main__bottom">
        <button class="canal-main__load">Cargar Más</button>
      </div>
    </div>


  </div>
</div>
<?php grid('gray') ?>
<?php get_footer(); ?>
