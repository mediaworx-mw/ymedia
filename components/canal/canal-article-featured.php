<?php
$id = get_the_ID();

$terms = get_the_terms($id, 'canal_category' );
foreach($terms as $key=>$term){
  $color = get_field('color_categoria', $terms[$key]);
  $link = get_term_link($terms[$key]);
  $name = $terms[$key]->name;
}

?>

<article class="canal-article canal-article--featured ?>">
  <a href="<?php the_permalink(); ?>" class="article-hero canal-article__hero">
    <?php $thumb = get_the_post_thumbnail_url(); ?>
    <figure style="background-image: url('<?php echo $thumb;?>')"></figure>
  </a>
  <div class="canal-article__info">
    <?php
      $terms = get_the_terms($id, 'canal_category' );
     foreach($terms as $key=>$term):
      endforeach;
      $color = get_field('color_categoria', $terms[0]);
      $link =  get_term_link($terms[0]);
      $name = $terms[0]->name;


    ?>
  <span style="background: <?php echo $color; ?>" class="canal-article__category"> <?php echo $name; ?></span>
    <div class="canal-article__content">
      <a href="<?php the_permalink(); ?>" class="article-title canal-article__title"><?php the_title(); ?></a>
      <div class="article-meta canal-article__meta">
        <span class="article-date canal-article__date"><?php echo get_the_date( 'd-m-Y' ); ?></span>
      </div>
      <div class="canal-article__excerpt article-excerpt">
         <?php the_field('resumen_canal') ?>

      </div>
    </div>
  </div>
</article>

