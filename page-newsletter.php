<?php
/**
* Template Page for NewsLetter
* Template Name: Newsletter
*
*
* @package WordPress
* @subpackage Ymedia
*/

?>

<?php get_header(); ?>
<div class="newsletter" id="fullpageNews" data-site-body="newsletter">
  <div class="newsletter__inner container">
    <h1 class="newsletter__title">Newsletter</h1>
    <div class="contact-form newsletter-form">
      <?php echo do_shortcode('[contact-form-7 id="490" title="Suscripcion"]'); ?>
    </div>
  </div>
  <script>
    const $firstLabel = document.querySelector('.wpcf7-mailpoetsignup').getElementsByTagName('label')[1];
    $firstLabel.parentNode.removeChild($firstLabel);
  </script>
 <!--  <form class="newsletter-form" novalidate>
    <div class="newsletter-section section section1" >
      <div class="newsletter-section__inner container">
        <h2 class="newsletter-section__title">Newsletter</h2>
        <div class="newsletter-section__inputs">
         <div class="newsletter-section__input nombre">
           <input type="text" placeholder="Nombre" value="Nombre">
         </div>

         <div class="newsletter-section__input email">
           <input type="email" placeholder="Email" value="Email">
         </div>
      </div>
        <div class="newsletter-section__footer">
          <a class="nav__item n1">Siguiente</a>
        </div>
      </div>
    </div>

    <div class="newsletter-section section section2" >
      <div class="newsletter-section__inner container">
        <h2 class="newsletter-section__title">¿Sabrías decirme lo que es un DMP?</h2>
        <div class="newsletter-fields">
          <div class="newsletter-section__inputs">
            <div class="newsletter-section__radio">
              <input type="radio" id="s2-1" name="s2" value="s2-1">
              <label for="s2-1">Ni lo sé, ni me importa</label>
            </div>
            <div class="newsletter-section__radio">
              <input type="radio" id="s2-2" name="s2" value="s2-2">
              <label for="s2-2">Me suena, pero no lo tengo muy claro</label>
            </div>
            <div class="newsletter-section__radio">
              <input type="radio" id="s2-3" name="s2" value="s2-3">
              <label for="s2-3">¡Claro! Aunque me gustaría saber algo más sobre el tema</label>
            </div>
            <div class="newsletter-section__radio">
              <input type="radio" id="s2-4" name="s2" value="s2-4">
              <label for="s2-4">Lo sé de sobra, me interesan cosas aún más sofisticadas</label>
            </div>
            <div class="newsletter-section__radio">
              <input type="radio" id="s2-5" name="s2" value="s2-5">
              <label for="s2-5">Soy un experto en el asunto</label>
            </div>
          </div>
         <div class="newsletter-section__footer">
            <a class="nav__item n2">Siguiente</a>
        </div>
        </div>
      </div>
    </div>


    <div class="newsletter-section section section3 " >
      <div class="newsletter-section__inner container">
        <h2 class="newsletter-section__title">Y si te digo que hablemos del consumidor… cómo está evolucionando su comportamiento a lo largo de los años…</h2>
        <div class="newsletter-fields">
          <div class="newsletter-section__inputs">
            <div class="newsletter-section__radio">
              <input type="radio" id="s3-1" name="s3" value="s3-1">
              <label for="s3-1">Ni idea, no me interesa el tema</label>
            </div>
            <div class="newsletter-section__radio">
              <input type="radio" id="s3-2" name="s3" value="s3-2">
              <label for="s3-2">No entiendo mucho del tema, pero me parece interesante</label>
            </div>
            <div class="newsletter-section__radio">
              <input type="radio" id="s3-3" name="s3" value="s3-3">
              <label for="s3-3">Creo que es un tema interesante del que aprender cosas nuevas</label>
            </div>
            <div class="newsletter-section__radio">
              <input type="radio" id="s3-4" name="s3" value="s3-4">
              <label for="s3-4">Me inquieta lo que está por venir</label>
            </div>
            <div class="newsletter-section__radio">
              <input type="radio" id="s3-5" name="s3" value="s3-5">
              <label for="s3-5">Estoy muy preocupado en cómo evoluciona este tema</label>
            </div>
          </div>
         <div class="newsletter-section__footer">
           <a class="nav__item n3">Siguiente</a>
        </div>
        </div>
      </div>
    </div>


    <div class="newsletter-section section section4 " >
      <div class="newsletter-section__inner container">
        <h2 class="newsletter-section__title">¿Te gusta estar al día de los contenidos de más audiencia de televisión u otros medios?</h2>
        <div class="newsletter-fields">
          <div class="newsletter-section__inputs">
            <div class="newsletter-section__radio">
              <input type="radio" id="s4-1" name="s4" value="s4-1">
              <label for="s4-1">Me da igual, no me interesa</label>
            </div>
            <div class="newsletter-section__radio">
              <input type="radio" id="s4-2" name="s4" value="s4-2">
              <label for="s4-2">Me genera cierta curiosidad</label>
            </div>
            <div class="newsletter-section__radio">
              <input type="radio" id="s4-3" name="s4" value="s4-3">
              <label for="s4-3">Me parece interesante, no me importaría informarme más</label>
            </div>
            <div class="newsletter-section__radio">
              <input type="radio" id="s4-4" name="s4" value="s4-4">
              <label for="s4-4">Me gusta saber por dónde se mueven las audiencias</label>
            </div>
            <div class="newsletter-section__radio">
              <input type="radio" id="s4-5" name="s4" value="s4-5">
              <label for="s4-5">Me informo activamente sobre este tema</label>
            </div>
          </div>
         <div class="newsletter-section__footer">
           <a class="nav__item  n4">Siguiente</a>
        </div>
        </div>
      </div>
    </div>

    <div class="newsletter-section section section5 " >
      <div class="newsletter-section__inner container">
        <h2 class="newsletter-section__title">Las redes sociales han transformado la comunicación entre las personas, las empresas y las marcas, ¿te parece interesante?</h2>
        <div class="newsletter-fields">
          <div class="newsletter-section__inputs">
            <div class="newsletter-section__radio">
              <input type="radio" id="s5-1" name="s5" value="s5-1">
              <label for="s5-1">Nada, no me interesa</label>
            </div>
            <div class="newsletter-section__radio">
              <input type="radio" id="s5-2" name="s5" value="s5-2">
              <label for="s5-2">No entiendo mucho, pero me genera curiosidad</label>
            </div>
            <div class="newsletter-section__radio">
              <input type="radio" id="s5-3" name="s5" value="s5-3">
              <label for="s5-3">Cada vez me parece más interesante</label>
            </div>
            <div class="newsletter-section__radio">
              <input type="radio" id="s5-4" name="s5" value="s5-4">
              <label for="s5-4">Me gusta estar informado sonbre el tema</label>
            </div>
            <div class="newsletter-section__radio">
              <input type="radio" id="s5-5" name="s5" value="s5-5">
              <label for="s5-5">Me parece relevante y me intereso por estar al día</label>
            </div>
          </div>
         <div class="newsletter-section__footer">
           <a class="nav__item n5">Siguiente</a>
        </div>
        </div>
      </div>
    </div>

    <div class="newsletter-section section section6 " >
      <div class="newsletter-section__inner container">
        <h2 class="newsletter-section__title">¿Hasta qué punto crees que la transformación digital está cambiando el mundo?</h2>
        <div class="newsletter-fields">
          <div class="newsletter-section__inputs">
            <div class="newsletter-section__radio">
              <input type="radio" id="s6-1" name="s6" value="s6-1">
              <label for="s6-1">No me interesa este tema</label>
            </div>
            <div class="newsletter-section__radio">
              <input type="radio" id="s6-2" name="s6" value="s6-2">
              <label for="s6-2">Está cambiando algunas cosas pero no me interesa mucho</label>
            </div>
            <div class="newsletter-section__radio">
              <input type="radio" id="s6-3" name="s6" value="s6-3">
              <label for="s6-3">Me parece algo bastante relevante</label>
            </div>
            <div class="newsletter-section__radio">
              <input type="radio" id="s6-4" name="s6" value="s6-4">
              <label for="s6-4">Está cambiando muchas cosas y me interesa </label>
            </div>
            <div class="newsletter-section__radio">
              <input type="radio" id="s6-5" name="s6" value="s6-5">
              <label for="s6-5">Lo está cambiando todo y me apasiona </label>
            </div>
          </div>
         <div class="newsletter-section__footer">
           <a class="nav__item active n6">Siguiente</a>
        </div>
        </div>
      </div>
    </div>

     <div class="newsletter-section section section7 " >
      <div class="newsletter-section__inner container">
        <h2 class="newsletter-section__title">¿Te parece interesante saber cuáles son los anuncios más notorios o saber cuáles se viralizan más, etc…?</h2>
        <div class="newsletter-fields">
          <div class="newsletter-section__inputs">
            <div class="newsletter-section__radio">
              <input type="radio" id="s7-1" name="s7" value="s7-1">
              <label for="s7-1">No me interesa nada</label>
            </div>
            <div class="newsletter-section__radio">
              <input type="radio" id="s7-2" name="s7" value="s7-2">
              <label for="s7-2">Me parece interesante, pero no sé gran cosa</label>
            </div>
            <div class="newsletter-section__radio">
              <input type="radio" id="s7-3" name="s7" value="s7-3">
              <label for="s7-3">Creo que está bien tener nociones sobre el tema</label>
            </div>
            <div class="newsletter-section__radio">
              <input type="radio" id="s7-4" name="s7" value="s7-4">
              <label for="s7-4">Me interesa saber cómo evoluciona el mercado</label>
            </div>
            <div class="newsletter-section__radio">
              <input type="radio" id="s7-5" name="s7" value="s7-5">
              <label for="s7-5">Me parece interesante y me preocupo por estar al día</label>
            </div>
          </div>
         <div class="newsletter-section__footer">
           <input type="submit" class="n7" value="Enviar">
        </div>
        </div>
      </div>
    </div>

  </form> -->

  <?php /*echo do_shortcode('[contact-form-7 id="468" title="Newsletter"]') */?>


</div>
<!-- <div class="progress-bar">
    <span class="progress-bar__line"></span>
  </div> -->
<?php grid('gray');?>
<?php get_footer(); ?>
