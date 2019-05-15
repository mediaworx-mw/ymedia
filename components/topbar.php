<div class="topbar">
  <div class="topbar__inner container">
    <div class="topbar__tags">
      <h2 class="topbar__tags-title">Filtrar categorías</h2>
        <ul class="topbar__list">

        <?php $terms = get_terms( array('taxonomy' => 'canal_category')); ?>
        <div class="topbar__merged">
          <span>Audiencias</span>
            <div class="topbar__drop">
            <?php foreach( $terms as $term ):
              $color = get_field('color_categoria', $term);
              $term_id = $term->term_id;

              if ($term->slug == 'audiencia-diaria' || $term->slug == 'audiencia-mensual' ):
                if ($term->slug == 'audiencia-diaria') {
                  $name = 'Diaria';
                }
                if ($term->slug == 'audiencia-mensual') {
                  $name = 'Mensual';
                }
            ?>
              <li class="topbar__tag topbar__audiencia" data-termid="<?php echo $term_id ?>" style="background: <?php echo $color ?>"><?php echo $name ?></li>
            <?php endif; ?>
            <?php endforeach?>
            </div>
        </div>
        <?php
          foreach( $terms as $term ):
            $color = get_field('color_categoria', $term);
            $term_id = $term->term_id;
            if ($term->slug != 'audiencia-diaria' && $term->slug != 'audiencia-mensual' ):
        ?>
          <li class="topbar__tag" data-termid="<?php echo $term_id ?>" style="background: <?php echo $color ?>"><?php echo $term->name; ?></li>
        <?php endif; ?>
        <?php endforeach?>
          <li class="topbar__todas">Ver Todas</li>
        </ul>
    </div>
    <div class="topbar__search">
      <h2 class="topbar__search-title">Búsqueda</h2>
      <div class="topbar__search-buttons">

        <div class="topbar__calendar">
          <span class="topbar__calendar-button">Fecha</span>
          <span class="topbar__calendar-icon"><i class="far fa-calendar-alt"></i></span>
          <span class="topbar__calendar-clear"><i class="fas fa-times"></i></span>
          <div class="topbar__calendar-wrapper">
            <div class="calendar"></div>
          </div>

        </div>
        <div class="topbar__key">
          <input class="topbar__key-input" type="text" placeholder="Buscar"></input>
          <span class="topbar__key-submit"><i class="fas fa-search"></i></span>
          <span class="topbar__key-clear"><i class="fas fa-times"></i></span>

        </div>
      </div>
    </div>
  </div>
  <?php grid('gray'); ?>

</div>
