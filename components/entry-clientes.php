<?php while ( have_posts() ) : the_post();?>
<div class="entry">
  <div class="content">
    <?php the_content(); ?>
  </div>
</div>
<?php endwhile;?>
