<script>


function  graficoMensual3b(datosGraficos) {
  // console.log('graficoMensual3b', datosGraficos);
  // now all your data is loaded, so you can use it here.
  am4core.useTheme(am4themes_animated);
  
  // Create chart instance
  var chart = am4core.create("grafico-mensual-3b", am4charts.XYChart);
  
  // Locale
  chart.language.locale = am4lang_es_ES;
  chart.numberFormatter.language = new am4core.Language();
  chart.numberFormatter.language.locale = am4lang_es_ES;
  chart.dateFormatter.language = new am4core.Language();
  chart.dateFormatter.language.locale = am4lang_es_ES;

  enCadenas = (cadena, cadenas) => cadenas.filter( x => x.cadena.toLowerCase().indexOf(cadena.toLowerCase()) > -1 );
  clean = (valor) => valor !== undefined ? Number(valor.toString().replace(/\./g, '').replace(/,/g, '.').replace(/%/g, '')) : 0;

  // Set data
  var input = datosGraficos['Cuota temáticas en abierto (acumulado)'].slice(1);

  var dayTitle = datosGraficos['Cuota temáticas en abierto (acumulado)'][0]['Cadenas Tematicas TDT'];

  jQuery(".grafico-mensual-3b-title")[0].innerText = dayTitle[0].toUpperCase() + dayTitle.slice(1);

  var col1 = Object.keys(input[0])[1];
  var col2 = Object.keys(input[0])[2];
  var col3 = Object.keys(input[0])[3];

  // console.log(col1,col2,col3);

  input = input
    .filter( (x, i) => i < 5)
    .map(x => {
    const moreData = x['Cadenas Tematicas TDT'] !== undefined ? enCadenas(x['Cadenas Tematicas TDT'], cadenas) : false;
    // console.log(x);
    x[col1] = clean(x[col1]);
    x[col2] = clean(x[col2]);
    x[col3] = clean(x[col3]);
    
    if (moreData && moreData.length !== 0) {
      // console.log(x['Cadenas Tematicas TDT'], moreData[0]);
      x['Cadenas Tematicas TDT'] = moreData[0].cadena.replace(/ *\([^)]*\) */g, "");
      x['Color'] = moreData[0].color;
      x['LOGO'] = moreData[0].logo;
    }
    return x;
  });

  // input[input.length] = {"Evolución": input[input.length - 1]["Evolución"] * 0.08};

  var sorted = input.sort((a, b) => (a[col1] > b[col1]) ? 1 : -1);

  // console.log(sorted);

  chart.data = sorted;

  chart.colors.list = [am4core.color("#DC241F"),am4core.color("#cccccc"),am4core.color("#999999")];

  // Add legend
  chart.legend = new am4charts.Legend();

  var category = "Cadenas Tematicas TDT";

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
  categoryAxis.renderer.labels.template.html = "<div class=\"logos-label\"><img width=\"32\" height=\"32\" src=\"{logo}\" title=\"{category}\" /></div>";
  // categoryAxis.renderer.labels.template.html = "<img width=\"60\" height=\"60\" src=\"{logo}\" title=\"{category}\" />";
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
      series.columns.template.tooltipHTML = "<div style=\"text-align:center;font-size:1.5em\"><br><h6>Evolución vs año <br>anterior:</h6><p><span>{evo}%</span><br></p></div>";
    }

   
    var valueLabel = series.bullets.push(new am4charts.LabelBullet());
    valueLabel.label.text = "{valueX}";
    valueLabel.label.horizontalCenter = "left";
    valueLabel.label.dx = 10;
    valueLabel.label.fontSize = 14;
    valueLabel.label.rotation = 0;
    valueLabel.label.truncate = false;

    var info = series.bullets.push(new am4charts.Bullet());
    info.locationX = 0;
    var imageInfo = info.createChild(am4core.Image);
    imageInfo.href = "";
    imageInfo.width = 16;
    imageInfo.height = 16;
    imageInfo.dx = -4;
    imageInfo.dy = 8;
    imageInfo.horizontalCenter = "right";
    imageInfo.verticalCenter = "bottom";
    imageInfo.tooltipHTML = "<div style=\"text-align:center;font-size:1.5em\"><br><h6>Evolución vs año <br> anterior:</h6><p><span>{evo}%</span><br></p></div>";

    // console.log(field, col1);      

    imageInfo.adapter.add("href", function(html, target) {
      if (field === col1) {
        var href = "https://i.imgur.com/MFOMXXg.png";
        return href;
      } else {
        return ;
      }
    });    

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
    if (key.toLowerCase() !== 'color' && key.toLowerCase() !== 'logo' && key !== 'Evolución') {
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

var graficoMensual3b_show = false;


ScrollReveal().reveal("#grafico-mensual-3b", {
  afterReveal: function activar (el) {
    if(!graficoMensual3b_show) {
      thischart = graficoMensual3b(datosGraficos);
      graficoMensual3b_show = true;
    }
  },
  afterReset: function activar (el) {
    if(graficoMensual3b_show && thischart !== null) {
      thischart.dispose();
      thischart = null;
      jQuery("#grafico-mensual-3b")[0].innerHTML = "";
    }
    graficoMensual3b_show = false;
  },
  reset: false
});
  

</script>