<article class="canal-featured__article">
  <div class="canal-featured__hero">
    <a href="<?php the_permalink(); ?>">
      <?php $thumb = get_the_post_thumbnail_url(); ?>
      <figure class="parallax">
        <div class="parallaxImage" style="background-image: url('<?php echo $thumb;?>')"></div>
      </figure>
    </a>
    <div class="meta meta--large"></div>
  </div>
  <div class="canal-featured__content container">
    <h2 class="article-title canal-featured__title"><?php the_title(); ?></h2>
    <div class="article-excerpt canal-featured__excerpt"><?php the_excerpt(); ?></div>
  </div>
</article>
