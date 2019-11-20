<script>

function  graficoEGM2() {
  
  am4core.useTheme(am4themes_animated);

  // Create chart instance
  var chart = am4core.create("grafico-EGM-2", am4charts.XYChart);
  
  var sheet_name = 'AudienciaMedios';

  // Locale
  chart.language.locale = am4lang_es_ES;
  chart.numberFormatter.language = new am4core.Language();
  chart.numberFormatter.language.locale = am4lang_es_ES;
  chart.dateFormatter.language = new am4core.Language();
  chart.dateFormatter.language.locale = am4lang_es_ES;

  enCadenas = (cadena, cadenas) => cadenas.filter( x => x.cadena.toLowerCase().indexOf(cadena.toLowerCase()) > -1 );
  clean = (valor) => valor !== undefined ? Number(valor.toString().replace(/\./g, '').replace(/,/g, '.').replace(/%/g, '')) : 0;

  // Set data
  var input = datosGraficos[sheet_name];

  var col1 = Object.keys(input[0])[1];
  var col2 = Object.keys(input[0])[2];
  // var col3 = Object.keys(input[0])[3];
  // var col4 = Object.keys(input[0])[4];

  input = input.map(x => {
    const moreData = x.Cadenas !== undefined ? enCadenas(x.Cadenas, cadenas) : false;
    x[col1] = clean(x[col1]);
    x[col2] = clean(x[col2]);
    // x[col3] = clean(x[col3]);
    // x[col4] = clean(x[col4]);

    return x;
  });

  // input[input.length] = {"Evolución": input[input.length - 1]["Evolución"] * 0.08};

  var sorted = input.sort((a, b) => (a[col1] > b[col1]) ? 1 : -1);

  // console.log(sorted);

  chart.data = sorted;

  var evolucion_str = Object.keys(datosGraficos[sheet_name][0]).filter(x => x.length  > 10)[0]; //"Dif. 2º EGM '19 vs 2º EGM '18";

  chart.colors.list = [am4core.color("#DC241F"),am4core.color("#cccccc")].reverse();

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
  categoryAxis.renderer.labels.template.fontSize = 14;
  categoryAxis.renderer.labels.template.fontWeight = 'bold';
  categoryAxis.renderer.labels.template.align = 'left';
  categoryAxis.renderer.labels.template.dx = -20;
  // categoryAxis.renderer.labels.template.html = "<div class=\"logos-label\"><img width=\"32\" height=\"32\" src=\"{logo}\" title=\"{category}\" /></div>";
  // categoryAxis.renderer.labels.template.html = "<img width=\"60\" height=\"60\" src=\"{logo}\" title=\"{category}\" />";
  // console.log(categoryAxis.renderer.labels.template);

  var categoryAxis3 = chart.yAxes.push(new am4charts.CategoryAxis());
  categoryAxis3.dataFields.category = category;
  categoryAxis3.dataFields.dif3 = evolucion_str;
  categoryAxis3.renderer.grid.template.location = 0;
  categoryAxis3.renderer.minGridDistance = 30;
  categoryAxis3.renderer.grid.template.disabled = true;
  categoryAxis3.renderer.labels.template.html = "<div style='background:#cccccc;color:white;position:relative;width:60px;height:60px;text-align:center;display:flex;align-items:center;justify-content:center;border-radius:30px'>{dif3}</div>";
  categoryAxis3.renderer.labels.template.fontSize = 14;
  categoryAxis3.renderer.opposite = true;
  // categoryAxis3.height = 550;
  categoryAxis3.extraMax = 0.05;


  var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
  valueAxis.renderer.grid.template.disabled = true;
  valueAxis.renderer.labels.template.disabled = true;
  valueAxis.renderer.baseGrid.disabled = true;
  valueAxis.extraMax = 0.05;


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
      series.dataFields.evo = evolucion_str;
      // series.columns.template.tooltipText = "{evo}";
      series.tooltip.getFillFromObject = false;
      series.tooltip.background.fill = am4core.color("#fff");
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
    if (chart.data[0][evolucion_str] !== undefined) {
      exceptions++;
    }
    if (chart.data[0]["COLOR"] !== undefined) {
      exceptions++;
    }
    if (chart.data[0]["LOGO"] !== undefined) {
      exceptions++;
    }
    if (key.toLowerCase() !== 'color' && key.toLowerCase() !== 'logo' && key !== evolucion_str) {
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



  return chart;
  
}

var graficoEGM2_show = false;

jQuery('#grafico-EGM-2').waypoint(function() {
  if(!graficoEGM2_show) {
    graficoEGM2();
  }
  graficoEGM2_show = true;
}, {
  offset: '75%'
});

</script>


