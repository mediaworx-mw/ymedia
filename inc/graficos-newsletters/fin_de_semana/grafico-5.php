<script>
var dias = [ 'vie', 'sab', 'dom' ];

function  graficoFDS5(dia) {
// now all your data is loaded, so you can use it here.
am4core.useTheme(am4themes_animated);

// Create chart instance
var chart = am4core.create("grafico-fds-5-" + dia, am4charts.XYChart);

// Locale
chart.language.locale = am4lang_es_ES;
chart.numberFormatter.language = new am4core.Language();
chart.numberFormatter.language.locale = am4lang_es_ES;
chart.dateFormatter.language = new am4core.Language();
chart.dateFormatter.language.locale = am4lang_es_ES;

enCadenas = (cadena, cadenas) => cadenas.filter( x => x.cadena.toLowerCase().indexOf(cadena.toLowerCase()) > -1 );

const datosGraficosX = datosGraficos['Spot de oro - Top3'];

// console.log(datosGraficosX);
position = {};

for ( ii = 0; ii < datosGraficosX.length; ii++){
  // console.log(datosGraficosX[ii], ii);
  if (datosGraficosX[ii]["Títulos campaña"] === 'VIERNES') {
    position["VIERNES"] = ii;
  }
  if (datosGraficosX[ii]["Títulos campaña"] === 'SÁBADO') {
    position["SÁBADO"] = ii;
  }
  if (datosGraficosX[ii]["Títulos campaña"] === 'DOMINGO') {
    position["DOMINGO"] = ii;
  }  
}


var max = Math.max(...datosGraficosX.map( x => x['Grp’s a formato'] ).filter( x => x !== undefined).map(x => typeof x === 'string' ? Number(x.replace(/,/g, '.').replace(/%/, '')) : x));

// Set data
input = [];
if(dia === 'vie') { 
  input = datosGraficosX.slice( 1, position['SÁBADO']);
}
if(dia === 'sab') { 
  input = datosGraficosX.slice( position['SÁBADO'] + 1, position['DOMINGO']); 
}
if(dia === 'dom') { 
  input = datosGraficosX.slice( position['DOMINGO'] + 1); 
}

input = input.map((x, i) => {
  const moreData = x.Cadena !== undefined ? enCadenas(x.Cadena, cadenas) : false;
  // console.log(x);
  x['Títulos campaña'] = x['Títulos campaña'].replace(/\//g, " / ") + ' '.repeat(i);
  x['Grp’s a formato'] = Number(x['Grp’s a formato'].toString().replace(/,/g, '.'));

  if (moreData && moreData.length !== 0) {
    x['Cadena'] = moreData[0].cadena.replace(/ *\([^)]*\) */g, "");
    x['Color'] = moreData[0].color;
    x['Logo'] = moreData[0].logo;
  }
  return x;
});

//  input[input.length] = {"Grp’s a formato": input[input.length - 1]["Grp’s a formato"] * 0.08};

  var sorted = input.sort((a, b) => (a['Grp’s a formato'] < b['Grp’s a formato']) ? 1 : -1)
  
  chart.data = sorted;
  // console.log(sorted);

  chart.colors.list = [am4core.color("#dddddd")];

  var category = "Títulos campaña";


  // Create axes
  var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
  categoryAxis.dataFields.category = category;
  categoryAxis.dataFields.logo = "Logo";
  categoryAxis.renderer.grid.template.location = 0;
  categoryAxis.renderer.minGridDistance = 30;
  categoryAxis.renderer.grid.template.disabled = true;
  
  var label = categoryAxis.renderer.labels.template;
  label.wrap = true;
  label.maxWidth = 110;
  // label.truncate = true;
  label.maxHeight = 60;
  label.height = 80;
  label.tooltipText = "{category}";

  var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
  valueAxis.renderer.grid.template.disabled = true;
  valueAxis.renderer.labels.template.disabled = true;
  valueAxis.renderer.baseGrid.disabled = true;
  valueAxis.extraMax = 0.05;
  valueAxis.min = 0;
  valueAxis.max = max;

  var topContainer = chart.chartContainer.createChild(am4core.Container);
  topContainer.layout = "absolute";
  topContainer.toBack();
  topContainer.paddingBottom = 15;
  topContainer.width = am4core.percent(100);

  // var axisTitle = topContainer.createChild(am4core.Label);
  // axisTitle.text = "Grp’s a formato";
  // axisTitle.fontWeight = 600;
  // axisTitle.fontSize = 14;
  // axisTitle.align = "left";
  // axisTitle.paddingRight = 100;


  // Create series
  function createSeries(field) {
    var series = chart.series.push(new am4charts.ColumnSeries());
    series.dataFields.valueY = field;
    series.dataFields.categoryX = category;
    series.dataFields.emision = "Título emisión";
    series.columns.template.strokeWidth = 0;
    series.columns.template.column.cornerRadiusBottomRight = 5;
    series.columns.template.column.cornerRadiusTopRight = 5;
    series.columns.template.column.cornerRadiusBottomLeft = 5;
    series.columns.template.column.cornerRadiusTopLeft = 5;
    series.columns.template.tooltipText = "{emision}";
    series.tooltip.pointerOrientation = "vertical";
    series.tooltip.dy = -10;

    var hoverState = series.columns.template.states.create("hover");
    hoverState.properties.fill = am4core.color("#aaaaaa");
    hoverState.properties.fillOpacity = 0.8;
    hoverState.properties.dy  = -5;

    var bullet = series.bullets.push(new am4charts.Bullet());
    bullet.locationY = 1;
    var image = bullet.createChild(am4core.Image);
    image.propertyFields.href = 'Logo';
    image.width = 40;
    image.height = 40;
    image.dy = -10;
    image.dx = 0;
    image.y = am4core.percent(100);
    image.horizontalCenter = "middle";
    image.verticalCenter = "bottom";

    var valueLabel = series.bullets.push(new am4charts.LabelBullet());
    valueLabel.label.text = "{valueY}";
    valueLabel.label.horizontalCenter = "middle";
    valueLabel.label.dx = 0;
    valueLabel.label.dy = -10;
    valueLabel.label.fill = "#000";
    valueLabel.label.fontSize = 14;
    valueLabel.label.rotation = 0;
    valueLabel.label.hideOversized = true;
    valueLabel.label.truncate = false;
    valueLabel.label.maxWidth = 120;
    valueLabel.label.maxHeight = 20;

    // console.log(bullet);
    // console.log(image);

    return series;
  }

  createSeries('Grp’s a formato', 1);

  jQuery(document).ready(function(){
    //jQuery("g[aria-labelledby]:not(g[aria-controls])").hide();jQuery("g[aria-labelledby]:not(g[aria-controls])").hide();
  })    

  return chart;
}


var graficoFDS5_show = {"vie": false, "sab": false, "dom": false};

dias.forEach(dia => {
  ScrollReveal().reveal("#grafico-fds-5-" + dia, {
    afterReveal: function activar (el) {
      if(!graficoFDS5_show[dia]) {
        thischart = graficoFDS5(dia);
      }
      graficoFDS5_show[dia] = true;
    },
    afterReset: function activar (el) {
      if(graficoFDS5_show[dia]) {
        thischart = null;
        jQuery("#grafico-fds-5-" + dia)[0].innerHTML = "";
        // thischart = null;
      }
      graficoFDS5_show[dia] = false;
    },
    reset: true
  });
});


</script>