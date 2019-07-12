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
  input = [];
  input = datosGraficos['Cuota por grupos de comunicación'].map(x => {
      const moreData = x.Grupo !== undefined ? enGrupos(x.Grupo, grupos) : false;
      // console.log(x);
      if (moreData.length !== 0) {
        // console.log(moreData)
        x["Cuota (%)"] = x["Cuota (%)"].toString().replace(/,/g, '.');
        x['Grupo'] = moreData[0].grupo.replace(/ *\([^)]*\) */g, "");
        x['Color'] = moreData[0].color;
        x['Logo'] = moreData[0].logo;
        x['Logos'] = moreData[0].logos.map(x => "<img style='width:40px;height:40px;margin:10px' src='"+x+"'>").join().replace(/,/g,'');
      }
      return x;
    }
  ); 
  var sorted = input.sort((a, b) => (Number(a["Cuota (%)"]) > Number(b["Cuota (%)"])) ? 1 : -1);
  sorted = [...sorted.filter( x => x["Grupo"] !== 'Resto'), ...sorted.filter( x => x["Grupo"] === 'Resto')];

  chart.data = sorted;

  chart.innerRadius = am4core.percent(20);
  chart.height = am4core.percent(80);
  chart.valign = "middle";
  chart.align = "left";


  // var num_of_series = 2;
  // var num_of_series = Object.keys(chart.data[0]).length - 1;

  // Add series

  var key = "Cuota (%)";

  series = chart.series.push(new am4charts.PieSeries());

  // Modify chart's colors
  series.colors.list = sorted.map((x) => am4core.color(x["Color"]) );

  series.dataFields.category = "Grupo";
  series.dataFields.value = "Cuota (%)";
  series.dataFields.logo = "Logo";
  series.dataFields.logos = "Logos";
  series.tooltip.getFillFromObject = false;
  series.tooltip.background.fill = am4core.color("#fff");
  series.tooltip.label.interactionsEnabled = true;
  // console.log(series.tooltip);

  series.slices.template.cornerRadius = 10;
  series.slices.template.stroke = am4core.color("#fff");
  series.slices.template.strokeWidth = 3;
  series.slices.template.strokeOpacity = 1;
  series.slices.template.tool = 1;
  series.alignLabels = false;
  series.labels.template.radius = 1;
  // series.labels.template.html = '<span class="tarta-logos-label" data-src={logo}><span class="logo"><image src="{logo}"></image></span><br><span>{value}%</span></span>'; 
  series.labels.template.html = '<body xmlns=\"http://www.w3.org/1999/xhtml\"><span class="tarta-logos-label" data-src={logo}><span class="logo"><img src={logo}></span><br><span>{value}%</span></span></body>';
  series.slices.template.tooltipHTML = "<body xmlns=\"http://www.w3.org/1999/xhtml\"><div class=\"grupo-de-logos\">{logos}</div></body>";


  var bullet = series.bullets.push(new am4charts.Bullet());
  
  bullet.radius = 1;
  var image = bullet.createChild(am4core.Image);
  image.propertyFields.href = 'Logo';
  image.width = 60;
  image.height = 60;


  // Create initial animation
  series.hiddenState.properties.opacity = 1;
  series.hiddenState.properties.endAngle = -90;
  series.hiddenState.properties.startAngle = -90;

  series.ticks.template.disabled = false;
  
  jQuery(document).ready(function(){
    jQuery("g[aria-labelledby]").hide();
  })
}


var graficoDiaria4_show = false;

jQuery('#grafico-diaria-4').waypoint(function() {
  if(!graficoDiaria4_show) {
    graficoDiaria4();
  }
  graficoDiaria4_show = true;
}, {
  offset: '75%'
});



</script>