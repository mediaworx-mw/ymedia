<?php
/**
 * The template for displaying Posts from Feedly
 *
 *
 * @package WordPress
 * @subpackage Ymedia
 */

?>

<?php get_header(); ?>

<div class="single" data-site-body="single-feedly">
  <?php get_template_part('components/back'); ?>
  <?php while ( have_posts() ) : the_post();?>
  <article id="post-<?php the_ID(); ?>">
    <div class="canal-single">
      <div class="canal-single__top canal-single__top--contained overgrid container">
        <?php
          function showThumb() {
            if ( has_post_thumbnail() ) {
              $thumb = get_the_post_thumbnail_url();
              echo $thumb;
            } else {
              echo get_first_image();
            }
          }
        ?>
        <div class="canal-single__hero canal-single__hero--cover" style="background-image: url('<?php showThumb(); ?>')">
          <div class="canal-single__header">
            <?php
              $category = get_the_category();
              $id = get_the_ID();
              $terms = get_the_terms($id, 'category' );
              $color = get_field('color_category', $terms[0]);
            ?>
             <span style="background: <?php echo $color; ?>" class="canal-single__category"><?php echo $category[0]->cat_name; ?></span>
            <h1 class="canal-single__title"><?php the_title(); ?></h1>
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
      </div>
      <div class="canal-single__main container">
        <?php get_template_part('components/canal/single-side'); ?>
        <div class="canal-single__content">
          <div class="canal-single__excerpt canal-single__excerpt--full">
            <?php the_excerpt ?>
          </div>
          <div class="canal-single__entry">
            <?php get_template_part('components/entry-canal'); ?>
          </div>
        </div>
      </div>
    </div>
   <?php get_template_part('components/go-top') ?>
  </article>
  <script>
    const $entryFirstDiv = document.querySelector('.entry').getElementsByTagName('div')[0];
    const $image = $entryFirstDiv.getElementsByTagName('img')[0]
    $image.parentNode.removeChild($image);
    const $paragraph = $entryFirstDiv.getElementsByTagName('p')[0]
    $paragraph.parentNode.removeChild($paragraph);
  </script>
<?php endwhile;?>
</div>
<?php grid('gray') ?>
<?php get_footer(); ?>
