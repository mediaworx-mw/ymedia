<?php 

$activar_graficos = get_field( "activar_graficos" );

if( $activar_graficos ) {
  $newsletter_info = get_field( "newsletter_info" );
  $datos = $newsletter_info["datos"];
  $newsletter_tipo = $newsletter_info["tipo_de_newsletter"];

  ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js" integrity="sha256-jDnOKIOq2KNsQZTcBTEnsp76FnfMEttF6AV2DF2fFNE=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/scrollReveal.js/4.0.5/scrollreveal.min.js" integrity="sha256-8VU/+18Z5eyYrv12HuV6lH74T2PFmP1ggKi+JkwYDHE=" crossorigin="anonymous"></script>
    <script src="//www.amcharts.com/lib/version/4.7.6/core.js"></script>
    <!-- <script src="//www.amcharts.com/lib/4/core.js"></script> -->
    <script src="//www.amcharts.com/lib/version/4.7.6/charts.js"></script>
    <script src="//www.amcharts.com/lib/version/4.7.6/themes/animated.js"></script>
    <script src="//www.amcharts.com/lib/version/4.7.6/lang/es_ES.js"></script>
    <script>
      var newsletter_tipo = '<?php echo $newsletter_tipo; ?>'; 
      const datosGraficos = <?php echo $datos; ?>;
      am4core.options.commercialLicense = true;
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

    // Tomamos la configuración de las cadenas de la página de opciones       
    if( have_rows('marcas', 'option') ):
      echo "<script>";
      echo "var marcas = [];";

      while ( have_rows('marcas', 'option') ) : the_row();

        $marca = get_sub_field('marca');
        $logo = get_sub_field('logo');
        $color = get_sub_field('color');

        echo "marcas.push({marca: '$marca', logo: '$logo', color: '$color' });";

      endwhile;

      echo "</script>";

    else :
        // no rows found
    endif;

    // Tomamos la configuración de las cadenas de la página de opciones       
    if( have_rows('medios', 'option') ):
      echo "<script>";
      echo "var medios = [];";

      while ( have_rows('medios', 'option') ) : the_row();

        $medio = get_sub_field('medio');
        $logo = get_sub_field('logo');

        echo "medios.push({medio: '$medio', logo: '$logo' });";

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
      require get_template_directory() . '/inc/graficos-newsletters/egm/case.php';
      break;   

    case 'Inversión':
      require get_template_directory() . '/inc/graficos-newsletters/inversion/case.php';
      break;

    default:
      # code...
      break;
  }               
}
?>