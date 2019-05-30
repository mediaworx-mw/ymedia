<?php

  $name = get_field('nombre_cliente');
  $campaign = get_field('campana_cliente');
  $videos = get_field('hero_videos_cliente');
  $size = $size;


?>

<div class="caso caso--<?php echo $size;?>">
  <a class="caso__top caso__top--youtube" href="<?php the_permalink(); ?>">
    <div class="caso__youtube">
      <?php echo $videos[0]['video_cliente'] ?>
    </div>
  </a>

  <div class="caso__info">
    <h2 class="caso__name"><?php echo $name; ?></h2>
    <h3 class="caso__campaign"><?php echo $campaign; ?></h3>
  </div>

</div>
