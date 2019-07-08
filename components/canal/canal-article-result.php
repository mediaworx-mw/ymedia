<article class="resultados-article resultados-article--<?php echo $class; ?>">
  <a class="resultados-article__hero" href="<?php the_permalink(); ?>" >
    <?php $thumb = get_the_post_thumbnail_url(); ?>
    <figure style="background-image: url('<?php echo $thumb;?>')"></figure>
  </a>
  <div class="resultados-article__content">
    <h2 class="resultados-article__title"><?php the_title(); ?></h2>
    <div class="resultados-article__meta">
      <span class="resultados-article__date"><?php echo get_the_date( 'd-m-Y' ); ?></span>
    </div>
    <div class="resultados-article__excerpt"> <?php the_field('resumen_canal') ?></div>
  </div>
</article>
