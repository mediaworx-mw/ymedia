<?php
/**
* Template Page for NewsLetter
* Template Name: Test
*
*
* @package WordPress
* @subpackage Ymedia
*/

?>

<?php get_header(); ?>
<div class="newsletter" id="fullpageNews" data-site-body="newsletter">

<?php
  $form_widget = new \MailPoet\Form\Widget();
  echo $form_widget->widget(array('form' => 1, 'form_type' => 'php'));
?>

</div>
<div class="progress-bar">
    <span class="progress-bar__line"></span>
  </div>
<?php get_footer(); ?>
