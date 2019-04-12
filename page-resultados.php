<?php
/**
* Template page for Search Post Results (Canal Ymedia)
* Template Name: Resultados
*
*
* @package WordPress
* @subpackage Ymedia
*/

?>

<?php
  $date = $_GET['date'];
  $year  = substr($date, 0, 4);
  $month = substr($date, 5, 2);
  $day   = substr($date, 8);
?>

<?php get_header(); ?>
<div class="resultados" data-site-body="resultados">
  <div class="resultados-top">
    <div class="resultados-top__inner container">
      <h1 class="resultados-top__title"><?php the_field('titulo_resultados') ?></h1>
      <h2 class="resultados-top__tag"><?php echo $day ?>-<?php echo $month ?>-<?php echo $year ?></h2>
    </div>
  </div>
  <div class="resultados__content">

  <div class="resultados__list">
    <?php
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
    ?>
    <?php  if ($the_query->have_posts()): while ($the_query->have_posts()) : $the_query->the_post(); ?>
      <?php
        $src = get_template_directory();
        include($src.'/components/canal/canal-article-result.php');
      ?>

    <?php endwhile; endif;?>
    <?php wp_reset_query();?>
  </div>
  <div class="resultados__side">
    <?php get_template_part('components/sidebar'); ?>
  </div>
</div>
</div>
 <?php grid('gray') ?>
<?php get_footer(); ?>
