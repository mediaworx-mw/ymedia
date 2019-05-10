<div class="sidebar">
  <div class="sidebar__handle">
    <span><i class="fas fa-search"></i></span>
  </div>
  <div class="sidebar__content">
    <div class="sidebar__search">
      <form class="sidebar__search-form" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
        <input type="text" placeholder="Buscar" value="" name="s" id="s" />
        <input type="submit" id="searchsubmit" value="Buscar" />
        <input type="hidden" name="post_type" value="canal" />
    </form>
    </div>
    <div class="sidebar__categories">
      <ul class="sidebar__categories-list">
      <?php
        $terms = get_terms( array('taxonomy' => 'canal_category'));
        foreach( $terms as $term ) {
          $term_link = get_term_link( $term );
      ?>
        <li><a href="<?php echo $term_link ?>"><?php echo $term->name; ?></a></li>
      <?php }?>
      </ul>
    </div>
    <div class="sidebar__calendar-header">
      <h3 class="sidebar__calendar-title">Fecha de publicación</h3>
    </div>
    <div class="sidebar__calendar">

      <div class="calendar"></div>
    </div>
    </div>
</div>
