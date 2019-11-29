    <script src="https://www.amcharts.com/lib/4/maps.js"></script>
    <script src="https://www.amcharts.com/lib/4/geodata/worldHigh.js"></script>
    <script src="https://www.amcharts.com/lib/4/geodata/spainHigh.js"></script>

    <?php
      $newsletter_egm = get_field( "newsletter_EGM" );
    ?>
       <div class="grafico_wrapper" style="width:100%;" >
        <h2>Evolución de la penetración de medios</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_egm['ConsumoMedios']['fuente']; ?></p>
        <div id="grafico-EGM-1" class="grafico-inner" style="min-height: 600px"></div>
        <small>Desliza el ratón por encima del gráfico para ver el detalle anual de cada medio</small>
        <br>
        <br>
        <div class="descripcion"><?php echo $newsletter_egm['ConsumoMedios']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>

      <div class="grafico_wrapper" style="width:100%;" >
        <h2>Evolución de la audiencia por medios (000)</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_egm['AudienciaMedios']['fuente']; ?></p>
        <div id="grafico-EGM-2" class="grafico-inner" style="min-height: 580px"></div>
        <br>
        <div class="descripcion"><?php echo $newsletter_egm['AudienciaMedios']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>

      <div class="grafico_wrapper" style="width:100%;" >
        <h2>Diarios: Evolución de la audiencia por soporte (000) – Top 5</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_egm['DiariosSoporte']['fuente']; ?></p>
        <div id="grafico-EGM-3" class="grafico-inner" style="min-height: 430px"></div>
        <br>
        <div class="descripcion"><?php echo $newsletter_egm['DiariosSoporte']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>   

      <div class="grafico_wrapper" style="width:100%;" >
        <h2>Diarios: Penetración diarios por región y principales cabeceras (000)</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_egm['DiariosRegion']['fuente']; ?></p>
        <div id="grafico-EGM-4" class="grafico-inner" style="width: 100%; height: 650px;"></div>
        <p style="font-size:10px;display:flex;align-items:center;justify-content:center;">
          <small style="font-size:10px;display:flex;align-items:center;justify-content:center;margin-right:20px;line-height:1.2"><span style="display:inline-block;border-radius:4px;margin-right:5px;width:22px;height:22px;background:#dc241f"></span>  Comunidad con un consumo por encima de la media nacional</small>
          <small style="font-size:10px;display:flex;align-items:center;justify-content:center;margin-right:20px;line-height:1.2"><span style="display:inline-block;border-radius:4px;margin-right:5px;width:22px;height:22px"><img  style="filter:invert(80%);display:inline-block;border-radius:11px;margin:0; margin-right:5px;width:20px;height:20px" src="https://i.imgur.com/MFOMXXg.png" width="15" height="15" alt=""> </span> Comunidad con un diario lider regional</small>
        </p>
        <br>
        <br>
        <div class="descripcion"><?php echo $newsletter_egm['DiariosRegion']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>         

      <div class="grafico_wrapper" style="width:100%;" >
        <h2>Revistas Mensuales: Evolución de la audiencia por soporte (000) – Top 5</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_egm['RevistasMensuales']['fuente']; ?></p>
        <div id="grafico-EGM-5" class="grafico-inner" style="min-height: 450px"></div>
        <br>
        <div class="descripcion"><?php echo $newsletter_egm['RevistasMensuales']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>   

      <div class="grafico_wrapper" style="width:100%;" >
        <h2>Revistas Semanales: Evolución de la audiencia por soporte (000) – Top 5</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_egm['RevistasSemanales']['fuente']; ?></p>
        <div id="grafico-EGM-6" class="grafico-inner" style="min-height: 450px"></div>
        <br>
        <div class="descripcion"><?php echo $newsletter_egm['RevistasSemanales']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>     

      <div class="grafico_wrapper" style="width:100%;" >
        <h2>Radio: Evolución de la audiencia por cadena (000) – Top 5</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_egm['RadioCadena']['fuente']; ?></p>
        <div id="grafico-EGM-7" class="grafico-inner" style="min-height: 480px"></div>
        <br>
        <div class="descripcion"><?php echo $newsletter_egm['RadioCadena']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>

      <div class="grafico_wrapper" style="width:100%;" >
        <h2>Radiofórmula: Morning show (000)</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_egm['RadioformulaFS']['fuente']; ?></p>
        <div id="grafico-EGM-8" class="grafico-inner" style="min-height: 800px"></div>
        <br>
        <div class="descripcion"><?php echo $newsletter_egm['RadioformulaFS']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>            

      <div class="grafico_wrapper" style="width:100%;" >
        <h2>Radio Generalista: Mañana (000)</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_egm['RadioGenMañana']['fuente']; ?></p>
        <div id="grafico-EGM-9" class="grafico-inner" style="min-height: 580px"></div>
        <br>
        <div class="descripcion"><?php echo $newsletter_egm['RadioGenMañana']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>   

      <div class="grafico_wrapper" style="width:100%;" >
        <h2>Radio Generalista: Deporte LV (000)</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_egm['RadioGenDepLV']['fuente']; ?></p>
        <div id="grafico-EGM-10" class="grafico-inner" style="min-height: 450px"></div>
        <br>
        <div class="descripcion"><?php echo $newsletter_egm['RadioGenDepLV']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>        

      <div class="grafico_wrapper" style="width:100%;" >
        <h2>Radio Generalista: Deporte Sábado (000)</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_egm['RadioGenDepS']['fuente']; ?></p>
        <div id="grafico-EGM-11" class="grafico-inner" style="min-height: 580px"></div>
        <br>
        <div class="descripcion"><?php echo $newsletter_egm['RadioGenDepS']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>    

      <div class="grafico_wrapper" style="width:100%;" >
        <h2>Radio Generalista: Deporte Domingo (000)</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_egm['RadioGenDepD']['fuente']; ?></p>
        <div id="grafico-EGM-12" class="grafico-inner" style="min-height: 580px"></div>
        <br>
        <div class="descripcion"><?php echo $newsletter_egm['RadioGenDepD']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>  

      <div class="grafico_wrapper" style="width:100%;" >
        <h2>Internet: Acceso por dispositivo</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_egm['InternetDispositivos']['fuente']; ?></p>
        <div id="grafico-EGM-13" class="grafico-inner" style="min-height: 400px"></div>
        <br>
        <div class="descripcion"><?php echo $newsletter_egm['InternetDispositivos']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>  

      <div class="grafico_wrapper" style="width:100%;" >
        <h2>Internet: Actividades</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_egm['InternetActividades']['fuente']; ?></p>
        <div id="grafico-EGM-14" class="grafico-inner" style="min-height: 650px"></div>
        <br>
        <div class="descripcion"><?php echo $newsletter_egm['InternetActividades']['texto']; ?></div>
        <br>
        <br>
        <br>


    <?php 
      require get_template_directory() . '/inc/graficos-newsletters/egm/grafico-1.php';
      require get_template_directory() . '/inc/graficos-newsletters/egm/grafico-2.php';
      require get_template_directory() . '/inc/graficos-newsletters/egm/grafico-3.php';

      require get_template_directory() . '/inc/graficos-newsletters/egm/grafico-4.php';

      require get_template_directory() . '/inc/graficos-newsletters/egm/grafico-5.php';
      require get_template_directory() . '/inc/graficos-newsletters/egm/grafico-6.php';
      require get_template_directory() . '/inc/graficos-newsletters/egm/grafico-7.php';
      require get_template_directory() . '/inc/graficos-newsletters/egm/grafico-8.php';
      require get_template_directory() . '/inc/graficos-newsletters/egm/grafico-9.php';
      require get_template_directory() . '/inc/graficos-newsletters/egm/grafico-10.php';
      require get_template_directory() . '/inc/graficos-newsletters/egm/grafico-11.php';
      require get_template_directory() . '/inc/graficos-newsletters/egm/grafico-12.php';
      require get_template_directory() . '/inc/graficos-newsletters/egm/grafico-13.php';
      require get_template_directory() . '/inc/graficos-newsletters/egm/grafico-14.php';
