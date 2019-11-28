<script>

function  graficoEGM1() {
  // now all your data is loaded, so you can use it here.
  am4core.useTheme(am4themes_animated);
  
  // Create chart instance
  var chart = am4core.create("grafico-EGM-1", am4charts.XYChart);
  var sheet_name = 'ConsumoMedios';

  
  clean = (valor) => valor !== undefined ? Number(valor.toString().replace(/\./g, '').replace(/,/g, '.').replace(/%/g, '')) : 0;

  
  // Locale
  chart.language.locale = am4lang_es_ES;
  chart.numberFormatter.language = new am4core.Language();
  chart.numberFormatter.language.locale = am4lang_es_ES;
  chart.dateFormatter.language = new am4core.Language();
  chart.dateFormatter.language.locale = am4lang_es_ES;

  // Set data
  var input = [];
  input = datosGraficos[sheet_name].map((x, i) =>  {

    let xx = {};
    Object.keys(x).map( y => xx[y] = clean(x[y]) );

    return xx;
  });

  var sorted = input.sort((a, b) => (a['Año'] > b['Año']) ? 1 : -1);
  chart.data = sorted;

  chart.colors.list = [am4core.color("#ef3737"),am4core.color("#6523cc"),am4core.color("#43beef"),am4core.color("#62b720"),am4core.color("#edca37"),am4core.color("#ea9036"),am4core.color("#e86baa"),am4core.color("#7f7fdd")];

  // Create category axis
  var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
  categoryAxis.dataFields.category = "Año";
  categoryAxis.renderer.opposite = true;

  // Create value axis
  var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
  valueAxis.renderer.inversed = false;
  // valueAxis.title.text = "Place taken";
  valueAxis.renderer.minLabelPosition = 0.01;

  var cols = Object.keys(datosGraficos["ConsumoMedios"][0]);
  cols.splice(cols.indexOf("Año"), 1);


  cols.forEach(x => {
    // Create series
    var s = chart.series.push(new am4charts.LineSeries());
    s.dataFields.valueY = x;
    s.dataFields.categoryX = "Año";
    s.name = x;
    s.strokeWidth = 3;
    s.bullets.push(new am4charts.CircleBullet());
    s.tooltipText = "{name}: {valueY}%";
    s.legendSettings.valueText = "{valueY}";
    s.visible  = false;
  });


  // Add chart cursor
  chart.cursor = new am4charts.XYCursor();
  chart.cursor.behavior = "zoomY";

  // Add legend
  chart.legend = new am4charts.Legend();
  
}

var graficoEGM1_show = false;

jQuery('#grafico-EGM-1').waypoint(function() {
  if(!graficoEGM1_show) {
    graficoEGM1();
  }
  graficoEGM1_show = true;
}, {
  offset: '75%'
});

</script>


