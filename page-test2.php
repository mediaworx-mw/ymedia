<?php
/**
* Template page for Search Canal Ymedia main page
* Template Name: Canal Ymedia
*
*
* @package WordPress
* @subpackage Ymedia
*/

?>

<?php get_header(); ?>

<div class="canal" data-site-body="canal-ymedia">
<?php
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
?>
<?php  if ($the_query->have_posts()): while ($the_query->have_posts()) : $the_query->the_post(); ?>
  <?php
    $src = get_template_directory();
    include($src.'/components/canal/canal-article.php');
  ?>

<?php endwhile; endif;?>
<?php wp_reset_query();?>

</div>
<?php grid('gray') ?>
<?php get_footer(); ?>
