<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php bloginfo( 'name' ); wp_title(); ?></title>
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="profile" href="http://gmpg.org/xfn/11">

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144332668-1"></script>

  <script>
    if (document.cookie.indexOf('reject_ymedia_cookies') != -1) {
      window['ga-disable-UA-144332668-1'] = true;
    } else {
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-144332668-1');
    }
  </script>

  <?php wp_head(); ?>
</head>
<?php if (!is_front_page()): ?>
  <body id="trail" class="body--big">
<?php else: ?>
  <body id="trail" >


<?php endif; ?>

<?php if (is_page('canal-ymedia')): ?>
  <header class="header header--small">
<?php else: ?>
  <header class="header">
<?php endif; ?>
  <?php get_template_part('components/contacto-info'); ?>
  <div class="header__inner container">
    <a href="<?php echo bloginfo('url'); ?>" class="header__logo">
      <?php get_template_part('svg/logo') ?>
    </a>
    <button class="pull" type="button">
      <span class="pull-box">
        <span class="pull-inner"></span>
      </span>
    </button>
  </div>
  <div class="nav">
    <div class="nav__inner container">
      <nav class="nav__list" role="navigation">
        <?php wp_nav_menu( array('theme_location' => 'main', 'menu' => 'Main', 'container'=>false) ); ?>
      </nav>
      <div class="nav__bottom">
        <nav class="nav__small" role="navigation">
          <?php wp_nav_menu( array('theme_location' => 'main small', 'menu' => 'Main small', 'container'=>false) ); ?>
        </nav>
        <div class="nav__social">
          <?php $social = get_field('social', 'options'); ?>
          <a href="<?php echo $social['twitter']; ?>"><i class="fab fa-twitter"></i></a>
          <a href="<?php echo $social['facebook']; ?>"><i class="fab fa-facebook-f"></i></a>
          <a href="<?php echo $social['linkedin']; ?>"><i class="fab fa-linkedin-in"></i></a>
          <a href="<?php echo $social['youtube']; ?>"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
    </div>
    <?php grid('red') ?>
  </div>
</header>
