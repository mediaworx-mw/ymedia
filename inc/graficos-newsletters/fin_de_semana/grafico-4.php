<script>
var dias = [ 'vie', 'sab', 'dom' ];
var grafico_fds_4_last = [];
function  graficoFDS4(dia) {
  // now all your data is loaded, so you can use it here.
  am4core.useTheme(am4themes_animated);

  // Create chart instance
  var chart = am4core.create("grafico-fds-4-" + dia, am4charts.PieChart);

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
  const datosGraficosX = datosGraficos;

  // Set data
  if(dia === 'vie') { input = datosGraficosX['Cuota por grupos de com. - VIE']; }
  if(dia === 'sab') { input = datosGraficosX['Cuota por grupos de com. - SAB']; }
  if(dia === 'dom') { input = datosGraficosX['Cuota por grupos de com. - DOM']; }

  input = input.map(x => {
      const moreData = x.Grupo !== undefined ? enGrupos(x.Grupo, grupos) : false;
      // console.log(x);
      if (moreData && moreData.length !== 0) {
        // console.log(moreData)
        x["Cuota (%)"] = x["Cuota (%)"].toString().replace(/,/g, '.').replace(/%/g, '');
        x['Grupo'] = moreData[0].grupo.replace(/ *\([^)]*\) */g, "");
        x['Color'] = moreData[0].color;
        x['Logo'] = moreData[0].logo;
        x['Logos'] = moreData[0].logos.map(x => "<img style='width:30px;height:30px;margin:10px' src='"+x+"'>").join().replace(/,/g,'');
      }
      return x;
    }
  );

  var sorted = input.sort((a, b) => (Number(a["Cuota (%)"]) < Number(b["Cuota (%)"])) ? 1 : -1);
  sorted = [...sorted.filter( x => x["Grupo"] !== 'Resto'), ...sorted.filter( x => x["Grupo"] === 'Resto')];

  // console.log(sorted);

  chart.data = sorted;
  chart.innerRadius = is_mobile ? am4core.percent(10) : am4core.percent(10);
  chart.height = is_mobile ? am4core.percent(60) : am4core.percent(80);
  chart.valign = "middle";
  chart.align = "left";

  // var topContainer = chart.chartContainer.createChild(am4core.Container);
  // topContainer.layout = "absolute";
  // topContainer.toBack();
  // topContainer.paddingBottom = 15;
  // topContainer.width = am4core.percent(100);

  // var dateTitle = topContainer.createChild(am4core.Label);
  // dateTitle.text = "Cuota (%)";
  // dateTitle.fontWeight = 600;
  // dateTitle.fontSize = 14;
  // dateTitle.align = "left";
  // dateTitle.dy = "left";


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
  series.tooltip.label.interactionsEnabled = false;
  // console.log(series.tooltip);

  series.slices.template.radius = 20;
  series.slices.template.cornerRadius = 10;
  series.slices.template.stroke = am4core.color("#fff");
  series.slices.template.strokeWidth = 1;
  series.slices.template.strokeOpacity = 1;
  series.slices.template.tool = 1;
  series.alignLabels = false;
  series.labels.template.radius = 0.5;
  series.labels.template.html = '<span data-value="{value}" class="tarta-logos-label" data-src={logo}><span class="logo"><img src={logo}></span><br><span>{value}%</span></span>';
  series.slices.template.tooltipHTML = "<div class=\"grupo-de-logos\">{logos}</div>";

  // var bullet = series.bullets.push(new am4charts.Bullet());
  
  // bullet.radius = 1;
  // var image = bullet.createChild(am4core.Image);
  // image.propertyFields.href = 'Logo';
  // image.width = 30;
  // image.height = 30;


  // Create initial animation
  series.hiddenState.properties.opacity = 1;
  series.hiddenState.properties.endAngle = -90;
  series.hiddenState.properties.startAngle = -90;
  
  var values = false;

  series.slices.template.events.on("beforevalidated", function(ev) {
    
    if (!values) {
      values = jQuery("#grafico-fds-4-" + dia + " span[data-value]");
      grafico_fds_4_last[dia] = jQuery(values[values.length - 2]);
      console.log(values, grafico_fds_4_last);
      jQuery(grafico_fds_4_last[dia][0]).css('transform', 'translate(15px, -3px)');
    }

  });


  
  return chart;
}

var graficoFDS4_show = {"vie": false, "sab": false, "dom": false};

dias.forEach(dia => {

  ScrollReveal().reveal("#grafico-fds-4-" + dia, {
    afterReveal: function activar (el) {
      if(!graficoFDS4_show[dia]) {
        thischart = graficoFDS4(dia);
      }
      graficoFDS4_show[dia] = true;
    },
    afterReset: function activar (el) {
      if(graficoFDS4_show[dia]) {
        
        thischart = null;
        jQuery("#grafico-fds-4-" + dia)[0].innerHTML = "";
      }
      graficoFDS4_show[dia] = false;
    },
    reset: true
  });

});


</script>