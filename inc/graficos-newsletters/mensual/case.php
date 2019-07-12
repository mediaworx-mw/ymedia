    <?php
      $newsletter_mensual = get_field( "newsletter_mensual" );
    ?>
      <div>
        <h2>Consumo TV</h2>
        <p class="graficos-fuente"><?php echo $newsletter_mensual['consumo_de_tv']['fuente']; ?></p>
        <p>Minutos</p>
        <div class="graficos-multi graficos-multi-2">
          <div class="grafico_wrapper">
            <h4>Lunes - Viernes</h4>
            <div id="grafico-mensual-1-lv" class="grafico-inner" style="min-height: 520px"></div>
          </div>
          <div class="grafico_wrapper">
            <h4>Sábado - Domingo</h4>
            <div id="grafico-mensual-1-sd" class="grafico-inner" style="min-height: 520px"></div>
          </div>
        </div>
        <br>
        <div class="descripcion"><?php echo $newsletter_mensual['consumo_de_tv']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>


      <div class="grafico_wrapper">
        <h2>Cuota de las cadenas</h2>
        <p class="graficos-fuente"><?php echo $newsletter_mensual['cuota_de_las_cadenas']['fuente']; ?></p>
        <div id="grafico-mensual-2" class="grafico-inner" style="min-height: 520px"></div>
        <br>
        <div class="descripcion"><?php echo $newsletter_mensual['cuota_de_las_cadenas']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>

      <div class="grafico_wrapper">
        <h2>Cuota temáticas en abierto</h2>
        <p class="graficos-fuente"><?php echo $newsletter_mensual['cuota_tematicas_en_abierto']['fuente']; ?></p>
        <div id="grafico-mensual-3" class="grafico-inner" style="min-height: 520px"></div>
        <br>
        <div class="descripcion"><?php echo $newsletter_mensual['cuota_tematicas_en_abierto']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>      

      <div class="grafico_wrapper">
        <h2>Programas - Top 10</h2>
        <p class="graficos-fuente"><?php echo $newsletter_mensual['programas_-_top10']['fuente']; ?></p>
        <div id="grafico-mensual-4" class="grafico-inner" style="min-height: 520px"></div>
        <br>
        <div class="descripcion"><?php echo $newsletter_mensual['programas_-_top10']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>    
      
      <div class="grafico_wrapper">
        <h2>Ocupación por cadenas</h2>
        <p class="graficos-fuente"><?php echo $newsletter_mensual['ocupacion_por_cadenas']['fuente']; ?></p>
        <div id="grafico-mensual-5" class="grafico-inner" style="min-height: 520px"></div>
        <br>
        <div class="descripcion"><?php echo $newsletter_mensual['ocupacion_por_cadenas']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>       
      
      <div>
        <h2>Presión publicitaria por cadenas</h2>
        <p class="graficos-fuente"><?php echo $newsletter_mensual['presion_publicitaria_por_cadenas']['fuente']; ?></p>
        <p>Minutos</p>
        <div class="graficos-multi graficos-multi-2">
          <div class="grafico_wrapper">
            <h4>Grp's formato</h4>
            <div id="grafico-mensual-6-lv" class="grafico-inner" style="min-height: 520px"></div>
          </div>
          <div class="grafico_wrapper">
            <h4>Grp's 20"</h4>
            <div id="grafico-mensual-6-sd" class="grafico-inner" style="min-height: 520px"></div>
          </div>
        </div>
        <br>
        <div class="descripcion"><?php echo $newsletter_mensual['presion_publicitaria_por_cadenas']['texto']; ?></div>
        <br>
        <br>
        <br>  
      </div>
    
      
      <div>
        <h2>Presión publicitaria por targets</h2>
        <p class="graficos-fuente"><?php echo $newsletter_mensual['presion_publicitaria_por_targets']['fuente']; ?></p>
        <p>Minutos</p>
        <div class="graficos-multi graficos-multi-2">
          <div class="grafico_wrapper">
            <h4>Grp's formato</h4>
            <div id="grafico-mensual-7-lv" class="grafico-inner" style="min-height: 520px"></div>
          </div>
          <div class="grafico_wrapper">
            <h4>Grp's 20"</h4>
            <div id="grafico-mensual-7-sd" class="grafico-inner" style="min-height: 520px"></div>
          </div>
        </div>
        <br>
        <div class="descripcion"><?php echo $newsletter_mensual['presion_publicitaria_por_targets']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>
      
      <div class="grafico_wrapper">
        <h2>Campañas más activas</h2>
        <p class="graficos-fuente"><?php echo $newsletter_mensual['campanas_mas_activas']['fuente']; ?></p>
        <div id="grafico-mensual-8" class="grafico-inner" style="min-height: 520px"></div>
        <br>
        <div class="descripcion"><?php echo $newsletter_mensual['campanas_mas_activas']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>      

      <div class="grafico_wrapper">
        <h2>Spot de oro – Top 3</h2>
        <p class="graficos-fuente"><?php echo $newsletter_mensual['spot_de_oro_–_top_3']['fuente']; ?></p>
        <div id="grafico-mensual-9" class="grafico-inner" style="min-height: 520px"></div>
        <br>
        <div class="descripcion"><?php echo $newsletter_mensual['spot_de_oro_–_top_3']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>

    <?php 
      require get_template_directory() . '/inc/graficos-newsletters/mensual/grafico-1.php';
      require get_template_directory() . '/inc/graficos-newsletters/mensual/grafico-2.php';
      require get_template_directory() . '/inc/graficos-newsletters/mensual/grafico-3.php';
      require get_template_directory() . '/inc/graficos-newsletters/mensual/grafico-4.php';
      require get_template_directory() . '/inc/graficos-newsletters/mensual/grafico-5.php';
      require get_template_directory() . '/inc/graficos-newsletters/mensual/grafico-6.php';
      require get_template_directory() . '/inc/graficos-newsletters/mensual/grafico-7.php';
      require get_template_directory() . '/inc/graficos-newsletters/mensual/grafico-8.php';
      require get_template_directory() . '/inc/graficos-newsletters/mensual/grafico-9.php';