<?php
$id = get_the_ID();
$terms = get_the_terms($id, 'canal_category' );
$color = get_field('color_categoria', $terms[0]);
?>

<article class="canal-article canal-article--<?php echo $class; ?>">
  <a href="<?php the_permalink(); ?>" class="article-hero canal-article__hero">
    <?php $thumb = get_the_post_thumbnail_url(); ?>
    <figure style="background-image: url('<?php echo $thumb;?>')"></figure>
  </a>
  <div class="canal-article__info">
    <span style="background: <?php echo $color; ?>" class="canal-article__category"> <?php echo $terms[0]->name; ?></span>
    <div class="canal-article__content">
      <h2 class="article-title canal-article__title variable"><?php the_title(); ?></h2>
      <div class="article-meta canal-article__meta">
        <span class="article-date canal-article__date"><?php echo get_the_date( 'd-m-Y' ); ?></span>
      </div>
      <div class="canal-article__excerpt article-excerpt"> <?php the_field('resumen_canal') ?></div>
    </div>
  </div>
</article>
