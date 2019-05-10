<?php
/**
* Template Page for Casos de Estudio
* Template Name: Casos
*
*
* @package WordPress
* @subpackage Ymedia
*/

?>

<?php get_header(); ?>
<div class="casos" data-site-body="casos">
   <a href="<?php bloginfo('url'); ?>/clientes" class="casos__clientes">+ Clientes</a>
   <?php page_crumb();?>

  <div class="casos-top">

    <div class="casos-top__inner container">
      <p class="casos-top__intro"><?php the_field('intro_casos') ?></p>
    </div>
  </div>

  <div class="casos-list">
    <div class="casos-list__inner container">
      <?php
      if( have_rows('lista_casos') ): while ( have_rows('lista_casos') ) : the_row();
        $size = get_sub_field('size_casos') ;
        $post_object = get_sub_field('caso_casos');
        if( $post_object ):
          $post = $post_object;
          setup_postdata( $post );

         caso($size);
          wp_reset_postdata();
        endif;
      endwhile; endif;
    ?>
    </div>
  </div>

</div>
 <?php grid('gray') ?>
<?php get_footer(); ?>
