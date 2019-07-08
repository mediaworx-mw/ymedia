    <?php
      $newsletter_mensual = get_field( "newsletter_mensual" );
    ?>
      <!-- <div class="grafico_wrapper">
        <h2>Consumo TV</h2>
        <div id="grafico-mensual-1" class="grafico-inner" style="min-height: 520px"></div>
        <p class="graficos-fuente"><?php echo $newsletter_mensual['consumo_de_tv']['fuente']; ?></p>
        <br>
        <div><?php echo $newsletter_mensual['consumo_de_tv']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div> -->

      <div class="grafico_wrapper">
        <h2>Cuota de las cadenas</h2>
        <div id="grafico-mensual-1" class="grafico-inner" style="min-height: 520px"></div>
        <p class="graficos-fuente"><?php echo $newsletter_mensual['cuota_de_las_cadenas']['fuente']; ?></p>
        <br>
        <div><?php echo $newsletter_mensual['cuota_de_las_cadenas']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>

    <?php 
      // require get_template_directory() . '/inc/graficos-newsletters/mensual/consumo_de_tv.php';
      require get_template_directory() . '/inc/graficos-newsletters/mensual/cuota_de_las_cadenas.php';