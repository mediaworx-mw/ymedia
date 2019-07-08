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
  <?php get_template_part('components/back'); ?>
  <?php while ( have_posts() ) : the_post();?>
  <article id="post-<?php the_ID(); ?>">
    <div class="canal-single">
      <?php $layout = get_field('layout_canal'); ?>

      <?php if($layout == 'full'): ?>
        <div class="canal-single__top canal-single__top--full overgrid">
          <?php $thumb = get_the_post_thumbnail_url(); ?>
          <div class="canal-single__hero canal-single__hero--cover" style="background-image: url('<?php echo $thumb;?>')">
            <div class="canal-single__header">
              <?php
                $terms = get_the_terms($post->ID, 'canal_category' );
                foreach($terms as $key=>$term):
                  $color = get_field('color_categoria', $terms[$key]);
                  $link = get_term_link($terms[$key]);
                  $name = $terms[$key]->name;
              ?>
               <span style="background: <?php echo $color; ?>" class="canal-single__category"> <?php echo $name; ?></span>
              <?php endforeach; ?>
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
              <?php the_field('resumen_canal') ?>
            </div>
            <div class="canal-single__entry">
              <?php get_template_part('components/entry-canal'); ?>
            </div>
            <div class="canal-single__graficos entry">
              <?php the_field('graficos_canal'); ?>

              <?php require get_template_directory() . '/inc/graficos-newsletters/master.php'; ?>
            </div>
          </div>
        </div>

      <?php endif; ?>

      <?php if($layout == 'contained'): ?>

        <div class="canal-single__top canal-single__top--contained overgrid container">
          <?php $thumb = get_the_post_thumbnail_url(); ?>
          <div class="canal-single__hero canal-single__hero--cover" style="background-image: url('<?php echo $thumb;?>')">
            <div class="canal-single__header">
             <?php
                $terms = get_the_terms($post->ID, 'canal_category' );
                foreach($terms as $key=>$term):
                  $color = get_field('color_categoria', $terms[$key]);
                  $link = get_term_link($terms[$key]);
                  $name = $terms[$key]->name;
              ?>
               <span style="background: <?php echo $color; ?>" class="canal-single__category"> <?php echo $name; ?></span>
              <?php endforeach; ?>
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
              <?php the_field('resumen_canal') ?>
            </div>
            <div class="canal-single__entry">
              <?php get_template_part('components/entry-canal'); ?>
            </div>
            <div class="canal-single__graficos entry">
              <?php the_field('graficos_canal'); ?>

              <?php require get_template_directory() . '/inc/graficos-newsletters/master.php'; ?>
            </div>
          </div>
        </div>

      <?php endif; ?>

       <?php if($layout == 'small'): ?>
        <div class="canal-single__top-wrap container">
          <div class="canal-single__top canal-single__top--small overgrid">
            <?php
              $terms = get_the_terms($post->ID, 'canal_category' );
              foreach($terms as $key=>$term):
                $color = get_field('color_categoria', $terms[$key]);
                $link = get_term_link($terms[$key]);
                $name = $terms[$key]->name;

            ?>
            <span style="background: <?php echo $color; ?>" class="canal-single__category"> <?php echo $name; ?></span>
            <?php endforeach; ?>
              <h1 class="canal-single__title"><?php the_title(); ?></h1>

            <?php $thumb = get_the_post_thumbnail_url(); ?>
            <div class="canal-single__header">
            </div>
            <div class="canal-single__hero" style="background-image: url('<?php echo $thumb;?>')">
              <div class="canal-single__meta">
                <div class="canal-single__date">
                  <h2><?php echo $post_month = get_the_date( 'F' ); ?></h2>
                  <h3><?php echo $post_month = get_the_date( 'j' ); ?></h3>
                </div>
              </div>
            </div>
          </div>

          <div class="canal-single__excerpt canal-single__excerpt--small">
            <?php get_template_part('components/canal/single-side'); ?>

             <?php the_field('resumen_canal') ?>
          </div>
        </div>

        <div class="canal-single__main canal-single__main--small container">
          <?php get_template_part('components/canal/single-side'); ?>
          <div class="canal-single__content">
            <div class="canal-single__entry">
              <?php get_template_part('components/entry-canal'); ?>
            </div>
            <div class="canal-single__graficos entry">
              <?php the_field('graficos_canal'); ?>

              <?php require get_template_directory() . '/inc/graficos-newsletters/master.php'; ?>

            </div>
          </div>
        </div>


      <?php endif; ?>


    </div>
   <?php get_template_part('components/go-top') ?>
  </article>

<?php endwhile;?>

</div>
<?php grid('gray') ?>
<?php get_footer(); ?>
