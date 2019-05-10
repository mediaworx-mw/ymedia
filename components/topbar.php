<div class="topbar">
  <div class="topbar__inner container">
    <div class="topbar__tags">
      <h2 class="topbar__tags-title">Categorías</h2>
        <ul class="topbar__list">
        <?php
          $terms = get_terms( array('taxonomy' => 'canal_category'));
          foreach( $terms as $term ) {
            $term_link = get_term_link($term);
            $color = get_field('color_categoria', $term);
            $term_id = $term->term_id;
        ?>
          <li class="topbar__tag" data-termid="<?php echo $term_id ?>" style="background: <?php echo $color ?>"><?php echo $term->name; ?></li>
        <?php }?>
        </ul>
    </div>
    <div class="topbar__search">
      <h2 class="topbar__search-title">Búsqueda</h2>
      <div class="topbar__search-buttons">

        <div class="topbar__calendar">
          <span class="topbar__calendar-button"><i class="far fa-calendar-alt"></i>Por fecha</span>
          <div class="topbar__calendar-wrapper">
            <div class="calendar"></div>
          </div>

        </div>
        <div class="topbar__key">
          <span class="topbar__key-button"><i class="fas fa-search"></i>Palabra Clave</span>
        </div>
      </div>
    </div>
  </div>

</div>
