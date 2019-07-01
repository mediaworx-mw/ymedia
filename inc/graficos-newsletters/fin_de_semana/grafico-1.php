<script>

var star = "<svg xmlns:x=\"http://ns.adobe.com/Extensibility/1.0/\" xmlns:i=\"http://ns.adobe.com/AdobeIllustrator/10.0/\" xmlns:graph=\"http://ns.adobe.com/Graphs/1.0/\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" xmlns:a=\"http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/\" i:viewOrigin=\"146.3721 688.6279\" i:rulerOrigin=\"0 0\" i:pageBounds=\"0 850.3936 850.3936 0\" width=\"557.25\" height=\"527.25\" viewBox=\"0 0 557.25 527.25\" overflow=\"visible\" enable-background=\"new 0 0 557.25 527.25\" xml:space=\"preserve\"> <metadata> <variableSets xmlns=\"http://ns.adobe.com/Variables/1.0/\"> <variableSet varSetName=\"binding1\" locked=\"none\"> <variables/> <sampleDataSets xmlns:v=\"http://ns.adobe.com/Variables/1.0/\"/> </variableSet> </variableSets> <sfw xmlns=\"http://ns.adobe.com/SaveForWeb/1.0/\"> <slices/> <sliceSourceBounds y=\"161.378\" x=\"146.372\" width=\"557.25\" height=\"527.25\" bottomLeftOrigin=\"true\"/> </sfw> </metadata> <g id=\"Ebene_1\" i:layer=\"yes\" i:dimmedPercent=\"50\" i:rgbTrio=\"#4F008000FFFF\"> <g> <g> <defs> <path id=\"XMLID_1_\" d=\"M0,0h557.25v527.25H0V0z\"/> </defs> <clipPath id=\"XMLID_2_\"> <use xlink:href=\"#XMLID_1_\"/> </clipPath> <path i:knockout=\"Off\" clip-path=\"url(#XMLID_2_)\" fill-rule=\"evenodd\" clip-rule=\"evenodd\" fill=\"#ED2224\" d=\"M9.75,200.25      l197.25-6l66.75-184.5l66.75,184.5l196.5,6L381.75,319.5l54.75,188.25L273.75,397.5L111,507.75l54.75-188.25L9.75,200.25z\"/> </g> </g> </g> </svg>";

var dias = [ 'vie', 'sab', 'dom' ];

function  graficoFDS1(dia) {
  // now all your data is loaded, so you can use it here.
  am4core.useTheme(am4themes_animated);
  
  // Create chart instance
  var chart = am4core.create("grafico-fds-1-" + dia, am4charts.XYChart);
  
  // Locale
  chart.language.locale = am4lang_es_ES;
  chart.numberFormatter.language = new am4core.Language();
  chart.numberFormatter.language.locale = am4lang_es_ES;
  chart.dateFormatter.language = new am4core.Language();
  chart.dateFormatter.language.locale = am4lang_es_ES;

  enCadenas = (cadena, cadenas) => cadenas.filter( x => x.cadena.toLowerCase().indexOf(cadena.toLowerCase()) > -1 );

  // Set data
  if(dia === 'vie') { input = datosGraficos['Programas - Top10'].slice( 1,11); }
  if(dia === 'sab') { input = datosGraficos['Programas - Top10'].slice(12,22); }
  if(dia === 'dom') { input = datosGraficos['Programas - Top10'].slice(23,33); }

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

  // console.log(input);

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

  var categoryAxis2 = chart.yAxes.push(new am4charts.CategoryAxis());
  categoryAxis2.dataFields.category = category;
  categoryAxis2.dataFields.cuota = "Cuota (%)";
  categoryAxis2.renderer.grid.template.location = 0;
  categoryAxis2.renderer.minGridDistance = 30;
  categoryAxis2.renderer.grid.template.disabled = true;
  categoryAxis2.renderer.labels.template.html = "{cuota}";
  categoryAxis2.renderer.labels.template.fontSize = 14;
  categoryAxis2.renderer.opposite = true;
  categoryAxis2.height = 500;


  var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
  valueAxis.renderer.grid.template.disabled = true;
  valueAxis.renderer.labels.template.disabled = true;
  valueAxis.renderer.baseGrid.disabled = true;

  var topContainer = chart.chartContainer.createChild(am4core.Container);
  topContainer.layout = "absolute";
  topContainer.toBack();
  topContainer.paddingBottom = 15;
  topContainer.width = am4core.percent(100);

  var axisTitle = topContainer.createChild(am4core.Label);
  axisTitle.text = "AM (000)";
  axisTitle.fontWeight = 600;
  axisTitle.fontSize = 14;
  axisTitle.align = "right";
  axisTitle.paddingRight = 100;

  var dateTitle = topContainer.createChild(am4core.Label);
  dateTitle.text = "Cuota (%)";
  dateTitle.fontWeight = 600;
  dateTitle.fontSize = 14;
  dateTitle.align = "right";
  dateTitle.dy = "right";

 
  // Create series
  function createSeries(field) {
    var series = chart.series.push(new am4charts.ColumnSeries());
    series.dataFields.valueX = field;
    series.dataFields.categoryY = category;
    series.dataFields.minOro = "Minuto de oro";
    series.dataFields.minOroValue = "Valor";
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
    imageEstrella.tooltipHTML = "<div style=\"text-align:center;font-size:1.5em\"><h4>Minuto de oro:</h4><p><span>{minOro}h</span><br><span>{minOroValue}</span></p></div>";

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

  createSeries('AM (000)', 1);

}


var graficoFDS1_show = {"vie": false, "sab": false, "dom": false};

dias.forEach(dia => {
  jQuery("#grafico-fds-1-" + dia).waypoint(function() {
    if(!graficoFDS1_show[dia]) {
      graficoFDS1(dia);
    }
    graficoFDS1_show[dia] = true;
  }, {
    offset: '75%'
  });
});
  

</script>


