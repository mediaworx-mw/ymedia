<?php
/**
* The front page template file
* Template Name: Contacto
*
*
* @package WordPress
* @subpackage Ymedia
*/

?>

<?php get_header(); ?>
<div class="contacto" data-site-body="contacto">
  <div class="contacto-top">
    <div class="contacto-top__inner container">
      <h1 class="contacto-top__title"><?php the_field('titulo_contacto') ?></h1>
    </div>
  </div>
  <div class="contacto__content">
    <div class="contacto-form">
      <div class="contacto-form__header">
        <h2>Dejanos una nota, sugerencia o consulta.</h2>
      </div>
      <div class="contacto-form__form">
      <?php
        //Localhost
        echo do_shortcode('[contact-form-7 id="287" title="Contacto"]');

        //Staging MediaWorx
       // echo do_shortcode('[contact-form-7 id="432" title="Contacto"]')
      ?>


      </div>
    </div>
    <div class="contacto-maps">
      <div class="contacto-maps__header">
        <h2>Visítanos</h2>
      </div>
      <div class="contacto-maps__maps">
        <?php
        $marker = get_field('marcador_mapa_contacto');
        $api = get_field('mapa_api_contacto')

        ?>
        <div class="contacto-maps__map">
          <div class="contacto-maps__map-inner map1">
            <?php
             if( have_rows('madrid_mapa_contacto') ): while ( have_rows('madrid_mapa_contacto') ) : the_row();
              $lat1 = get_sub_field('latitud_madrid_mapa_contacto');
              $lng1 = get_sub_field('longitud_madrid_mapa_contacto');
            ?>
          </div>
          <div class="contacto-maps__info">
            <h2>Madrid</h2>
            <h3><?php the_sub_field('direccion1_madrid_contacto'); ?></h3>
            <h4><?php the_sub_field('direccion2_madrid_contacto'); ?></h4>
            <div class="contacto-maps__info-bottom">
              <a href="tel:<?php the_sub_field('telefono_madrid_contacto'); ?>"><?php the_sub_field('telefono_madrid_contacto'); ?></a>
              <a href="mailto:<?php the_sub_field('email_madrid_contacto'); ?>"><?php the_sub_field('email_madrid_contacto'); ?></a>
            </div>
          </div>
          <?php endwhile; endif; ?>
        </div>
        <div class="contacto-maps__map">
          <div class="contacto-maps__map-inner map2">
            <?php
             if( have_rows('barcelona_mapa_contacto') ): while ( have_rows('barcelona_mapa_contacto') ) : the_row();
              $lat2 = get_sub_field('latitud_barcelona_mapa_contacto');
              $lng2 = get_sub_field('longitud_barcelona_mapa_contacto');
            ?>
          </div>
          <div class="contacto-maps__info">
            <h2>Barcelona</h2>
            <h3><?php the_sub_field('direccion1_barcelona_contacto'); ?></h3>
            <h4><?php the_sub_field('direccion2_barcelona_contacto'); ?></h4>
            <div class="contacto-maps__info-bottom">
              <a href="tel:<?php the_sub_field('telefono_barcelona_contacto'); ?>"><?php the_sub_field('telefono_barcelona_contacto'); ?></a>
              <a href="mailto:<?php the_sub_field('email_barcelona_contacto'); ?>"><?php the_sub_field('email_barcelona_contacto'); ?></a>
            </div>
          </div>
          <?php endwhile; endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php grid('gray');?>

 <script>

  let api = '<?php echo $api ?>'

  function initMap() {
    let marker = '<?php echo $marker ?>';
    let uluru1 = {
      lat: <?php echo $lat1 ?>,
      lng: <?php echo $lng1 ?>
    };
    let map1 = new google.maps.Map(
      document.querySelector('.map1'), {zoom: 12, center: uluru1});
    let marker1 = new google.maps.Marker({
      position: uluru1,
      map: map1,
      icon: marker
    });
    let uluru2 = {
      lat: <?php echo $lat2 ?>,
      lng: <?php echo $lng2 ?>
    };
    let map2 = new google.maps.Map(
      document.querySelector('.map2'), {zoom: 12, center: uluru2});
    let marker2 = new google.maps.Marker({
      position: uluru2,
      map: map2,
      icon: marker
    });
  }

  </script>

  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPxw9yfvwqw6DIZgMKPn-hThVTd8d3CKE&callback=initMap">
  </script>
<?php get_footer();?>
