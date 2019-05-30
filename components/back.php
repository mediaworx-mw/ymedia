<?php if ( is_singular('clientes') ) :
  $id = get_the_ID();
  $tag = get_the_tags($id)[0];
  $tag = $tag->name;

  if ($tag == 'Cliente') {
    $url = 'cliente';
  } elseif ( $tag == 'Caso de Exito' || $tag == 'Caso de Estudio') {
  $url = 'casos-de-exito';
  }
?>

  <a href="<?php bloginfo('url'); ?>/<?php echo $url; ?>" class="back"><i class="fas fa-angle-left"></i>Regresar</a>
<?php endif; ?>

<?php if ( is_singular('canal') ) : ?>
  <a href="<?php bloginfo('url'); ?>/canal-ymedia;" class="back"><i class="fas fa-angle-left"></i>Regresar</a>
<?php endif; ?>