<script>
var dias = [ 'vie', 'sab', 'dom' ];

function  graficoFDS3(dia) {
// now all your data is loaded, so you can use it here.
am4core.useTheme(am4themes_animated);

// Create chart instance
var chart = am4core.create("grafico-fds-3-" + dia, am4charts.XYChart);

// Locale
chart.language.locale = am4lang_es_ES;
chart.numberFormatter.language = new am4core.Language();
chart.numberFormatter.language.locale = am4lang_es_ES;
chart.dateFormatter.language = new am4core.Language();
chart.dateFormatter.language.locale = am4lang_es_ES;

enCadenas = (cadena, cadenas) => cadenas.filter( x => x.cadena.toLowerCase().indexOf(cadena.toLowerCase()) > -1 );

// console.log(datosGraficos);

// Set data
if(dia === 'vie') { input = datosGraficos['Cuota de las tem. en abierto - Top5'].slice( 1,6); }
if(dia === 'sab') { input = datosGraficos['Cuota de las tem. en abierto - Top5'].slice( 7,12); }
if(dia === 'dom') { input = datosGraficos['Cuota de las tem. en abierto - Top5'].slice(13,18); }

input = input.map(x => {
  const moreData = x.Cadena !== undefined ? enCadenas(x.Cadena, cadenas) : false;
  // console.log(x);
  if (moreData) {
    x['Cadena'] = moreData[0].cadena.replace(/ *\([^)]*\) */g, "");
    x['Color'] = moreData[0].color;
    x['Logo'] = moreData[0].logo;
  }
  return x;
});


input[input.length] = {"Cuota (%)": input[input.length - 1]["Cuota (%)"] * 0.08};

var sorted = input.sort((a, b) => (a['Cuota (%)'] < b['Cuota (%)']) ? 1 : -1)
chart.data = sorted;

chart.colors.list = [am4core.color("#dddddd")];

var category = "Cadena";


// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = category;
categoryAxis.dataFields.logo = "Logo";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.minGridDistance = 30;
categoryAxis.renderer.grid.template.disabled = true;
categoryAxis.renderer.labels.template.disabled = true;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.grid.template.disabled = true;
valueAxis.renderer.labels.template.disabled = true;
valueAxis.renderer.baseGrid.disabled = true;
valueAxis.extraMax = 0.05;


var topContainer = chart.chartContainer.createChild(am4core.Container);
topContainer.layout = "absolute";
topContainer.toBack();
topContainer.paddingBottom = 15;
topContainer.width = am4core.percent(100);

var axisTitle = topContainer.createChild(am4core.Label);
axisTitle.text = "Cuota (%)";
axisTitle.fontWeight = 600;
axisTitle.fontSize = 14;
axisTitle.align = "left";
axisTitle.paddingRight = 100;


// Create series
function createSeries(field) {
  var series = chart.series.push(new am4charts.ColumnSeries());
  series.dataFields.valueY = field;
  series.dataFields.categoryX = category;
  series.columns.template.strokeWidth = 0;
  series.columns.template.column.cornerRadiusBottomRight = 5;
  series.columns.template.column.cornerRadiusTopRight = 5;
  series.columns.template.column.cornerRadiusBottomLeft = 5;
  series.columns.template.column.cornerRadiusTopLeft = 5;
  
  var hoverState = series.columns.template.states.create("hover");
  hoverState.properties.fill = am4core.color("#aaaaaa");
  hoverState.properties.fillOpacity = 0.8;
  hoverState.properties.dy  = -5;

  var bullet = series.bullets.push(new am4charts.Bullet());
  bullet.locationY = 1;
  var image = bullet.createChild(am4core.Image);
  image.propertyFields.href = 'Logo';
  image.width = 30;
  image.height = 30;
  image.dy = -10;
  image.dx = 0;
  image.y = am4core.percent(100);
  image.horizontalCenter = "middle";
  image.verticalCenter = "bottom";

  var valueLabel = series.bullets.push(new am4charts.LabelBullet());
  valueLabel.label.text = "{valueY}";
  valueLabel.label.horizontalCenter = "middle";
  valueLabel.label.dx = 0;
  valueLabel.label.fontSize = 14;
  valueLabel.label.dy = -10;
  valueLabel.label.fill = "#000";
  valueLabel.label.rotation = 0;
  valueLabel.label.hideOversized = true;
  valueLabel.label.truncate = true;
  valueLabel.label.maxWidth = 120;
  valueLabel.label.tooltipText = "{valueY}";
  return series;
}

  createSeries('Cuota (%)', 1);

  jQuery(document).ready(function(){
    jQuery("g[aria-labelledby]").hide();
  })
  
  return chart;
}


var graficoFDS3_show = {"vie": false, "sab": false, "dom": false};

dias.forEach(dia => {

  ScrollReveal().reveal("#grafico-fds-3-" + dia, {
    afterReveal: function activar (el) {
      if(!graficoFDS3_show[dia]) {
        thischart = graficoFDS3(dia);
      }
      graficoFDS3_show[dia] = true;
    },
    afterReset: function activar (el) {
      if(graficoFDS3_show[dia]) {
        
        thischart = null;
        jQuery("#grafico-fds-3-" + dia)[0].innerHTML = "";
      }
      graficoFDS3_show[dia] = false;
    },
    reset: true
  });

});


</script>