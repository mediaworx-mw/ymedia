<div class="cliente-side__logo">
  <img src="<?php the_field('logo_cliente'); ?>">
</div>

<div class="cliente-side__info">
  <div class="cliente-side__section">
    <h2 class="cliente-side__subtitle">Cliente</h2>
    <h2 class="cliente-side__heading"><?php the_field('nombre_cliente') ?></h2>
    <a class="cliente-side__heading" href="<?php the_field('url_link_cliente') ?>"><?php the_field('url_cliente') ?></a>
  </div>
  <div class="cliente-side__section">
    <h2 class="cliente-side__subtitle">Campaña</h2>
    <h2 class="cliente-side__heading"><?php the_field('campana_cliente') ?></h2>
  </div>
  <div class="cliente-side__section">
    <h2 class="cliente-side__subtitle">Fecha</h2>
    <h2 class="cliente-side__heading"><?php the_field('fecha_cliente') ?></h2>
  </div>
  <div class="cliente-side__section">
    <h2 class="cliente-side__subtitle">Medios</h2>
    <h2 class="cliente-side__heading"><?php the_field('medios_cliente') ?></h2>
  </div>
 <?php get_template_part('components/share'); ?>
</div>
