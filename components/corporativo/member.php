<?php
  $bio = get_field('bio_corporativo');
  $photo = get_field('photo_corporativo');
  $name = get_field('nombre_corporativo');
  $lastname = get_field('apellido_corporativo');
  $role = get_field('rol_corporativo');
  $twitter = get_field('twitter_corporativo');
  $linkedin = get_field('linkedin_corporativo');
  $video_webm = get_field('video_webm_corporativo');
  $video_ogg = get_field('video_ogg_corporativo');
  $video_mp4 = get_field('video_mp4_corporativo');
?>

<div class="member">
  <div class="member__inner"
    data-photo="<?php echo $photo ?>"
    data-name="<?php echo $name ?>"
    data-lastname="<?php echo $lastname ?>"
    data-role="<?php echo $role ?>"
    data-bio="<?php echo $bio ?>"
    >
    <div class="member__video">
      <video class="video" playsinline muted>
        <source src="<?php echo $video_webm; ?>" type="video/webm">
        <source src="<?php echo $video_ogg; ?>" type="video/ogg; codecs=theora,vorbis">
        <source src="<?php echo $video_mp4; ?>" type="video/mp4">
      </video>
    </div>

    <div class="member__info">
      <div class="member__social">
        <?php if ($twitter): ?>
          <a target="_blank" href="<?php echo $twitter; ?>" class="member__twitter"><i class="fab fa-twitter"></i></a>
        <?php endif; ?>
        <?php if($linkedin): ?>
          <a target="_blank" href="<?php echo $linkedin; ?>" class="member__linkedin"><i class="fab fa-linkedin-in"></i></a>
        <?php endif; ?>
      </div>
      <div class="member__data">
        <div class="member__data-top">
          <h2 class="member__full-name"><?php echo $name; ?> <?php echo $lastname; ?></h2>
          <h4 class="member__role"><?php echo $role; ?></h4>
        </div>
        <div class="member__data-bottom">
          <div class="member__bio"><?php echo $bio; ?></div>
        </div>
      </div>
    </div>


  </div>

</div>

