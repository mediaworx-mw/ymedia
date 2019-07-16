<?php 
  $newsletter_fin_de_semana = get_field( "newsletter_fin_de_semana" );
?>
  <div style="width:100%;">
    <h2>Programas - Top 10</h2>
    <p class="graficos-fuente"><?php echo $newsletter_fin_de_semana['programas_-_top_10']['fuente']; ?></p>
    <p>
      <small class="spot-de-oro-estrella"><img src="https://www.amcharts.com/lib/images/star.svg">  Minuto de oro</small>
    </p>
    <div class="graficos-multi graficos-multi-3">
      <div class="grafico_wrapper">
        <div id="grafico-fds-1-vie" class="grafico-inner" style="min-height: 380px"></div>
      </div>
      <div class="grafico_wrapper">
        <div id="grafico-fds-1-sab" class="grafico-inner" style="min-height: 380px"></div>
      </div>
      <div class="grafico_wrapper">
        <div id="grafico-fds-1-dom" class="grafico-inner" style="min-height: 380px"></div>
      </div>
    </div>
    <br>
    <br>
    <div class="descripcion"><?php echo $newsletter_fin_de_semana['programas_-_top_10']['texto']; ?></div>
    <br>
    <br>
    <br>    
  </div>

  <div style="width:100%;">
    <h2>Cuota de las cadenas - Top 5</h2>
    <p class="graficos-fuente"><?php echo $newsletter_fin_de_semana['cuota_de_las_cadenas_-_top_5']['fuente']; ?></p>
    <div class="graficos-multi graficos-multi-3">
      <div class="grafico_wrapper">
        <h4>Viernes</h4>
        <div id="grafico-fds-2-vie" class="grafico-inner" style="min-height: 380px"></div>
      </div>
      <div class="grafico_wrapper">
        <h4>Sábado</h4>
        <div id="grafico-fds-2-sab" class="grafico-inner" style="min-height: 380px"></div>
      </div>
      <div class="grafico_wrapper">
        <h4>Domingo</h4>
        <div id="grafico-fds-2-dom" class="grafico-inner" style="min-height: 380px"></div>
      </div>
    </div>
    <br>
    <div class="descripcion"><?php echo $newsletter_fin_de_semana['cuota_de_las_cadenas_-_top_5']['texto']; ?></div>
    <br>
    <br>
    <br>
  </div>

  <div style="width:100%;">
    <h2>Cuota de las temáticas en abierto - Top 5</h2>
    <p class="graficos-fuente"><?php echo $newsletter_fin_de_semana['cuota_de_las_tematicas_en_abierto_-_top_5']['fuente']; ?></p>
    <div class="graficos-multi graficos-multi-3">
      <div class="grafico_wrapper">
        <h4>Viernes</h4>
        <div id="grafico-fds-3-vie" class="grafico-inner" style="min-height: 380px"></div>
      </div>
      <div class="grafico_wrapper">
        <h4>Sábado</h4>
        <div id="grafico-fds-3-sab" class="grafico-inner" style="min-height: 380px"></div>
      </div>
      <div class="grafico_wrapper">
        <h4>Domingo</h4>
        <div id="grafico-fds-3-dom" class="grafico-inner" style="min-height: 380px"></div>
        </div>
    </div>
    <br>
    <div class="descripcion"><?php echo $newsletter_fin_de_semana['cuota_de_las_tematicas_en_abierto_-_top_5']['texto']; ?></div>
    <br>
    <br>
    <br>
  </div>

  <div style="width:100%;">
    <h2>Cuota por grupos de comunicación</h2>
    <p class="graficos-fuente"><?php echo $newsletter_fin_de_semana['cuota_por_grupos_de_comunicacion']['fuente']; ?></p>
    <div class="graficos-multi graficos-multi-3">
      <div class="grafico_wrapper">
        <h4>Viernes</h4>
        <div id="grafico-fds-4-vie" class="grafico-inner" style="min-height: 380px"></div>
      </div>
      <div class="grafico_wrapper">
        <h4>Sábado</h4>
        <div id="grafico-fds-4-sab" class="grafico-inner" style="min-height: 380px"></div>
      </div>
      <div class="grafico_wrapper">
        <h4>Domingo</h4>
        <div id="grafico-fds-4-dom" class="grafico-inner" style="min-height: 380px"></div>
      </div>
      <br>
    </div>
    <br>
    <div class="descripcion"><?php echo $newsletter_fin_de_semana['cuota_por_grupos_de_comunicacion']['texto']; ?></div>
    <br>
    <br>
    <br>
  </div>


  <div style="width:100%;">
    <h2>Spot de oro – Top 3</h2>
    <p class="graficos-fuente"><?php echo $newsletter_fin_de_semana['spot_de_oro_–_top_3']['fuente']; ?></p>
    <div class="graficos-multi graficos-multi-3">
      <div class="grafico_wrapper">
        <h4>Viernes</h4>
        <div id="grafico-fds-5-vie" class="grafico-inner" style="min-height: 380px"></div>
      </div>
      <div class="grafico_wrapper">
        <h4>Sábado</h4>
        <div id="grafico-fds-5-sab" class="grafico-inner" style="min-height: 380px"></div>
      </div>
      <div class="grafico_wrapper">
        <h4>Domingo</h4>
        <div id="grafico-fds-5-dom" class="grafico-inner" style="min-height: 380px"></div>
      </div>
    </div>
    <br>
    <div class="descripcion"><?php echo $newsletter_fin_de_semana['spot_de_oro_–_top_3']['texto']; ?></div>
    <br>
    <br>
    <br>
  </div>



<?php 
  require get_template_directory() . '/inc/graficos-newsletters/fin_de_semana/grafico-1.php';
  require get_template_directory() . '/inc/graficos-newsletters/fin_de_semana/grafico-2.php';
  require get_template_directory() . '/inc/graficos-newsletters/fin_de_semana/grafico-3.php';
  require get_template_directory() . '/inc/graficos-newsletters/fin_de_semana/grafico-4.php';
  require get_template_directory() . '/inc/graficos-newsletters/fin_de_semana/grafico-5.php';