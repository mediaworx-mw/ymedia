    <?php
      $newsletter_inversion = get_field( "newsletter_inversion" );

      print_r ($newsletter_inversion['inversion_publicitaria'])
    ?>
      <div class="grafico_wrapper" style="width:100%;">
        <h2>Inversión Publicitaria</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_inversion['inversion_publicitaria']['fuente']; ?></p>
        <div class="grafico-tabla" style="width:auto;margin-bottom:4rem"> 
          <div id="grafico-inversion-1" class="grafico-inner " ></div>
        </div>
        <br>
        <div class="descripcion"><?php echo $newsletter_inversion['inversion_publicitaria']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>

      <div class="grafico_wrapper" style="width:100%;">
        <h2>Zoom Televisión</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_inversion['zoom_television']['fuente']; ?></p>
        <div id="grafico-inversion-2" class="grafico-inner" style="min-height: 520px"></div>
        <br>
        <div class="descripcion"><?php echo $newsletter_inversion['zoom_television']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>

    <?php 
      require get_template_directory() . '/inc/graficos-newsletters/inversion/grafico-1.php';
      require get_template_directory() . '/inc/graficos-newsletters/inversion/grafico-2.php';
