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


<div class="canal" data-site-body="canal" data-dates="">
  <?php get_template_part('components/topbar'); ?>
   <div class="canal-featured">
      <div class="canal-featured__bottom">
       <h2 class="canal-featured__bottom-title">Destacados <i class="fas fa-angle-down"></i></h2>
      </div>
      <div class="canal-featured__list container" >

        <?php
        //Audiencia Diaria
        $args1 = array(
          'posts_per_page' => 1,
          'post_type' => 'canal',
          'post_status' => 'publish',
          'tax_query' => array(
            array(
              'taxonomy' => 'canal_category',
              'field' => 'slug',
              'terms' => 'audiencias-diarias',
            ),
          ),
        );

        $query = new WP_Query( $args1 );
        ?>
        <?php if ($query->have_posts()): ?>

         <?php while ($query->have_posts()) :
          $query->the_post(); ?>

            <?php get_template_part('components/canal/canal-article-featured'); ?>
        <?php endwhile; endif; ?>
        <?php wp_reset_postdata(); ?>

        <?php
        //Audiencia Mensual
        $args2 = array(
          'posts_per_page' => 1,
          'post_type' => 'canal',
          'post_status' => 'publish',
          'tax_query' => array(
            array(
              'taxonomy' => 'canal_category',
              'field' => 'slug',
              'terms' => 'audiencias-mensuales',
            ),
          ),
        );

        $query = new WP_Query( $args2 );
        ?>
        <?php if ($query->have_posts()): while ($query->have_posts()) :
          $query->the_post(); ?>
            <?php get_template_part('components/canal/canal-article-featured'); ?>
        <?php endwhile; endif; ?>
        <?php wp_reset_postdata(); ?>

        <?php
        //EGM
        $args3 = array(
          'posts_per_page' => 1,
          'post_type' => 'canal',
          'post_status' => 'publish',
          'tax_query' => array(
            array(
              'taxonomy' => 'canal_category',
              'field' => 'slug',
              'terms' => 'egm',
            ),
          ),
        );

        $query = new WP_Query( $args3 );
        ?>
        <?php if ($query->have_posts()): while ($query->have_posts()) :
          $query->the_post(); ?>
            <?php get_template_part('components/canal/canal-article-featured'); ?>
        <?php endwhile; endif; ?>
        <?php wp_reset_postdata(); ?>

        <?php
        //Inversion
        $args3 = array(
          'posts_per_page' => 1,
          'post_type' => 'canal',
          'post_status' => 'publish',
          'tax_query' => array(
            array(
              'taxonomy' => 'canal_category',
              'field' => 'slug',
              'terms' => 'inversion',
            ),
          ),
        );

        $query = new WP_Query( $args3 );
        ?>
        <?php if ($query->have_posts()): while ($query->have_posts()) :
          $query->the_post(); ?>
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
<script>
  const dates = <?php echo json_encode(get_posts_dates_array()); ?>;
  const canal = document.querySelector('.canal');
  canal.setAttribute("data-dates", dates);
</script>

<?php grid('gray') ?>
<?php get_footer(); ?>
