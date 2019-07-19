<?php
/**
 * Main Footer
 *
 *
 * @package WordPress
 * @subpackage Ymedia
 */

?>

<footer class="footer">
  <div class="footer__cross-button">
    <div class="cross-icon"></div>
  </div>
  <div class="footer__wrapper">
    <div class="footer__inner container">
      <div class="footer__top">
        <?php $subscripcion = get_field('subscripcion_footer', 'options'); ?>
        <div class="footer__subscribe">
          <h3><?php echo $subscripcion['tag_subscripcion']; ?></h3>
          <div class="footer__box">
            <h5><?php echo $subscripcion['texto_subscripcion']; ?></h5>
            <form onsubmit="return validateMyForm();" class="footer__news" method="GET" action="<?php bloginfo('url'); ?>/newsletter" novalidate>
              <input class="footer__news-input" type="email" id="email" name="email" placeholder="Dirección de email"></input>
              <button type="submit">Enviar</button>
            </form>
          </div>
        </div>
        <div class="footer__nav footer__nav1">
          <?php wp_nav_menu( array('theme_location' => 'footer 1', 'menu' => 'Footer 1', 'container'=>false) ); ?>
        </div>
        <div class="footer__nav footer__nav2">
           <?php wp_nav_menu( array('theme_location' => 'footer 2', 'menu' => 'Footer 2', 'container'=>false) ); ?>
        </div>
      </div>
      <div class="footer__bottom">
        <div class="footer__social">
          <?php $social = get_field('social', 'options'); ?>
          <a href="<?php echo $social['twitter']; ?>"><i class="fab fa-twitter"></i></a>
          <a href="<?php echo $social['facebook']; ?>"><i class="fab fa-facebook-f"></i></a>
          <a href="<?php echo $social['linkedin']; ?>"><i class="fab fa-linkedin-in"></i></a>
          <a href="<?php echo $social['youtube']; ?>"><i class="fab fa-youtube"></i></a>
        </div>

        <div><p class="footer__copy">© <?php echo date("Y"); ?>
          <?php the_field('copyright_footer', 'options') ?>
        </p>
        </div>
        <div>
        <a class="footer__logo logo-white" href="<?php bloginfo('url') ?>" >
          <?php get_template_part('svg/logo') ?>
        </a>
        </div>
      </div>
    </div>
  </div>
</footer>
<script>

  function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
  }
  function validateMyForm() {
    const email = document.querySelector('.footer__news-input').value;
    if(!email){
      return false;
    } else {
      if ( !validateEmail(email) ) {
        return false;
      } else {
        return true;
      }
    }
  }
</script>
<?php wp_footer(); ?>
</body>
</html>
