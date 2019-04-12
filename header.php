<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php bloginfo( 'name' ); wp_title(); ?></title>
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php endif; ?>
  <?php wp_head(); ?>
</head>
<header class="header">
  <div class="header__inner">
    <a href="<?php bloginfo('url') ?>" class="header__logo">
      <?php get_template_part('svg/logo') ?>
    </a>
    <button class="pull" type="button">
      <span class="pull-box">
        <span class="pull-inner"></span>
      </span>
    </button>
  </div>
  <div class="nav">
  <div class="nav__inner">
    <nav class="nav__list" role="navigation">
      <?php wp_nav_menu( array('theme_location' => 'main', 'menu' => 'Main', 'container'=>false) ); ?>
    </nav>
  </div>
</div>
</header>
<body>
