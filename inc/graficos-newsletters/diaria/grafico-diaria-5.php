<script>
function  graficoDiaria5() {
  // now all your data is loaded, so you can use it here.
  am4core.useTheme(am4themes_animated);

  // Create chart instance
  var chart = am4core.create("grafico-diaria-5", am4charts.XYChart);

  // Locale
  chart.language.locale = am4lang_es_ES;
  chart.numberFormatter.language = new am4core.Language();
  chart.numberFormatter.language.locale = am4lang_es_ES;
  chart.dateFormatter.language = new am4core.Language();
  chart.dateFormatter.language.locale = am4lang_es_ES;

  enCadenas = (cadena, cadenas) => cadenas.filter( x => x.cadena.toLowerCase().indexOf(cadena.toLowerCase()) > -1 );

  // console.log(datosGraficos);

  // Set data
  input = datosGraficos['Spot de oro - Top3'].map(x => {
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


  input[input.length] = {"Grp’s a formato": input[input.length - 1]["Grp’s a formato"] * 0.08};

  var sorted = input.sort((a, b) => (a['Grp’s a formato'] < b['Grp’s a formato']) ? 1 : -1)
  chart.data = sorted;
  console.log(sorted);

  chart.colors.list = [am4core.color("#dddddd")];

  var category = "Títulos campaña";


  // Create axes
  var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
  categoryAxis.dataFields.category = category;
  categoryAxis.dataFields.logo = "Logo";
  categoryAxis.renderer.grid.template.location = 0;
  categoryAxis.renderer.minGridDistance = 30;
  categoryAxis.renderer.grid.template.disabled = true;
  // categoryAxis.height = 500;

  var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
  valueAxis.renderer.grid.template.disabled = true;
  valueAxis.renderer.labels.template.disabled = true;
  valueAxis.renderer.baseGrid.disabled = true;

  var topContainer = chart.chartContainer.createChild(am4core.Container);
  topContainer.layout = "absolute";
  topContainer.toBack();
  topContainer.paddingBottom = 15;
  topContainer.width = am4core.percent(100);

  var axisTitle = topContainer.createChild(am4core.Label);
  axisTitle.text = "Grp’s a formato";
  axisTitle.fontWeight = 600;
  axisTitle.fontSize = 12;
  axisTitle.align = "left";
  axisTitle.paddingRight = 100;


  // Create series
  function createSeries(field) {
    var series = chart.series.push(new am4charts.ColumnSeries());
    series.dataFields.valueY = field;
    series.dataFields.categoryX = category;
    series.dataFields.emision = "Título emisión";
    series.columns.template.strokeWidth = 0;
    series.columns.template.column.cornerRadiusBottomRight = 5;
    series.columns.template.column.cornerRadiusTopRight = 5;
    series.columns.template.column.cornerRadiusBottomLeft = 5;
    series.columns.template.column.cornerRadiusTopLeft = 5;
    series.columns.template.tooltipText = "{emision}";
    // series.paddingTop = 0;
    // series.name = field;

    var bullet = series.bullets.push(new am4charts.Bullet());
    bullet.locationY = 1;
    var image = bullet.createChild(am4core.Image);
    image.propertyFields.href = 'Logo';
    image.width = 40;
    image.height = 40;
    image.dy = -10;
    image.dx = 0;
    image.y = am4core.percent(100);
    image.horizontalCenter = "middle";
    image.verticalCenter = "bottom";

    var valueLabel = series.bullets.push(new am4charts.LabelBullet());
    valueLabel.label.text = "{valueY}";
    valueLabel.label.horizontalCenter = "middle";
    valueLabel.label.dx = 0;
    valueLabel.label.dy = -10;
    valueLabel.label.fill = "#000";
    valueLabel.label.rotation = 0;
    valueLabel.label.hideOversized = true;
    valueLabel.label.truncate = true;
    valueLabel.label.maxWidth = 120;

    // console.log(bullet);
    // console.log(image);

    return series;
  }

    createSeries('Grp’s a formato', 1);
}

graficoDiaria5();

</script>