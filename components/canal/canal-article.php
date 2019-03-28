<article class="canal-article canal-article--<?php echo $class; ?>">
  <a href="<?php the_permalink(); ?>" class="article-hero canal-article__hero">
    <?php $thumb = get_the_post_thumbnail_url(); ?>
    <figure style="background-image: url('<?php echo $thumb;?>')"></figure>
  </a>
  <div class="canal-article__content">
    <h2 class="article-title canal-article__title"><?php the_title(); ?></h2>
    <div class="article-meta canal-article__meta">
      <span class="article-date canal-article__date"><?php echo get_the_date( 'Y-m-d' ); ?></span>
    </div>
    <div class="canal-article__excerpt article-excerpt"><?php the_excerpt(); ?></div>
  </div>
</article>
