<script>
function  graficoInversion2() {
  // now all your data is loaded, so you can use it here.
  am4core.useTheme(am4themes_animated);

  // Create chart instance
  var chart = am4core.create("grafico-inversion-2", am4charts.PieChart);

  // Locale
  chart.language.locale = am4lang_es_ES;
  chart.numberFormatter.language = new am4core.Language();
  chart.numberFormatter.language.locale = am4lang_es_ES;
  chart.dateFormatter.language = new am4core.Language();
  chart.dateFormatter.language.locale = am4lang_es_ES;

  // Make the chart fade-in on init
  chart.hiddenState.properties.opacity = 0;


  enGrupos = (grupo, grupos) => grupos.filter( x => x.grupo.toLowerCase().indexOf(grupo.toLowerCase()) > -1 );
  clean = (valor) => valor !== undefined ? Number(valor.toString().replace(/\./g, '').replace(/,/g, '.').replace(/%/g, '')) : 0;

  // Set data
  key = Object.keys(datosGraficos['Televisión'][0])[1];
  input = [];
  input = datosGraficos['Televisión'].map(x => {
      const moreData = x.Medio !== undefined ? enGrupos(x.Medio, grupos) : false;
      // console.log(x);
      if (moreData && moreData.length !== 0) {
        console.log(x)
        x['Medio'] = moreData[0].grupo.replace(/ *\([^)]*\) */g, "");
        // x['Logo'] = moreData[0].logo;
      } 
      x[key] = clean(x[key]);
      
      // x['Evolución'] = x['Evolución'].toString().replace(/,/g, '.').replace(/%/g, '');
      x['Color'] = x['TV nacional en abierto'] !== undefined ? '#DC241F' : '#999999';
      return x;
    }
  ); 

  console.log(key);

  // var sorted = input.sort((a, b) => (Number(a[key]) < Number(b[key])) ? 1 : -1);
  // sorted = [...sorted.filter( x => x["Medio"] !== 'Resto TV nacional abierto'), ...sorted.filter( x => x["Medio"] === 'Resto TV nacional abierto')];
  sorted = input;

  chart.data = sorted;

  // console.log(sorted);

  chart.innerRadius = am4core.percent(40);
  chart.height = am4core.percent(70);
  chart.valign = "middle";
  chart.align = "left";

  chart.startAngle = 180;
  chart.endAngle = 360;


  // Add series

  series = chart.series.push(new am4charts.PieSeries());

  // Modify chart's colors
  series.colors.list = sorted.map((x) => am4core.color(x["Color"]) );

  series.dataFields.category = "Medio";
  series.dataFields.value = key;
  series.dataFields.logo = "Logo";
  series.dataFields.logos = "Logos";
  series.dataFields.evo = "Evolución";
  series.tooltip.getFillFromObject = false;
  series.tooltip.background.fill = am4core.color("#fff");
  series.tooltip.label.interactionsEnabled = false;
  // console.log(series.tooltip);

  series.slices.template.cornerRadius = 10;
  series.slices.template.stroke = am4core.color("#fff");
  series.slices.template.strokeWidth = 3;
  series.slices.template.strokeOpacity = 1;
  series.slices.template.tool = 1;
  series.alignLabels = false;
  // series.labels.template.radius = 1;
  series.labels.template.html = '<span style="font-size:14px">{category}<br><span>{value}</span></span>'; 
  // series.labels.template.html = '<body xmlns=\"http://www.w3.org/1999/xhtml\"><span class="tarta-logos-label" data-src={logo}><span class="logo"><img src={logo}></span><br><span>{value}%</span></span></body>';
  series.slices.template.tooltipHTML = "<div style=\"text-align:center;font-size:1.5em\"><br><h6>Evolución vs año <br> anterior:</h6><p><span>{evo}</span><br></p></div>";

  series.hiddenState.properties.endAngle = 180;
  // series.hiddenState.properties.endAngle = 280;

  var bullet = series.bullets.push(new am4charts.Bullet());
  
  bullet.radius = 1;
  var image = bullet.createChild(am4core.Image);
  image.propertyFields.href = 'Logo';
  image.width = 60;
  image.height = 60;


  // Create initial animation
  // series.hiddenState.properties.opacity = 1;
  // series.hiddenState.properties.endAngle = -90;
  // series.hiddenState.properties.startAngle = -90;

  series.ticks.template.disabled = false;
  
  var legend = new am4charts.Legend();
  legend.parent = chart.chartContainer;
  // legend.background.fill = am4core.color("#000");
  // legend.background.fillOpacity = 0.05;
  // legend.width = 120;
  legend.valign = "bottom";
  legend.dy = 50;
  legend.data = [{
    "name": "Televisión Nacional en Abierto",
    "fill": "#DC241F"
    },
    {
      "name": "Otras Tipologías de Televisión", 
      "fill": "#999999" 
    }
  ];

  jQuery(document).ready(function(){
    //jQuery("g[aria-labelledby]:not(g[aria-controls])").hide();jQuery("g[aria-labelledby]:not(g[aria-controls])").hide();
  })
}


var graficoInversion2_show = false;

ScrollReveal().reveal("#grafico-inversion-2", {
  afterReveal: function activar (el) {
    if(!graficoInversion2_show) {
      thischart = graficoInversion2();
    }
    graficoInversion2_show = true;
  },
  afterReset: function activar (el) {
    if(graficoInversion2_show) {
      
      thischart = null;
      jQuery("#grafico-inversion-2")[0].innerHTML = "";
    }
    graficoInversion2_show = false;
  },
  reset: true
});

</script>