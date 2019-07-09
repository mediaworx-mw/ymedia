<?php
/**
* Template Page for Corporativo
* Template Name: Corporativo
*
*
* @package WordPress
* @subpackage Ymedia
*/

?>

<?php get_header(); ?>
<div class="corporativo" data-site-body="corporativo">
  <div class="corporativo-top">
    <div class="corporativo-top__inner container">
      <h1 class="corporativo-top__tag variable"><?php the_field('tag1_corporativos') ?></h1>
      <p class="corporativo-top__intro"><?php the_field('tag2_corporativos') ?></p>
    </div>
  </div>

  <div class="members">
    <div class="members__inner container">
    <?php
      if( have_rows('lista_corporativos') ): while ( have_rows('lista_corporativos') ) : the_row();
        $size = get_sub_field('size_corporativos') ;
        $post_object = get_sub_field('member_corporativos');
        if( $post_object ):
          $post = $post_object;
          setup_postdata( $post );
          member();
          wp_reset_postdata();
        endif;
      endwhile; endif;
    ?>
    </div>
  </div>
</div>
<?php grid('gray');?>
<?php get_footer();?>
