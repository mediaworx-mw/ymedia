<?php 

$activar_graficos = get_field( "activar_graficos" );

if( $activar_graficos ) {
  $newsletter_info = get_field( "newsletter_info" );
  $datos = $newsletter_info["datos"];
  $newsletter_tipo = $newsletter_info["tipo_de_newsletter"];

  ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js" integrity="sha256-jDnOKIOq2KNsQZTcBTEnsp76FnfMEttF6AV2DF2fFNE=" crossorigin="anonymous"></script>
    <script src="//www.amcharts.com/lib/4/core.js"></script>
    <script src="//www.amcharts.com/lib/4/charts.js"></script>
    <script src="//www.amcharts.com/lib/4/themes/animated.js"></script>
    <script src="//www.amcharts.com/lib/4/lang/es_ES.js"></script>
    <script>
      var newsletter_tipo = '<?php echo $newsletter_tipo; ?>'; 
      var datosGraficos = JSON.parse('<?php echo $datos; ?>');
    </script>

  <?php 
      // Tomamos la configuración de las cadenas de la página de opciones       
    if( have_rows('cadenas', 'option') ):
      echo "<script>";
      echo "var cadenas = [];";

      while ( have_rows('cadenas', 'option') ) : the_row();

        $cadena = get_sub_field('cadena');
        $logo = get_sub_field('logo');
        $color = get_sub_field('color');
        $tipologia = get_sub_field('tipologia');

        echo "cadenas.push({cadena: '$cadena', logo: '$logo', color: '$color', tipologia: '$tipologia' });";

      endwhile;
      
      echo "</script>";

    else :
        // no rows found
    endif;

     // Tomamos la configuración de los grupos de comunicación de la página de opciones
    if( have_rows('grupos', 'option') ):


      echo "<script>";
      echo "var grupos = [];";

      while ( have_rows('grupos', 'option') ) : the_row();

        $grupo = get_sub_field('grupo');
        $logo = get_sub_field('logo');
        $color = get_sub_field('color');
        $logos = get_sub_field('logos');
        
        if( is_array($logos)) {
          $logos_js = '[';
          foreach( $logos as $log ) {           
            $logos_js .= "\"$log[logo]\",";
          }
          $logos_js .= ']';
        } else {
          $logos_js = '[]';
        }

        $logos_js = str_replace(",]","]",$logos_js);
        $logos_js = "JSON.parse('$logos_js')";

        echo "grupos.push({grupo: '".$grupo."', logo: '".$logo."', logos: ".$logos_js.", color: '".$color."'});";

      endwhile;
    
      echo "</script>";

    else :
        // no rows found
    endif;
  ?>

  <?php 
  switch ($newsletter_tipo) {

    case 'Diaria':
      $newsletter_diaria = get_field( "newsletter_diaria" );
    ?>
      <div class="grafico_wrapper">
        <h2>Programas - Top 10</h2>
        <div id="grafico-diaria-1" class="grafico-inner" style="min-height: 520px"></div>
        <p><?php echo $newsletter_diaria['programas_-_top_10']['fuente']; ?></p>
        <br>
        <div><?php echo $newsletter_diaria['programas_-_top_10']['texto']; ?></div>
      </div>

      <div class="grafico_wrapper">
        <h2>Cuota de las cadenas - Top 5</h2>
        <div id="grafico-diaria-2" class="grafico-inner" style="min-height: 420px"></div>
        <p><?php echo $newsletter_diaria['cuota_de_las_cadenas_-_top_5']['fuente']; ?></p>
        <br>
        <div><?php echo $newsletter_diaria['cuota_de_las_cadenas_-_top_5']['texto']; ?></div>
      </div>

      <div class="grafico_wrapper">
        <h2>Cuota de las temáticas en abierto - Top 5</h2>
        <div id="grafico-diaria-3" class="grafico-inner" style="min-height: 420px"></div>
        <p><?php echo $newsletter_diaria['cuota_de_las_tematicas_en_abierto_-_top_5']['fuente']; ?></p>
        <br>
        <div><?php echo $newsletter_diaria['cuota_de_las_tematicas_en_abierto_-_top_5']['texto']; ?></div>
      </div>

      <div class="grafico_wrapper">
        <h2>Cuota por grupos de comunicación</h2>
        <div id="grafico-diaria-4" class="grafico-inner" style="min-height: 520px"></div>
        <p><?php echo $newsletter_diaria['cuota_por_grupos_de_comunicacion']['fuente']; ?></p>
        <br>
        <div><?php echo $newsletter_diaria['cuota_por_grupos_de_comunicacion']['texto']; ?></div>
      </div>

      <div class="grafico_wrapper">
        <h2>Spot de oro – Top 3</h2>
        <div id="grafico-diaria-5" class="grafico-inner" style="min-height: 420px"></div>
        <p><?php echo $newsletter_diaria['spot_de_oro_–_top_3']['fuente']; ?></p>
        <br>
        <div><?php echo $newsletter_diaria['spot_de_oro_–_top_3']['texto']; ?></div>
      </div>

    <?php 
      require get_template_directory() . '/inc/graficos-newsletters/diaria/grafico-1.php';
      require get_template_directory() . '/inc/graficos-newsletters/diaria/grafico-2.php';
      require get_template_directory() . '/inc/graficos-newsletters/diaria/grafico-3.php';
      require get_template_directory() . '/inc/graficos-newsletters/diaria/grafico-4.php';
      require get_template_directory() . '/inc/graficos-newsletters/diaria/grafico-5.php';
      break;

    case 'Fin de Semana':
      $newsletter_fin_de_semana = get_field( "newsletter_fin_de_semana" );
    ?>
      <h2>Programas - Top 10</h2>
      <div class="grafico_wrapper">
        <h3>Viernes</h3>
        <div id="grafico-fds-1-vie" class="grafico-inner" style="min-height: 520px"></div>
        <p><?php echo $newsletter_fin_de_semana['programas_-_top_10']['fuente']; ?></p>
      </div>
      <div class="grafico_wrapper">
        <h3>Sábado</h3>
        <div id="grafico-fds-1-sab" class="grafico-inner" style="min-height: 520px"></div>
        <p><?php echo $newsletter_fin_de_semana['programas_-_top_10']['fuente']; ?></p>
      </div>
      <div class="grafico_wrapper">
        <h3>Domingo</h3>
        <div id="grafico-fds-1-dom" class="grafico-inner" style="min-height: 520px"></div>
        <p><?php echo $newsletter_fin_de_semana['programas_-_top_10']['fuente']; ?></p>
      </div>
      <br>
      <div><?php echo $newsletter_fin_de_semana['programas_-_top_10']['texto']; ?></div>
      <br>
      <br>

      <h2>Cuota de las cadenas - Top 5</h2>
      <div class="grafico_wrapper">
        <h3>Viernes</h3>
        <div id="grafico-fds-2-vie" class="grafico-inner" style="min-height: 520px"></div>
        <p><?php echo $newsletter_fin_de_semana['cuota_de_las_cadenas_-_top_5']['fuente']; ?></p>
      </div>
      <div class="grafico_wrapper">
        <h3>Sábado</h3>
        <div id="grafico-fds-2-sab" class="grafico-inner" style="min-height: 520px"></div>
        <p><?php echo $newsletter_fin_de_semana['cuota_de_las_cadenas_-_top_5']['fuente']; ?></p>
      </div>
      <div class="grafico_wrapper">
        <h3>Domingo</h3>
        <div id="grafico-fds-2-dom" class="grafico-inner" style="min-height: 520px"></div>
        <p><?php echo $newsletter_fin_de_semana['cuota_de_las_cadenas_-_top_5']['fuente']; ?></p>
      </div>
      <br>
      <div><?php echo $newsletter_fin_de_semana['cuota_de_las_cadenas_-_top_5']['texto']; ?></div>
      <br>
      <br>      
      
      <h2>Cuota de las temáticas en abierto - Top 5</h2>
      <div class="grafico_wrapper">
        <h3>Viernes</h3>
        <div id="grafico-fds-3-vie" class="grafico-inner" style="min-height: 520px"></div>
        <p><?php echo $newsletter_fin_de_semana['cuota_de_las_tematicas_en_abierto_-_top_5']['fuente']; ?></p>
      </div>
      <div class="grafico_wrapper">
        <h3>Sábado</h3>
        <div id="grafico-fds-3-sab" class="grafico-inner" style="min-height: 520px"></div>
        <p><?php echo $newsletter_fin_de_semana['cuota_de_las_tematicas_en_abierto_-_top_5']['fuente']; ?></p>
      </div>
      <div class="grafico_wrapper">
        <h3>Domingo</h3>
        <div id="grafico-fds-3-dom" class="grafico-inner" style="min-height: 520px"></div>
        <p><?php echo $newsletter_fin_de_semana['cuota_de_las_tematicas_en_abierto_-_top_5']['fuente']; ?></p>
      </div>
      <br>
      <div><?php echo $newsletter_fin_de_semana['cuota_de_las_tematicas_en_abierto_-_top_5']['texto']; ?></div>
      <br>
      <br>  

      <h2>Cuota por grupos de comunicación</h2>
      <div class="grafico_wrapper">
        <h3>Viernes</h3>
        <div id="grafico-fds-4-vie" class="grafico-inner" style="min-height: 520px"></div>
        <p><?php echo $newsletter_fin_de_semana['cuota_por_grupos_de_comunicacion']['fuente']; ?></p>
      </div>
      <div class="grafico_wrapper">
        <h3>Sábado</h3>
        <div id="grafico-fds-4-sab" class="grafico-inner" style="min-height: 520px"></div>
        <p><?php echo $newsletter_fin_de_semana['cuota_por_grupos_de_comunicacion']['fuente']; ?></p>
      </div>
      <div class="grafico_wrapper">
        <h3>Domingo</h3>
        <div id="grafico-fds-4-dom" class="grafico-inner" style="min-height: 520px"></div>
        <p><?php echo $newsletter_fin_de_semana['cuota_por_grupos_de_comunicacion']['fuente']; ?></p>
      </div>
      <br>
      <div><?php echo $newsletter_fin_de_semana['cuota_por_grupos_de_comunicacion']['texto']; ?></div>
      <br>
      <br>    
      
      <h2>Spot de oro – Top 3</h2>
      <div class="grafico_wrapper">
        <h3>Viernes</h3>
        <div id="grafico-fds-5-vie" class="grafico-inner" style="min-height: 520px"></div>
        <p><?php echo $newsletter_fin_de_semana['spot_de_oro_–_top_3']['fuente']; ?></p>
      </div>
      <div class="grafico_wrapper">
        <h3>Sábado</h3>
        <div id="grafico-fds-5-sab" class="grafico-inner" style="min-height: 520px"></div>
        <p><?php echo $newsletter_fin_de_semana['spot_de_oro_–_top_3']['fuente']; ?></p>
      </div>
      <div class="grafico_wrapper">
        <h3>Domingo</h3>
        <div id="grafico-fds-5-dom" class="grafico-inner" style="min-height: 520px"></div>
        <p><?php echo $newsletter_fin_de_semana['spot_de_oro_–_top_3']['fuente']; ?></p>
      </div>
      <br>
      <div><?php echo $newsletter_fin_de_semana['spot_de_oro_–_top_3']['texto']; ?></div>
      <br>
      <br>    


    <?php 
      require get_template_directory() . '/inc/graficos-newsletters/fin_de_semana/grafico-1.php';
      require get_template_directory() . '/inc/graficos-newsletters/fin_de_semana/grafico-2.php';
      require get_template_directory() . '/inc/graficos-newsletters/fin_de_semana/grafico-3.php';
      require get_template_directory() . '/inc/graficos-newsletters/fin_de_semana/grafico-4.php';
      require get_template_directory() . '/inc/graficos-newsletters/fin_de_semana/grafico-5.php';
      break;

    case 'Mensual':
      echo 'Mensual';
    ?>
      <div id="grafico-mensual-1" class="grafico-inner"></div>
    <?php 
      break;

    case 'EGM':
      echo 'EGM';
    ?>
      <div id="grafico-egm-1" class="grafico-inner"></div>
    <?php 
      break;   

    case 'Inversión':
      echo 'Inversión';
    ?>
      <div id="grafico-inversion-1" class="grafico-inner"></div>
    <?php 
      break;

    default:
      # code...
      break;
  }               
}
?>