<script>

function  graficoMensual4() {
  // now all your data is loaded, so you can use it here.
  am4core.useTheme(am4themes_animated);
  
  // Create chart instance
  var chart = am4core.create("grafico-mensual-4", am4charts.XYChart);
  
  // Locale
  chart.language.locale = am4lang_es_ES;
  chart.numberFormatter.language = new am4core.Language();
  chart.numberFormatter.language.locale = am4lang_es_ES;
  chart.dateFormatter.language = new am4core.Language();
  chart.dateFormatter.language.locale = am4lang_es_ES;

  enCadenas = (cadena, cadenas) => cadenas.filter( x => x.cadena.toLowerCase().indexOf(cadena.toLowerCase()) > -1 );

  // Set data
  input = [];
  input = datosGraficos['Programas - Top10'].map((x, i) => {
    const moreData = x.Cadena !== undefined ? enCadenas(x.Cadena, cadenas) : false;
    // console.log(x);
    x['Título/Descripción'] = x['Título/Descripción'].replace(/\//g, " / ") + ' '.repeat(i);
    
    if (moreData && moreData.length !== 0) {
      // x["Cuota (%)"] = x["Cuota (%)"];
      x['Cadena'] = moreData[0].cadena.replace(/ *\([^)]*\) */g, "").toUpperCase();
      x['Color'] = moreData[0].color;
      x['Logo'] = moreData[0].logo;
    }
    return x;
  });


  input[input.length] = {"AM(000)": input[input.length - 1]["AM(000)"] * 0.08};

  var sorted = input.sort((a, b) => (a['AM(000)'] > b['AM(000)']) ? 1 : -1)
  chart.data = sorted;

  // console.log(chart.data);

  chart.colors.list = [am4core.color("#dddddd")];

  var category = "Título/Descripción";


  // Create axes
  var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
  categoryAxis.dataFields.category = category;
  categoryAxis.dataFields.logo = "Logo";
  categoryAxis.renderer.grid.template.location = 0;
  categoryAxis.renderer.minGridDistance = 30;
  categoryAxis.renderer.grid.template.disabled = true;
  categoryAxis.height = 500;

  var label = categoryAxis.renderer.labels.template;
  label.wrap = true;
  label.maxWidth = 110;
  label.textAlign = 'end';

  var categoryAxis3 = chart.yAxes.push(new am4charts.CategoryAxis());
  categoryAxis3.dataFields.category = category;
  categoryAxis3.dataFields.emisiones = "Emisiones";
  categoryAxis3.renderer.grid.template.location = 0;
  categoryAxis3.renderer.minGridDistance = 30;
  categoryAxis3.renderer.grid.template.disabled = true;
  categoryAxis3.renderer.labels.template.html = "{emisiones}";
  categoryAxis3.renderer.labels.template.fontSize = 14;
  categoryAxis3.renderer.opposite = true;
  categoryAxis3.height = 500;

  var categoryAxis2 = chart.yAxes.push(new am4charts.CategoryAxis());
  categoryAxis2.dataFields.category = category;
  categoryAxis2.dataFields.cuota = "Cuota";
  categoryAxis2.renderer.grid.template.location = 0;
  categoryAxis2.renderer.minGridDistance = 30;
  categoryAxis2.renderer.grid.template.disabled = true;
  categoryAxis2.renderer.labels.template.html = "{cuota}";
  categoryAxis2.renderer.labels.template.fontSize = 14;
  categoryAxis2.renderer.opposite = true;
  categoryAxis2.renderer.dx = -70;
  categoryAxis2.height = 500;


  var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
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
  axisTitle.html = "AM(000) <small class='small-text'><img src='https://www.amcharts.com/lib/images/star.svg'>  Minuto de oro</small>";
  axisTitle.fontWeight = 600;
  axisTitle.fontSize = 14;
  axisTitle.align = "left";
  axisTitle.paddingLeft = 110;

  var dateTitle = topContainer.createChild(am4core.Label);
  dateTitle.text = "Cuota (%)";
  dateTitle.fontWeight = 600;
  dateTitle.fontSize = 14;
  dateTitle.align = "right";
  dateTitle.dx = -100;

  var emiTitle = topContainer.createChild(am4core.Label);
  emiTitle.text = "Emisiones";
  emiTitle.fontWeight = 600;
  emiTitle.fontSize = 14;
  emiTitle.align = "right";

 
  // Create series
  function createSeries(field) {
    var series = chart.series.push(new am4charts.ColumnSeries());
    series.dataFields.valueX = field;
    series.dataFields.categoryY = category;
    series.dataFields.minOro = "Minuto de oro";
    series.dataFields.minOroValue = "Valor";
    series.dataFields.minOroDia = "Día";
    series.columns.template.strokeWidth = 0;
    series.columns.template.column.cornerRadiusBottomRight = 5;
    series.columns.template.column.cornerRadiusTopRight = 5;
    series.columns.template.column.cornerRadiusBottomLeft = 5;
    series.columns.template.column.cornerRadiusTopLeft = 5;
    series.tooltip.pointerOrientation = "vertical";
    series.tooltip.dy = -10;

    var bullet = series.bullets.push(new am4charts.Bullet());
    bullet.locationX = 1;
    var image = bullet.createChild(am4core.Image);
    image.propertyFields.href = 'Logo';
    image.width = 30;
    image.height = 30;
    image.dx = 45;
    image.dy = 15;
    image.horizontalCenter = "right";
    image.verticalCenter = "bottom";

    var hoverState = series.columns.template.states.create("hover");
    hoverState.properties.fill = am4core.color("#aaaaaa");
    hoverState.properties.fillOpacity = 0.8;
    hoverState.properties.dx  = 5;
    
    var valueLabel = series.bullets.push(new am4charts.LabelBullet());
    valueLabel.label.html = "{valueX}";
    valueLabel.label.horizontalCenter = "right";
    valueLabel.label.dx = -10;
    valueLabel.label.fill = "#000";
    valueLabel.label.fontSize = 14;
    valueLabel.label.rotation = 0;
    valueLabel.label.hideOversized = true;
    valueLabel.label.truncate = true;
    valueLabel.label.maxWidth = 140;

    var estrella = series.bullets.push(new am4charts.Bullet());
    estrella.locationX = 0;
    var imageEstrella = estrella.createChild(am4core.Image);
    imageEstrella.href = "";
    imageEstrella.width = 30;
    imageEstrella.height = 30;
    imageEstrella.dx = 25;
    imageEstrella.dy = 15;
    imageEstrella.horizontalCenter = "right";
    imageEstrella.verticalCenter = "bottom";
    // imageEstrella.tooltip.getFillFromObject = false;
    // imageEstrella.tooltip.background.fill = am4core.color("#fff");
    // console.log(imageEstrella);
    imageEstrella.tooltipHTML = "<div style=\"text-align:center;font-size:1.5em\"><br><h5>Minuto de oro:</h5><p><span>{minOroDia}</span><br><span>{minOro}h</span><br><span>{minOroValue}</span></p></div>";

    imageEstrella.adapter.add("href", function(html, target) {
      if (target.dataItem._dataContext["Minuto de oro"] !== undefined) {
        var href = "https://www.amcharts.com/lib/images/star.svg";
        return href;
      } else {
        return ;
      }
    });
    
    return series;
  }

  createSeries('AM(000)', 1);

  var cellSize = 65;
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

  
  jQuery(document).ready(function(){
    jQuery("g[aria-labelledby]").hide();
  })
}

var graficoMensual4_show = false;

jQuery('#grafico-mensual-4').waypoint(function() {
  if(!graficoMensual4_show) {
    graficoMensual4();
  }
  graficoMensual4_show = true;
}, {
  offset: '75%'
});

</script>


