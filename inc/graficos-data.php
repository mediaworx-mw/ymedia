<?php

add_action('init', 'brandpage_form_head');
function brandpage_form_head(){
  acf_form_head();
}

function acf_sheets_fuentes_sheets( $field ) {

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

add_filter('acf/load_field/name=sheets_fuentes_pick', 'acf_sheets_fuentes_sheets', 10, 3);

add_action('admin_enqueue_scripts', 'pw_load_scripts');
function pw_load_scripts() {
	wp_enqueue_script('custom-js', '/wp-content/themes/ymedia/inc/graficos-newsletters/load_data.js');
}
