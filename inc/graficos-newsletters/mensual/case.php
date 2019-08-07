    <?php
      $newsletter_mensual = get_field( "newsletter_mensual" );
    ?>
      <div style="width:100%;">
        <h2>Consumo TV</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_mensual['consumo_de_tv']['fuente']; ?></p>
        <p><strong>Minutos</strong></p>
        <div class="graficos-multi graficos-multi-2">
          <div class="grafico_wrapper">
            <h4 class="grafico-mensual-1-lv-title"></h4>
            <div id="grafico-mensual-1-lv" class="grafico-inner" style="min-height: 320px"></div>
          </div>
          <div class="grafico_wrapper">
            <h4 class="grafico-mensual-1-sd-title"></h4>
            <div id="grafico-mensual-1-sd" class="grafico-inner" style="min-height: 320px"></div>
          </div>
        </div>
        <br>
        <div class="descripcion"><?php echo $newsletter_mensual['consumo_de_tv']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>
  
      
    

      
      <div style="width:100%;">
        <h2>Presión publicitaria por targets</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_mensual['presion_publicitaria_por_targets']['fuente']; ?></p>
        <p><strong>Grp's 20"</strong></p>
        <div class="graficos-multi graficos-multi-2">
          <div class="grafico_wrapper">
            <h4 class="grafico-mensual-8-lv-title"></h4>
            <div id="grafico-mensual-8-lv" class="grafico-inner" style="min-height: 320px"></div>
          </div>
          <div class="grafico_wrapper">
            <h4 class="grafico-mensual-8-sd-title"></h4>
            <div id="grafico-mensual-8-sd" class="grafico-inner" style="min-height: 320px"></div>
          </div>
        </div>
        <br>
        <div class="descripcion"><?php echo $newsletter_mensual['presion_publicitaria_por_targets']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>  
      
      <div style="width:100%;">
        <h2>Presión publicitaria por grupos</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_mensual['presion_publicitaria_por_grupos']['fuente']; ?></p>
        <p><strong>Grp’s 20”</strong></p>
        <div class="graficos-multi graficos-multi-2">
          <div class="grafico_wrapper">
            <h4 class="grafico-mensual-6-lv-title"></h4>
            <div id="grafico-mensual-6-lv" class="grafico-inner" style="min-height: 420px"></div>
          </div>
          <div class="grafico_wrapper">
            <h4 class="grafico-mensual-6-sd-title"></h4>
            <div id="grafico-mensual-6-sd" class="grafico-inner" style="min-height: 420px"></div>
          </div>
        </div>
        <br>
        <div class="descripcion"><?php echo $newsletter_mensual['presion_publicitaria_por_grupos']['texto']; ?></div>
        <br>
        <br>
        <br>  
      </div>
     

      <div style="width:100%;">
        <h2>Presión publicitaria por cadenas</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_mensual['presion_publicitaria_por_cadenas']['fuente']; ?></p>
        <p><strong>Cuotas Grp’s 20”</strong></p>
        <div class="graficos-multi graficos-multi-2">
          <div class="grafico_wrapper">
            <h4 class="grafico-mensual-7-lv-title"></h4>
            <div id="grafico-mensual-7-lv" class="grafico-inner" style="min-height: 420px"></div>
          </div>
          <div class="grafico_wrapper">
            <h4 class="grafico-mensual-7-sd-title"></h4>
            <div id="grafico-mensual-7-sd" class="grafico-inner" style="min-height: 420px"></div>
          </div>
        </div>
        <br>
        <div class="descripcion"><?php echo $newsletter_mensual['presion_publicitaria_por_cadenas']['texto']; ?></div>
        <br>
        <br>
        <br>  
      </div>   
        
      <div style="width:100%;">
    
        <div class="graficos-multi graficos-multi-2">
          <div class="grafico_wrapper">
            <h2>Campañas más activas</h2>
            <p class="graficos-fuente">Fuente: <?php echo $newsletter_mensual['campanas_mas_activas']['fuente']; ?></p>
            <p><strong>Grp’s 20”</strong></p>
            <div id="grafico-mensual-9" class="grafico-inner" style="min-height: 520px"></div>
            <br>
          </div>  
          <div class="grafico_wrapper">
            <h2>Spot de oro – Top 3</h2>
            <p class="graficos-fuente">Fuente: <?php echo $newsletter_mensual['spot_de_oro_–_top_3']['fuente']; ?></p>
            <p><strong>Grp’s a formato</strong></p>
            <div id="grafico-mensual-10" class="grafico-inner" style="min-height: 520px"></div>
            <br>
          </div>
        </div>

        <div class="descripcion"><?php echo $newsletter_mensual['campanas_mas_activas']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>


      <div style="width:100%;">
        <h2>Cuota de las cadenas</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_mensual['cuota_de_las_cadenas']['fuente']; ?></p>
        <p><strong>Cuota (%)</strong></p>
        <div class="graficos-multi graficos-multi-2">
          <div class="grafico_wrapper">
            <h4 class="grafico-mensual-2-title"></h4>
            <div id="grafico-mensual-2" class="grafico-inner" style="min-height: 420px"></div>
          </div>
          <div class="grafico_wrapper">
            <h4 class="grafico-mensual-2b-title"></h4>
            <div id="grafico-mensual-2b" class="grafico-inner" style="min-height: 420px"></div>
          </div>
        </div>
        <br>
        <div class="descripcion"><?php echo $newsletter_mensual['cuota_de_las_cadenas']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>      

      <div style="width:100%;">
        <h2>Cuota de las temáticas</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_mensual['cuota_tematicas_en_abierto']['fuente']; ?></p>
        <p><strong>Cuota (%)</strong></p>
        <div class="graficos-multi graficos-multi-2">
          <div class="grafico_wrapper">
            <h4 class="grafico-mensual-3-title"></h4>
            <div id="grafico-mensual-3" class="grafico-inner" style="min-height: 420px"></div>
          </div>
          <div class="grafico_wrapper">
            <h4 class="grafico-mensual-3b-title"></h4>
            <div id="grafico-mensual-3b" class="grafico-inner" style="min-height: 420px"></div>
          </div>
        </div>
        <br>
        <div class="descripcion"><?php echo $newsletter_mensual['cuota_tematicas_en_abierto']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>      

      <div class="grafico_wrapper" style="width:100%;">
        <h2>Programas - Top 10</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_mensual['programas_-_top10']['fuente']; ?></p>
        <div id="grafico-mensual-4" class="grafico-inner" style="min-height: 330px"></div>
        <br>
        <div class="descripcion"><?php echo $newsletter_mensual['programas_-_top10']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div> 

    <?php 
      require get_template_directory() . '/inc/graficos-newsletters/mensual/grafico-1.php'; //Consumo TV
      // require get_template_directory() . '/inc/graficos-newsletters/mensual/grafico-5.php'; //Ocupación por cadenas
      
      require get_template_directory() . '/inc/graficos-newsletters/mensual/grafico-8.php'; //Presión publicitaria por targets 
      require get_template_directory() . '/inc/graficos-newsletters/mensual/grafico-6.php'; //Presión publicitaria por grupos
      require get_template_directory() . '/inc/graficos-newsletters/mensual/grafico-7.php'; //Presión publicitaria por cadenas
      
      require get_template_directory() . '/inc/graficos-newsletters/mensual/grafico-9.php'; //Campañas más activas
      require get_template_directory() . '/inc/graficos-newsletters/mensual/grafico-10.php'; //Spot de oro – Top 3
      
      require get_template_directory() . '/inc/graficos-newsletters/mensual/grafico-2.php'; //Cuota de las cadenas
      require get_template_directory() . '/inc/graficos-newsletters/mensual/grafico-2b.php'; //Cuota de las cadenas
      
      require get_template_directory() . '/inc/graficos-newsletters/mensual/grafico-3.php'; //Cuota de las temáticas
      require get_template_directory() . '/inc/graficos-newsletters/mensual/grafico-3b.php'; //Cuota de las temáticas

      require get_template_directory() . '/inc/graficos-newsletters/mensual/grafico-4.php'; //Programas - Top 10