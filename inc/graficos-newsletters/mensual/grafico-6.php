<script>

var dias = [ 'lv', 'sd' ];


function  graficoMensual6(dia, datosGraficos) {
  // console.log('graficoMensual6', datosGraficos);

  // console.log('wat1', dia);
  // now all your data is loaded, so you can use it here.
  am4core.useTheme(am4themes_animated);
  
  // Create chart instance
  var chart = am4core.create("grafico-mensual-6-" + dia, am4charts.PieChart);
  
  // Locale
  chart.language.locale = am4lang_es_ES;
  chart.numberFormatter.language = new am4core.Language();
  chart.numberFormatter.language.locale = am4lang_es_ES;
  chart.dateFormatter.language = new am4core.Language();
  chart.dateFormatter.language.locale = am4lang_es_ES;

  enGrupos = (grupo, grupos) => grupos.filter( x => x.grupo.toLowerCase().indexOf(grupo.toLowerCase()) > -1 );
  clean = (valor) => valor !== undefined ? Number(valor.toString().replace(/\./g, '').replace(/,/g, '.').replace(/%/g, '')) : 0;

  // Set data
  if(dia === 'lv') { 
    var input = datosGraficos['Presión publicitaria por grupos'].slice(1); 
    var dayTitle = datosGraficos['Presión publicitaria por grupos'][0]['Categoría'] 
  };
  if(dia === 'sd') { 
    var input = datosGraficos['Presión publicitaria por grupos (acumulado)'].slice(1); 
    var dayTitle = datosGraficos['Presión publicitaria por grupos (acumulado)'][0]['Categoría'] 
  };

  jQuery(".grafico-mensual-6-" + dia + "-title")[0].innerText = dayTitle[0].toUpperCase() + dayTitle.slice(1);

  var col1 = Object.keys(input[0])[1];
  var col2 = Object.keys(input[0])[2];

  // console.log(col1,col2,col2);

  input = input.map(x => {
    const moreData = x['Categoría'] !== undefined ? enGrupos(x['Categoría'], grupos) : false;
    // console.log(x);
    if (moreData && moreData.length !== 0) {
      x[col1] = clean(x[col1]);
      x[col2] = clean(x[col2]);
      x['Categoría'] = moreData[0].grupo.replace(/ *\([^)]*\) */g, "");
      x['Color'] = moreData[0].color;
      x['Logo'] = moreData[0].logo;
    }
    return x;
  });

  
  var sorted = input.sort((a, b) => (Number(a[col1]) < Number(b[col1])) ? 1 : -1);
  sorted = [...sorted.filter( x => x["Grupo"] !== 'Resto'), ...sorted.filter( x => x["Grupo"] === 'Resto')];

  // console.log(sorted);

  chart.data = sorted;
  chart.innerRadius = am4core.percent(10);
  // console.log(sorted);
  chart.height = am4core.percent(70);
  chart.valign = "middle";
  chart.align = "left";


  // var num_of_series = 2;
  var num_of_series = Object.keys(chart.data[0]).length - 1;

  // Add series

  var key = Object.keys(chart.data[0])[1];

  var series = chart.series.push(new am4charts.PieSeries());

  // Modify chart's colors
  series.colors.list = sorted.map((x) => am4core.color(x["Color"]) );

  series.dataFields.category = Object.keys(chart.data[0])[0];
  series.dataFields.value = Object.keys(chart.data[0])[1];
  series.dataFields.logo = "Logo";
  series.dataFields.logos = "Logos";
  series.dataFields.evo = "Evolución";
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
  series.labels.template.radius = 1;
  series.labels.template.html = '<span class="tarta-logos-label" data-src={logo}><span class="logo"><img src={logo}></span><br><span>{value}%</span></span>';
  series.slices.template.tooltipHTML = "<div style=\"text-align:center;font-size:1.5em\"><br><h6>Evolución vs año <br> anterior:</h6><p><span>{evo}%</span><br></p></div>";

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

  // series.ticks.template.disabled = false;



  return chart;
}


var graficoMensual6_show = {"lv": false, "sd": false};

dias.forEach(dia => {

  ScrollReveal().reveal("#grafico-mensual-6-" + dia, {
    afterReveal: function activar (el) {
      if(!graficoMensual6_show[dia]) {
        thischart = graficoMensual6(dia, datosGraficos);
        graficoMensual6_show[dia] = true;
      }
    },
    afterReset: function activar (el) {
      if(graficoMensual6_show[dia] && thischart !== null) {
        thischart.dispose();
        thischart = null;
        jQuery("#grafico-mensual-6-" + dia)[0].innerHTML = "";
      }
      graficoMensual6_show[dia] = false;
    },
    reset: false
  });

});
  

</script>