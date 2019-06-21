<?php 

$activar_graficos = get_field( "activar_graficos" );

if( $activar_graficos ) {
  $newsletter_info = get_field( "newsletter_info" );
  $datos = $newsletter_info["datos"];
  $newsletter_tipo = $newsletter_info["tipo_de_newsletter"];

  ?>
    <script src="//www.amcharts.com/lib/4/core.js"></script>
    <script src="//www.amcharts.com/lib/4/charts.js"></script>
    <script src="//www.amcharts.com/lib/4/themes/animated.js"></script>
    <script src="//www.amcharts.com/lib/4/lang/es_ES.js"></script>
    <script>
      var newsletter_tipo = '<?php echo $newsletter_tipo; ?>'; 
      var datosGraficos = JSON.parse('<?php echo $datos; ?>');
    </script>
  <?php 

  switch ($newsletter_tipo) {

    case 'Diaria':
    ?>
      <div class="grafico_wrapper">
        <h2>Programas - Top 10</h2>
        <div id="grafico-diaria-1" class="grafico-inner" style="min-height: 520px"></div>
        <p>Fuente: Kantar Media. Ind 4+ (inv). PyB. Franja total día</p>
      </div>

      <div class="grafico_wrapper">
        <h2>Cuota de las cadenas - Top 5</h2>
        <div id="grafico-diaria-2" class="grafico-inner" style="min-height: 520px"></div>
        <p>Fuente: Kantar Media. Ind 4+ (inv). PyB. Franja total día</p>
      </div>

      <div class="grafico_wrapper">
        <h2>Cuota de las temáticas en abierto - Top 5</h2>
        <div id="grafico-diaria-3" class="grafico-inner" style="min-height: 520px"></div>
        <p>Fuente: Kantar Media. Ind 4+ (inv). PyB. Franja total día</p>
      </div>

      <div class="grafico_wrapper">
        <h2>Cuota por grupos de comunicación</h2>
        <div id="grafico-diaria-4" class="grafico-inner" style="min-height: 520px"></div>
        <p>Fuente: Kantar Media. Ind 4+ (inv). PyB. Franja total día</p>
      </div>

      <div class="grafico_wrapper">
        <h2>Spot de oro – Top 3</h2>
        <div id="grafico-diaria-5" class="grafico-inner" style="min-height: 520px"></div>
        <p>Fuente: Kantar Media. Ind 4+ (inv). PyB. Grp’s a formato</p>
      </div>

    <?php 
      require get_template_directory() . '/inc/graficos-newsletters/diaria/grafico-diaria-1.php';
      require get_template_directory() . '/inc/graficos-newsletters/diaria/grafico-diaria-2.php';
      require get_template_directory() . '/inc/graficos-newsletters/diaria/grafico-diaria-3.php';
      require get_template_directory() . '/inc/graficos-newsletters/diaria/grafico-diaria-4.php';
      require get_template_directory() . '/inc/graficos-newsletters/diaria/grafico-diaria-5.php';
      break;

    case 'Fin de Semana':
      echo 'Fin de Semana';
    ?>
      <div id="grafico-findesemana-1" class="grafico-inner"></div>
    <?php 
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