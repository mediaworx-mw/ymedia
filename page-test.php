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

  <?php echo do_shortcode('[contact-form-7 id="468" title="Newsletter"]') ?>



</div>
<div class="progress-bar">
  <span class="progress-bar__line"></span>
</div>
<?php get_footer(); ?>


 <span class="wpcf7-form-control-wrap s2">
  <span class="wpcf7-form-control wpcf7-radio">
    <span class="wpcf7-list-item first">
      <input type="radio" name="s2" value="Ni lo sé, ni me importa" />
      <span class="wpcf7-list-item-label">Ni lo sé, ni me importa</span>
    </span>

    <span class="wpcf7-list-item">
      <input type="radio" name="s2" value="Me suena, pero no lo tengo muy claro" />
      <span class="wpcf7-list-item-label">Me suena, pero no lo tengo muy claro</span>
    </span>

    <span class="wpcf7-list-item">
      <input type="radio" name="s2" value="¡Claro! Aunque me gustaría saber algo más sobre el tema" />
      <span class="wpcf7-list-item-label">¡Claro! Aunque me gustaría saber algo más sobre el tema</span>
    </span>

    <span class="wpcf7-list-item">
      <input type="radio" name="s2" value="Lo sé de sobra, me interesan cosas aún más sofisticadas" />
      <span class="wpcf7-list-item-label">Lo sé de sobra, me interesan cosas aún más sofisticadas</span>
    </span>

    <span class="wpcf7-list-item last">
      <input type="radio" name="s2" value="Soy un experto en el asunto" />
      <span class="wpcf7-list-item-label">Soy un experto en el asunto</span>
    </span>
  </span>
</span>