<?php
/**
* The front page template file
* Template Name: Corporativo Test
*
*
* @package WordPress
* @subpackage Ymedia
*/

?>

<?php get_header(); ?>
<?php get_template_part('components/corporativo/modal');?>
<div class="corporativo corporativo-test container-test" data-site-body="corporativo">
  <div class="corporativo__inner">
  <div class="corporativo-top">
    <h1 class="corporativo-top__tag"><?php the_field('tag1_corporativos') ?></h1>
    <p class="corporativo-top__intro"><?php the_field('tag2_corporativos') ?></p>
  </div>
  <?php get_template_part('components/page-crumb');?>
  <div class="members">
    <div class="grid-sizer"></div>
    <?php
      if( have_rows('lista_corporativos') ): while ( have_rows('lista_corporativos') ) : the_row();
        $size = get_sub_field('size_corporativos') ;
        $post_object = get_sub_field('member_corporativos');
        if( $post_object ):
          $post = $post_object;
          setup_postdata( $post );
          member($size);
          wp_reset_postdata();
        endif;
      endwhile; endif;
    ?>
  </div>
</div>
<?php grid_test('gray');?>
<?php get_footer();?>
