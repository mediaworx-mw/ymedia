
jQuery(document).ready(function () {

  var recargador = "<br><br><div id=\"RECARGAR\" class=\"acf-switch -on\"><span class=\"acf-switch-on\">Recargar Datos</span></div>";
  
  if (jQuery('body').hasClass('post-type-canal') && jQuery('body').hasClass('wp-admin') && (jQuery('body').hasClass('post-new-php') || jQuery('body').hasClass('post-php'))) { 
    
    // console.log('load_data.js 2');
    jQuery('.gr_hide, #STATUS_DE_CARGA + div').hide();

    var UPDATE_BOX = false;

    // STATUS_DE_CARGA

    // var sheets = [];
    var graficos = [];
    var sheetsConfig = [];

    var ACTIVAR_GRAFICOS = document.querySelector('#ACTIVAR_GRAFICOS input[type=checkbox]');
    var DATOS_NEWSLETTER = jQuery('#DATOS_NEWSLETTER textarea');
    var TIPOS_DE_NEWSLETTER = document.querySelectorAll('#TIPOS_DE_NEWSLETTER input[type=radio]');
    window.TIPOS_DE_NEWSLETTER_SELECTED;

    jQuery('#STATUS_DE_CARGA .acf-input p')[0].innerHTML = DATOS_NEWSLETTER.text() !== '' ? 'DATOS CARGADOS' + recargador : 'CARGANDO...';
    jQuery('#RECARGAR').click((x) => {
      jQuery('#ACTIVAR_GRAFICOS input[type=checkbox]').trigger('click');
      jQuery('#ACTIVAR_GRAFICOS input[type=checkbox]').trigger('click');
    });
    // jQuery('#RECARGAR').click((x) => cargarDatos(window.TIPOS_DE_NEWSLETTER_SELECTED));

    for (i = 0; i < TIPOS_DE_NEWSLETTER.length; i++) {
      if (TIPOS_DE_NEWSLETTER[i].checked) {
        window.TIPOS_DE_NEWSLETTER_SELECTED = TIPOS_DE_NEWSLETTER[i].value;
      }
      TIPOS_DE_NEWSLETTER[i].addEventListener('change', (e) => {
        window.TIPOS_DE_NEWSLETTER_SELECTED = e.target.value;
        cargarDatos(window.TIPOS_DE_NEWSLETTER_SELECTED);
      });
    }
    
    ACTIVAR_GRAFICOS.addEventListener('change', (e) => {
      cargarDatos(window.TIPOS_DE_NEWSLETTER_SELECTED);
    });
  }

  function cargarDatos(tipoDeNewsletter) {

    switch (tipoDeNewsletter) {
      case '1': {
        console.log('DIARIO');
        var sheetId = jQuery('#fuente_diario')[0].defaultValue;
        break;
      }
      case '2': {
        console.log('FIN DE SEMANA');
        var sheetId = jQuery('#fuente_fin_de_semana')[0].defaultValue;
        break;
      }
      case '3': {
        console.log('MENSUAL');
        var sheetId = jQuery('#fuente_mensual')[0].defaultValue;
        break;
      }
      case '4': {
        console.log('EGM');
        var sheetId = jQuery('#fuente_egm')[0].defaultValue;
        break;
      }
      case '5': {
        console.log('INVERSION');
        var sheetId = jQuery('#fuente_inversion')[0].defaultValue;
        break;
      }
      default: {
        console.log('DEFAULT');
      }
    }
    
    // console.log(sheetId);
    graficos = [];
    jQuery('#STATUS_DE_CARGA .acf-input p')[0].innerText = 'CARGANDO...';
    cargarListaDeHojas(sheetId);
  }

  function cargarListaDeHojas(feedkey) {

    // console.log('hey');

    UPDATE_BOX = true;

    var feedurl_start = "https://spreadsheets.google.com/feeds/";

    var query = '',
      useIntegers = true,
      showRows = true,
      showColumns = true;

    jQuery.getJSON(feedurl_start + "worksheets/" + feedkey + "/public/basic?alt=json", function (sheetfeed) {

      sheets = sheetfeed.feed.entry.map(function (x, i) {
        return {
          numero: i,
          titulo: x.title.$t
        };
      });

      jQuery.each(sheetfeed.feed.entry, function (k_sheet, v_sheet) {

        var sheeturl = v_sheet.link[0]["href"] + "?alt=json";
        sheeturl = sheeturl.replace("basic", "values");
        var sheet_title = v_sheet.content["$t"]; // to know which sheet you're dealing with

        jQuery.getJSON(sheeturl, function (sheetjson) {

          var data = sheetjson;

          if (data.feed.entry !== undefined) {

            var responseObj = {};
            var rows = [];
            var columns = {};
            for (var i = 0; i < data.feed.entry.length; i++) {
              var entry = data.feed.entry[i];
              var keys = Object.keys(entry);
              var newRow = {};
              var queried = false;
              for (var j = 0; j < keys.length; j++) {
                var gsxCheck = keys[j].indexOf('gsx$');
                if (gsxCheck > -1) {
                  var key = keys[j];
                  var name = key.substring(4);
                  var content = entry[key];
                  var value = content.$t;
                  if (value.toLowerCase().indexOf(query.toLowerCase()) > -1) {
                    queried = true;
                  }
                  if (useIntegers === true && !isNaN(value)) {
                    value = Number(value);
                  }
                  newRow[name] = value;
                  if (queried === true) {
                    if (!columns.hasOwnProperty(name)) {
                      columns[name] = [];
                      columns[name].push(value);
                    } else {
                      columns[name].push(value);
                    }
                  }
                }
              }
              if (queried === true) {
                rows.push(newRow);
              }
            }
            if (showColumns === true) {
              responseObj['columns'] = columns;
            }
            if (showRows === true) {
              responseObj['rows'] = rows;
            }

            if (Object.keys(responseObj['rows'][0])[0][0] === '_') {
              var columns = responseObj['rows'][0],
                newObj = [];
              configObj = [];

              for (i = 1, config = false, j = 0; i < responseObj['rows'].length; i++) {
                if (!config) {
                  if (responseObj['rows'][i][Object.keys(responseObj['rows'][i])[0]] !== 'CONFIGURACION') {
                    var row = responseObj['rows'][i];
                    var obj = {};
                    Object.keys(row).map((x, i) => {
                      obj[columns[x]] = row[x];
                    });
                    newObj[i - 1] = obj;
                  } else {
                    config = true;

                    // console.log('CONFIGURACION!!');
                  }
                } else {
                  var row = responseObj['rows'][i];
                  var obj = {};
                  Object.keys(row).map((x, i) => {
                    if (i === 0) {
                      obj["CONFIG"] = row[x].toUpperCase();
                    } else {
                      obj[columns[x]] = row[x];
                    }
                  });
                  configObj[j++] = obj;
                }
              }
              responseObj['rows'] = newObj;
            }

            graficos[sheet_title] = {};
            graficos[sheet_title] = responseObj['rows'];
            sheetsConfig[sheet_title] = configObj;
            // console.log(graficos, sheetsConfig);
          }
        });
      });
    });
  }

  jQuery(document).ajaxStop(function (e) {

    if(UPDATE_BOX){
      var graficosNew = { ...graficos };
      var graficosString = escapeDoubleQuotes(JSON.stringify(graficosNew));
      DATOS_NEWSLETTER.text(graficosString);

      jQuery('#STATUS_DE_CARGA .acf-input p')[0].innerHTML = graficosString !== '{}' ? 'CARGA EXITOSA' + recargador : 'ERROR EN DATOS <br> <small style="color:#DD0000">Por favor revisar la hoja de datos.</small>';
      jQuery('#RECARGAR').click((x) => cargarDatos(window.TIPOS_DE_NEWSLETTER_SELECTED));
      
      UPDATE_BOX = false;
    }
  });

  function escapeDoubleQuotes(str) {
    return str.replace(/\\([\s\S])|(')/g, "\\$1$2"); // thanks @slevithan!
  }

});