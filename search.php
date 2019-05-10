<?php
/**
 * The template for displaying search results pages
 *
 *
 * @package WordPress
 * @subpackage Ymedia
 */

?>

<?php get_header(); ?>

<?php if (isset($_GET['date'])):

    $date = $_GET['date'];
    $year  = substr($date, 0, 4);
    $month = substr($date, 5, 2);
    $day   = substr($date, 8);

    $args = array(
      'post_type' => 'canal',
      'date_query' => array(
        array(
          'year'  => $year,
          'month' => $month,
          'day'   => $day,
        ),
      ),
    );
    $the_query = new WP_Query( $args);
    $i = 0;
  ?>
   <div class="resultados" data-site-body="resultados">
    <div class="resultados-top">
      <div class="resultados-top__inner container">
        <?php  if ($the_query->have_posts()): while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <?php $i++ ?>
        <?php endwhile;?>
          <h1 class="resultados-top__title"><?php echo $i  ?> Resultados para: <?php echo $day ?>-<?php echo $month ?>-<?php echo $year ?></h1>
        <?php else: ?>
          <h1 class="resultados-top__title">No se encontraron resultados para: <?php echo $day ?>-<?php echo $month ?>-<?php echo $year ?></h1>
        <?php endif?>
      </div>
    </div>
    <div class="resultados__content">
      <div class="resultados__list container">
        <?php  if ($the_query->have_posts()): while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <?php
            $src = get_template_directory();
            include($src.'/components/canal/canal-article-result.php');
          ?>
          <?php endwhile;?>
        <?php else:  ?>
          <h2 class="resultados__not-found">Por favor, intente con otra fecha</h2>
        <?php endif;?>
        <?php wp_reset_query();?>
      </div>
    </div>
    <?php get_template_part('components/sidebar'); ?>
  </div>

<?php else: ?>
  <div class="resultados" data-site-body="resultados">
    <div class="resultados-top">
      <div class="resultados-top__inner container">
        <?php if ( have_posts() ) : ?>
          <h1 class="resultados-top__title"><?php echo sprintf( __( '%s resultados para: ', 'ymedia' ), $wp_query->found_posts ); echo '<span>'.get_search_query().'</span>' ?></h1>
        <?php else : ?>
          <h1 class="resultados-top__title"><?php _e( 'No se encontraron resultados', 'ymedia' ); ?></h1>
        <?php endif; ?>
      </div>
    </div>
    <div class="resultados__content">
      <div class="resultados__list container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <?php   get_template_part( 'components/canal/canal-article-result'); ?>
          <?php  endwhile; ?>
        <?php else : ?>
           <h2 class="resultados__not-found">Por favor, intente con otros términos</h2>
        <?php endif; ?>
        <?php wp_reset_query();?>
      </div>
    </div>
    <?php get_template_part('components/sidebar'); ?>
  </div>

<?php endif; ?>


<?php grid('gray') ?>
<?php get_footer(); ?>
