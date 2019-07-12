<?php 

$activar_graficos = get_field( "activar_graficos" );

if( $activar_graficos ) {
  $newsletter_info = get_field( "newsletter_info" );
  $datos = $newsletter_info["datos"];
  $newsletter_tipo = $newsletter_info["tipo_de_newsletter"];

  ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js" integrity="sha256-jDnOKIOq2KNsQZTcBTEnsp76FnfMEttF6AV2DF2fFNE=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/scrollReveal.js/4.0.5/scrollreveal.min.js" integrity="sha256-8VU/+18Z5eyYrv12HuV6lH74T2PFmP1ggKi+JkwYDHE=" crossorigin="anonymous"></script>
    <script src="//www.amcharts.com/lib/4/core.js"></script>
    <script src="//www.amcharts.com/lib/4/charts.js"></script>
    <script src="//www.amcharts.com/lib/4/themes/animated.js"></script>
    <script src="//www.amcharts.com/lib/4/lang/es_ES.js"></script>
    <script>
      var newsletter_tipo = '<?php echo $newsletter_tipo; ?>'; 
      var datosGraficos = <?php echo $datos; ?>;
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
      echo "var grupos = [{grupo: \"Resto\", logos:[]}];";

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
      require get_template_directory() . '/inc/graficos-newsletters/diaria/case.php';
      break;
      
    case 'Fin de Semana':
      require get_template_directory() . '/inc/graficos-newsletters/fin_de_semana/case.php';
      break;

    case 'Mensual':
      require get_template_directory() . '/inc/graficos-newsletters/mensual/case.php';
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