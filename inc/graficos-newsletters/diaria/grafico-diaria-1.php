<script>
// now all your data is loaded, so you can use it here.
am4core.useTheme(am4themes_animated);

// Create chart instance
var chart = am4core.create("grafico-diaria-1", am4charts.XYChart);

// Locale
chart.language.locale = am4lang_es_ES;
chart.numberFormatter.language = new am4core.Language();
chart.numberFormatter.language.locale = am4lang_es_ES;
chart.dateFormatter.language = new am4core.Language();
chart.dateFormatter.language.locale = am4lang_es_ES;

enCadenas = (cadena, cadenas) => cadenas.filter( x => x.cadena.toLowerCase().indexOf(cadena.toLowerCase()) > -1 );

// Set data
input = datosGraficos['Programas - Top10'].map(x => {
    const moreData = x.Cadena !== undefined ? enCadenas(x.Cadena, cadenas) : false;
    // console.log(x);
    if (moreData) {
      x['Cadena'] = moreData[0].cadena.replace(/ *\([^)]*\) */g, "");
      x['Color'] = moreData[0].color;
      x['Logo'] = moreData[0].logo;
    }
    return x;
  }
);



// input[input.length] = {"AM (000)": 1500};
input[input.length] = {"AM (000)": input[input.length - 1]["AM (000)"] * 0.08};

var sorted = input.sort((a, b) => (a['AM (000)'] > b['AM (000)']) ? 1 : -1)
chart.data = sorted;

chart.colors.list = [am4core.color("#dddddd")];

var category = "Título";


// Create axes
var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = category;
categoryAxis.dataFields.logo = "Logo";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.minGridDistance = 30;
categoryAxis.renderer.grid.template.disabled = true;
categoryAxis.height = 500;

var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.grid.template.disabled = true;
valueAxis.renderer.labels.template.disabled = true;

var topContainer = chart.chartContainer.createChild(am4core.Container);
topContainer.layout = "absolute";
topContainer.toBack();
topContainer.paddingBottom = 15;
topContainer.width = am4core.percent(100);

var axisTitle = topContainer.createChild(am4core.Label);
axisTitle.text = "AM (000)";
axisTitle.fontWeight = 600;
axisTitle.fontSize = 12;
axisTitle.align = "right";
axisTitle.paddingRight = 100;

var dateTitle = topContainer.createChild(am4core.Label);
dateTitle.text = "Cuota (%)";
dateTitle.fontWeight = 600;
dateTitle.fontSize = 12;
dateTitle.align = "right";
dateTitle.dy = "right";

var cuotas = [];

for(i = 0; i < sorted.length; i++) {
  cuotas[i] = topContainer.createChild(am4core.Label);
  cuotas[i].text = sorted[sorted.length - i - 1]['Cuota (%)'];
  cuotas[i].fontWeight = 600;
  cuotas[i].fontSize = 12;
  cuotas[i].width = 50;
  cuotas[i].align = "right";
  cuotas[i].dy = 45 + i * 46;
  cuotas[i].dx = 10;
  cuotas[i].relativeX = 0;
  // console.log(cuotas[i]);
}


// Create series
function createSeries(field) {
  var series = chart.series.push(new am4charts.ColumnSeries());
  series.dataFields.valueX = field;
  series.dataFields.categoryY = category;
  series.columns.template.strokeWidth = 0;
  series.columns.template.column.cornerRadiusBottomRight = 5;
  series.columns.template.column.cornerRadiusTopRight = 5;
  series.columns.template.column.cornerRadiusBottomLeft = 5;
  series.columns.template.column.cornerRadiusTopLeft = 5;
  // series.paddingTop = 0;
  // series.name = field;

  var bullet = series.bullets.push(new am4charts.Bullet());
  var image = bullet.createChild(am4core.Image);
  image.propertyFields.href = 'Logo';
  image.width = 30;
  image.height = 30;
  image.dx = -60;
  image.dy = 15;
  image.x = am4core.percent(100);
  image.horizontalCenter = "middle";
  image.verticalCenter = "bottom";

  var valueLabel = series.bullets.push(new am4charts.LabelBullet());
  valueLabel.label.text = "{valueX}";
  valueLabel.label.horizontalCenter = "right";
  valueLabel.label.dx = -10;
  valueLabel.label.fill = "#000";
  valueLabel.label.rotation = 0;
  valueLabel.label.hideOversized = true;
  valueLabel.label.truncate = true;
  valueLabel.label.maxWidth = 120;
  valueLabel.label.tooltipText = "{valueX}";

  // console.log(bullet);
  // console.log(image);

  return series;
}

  createSeries('AM (000)', 1);

</script>