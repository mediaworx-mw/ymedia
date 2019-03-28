<?php
  $bio = get_field('bio_corporativo');
  $photo = get_field('photo_corporativo');
  $name = get_field('nombre_corporativo');
  $lastname = get_field('apellido_corporativo');
  $role = get_field('rol_corporativo');
  $video_webm = get_field('video_webm_corporativo');
  $video_ogg = get_field('video_ogg_corporativo');
  $video_mp4 = get_field('video_mp4_corporativo');
?>

<div class="member member--<?php echo $size; ?>">
  <div class="member__inner"
    data-photo="<?php echo $photo ?>"
    data-name="<?php echo $name ?>"
    data-lastname="<?php echo $lastname ?>"
    data-role="<?php echo $role ?>"
    data-bio="<?php echo $bio ?>"
    style="background-image: url(<?php echo $photo ?>)
  ">
    <div class="member__video hidden">
      <video playsinline autoplay muted loop>
        <source src="<?php echo $video_webm; ?>" type="video/webm">
        <source src="<?php echo $video_ogg; ?>" type="video/ogg; codecs=theora,vorbis">
        <source src="<?php echo $video_mp4; ?>" type="video/mp4">
      </video>
    </div>

    <div class="member__info">
      <span class="member__line"></span>
      <h2 class="member__first-name"><?php echo $name; ?></h2>
      <h3 class="member__last-name"><?php echo $lastname; ?></h3>
      <h4 class="member__role"><?php echo $role; ?></h4>
    </div>
    <div class="member__more"></div>

  </div>

</div>

