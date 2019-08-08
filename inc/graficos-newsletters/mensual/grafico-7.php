<script>

var dias = [ 'lv', 'sd' ];

function  graficoMensual7(dia) {

  // console.log('wat1', dia);
  // now all your data is loaded, so you can use it here.
  am4core.useTheme(am4themes_animated);
  
  // Create chart instance
  var chart = am4core.create("grafico-mensual-7-" + dia, am4charts.XYChart);
  
  // Locale
  chart.language.locale = am4lang_es_ES;
  chart.numberFormatter.language = new am4core.Language();
  chart.numberFormatter.language.locale = am4lang_es_ES;
  chart.dateFormatter.language = new am4core.Language();
  chart.dateFormatter.language.locale = am4lang_es_ES;

  enCadenas = (cadena, cadenas) => cadenas.filter( x => x.cadena.toLowerCase().indexOf(cadena.toLowerCase()) > -1 );
  clean = (valor) => valor !== undefined ? Number(valor.toString().replace(/\./g, '').replace(/,/g, '.').replace(/%/g, '')) : 0;

  var input1 = datosGraficos['Presión publicitaria por cadenas'].slice(1); 
  var input2 = datosGraficos['Presión publicitaria por cadenas (acumulado)'].slice(1); 
  var key1 = Object.keys(input1[0])[1];
  var key2 = Object.keys(input2[0])[1];
  var dayTitle1 = datosGraficos['Presión publicitaria por cadenas'][0]['Categoría'];
  var dayTitle2 = datosGraficos['Presión publicitaria por cadenas (acumulado)'][0]['Categoría'];

  var max1 = Math.max(...input1.map( x => x[key1] ).map(x => typeof x === 'string' ? Number(x.replace(/,/g, '.').replace(/%/, '')) : x));
  var max2 = Math.max(...input2.map( x => x[key2] ).map(x => typeof x === 'string' ? Number(x.replace(/,/g, '.').replace(/%/, '')) : x));
  var max = Math.max(max1, max2);

  // console.log(key1,key2);
  // console.log(max1, max2);
  // console.log(max);

  // Set data
  if(dia === 'lv') { 
    input = input1;
    dayTitle = dayTitle1;
  };

  if(dia === 'sd') { 
    input = input2;
    dayTitle = dayTitle2;
  };

  jQuery(".grafico-mensual-7-" + dia + "-title")[0].innerText = dayTitle[0].toUpperCase() + dayTitle.slice(1);

  var col1 = Object.keys(input[0])[1];
  var col2 = Object.keys(input[0])[2];
  var col3 = Object.keys(input[0])[3];

  // console.log(col1,col2,col3);

  input = input.map(x => {
    const moreData = x['Categoría'] !== undefined ? enCadenas(x['Categoría'], cadenas) : false;
    // console.log(x);
    x[col1] = clean(x[col1]);
    x[col2] = clean(x[col2]);
    x[col3] = clean(x[col3]);
    
    if (moreData && moreData.length !== 0) {
      x['Categoría'] = moreData[0].cadena.replace(/ *\([^)]*\) */g, "");
      x['Color'] = moreData[0].color;
      x['Logo'] = moreData[0].logo;
    }
    return x;
  });


  var sorted = input.sort((a, b) => (a[col1] > b[col1]) ? 1 : -1);

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
  categoryAxis.dataFields.logo = "Logo";
  // console.log(categoryAxis.dataFields, category);
  categoryAxis.renderer.grid.template.location = 0;
  categoryAxis.renderer.minGridDistance = 30;
  categoryAxis.renderer.grid.template.disabled = true;
  categoryAxis.renderer.labels.template.html = "<div class=\"logos-label\"><img width=\"32\" height=\"32\" src=\"{logo}\" title=\"{category}\" /></div>";
  categoryAxis.renderer.labels.template.fontSize = 14;
  // categoryAxis.renderer.labels.template.text = "{category}";
  // console.log(categoryAxis.renderer.labels.template);


  var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
  valueAxis.renderer.grid.template.disabled = true;
  valueAxis.renderer.labels.template.disabled = true;
  valueAxis.renderer.baseGrid.disabled = true;
  valueAxis.extraMax = 0.08;
  valueAxis.min = 0;
  // valueAxis.max = max;


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
      series.columns.template.tooltipHTML = "<div style=\"text-align:center;font-size:1.5em\"><br><h6>Evolución vs año <br> anterior:</h6><p><span>{evo}%</span><br></p></div>";
    }

   
    var valueLabel = series.bullets.push(new am4charts.LabelBullet());
    valueLabel.label.text = "{valueX}%";
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
    imageInfo.tooltipHTML = "<div style=\"text-align:center;font-size:1.5em\"><br><h6>Evolución vs año <br> anterior:</h6><p><span>{evo} min</span><br></p></div>";

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
    jQuery("g[aria-labelledby]:not(g[aria-controls])").hide()
  })

  return chart;
}


var graficoMensual7_show = {"lv": false, "sd": false};

dias.forEach(dia => {

  ScrollReveal().reveal("#grafico-mensual-7-" + dia, {
    afterReveal: function activar (el) {
      if(!graficoMensual7_show[dia]) {
        thischart = graficoMensual7(dia);
      }
      graficoMensual7_show[dia] = true;
    },
    afterReset: function activar (el) {
      if(graficoMensual7_show[dia]) {
        
        thischart = null;
        jQuery("#grafico-mensual-7-" + dia)[0].innerHTML = "";
      }
      graficoMensual7_show[dia] = false;
    },
    reset: true
  });

});
  

</script>