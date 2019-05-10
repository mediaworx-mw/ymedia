<?php

  $name = get_field('nombre_caso');
  $campaign = get_field('campana_caso');
  $hero = get_field('hero_caso');
  $youtube = $hero['youtube_video_caso'];
  $video_webm = $hero['video_webm_caso'];
  $video_ogg = $hero['video_ogg_caso'];
  $video_mp4 = $hero['video_mp4_caso'];
?>

<div class="caso caso--<?php echo $size;?>">
  <?php  if ($youtube): ?>
    <a class="caso__top caso__top--youtube" href="<?php the_permalink(); ?>">
      <div class="caso__youtube">
        <?php echo $youtube; ?>
      </div>
    </a>
  <?php else: ?>
    <a class="caso__top caso__top--video" href="<?php the_permalink(); ?>">
      <div class="caso__video">
        <video class="caso__video" playsinline muted>
          <source src="<?php echo $video_webm; ?>" type="video/webm">
          <source src="<?php echo $video_ogg; ?>" type="video/ogg; codecs=theora,vorbis">
          <source src="<?php echo $video_mp4; ?>" type="video/mp4">
        </video>
        <div class="caso__play">
          <?php get_template_part('svg/play'); ?>
        </div>
      </div>
    </a>
  <?php  endif;?>

  <div class="caso__info">
    <h2 class="caso__name"><?php echo $name; ?></h2>
    <h3 class="caso__campaign"><?php echo $campaign; ?></h3>
  </div>

</div>