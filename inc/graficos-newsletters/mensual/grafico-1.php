<script>


var dias = [ 'lv', 'sd' ];

function  graficoMensual1(dia) {

  // console.log('wat1', dia);
  // now all your data is loaded, so you can use it here.
  am4core.useTheme(am4themes_animated);
  
  // Create chart instance
  var chart = am4core.create("grafico-mensual-1-" + dia, am4charts.XYChart);
  
  // Locale
  chart.language.locale = am4lang_es_ES;
  chart.numberFormatter.language = new am4core.Language();
  chart.numberFormatter.language.locale = am4lang_es_ES;
  chart.dateFormatter.language = new am4core.Language();
  chart.dateFormatter.language.locale = am4lang_es_ES;

  enCadenas = (cadena, cadenas) => cadenas.filter( x => x.cadena.toLowerCase().indexOf(cadena.toLowerCase()) > -1 );

  // Set data
  if(dia === 'lv') { input = datosGraficos['ConsumoTV'].slice(1); dayTitle = datosGraficos['ConsumoTV'][0]['Categoría'] };
  if(dia === 'sd') { input = datosGraficos['ConsumoTV (acumulado)'].slice(1); dayTitle = datosGraficos['ConsumoTV (acumulado)'][0]['Categoría'] };

// console.log(dayTitle);

  jQuery(".grafico-mensual-1-" + dia + "-title")[0].innerText = dayTitle[0].toUpperCase() + dayTitle.slice(1);

  col1 = Object.keys(input[0])[1];
  col2 = Object.keys(input[0])[2];
  col3 = Object.keys(input[0])[3];

  // console.log(col1,col2,col3);

  input = input.map(x => {
    // console.log(x);
    x[col1] = Number(x[col1].toString().replace(/,/g, '.'));
    x[col2] = Number(x[col2].toString().replace(/,/g, '.'));
    x[col3] = Number(x[col3].toString().replace(/,/g, '.').replace(/%/g, '.'));
    return x;
  });


  var sorted = input.sort((a, b) => (a[col1] < b[col1]) ? 1 : -1);

  // console.log(sorted);

  chart.data = sorted;

  chart.colors.list = [am4core.color("#DC241F"),am4core.color("#cccccc"),am4core.color("#999999")];

  // Set data
  config = input.configuracion || [];


  // Add legend
  chart.legend = new am4charts.Legend();


  var category = "Categoría";

  // Num of series
  var num_of_series = Object.keys(chart.data[0]).length - 1;

  // Create axes
  var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
  // var i = 0;
  categoryAxis.dataFields.category = category;
  categoryAxis.dataFields.logo = "LOGO";
  // console.log(categoryAxis.dataFields, category);
  categoryAxis.renderer.grid.template.location = 0;
  categoryAxis.renderer.minGridDistance = 30;
  categoryAxis.renderer.grid.template.disabled = true;
  // categoryAxis.renderer.labels.template.html = "<div class=\"logos-label\"><img width=\"32\" height=\"32\" src=\"{logo}\" title=\"{category}\" /></div>";
  categoryAxis.renderer.labels.template.text = "{category}";
  categoryAxis.renderer.labels.template.fontSize = 14;
  // console.log(categoryAxis.renderer.labels.template);


  var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
  valueAxis.renderer.grid.template.disabled = true;
  valueAxis.renderer.labels.template.disabled = true;
  valueAxis.renderer.baseGrid.disabled = true;
  valueAxis.extraMax = 0.05;
  valueAxis.min = 0;


  // Create series
  function createSeries(field, multiple = 0) {

    var series = chart.series.push(new am4charts.ColumnSeries());
    series.dataFields.valueX = field;
    series.dataFields.categoryY = category;
    series.columns.template.strokeWidth = 0;
    series.columns.template.column.cornerRadiusBottomRight = 20;
    series.columns.template.column.cornerRadiusTopRight = 20;
    series.columns.template.column.cornerRadiusBottomLeft = 20;
    series.columns.template.column.cornerRadiusTopLeft = 20;
    series.paddingTop = 0;
    // console.log(field);
    series.name = field;
    if (field === col1) {
      series.dataFields.evo = "Evolución";
      // series.columns.template.tooltipText = "{evo}";
      series.tooltip.getFillFromObject = false;
      series.tooltip.background.fill = am4core.color("#fff");
      series.columns.template.tooltipHTML = "<div style=\"text-align:center;font-size:1.5em\"><br><h6>Evolución vs año <br> anterior:</h6><p><span>{evo} min</span><br></p></div>";
    }

   
    var valueLabel = series.bullets.push(new am4charts.LabelBullet());
    valueLabel.label.text = "{valueX}";
    valueLabel.label.horizontalCenter = "left";
    valueLabel.label.dx = 10;
    valueLabel.label.fontSize = 14;
    valueLabel.label.rotation = 0;
    valueLabel.label.truncate = false;


    categoryAxis.renderer.cellStartLocation = 0.1;
    categoryAxis.renderer.cellEndLocation = 0.9;

    return series;
  }

  // Add series
  for (var i = 0; i < num_of_series; i++) {
    var key = Object.keys(chart.data[0])[i + 1];
    var exceptions = 0;
    if (chart.data[0]["Evolución"] !== undefined) {
      exceptions++;
    }
    if (chart.data[0]["COLOR"] !== undefined) {
      exceptions++;
    }
    if (chart.data[0]["LOGO"] !== undefined) {
      exceptions++;
    }
    if (chart.data[0]["Nota"] !== undefined) {
      exceptions++;
    }
    if (key.toLowerCase() !== 'color' && key.toLowerCase() !== 'logo' && key !== 'Evolución' && key !== 'Nota') {
      createSeries(key, num_of_series - exceptions);
    }
  }

  // Set cell size in pixels
  var cellSize = 70;
  chart.events.on("datavalidated", function (ev) {

    // console.log('ajustando');

    // Get objects of interest
    var chart = ev.target;
    var categoryAxis = chart.yAxes.getIndex(0);

    // Calculate how we need to adjust chart height
    var adjustHeight = chart.data.length * cellSize - categoryAxis.pixelHeight;

    // get current chart height
    var targetHeight = chart.pixelHeight + adjustHeight;

    // Set it on chart's container
    chart.svgContainer.htmlElement.style.height = targetHeight + "px";
  });
  // Cursor
  // chart.cursor = new am4charts.XYCursor();

  jQuery(document).ready(function(){
    jQuery("g[aria-labelledby]").hide();
  })

  return chart;
}


var graficoMensual1_show = {"lv": false, "sd": false};

dias.forEach(dia => {

  ScrollReveal().reveal("#grafico-mensual-1-" + dia, {
    afterReveal: function activar (el) {
      if(!graficoMensual1_show[dia]) {
        thischart = graficoMensual1(dia);
      }
      graficoMensual1_show[dia] = true;
    },
    afterReset: function activar (el) {
      if(graficoMensual1_show[dia]) {
        
        thischart = null;
        jQuery("#grafico-mensual-1-" + dia)[0].innerHTML = "";
      }
      graficoMensual1_show[dia] = false;
    },
    reset: true
  });

});
  

</script>