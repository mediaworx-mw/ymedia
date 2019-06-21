<?php

function acf_sheets_fuentes_sheets( $field ) {

    // Tomamos la configuración de las cadenas de la página de opciones       
    if( have_rows('cadenas', 'option') ):

      ?>
      <script>
      var cadenas = [];
      <?php

      while ( have_rows('cadenas', 'option') ) : the_row();

        $cadena = get_sub_field('cadena');
        $logo = get_sub_field('logo');
        $color = get_sub_field('color');
        $tipologia = get_sub_field('tipologia');

        echo "cadenas.push({cadena: '$cadena', logo: '$logo', color: '$color', tipologia: '$tipologia' });";

      endwhile;
    
      ?>
      // console.log(cadenas);
      </script>
      <?php

    else :
        // no rows found
    endif;

    // Tomamos la configuración de los grupos de comunicación de la página de opciones
    if( have_rows('grupos', 'option') ):

      ?>
      <script>
      var grupos = [];
      <?php

      while ( have_rows('grupos', 'option') ) : the_row();

        $grupo = get_sub_field('grupo');
        $logo = get_sub_field('logo');
        $color = get_sub_field('color');

        echo "grupos.push({grupo: '$grupo', logo: '$logo', color: '$color'});";

      endwhile;
    
      ?>
      // console.log(grupos);
      </script>
      <?php

    else :
        // no rows found
    endif;


    $sheets = get_field('sheets_fuentes', 'option', false);

    $nl = ['diario','fin_de_semana', 'mensual', 'egm', 'inversion'];
    $i = 0; 
    echo '<div id="ids_google_sheets" style="display:none">';
    if( is_array($sheets) ) {
      foreach( $sheets as $sheet ) {           
        echo '<input type="hidden" id="fuente_'.$nl[$i++].'" value="'.$sheet.'">';
      }
    }
    echo '</div>';
}

add_filter('acf/load_field/name=sheets_fuentes_pick', 'acf_sheets_fuentes_sheets');



function pw_load_scripts() {
	wp_enqueue_script('custom-js', '/wp-content/themes/ymedia/inc/graficos-newsletters/load_data.js');
}
add_action('admin_enqueue_scripts', 'pw_load_scripts');