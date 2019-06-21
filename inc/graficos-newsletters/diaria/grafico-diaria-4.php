<script>
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
    }
    return x;
  }
);
var sorted = input.sort((a, b) => (a[Object.keys(input[0])[1]] > b[Object.keys(input[0])[1]]) ? 1 : -1);
chart.data = sorted;
chart.innerRadius = am4core.percent(20);


// var num_of_series = 2;
var num_of_series = Object.keys(chart.data[0]).length - 1;

// Add series
for (var series = [], i = 0; i < 1; i++) {

  var key = Object.keys(chart.data[0])[i + 1];


    series[i] = chart.series.push(new am4charts.PieSeries());

    // Modify chart's colors
    series[i].colors.list = sorted.map((x) => am4core.color(x["Color"]) );

    series[i].dataFields.category = Object.keys(chart.data[0])[0];
    series[i].dataFields.value = Object.keys(chart.data[0])[i + 1];

    if (num_of_series === 1 && radio_variable) {
      series[i].dataFields.radiusValue = Object.keys(chart.data[0])[i + 1];
    }

    series[i].slices.template.cornerRadius = 10;
    series[i].slices.template.stroke = am4core.color("#fff");
    series[i].slices.template.strokeWidth = 5;
    series[i].slices.template.strokeOpacity = 1;

    // Create initial animation
    series[i].hiddenState.properties.opacity = 1;
    series[i].hiddenState.properties.endAngle = -90;
    series[i].hiddenState.properties.startAngle = -90;


    series[i].ticks.template.disabled = false;

  // }
}


</script>