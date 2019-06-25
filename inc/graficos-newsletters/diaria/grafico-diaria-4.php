<script>
function  graficoDiaria4() {
  // now all your data is loaded, so you can use it here.
  am4core.useTheme(am4themes_animated);

  // Create chart instance
  var chart = am4core.create("grafico-diaria-4", am4charts.PieChart);

  // Locale
  chart.language.locale = am4lang_es_ES;
  chart.numberFormatter.language = new am4core.Language();
  chart.numberFormatter.language.locale = am4lang_es_ES;
  chart.dateFormatter.language = new am4core.Language();
  chart.dateFormatter.language.locale = am4lang_es_ES;

  // Make the chart fade-in on init
  chart.hiddenState.properties.opacity = 0;


  enGrupos = (grupo, grupos) => grupos.filter( x => x.grupo.toLowerCase().indexOf(grupo.toLowerCase()) > -1 );

  // Set data
  input = datosGraficos['Cuota por grupos de comunicación'].map(x => {
      const moreData = x.Grupo !== undefined ? enGrupos(x.Grupo, grupos) : false;
      // console.log(x);
      if (moreData) {
        x['Grupo'] = moreData[0].grupo.replace(/ *\([^)]*\) */g, "");
        x['Color'] = moreData[0].color;
        x['Logo'] = moreData[0].logo;
        x['Logos'] = moreData[0].logos.map(x => "<img style='width:40px;height:40px;margin:10px' src='"+x+"'>").join().replace(/,/g,'');
      }
      return x;
    }
  ); 
  var sorted = input.sort((a, b) => (a[Object.keys(input[0])[1]] > b[Object.keys(input[0])[1]]) ? 1 : -1);
  chart.data = sorted;
  chart.innerRadius = am4core.percent(20);
  // console.log(sorted);
  chart.height = am4core.percent(80);
  chart.valign = "middle";
  chart.align = "left";


  // var num_of_series = 2;
  var num_of_series = Object.keys(chart.data[0]).length - 1;

  // Add series

  var key = Object.keys(chart.data[0])[1];

  series = chart.series.push(new am4charts.PieSeries());

  // Modify chart's colors
  series.colors.list = sorted.map((x) => am4core.color(x["Color"]) );

  series.dataFields.category = Object.keys(chart.data[0])[0];
  series.dataFields.value = Object.keys(chart.data[0])[1];
  series.dataFields.logo = "Logo";
  series.dataFields.logos = "Logos";
  series.tooltip.getFillFromObject = false;
  series.tooltip.background.fill = am4core.color("#fff");
  // console.log(series.tooltip);

  series.slices.template.cornerRadius = 10;
  series.slices.template.stroke = am4core.color("#fff");
  series.slices.template.strokeWidth = 3;
  series.slices.template.strokeOpacity = 1;
  series.slices.template.tool = 1;
  series.alignLabels = false;
  series.labels.template.radius = 1;
  series.labels.template.html = '<span style="position:relative;display:block;text-align:center"><img src={logo} style="width:60px;height:60px"><br><span>{value}%</span></span>';
  series.slices.template.tooltipHTML = "<div>{logos}</div>";


  var bullet = series.bullets.push(new am4charts.Bullet());
  // console.log(series.slices.template);
  // console.log(bullet);
  
  bullet.radius = 1;
  var image = bullet.createChild(am4core.Image);
  image.propertyFields.href = 'Logo';
  image.width = 60;
  image.height = 60;
  // console.log(image);
  // image.dx = -60;
  // image.dy = 15;
  // image.x = am4core.percent(100);
  // image.horizontalCenter = "middle";
  // image.verticalCenter = "bottom";

  // var valueLabel = series.bullets.push(new am4charts.LabelBullet());
  // valueLabel.label.text = "{valueX}";
  // valueLabel.label.horizontalCenter = "right";
  // valueLabel.label.dx = -10;
  // valueLabel.label.fill = "#000";
  // valueLabel.label.rotation = 0;
  // valueLabel.label.hideOversized = true;
  // valueLabel.label.truncate = true;
  // valueLabel.label.maxWidth = 120;
  // valueLabel.label.tooltipText = "{valueX}";

  image.adapter.add("href", function(html, target) {
    // console.log(html)
    // if (target.dataItem._dataContext["Minuto de oro"] !== undefined) {
    //   var href = "https://www.amcharts.com/lib/images/star.svg";
    //   return href;
    // } else {
    //   return ;
    // }
  });

  // Create initial animation
  series.hiddenState.properties.opacity = 1;
  series.hiddenState.properties.endAngle = -90;
  series.hiddenState.properties.startAngle = -90;

  series.ticks.template.disabled = false;

}

graficoDiaria4();

</script>