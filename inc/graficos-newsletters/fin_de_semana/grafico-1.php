<script>

var dias = [ 'vie', 'sab', 'dom' ];

var sacameDeAqui = false;

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

  const datosGraficosX = datosGraficos;
 // var valsKey = "AM(000)";
	var valsKey = Object.keys(datosGraficosX['Programas - Top10'][1])[1];

	console.log(valsKey)

  // Set data
  if(dia === 'vie') { var input = datosGraficosX['Programas - Top10'].slice( 1,11); dayTitle = 'Viernes'};
  if(dia === 'sab') { var input = datosGraficosX['Programas - Top10'].slice(12,22); dayTitle = 'Sábado'};
  if(dia === 'dom') { var input = datosGraficosX['Programas - Top10'].slice(23,33); dayTitle = 'Domingo'};

	
	
  input = input.map((x, i) => {
    const moreData = x.Cadena !== undefined ? enCadenas(x.Cadena, cadenas) : false;
    // console.log(x);
    x['Título'] = x['Título'].replace(/\//g, " / ") + ' '.repeat(i);
    if (moreData && moreData.length !== 0) {
      x['Cadena'] = moreData[0].cadena.replace(/ *\([^)]*\) */g, "");
      x['Color'] = moreData[0].color;
      x['Logo'] = moreData[0].logo;
    }
    return x;
  });

  var valores = datosGraficosX['Programas - Top10'].filter(x => x[valsKey] !== undefined).map(x => x[valsKey]);
	
// 	console.log('v', valores)

  var max = Math.max(...valores);
  var min = Math.min(...valores);

  // console.log(input);

  // input[input.length] = {valsKey: input[input.length - 1][valsKey] * 0.08};

  var sorted = input.sort((a, b) => (a[valsKey] > b[valsKey]) ? 1 : -1)
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
  categoryAxis.height = 350;
  categoryAxis.width = is_mobile ? 0 : 110;

  if(is_mobile) {
    categoryAxis.renderer.cellStartLocation = 0.15;
    categoryAxis.renderer.cellEndLocation = 0.85;
  }

  var label = categoryAxis.renderer.labels.template;
  label.wrap = true;
  label.maxWidth = is_mobile ? 1550 : 110;
  label.dy = is_mobile ? -15 : 0;
  label.textAlign = is_mobile ? 'left' : 'end'; 
  label.align = is_mobile ? 'left' : 'end'; 

  var categoryAxis2 = chart.yAxes.push(new am4charts.CategoryAxis());
  categoryAxis2.dataFields.category = category;
  categoryAxis2.dataFields.cuota = "Cuota (%)";
  categoryAxis2.renderer.grid.template.location = 0;
  categoryAxis2.renderer.minGridDistance = 30;
  categoryAxis2.renderer.grid.template.disabled = true;
  categoryAxis2.renderer.labels.template.html = "{cuota}";
  categoryAxis2.renderer.labels.template.fontSize = 14;
  categoryAxis2.renderer.opposite = true;
  categoryAxis2.renderer.labels.template.align = 'right'; 
  categoryAxis2.height = 350;

  var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
  valueAxis.renderer.grid.template.disabled = true;
  valueAxis.renderer.labels.template.disabled = true;
  valueAxis.renderer.baseGrid.disabled = true;
  valueAxis.renderer.minGridDistance = 30;
  valueAxis.extraMax = 0.05;
  valueAxis.min = 0;
  valueAxis.max = max;
  
  // console.log(valueAxis);

  // var axisBreak = valueAxis.axisBreaks.create();
  // axisBreak.startValue = max/2 - 100;
  // axisBreak.endValue = max/2 + 100;
  // axisBreak.breakSize = 0.005;

  var topContainer = chart.chartContainer.createChild(am4core.Container);
  topContainer.layout = "absolute";
  topContainer.toBack();
  topContainer.paddingBottom = 15;
  topContainer.width = am4core.percent(100);

  // var diaTitle = topContainer.createChild(am4core.Label);
  // diaTitle.text = dayTitle;
  // diaTitle.fontWeight = 600;
  // diaTitle.fontSize = 16;
  // diaTitle.fill = '#DC241F';
  // diaTitle.align = "left";
  // diaTitle.paddingRight = 100;

  var axisTitle = topContainer.createChild(am4core.Label);
  if(false) {
  // if(dia === 'vie') {
    axisTitle.html = "AM (000) <small class='small-text'><img src='https://www.amcharts.com/lib/images/star.svg'>  Minuto de oro</small>";
  } else {
    axisTitle.html = valsKey;
  }
  axisTitle.fontWeight = 600;
  axisTitle.fontSize = 14;
  axisTitle.align = "left";
  axisTitle.paddingLeft = is_mobile ? 0 : 120;

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
    series.columns.template.events.clickable = false;

    series.columns.template.events.on("hit", function(ev) {
      ev.target.disabled = true;
      // console.log("clicked on ", ev.target);
    }, this);

    var bullet = series.bullets.push(new am4charts.Bullet());
    bullet.locationX = 1;
    var image = bullet.createChild(am4core.Image);
    image.propertyFields.href = 'Logo';
    image.width = 20;
    image.height = 20;
    image.dx = 30;
    image.dy = 10;
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
    valueLabel.label.hideOversized = false;
    valueLabel.label.truncate = true;
    valueLabel.label.maxWidth = 140;
    

    valueLabel.label.adapter.add("dx", function(html, target) {
      if (target.dataItem.valueX < max/2.4) {
        if (target.dataItem._dataContext["Minuto de oro"] !== undefined) {
          return 64;
        } else {
          return 40;
        }
      } else {
        return -10;
      }
    });

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
  createSeries(valsKey, 1);

  return chart;
}

var graficoFDS1_show = {"vie": false, "sab": false, "dom": false};

dias.forEach(dia => {

  ScrollReveal().reveal("#grafico-fds-1-" + dia, {
    afterReveal: function activar (el) {
      if(!graficoFDS1_show[dia]) {
        thischart = graficoFDS1(dia);
      }
      graficoFDS1_show[dia] = true;
    },
    afterReset: function activar (el) {
      if(graficoFDS1_show[dia]) {
        
        thischart = null;
        jQuery("#grafico-fds-1-" + dia)[0].innerHTML = "";
      }
      graficoFDS1_show[dia] = false;
    },
    reset: true
  });

});
  

</script>


