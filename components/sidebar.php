<div class="sidebar">
  <div class="sidebar__top">
    <div class="sidebar__handle">
      <span></span>
    </div>
  </div>
  <div class="sidebar__content">
    <div class="sidebar__search">
      <form class="sidebar__search-form" method="get" action="<?php echo home_url(); ?>">
        <input type="text" class="search-input" name="s" placeholder="Buscar">
        <input type="hidden" name="post_type" value="post" />
        <input type="submit" value="Buscar">
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
    <div class="sidebar__calendar">
      <div class="calendar"></div>
    </div>
    </div>
</div>
