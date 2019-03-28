<video class="video-background" poster="<?php echo get_field('hero'.$id.'_home') ?>" id="bgvid" playsinline autoplay muted loop>
  <source src="<?php echo get_field('video'.$id.'_webm_home') ?>" type="video/webm">
  <source src="<?php echo get_sub_field('video'.$id.'_ogg_home') ?>" type="video/ogg; codecs=theora,vorbis">
  <source src="<?php echo get_field('video'.$id.'_mp4_home') ?>" type="video/mp4">
</video>
