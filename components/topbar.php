<?php
  $terms = get_terms( array('taxonomy' => 'canal_category'));
  $ids = array();
  $colors = array();
  $names = array();
  foreach( $terms as $index => $term ):
    $ids[$index] = $term->term_id;
    $colors[$index] = get_field('color_categoria', $term);
    $names[$index] = $term->name;
  endforeach;
?>
<div class="topbar">
  <div class="topbar__inner container">
    <div class="topbar__tags">
      <h2 class="topbar__tags-title">Filtrar categorías</h2>
        <ul class="topbar__list">
          <div class="topbar__merged">
            <span>Audiencias</span>
            <div class="topbar__drop">
              <li class="topbar__tag topbar__audiencia" data-termid="<?php echo $ids[0]; ?>" style="background: <?php echo $colors[0] ?>">Diarias</li>
               <li class="topbar__tag topbar__audiencia" data-termid="<?php echo $ids[1]; ?>" style="background: <?php echo $colors[1] ?>">Mensuales</li>
            </div>
          </div>
          <li class="topbar__tag" data-termid="<?php echo $ids[5]; ?>" style="background: <?php echo $colors[5] ?>"><?php echo $names[5] ?></li>
          <li class="topbar__tag" data-termid="<?php echo $ids[4]; ?>" style="background: <?php echo $colors[4] ?>"><?php echo $names[4] ?></li>
          <li class="topbar__tag" data-termid="<?php echo $ids[6]; ?>" style="background: <?php echo $colors[6] ?>"><?php echo $names[6] ?></li>
          <li class="topbar__tag" data-termid="<?php echo $ids[8]; ?>" style="background: <?php echo $colors[8] ?>"><?php echo $names[8] ?></li>
          <li class="topbar__tag" data-termid="<?php echo $ids[9]; ?>" style="background: <?php echo $colors[9] ?>"><?php echo $names[9] ?></li>
          <li class="topbar__tag" data-termid="<?php echo $ids[7]; ?>" style="background: <?php echo $colors[7] ?>"><?php echo $names[7] ?></li>
          <li class="topbar__tag" data-termid="<?php echo $ids[2]; ?>" style="background: <?php echo $colors[2] ?>"><?php echo $names[2] ?></li>
          <li class="topbar__tag" data-termid="<?php echo $ids[3]; ?>" style="background: <?php echo $colors[3] ?>"><?php echo $names[3] ?></li>
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

<div class="topbarm">
  <div class="topbarm__inner container">
    <div class="topbarm__tags">
      <h2 class="topbarm__tags-title">Categorías<i class="fas fa-sort-down"></i></h2>
      <ul class="topbarm__list">
        <li class="topbarm__tag" data-termid="<?php echo $ids[0]; ?>" style="background: <?php echo $colors[0] ?>">Diarias</li>
        <li class="topbarm__tag" data-termid="<?php echo $ids[1]; ?>" style="background: <?php echo $colors[1] ?>">Mensuales</li>
        <li class="topbarm__tag" data-termid="<?php echo $ids[5]; ?>" style="background: <?php echo $colors[5] ?>"><?php echo $names[5] ?></li>
        <li class="topbarm__tag" data-termid="<?php echo $ids[4]; ?>" style="background: <?php echo $colors[4] ?>"><?php echo $names[4] ?></li>
        <li class="topbarm__tag" data-termid="<?php echo $ids[6]; ?>" style="background: <?php echo $colors[6] ?>"><?php echo $names[6] ?></li>
        <li class="topbarm__tag" data-termid="<?php echo $ids[8]; ?>" style="background: <?php echo $colors[8] ?>"><?php echo $names[8] ?></li>
        <li class="topbarm__tag" data-termid="<?php echo $ids[9]; ?>" style="background: <?php echo $colors[9] ?>"><?php echo $names[9] ?></li>
        <li class="topbarm__tag" data-termid="<?php echo $ids[7]; ?>" style="background: <?php echo $colors[7] ?>"><?php echo $names[7] ?></li>
        <li class="topbarm__tag" data-termid="<?php echo $ids[2]; ?>" style="background: <?php echo $colors[2] ?>"><?php echo $names[2] ?></li>
        <li class="topbarm__tag" data-termid="<?php echo $ids[3]; ?>" style="background: <?php echo $colors[3] ?>"><?php echo $names[3] ?></li>
        <li class="topbarm__tag topbarm__tag--todas">Ver Todas</li>
      </ul>
      <span class="topbarm__confirmar">Confirmar</span>
    </div>
    <div class="topbarm__search">
      <span class="topbarm__search-toggle">
        <i class="fas fa-search "></i>
        <i class="fas fa-times"></i>
      </span>
      <div class="topbarm__search-wrapper">
        <h2 class="topbarm__search-title">Búsqueda</h2>
        <div class="topbarm__search-buttons">
          <div class="topbarm__key">
            <input class="topbarm__key-input" type="text" placeholder="Buscar"></input>
            <span class="topbarm__key-submit"><i class="fas fa-search"></i></span>
            <span class="topbarm__key-clear"><i class="fas fa-times"></i></span>
          </div>
          <div class="topbarm__calendar">
            <div class="calendarm"></div>
          </div>
          <div class="topbarm__search-confirm">
            <span>Confirmar</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php grid('gray'); ?>

</div>

