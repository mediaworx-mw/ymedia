<?php
/**
 * The template for displaying all custom posts from Canal Ymedia
 *
 *
 * @package WordPress
 * @subpackage Ymedia
 */

?>

<?php get_header(); ?>
<div class="single" data-site-body="single-canal">
  <?php while ( have_posts() ) : the_post();?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="canal-single">
      <div class="canal-single__top">
        <?php $thumb = get_the_post_thumbnail_url(); ?>
        <div class="canal-single__hero" style="background-image: url('<?php echo $thumb;?>')">
        </div>
        <div class="canal-single__header">
          <a href="#" class="canal-single__category">Estudios</a>
          <h1 class="canal-single__title"><?php the_title(); ?></h1>
          <h2 class="canal-single__subtitle"><?php the_field('subtitulo_canal'); ?></h2>
        </div>
        <div class="canal-single__meta">
          <div class="canal-single__date">
            <h2><?php echo $post_month = get_the_date( 'F' ); ?></h2>
            <h3><?php echo $post_month = get_the_date( 'j' ); ?></h3>
          </div>
          <div class="canal-single__author">
            <?php $author_name = get_the_author_meta('first_name', false).' '. get_the_author_meta('last_name', false);?>
            <h2><?php echo $author_name;?></h2>
            <span><?php the_field('rol_author', $user = 'user_'.$post->post_author); ?></span>
          </div>
        </div>
      </div>
      <div class="canal-single__excerpt">
        <?php get_template_part('components/canal/single-menu') ?>
        <?php the_excerpt(); ?>
      </div>
      <div class="canal-single__content">
        <?php get_template_part('components/entry'); ?>
      </div>
    </div>
  </article>
<?php endwhile;?>
</div>
<?php grid('gray') ?>
<?php get_footer(); ?>
