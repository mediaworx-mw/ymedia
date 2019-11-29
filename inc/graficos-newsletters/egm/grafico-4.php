<script>

function  graficoEGM4() {
  am4core.ready(function() {

    enMedios = (medio, medios) => medios.filter( x => x.medio.toLowerCase().indexOf(medio.toLowerCase()) > -1 );
    clean = (valor) => valor !== undefined ? Number(valor.toString().replace(/\./g, '').replace(/,/g, '.').replace(/%/g, '')) : 0;


    var input = datosGraficos["DiariosRegion"];
    
    temp = input;

    // totalPercent = "3º EGM '19.";
    totalPercent = Object.keys(temp[1])[2];

    var total = clean(input[0][totalPercent]);

    input.splice(18, 1);
    input.splice(0, 1);

    var regiones = [{
      "latitude": 40.916775,
      "longitude": -3.703790,
      "label": "Madrid",
      "id": "ES-MD"
      },
      {
      "latitude": 37.5268359,
      "longitude": -5.3327162,
      "label": "Andalucía",
      "id": "ES-AN"
      },
    {
      "latitude": 41.3825602,
      "longitude": -0.8545633,
      "label": "Aragón",
      "id": "ES-AR"
    }, {
      "latitude": 43.3,
      "longitude": -6,
      "label": "Asturias",
      "id": "ES-AS"
    }, {
      "latitude": 39.65,
      "longitude": 2.862209,
      "label": "Baleares",
      "id": "ES-IB"
    }, {
      "latitude": 43.1899446,
      "longitude": -4.2134698,
      "label": "Cantabria",
      "id": "ES-CB"
    }, {
      "latitude": 41.657148,
      "longitude": -5.5472266,
      "label": "Castilla/León",
      "id": "ES-CL"
    }, {
      "latitude": 39.6717618,
      "longitude": -3.2820203,
      "label": "Castilla/Mancha",
      "id": "ES-CM"
    }, {
      "latitude": 42.1,
      "longitude": 1.750000,
      "label": "C.Catalana",
      "id": "ES-CT"
    }, {
      "latitude": 39.2105954,
      "longitude": -6.3173371,
      "label": "Extremadura",
      "id": "ES-EX"
    }, {
      "latitude": 43,
      "longitude": -8,
      "label": "Galicia",
      "id": "ES-GA"
    } , {
      "latitude": 37.9618716,
      "longitude": -1.2084576,
      "label": "Murcia",
      "id": "ES-MC"
    } , {
      "latitude": 42.6648163,
      "longitude": -1.720103,
      "label": "Navarra",
      "id": "ES-NC"
    } , {
      "latitude": 39.3130147,
      "longitude": 0.5398937,
      "label": "C.Valenciana",
      "id": "ES-VC"
    } , {
      "latitude": 43.0180642,
      "longitude": -2.6584689,
      "label": "País Vasco",
      "id": "ES-PV"
    }, {
      "latitude": 42.2990284,
      "longitude": -2.4669012,
      "label": "La Rioja",
      "id": "ES-RI"
    } , {
      "latitude": 28.4445239,
      "longitude": -16.4137,
      "label": "Canarias",
      "id": "ES-CN"
    }];


    input = input.map(x => { const moreData = x["Diario"] !== undefined ? enMedios(x["Diario"], medios) : false;
      if (moreData && moreData.length !== 0) {
        x['LOGO'] = moreData[0].logo;
      }
      return x;
    });

    var evolucion_str = Object.keys(temp[1])[8]; // Object.keys(datosGraficos["DiariosRegion"][0]).filter(x => x.length > 15 )[0];
    var currentEGM = Object.keys(temp[1])[7]; // Object.keys(datosGraficos["DiariosRegion"][0]).filter(x => x.length > 15 )[0];
    // var evolucion_str = "Dif. 3º EGM '19 vs 3º EGM '18"; // Object.keys(datosGraficos["DiariosRegion"][0]).filter(x => x.length > 15 )[0];

    // console.log(input)

    regiones = regiones.map(x => { 
      // console.log(x["label"], input); 
      const moreData = x["label"] !== undefined ? input.filter( y => y["Region"].toLowerCase().indexOf(x["label"].toLowerCase()) > -1 ) : false;
      if (moreData && moreData.length !== 0) {
        x['imageURL'] = moreData[0]["LOGO"];
        x['imageINFO'] = x['imageURL'] !== undefined ?  "https://i.imgur.com/MFOMXXg.png" : '';
        x[currentEGM] = moreData[0][currentEGM] !== undefined ? Math.floor(Number(moreData[0][currentEGM].replace(',','.'))) + " Lectores" : "";
        x["dif"] = moreData[0][evolucion_str] !== undefined ? '(' + moreData[0][evolucion_str] + ')' : "";
        x["fill"] = clean(moreData[0][totalPercent]) > total ? am4core.color("#cc1f11") : am4core.color("#aaa");
      }
        // console.log(x);
        return x;
    })
    // .filter( x => { if (x["dif"] !== "")  { return x; } });


    // console.log(regiones);


    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create map instance
    var chart = am4core.create("grafico-EGM-4", am4maps.MapChart);
    chart.colors.list = [am4core.color("#cc1f11")];
    chart.maxZoomLevel = 1.45;
    chart.minZoomLevel = 1.45;
    chart.chartContainer.wheelable = false;
    // chart.data = [];

    // Set map definition
    chart.geodata = am4geodata_spainHigh;

    // Set projection
    chart.projection = new am4maps.projections.Mercator();

    // Center on the groups by default
    chart.homeZoomLevel = 2;
    chart.homeGeoPoint = { longitude: -3.70, latitude: 40 };
    // chart.legend = new am4charts.Legend();
    // chart.legend.labels.template.text = "Comunidad con un consumo por encima de la media nacional";
    // chart.legend.valign = "bottom";
    // let marker = chart.legend.markers.template.children.getIndex(0);
    // // let marker2 = chart.legend.markers.template.children.getIndex(1);
    // marker.fill = am4core.color("#cc1f11");
    // marker2.fill = am4core.color("#666");

    // Polygon series
    var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());
    polygonSeries.dataFields.diario = "imageURL";
    polygonSeries.useGeodata = true;
    polygonSeries.nonScalingStroke = true;
    polygonSeries.strokeOpacity = 0.5;

    // Image series
    var imageSeries = chart.series.push(new am4maps.MapImageSeries());
    var imageTemplate = imageSeries.mapImages.template;
    imageTemplate.propertyFields.longitude = "longitude";
    imageTemplate.propertyFields.latitude = "latitude";
    imageTemplate.nonScaling = true;

    var image = imageTemplate.createChild(am4core.Image);
    // image.propertyFields.href = "imageURL";
    image.propertyFields.href = "imageINFO";
    image.width = 15;
    image.height = 15;
    image.horizontalCenter = "middle";
    image.verticalCenter = "middle";

    imageSeries.data = regiones;
    
    polygonSeries.tooltip.getFillFromObject = false;
    polygonSeries.tooltip.background.fill = am4core.color("#fff");
    polygonSeries.tooltip.background.fillOpacity = 1;
    // polygonSeries.tooltipHTML =  "{imageURL}";



    // console.log(polygonSeries.tooltip);

    // Configure series
    var polygonTemplate = polygonSeries.mapPolygons.template;
    // polygonTemplate.tooltipColorSource.rgb =  {r:255, g:255, b:255};
    polygonTemplate.fill = am4core.color("#ccc");
    // polygonTemplate.tooltipText = "{imageURL}";
    polygonTemplate.tooltipHTML =  "{imageURL}";

    polygonSeries.data = regiones;

    // Bind "fill" property to "fill" key in data
    polygonTemplate.propertyFields.fill = "fill";


    polygonTemplate.adapter.add("tooltipHTML", function(html, target) {
      // console.log(target.dataItem.value);
      // console.log(polygonSeries.dataFields.diario);
      // console.log(html);
      if(target.dataItem._dataContext.imageURL !== undefined){
        // console.log(target.dataItem._dataContext.imageURL)
        return  "<small style='color:black;height:130px; font-size:12px;text-align:center'><img width='76px' height='76px' src='{imageURL}' style='min-height:76px;background:white;margin-bottom:5px;border-radius:4px;'><br><strong style='font-size:14px'>{label}</strong><br> {"+ currentEGM +"} <br> {dif}<br><br></small> ";
      } else {
        // console.log(target.dataItem._dataContext.imageURL);
        return "";
      }
    });




  }); // end am4core.ready()
  
}

var graficoEGM4_show = false;

jQuery('#grafico-EGM-4').waypoint(function() {
  if(!graficoEGM4_show) {
    graficoEGM4();
  }
  graficoEGM4_show = true;
}, {
  offset: '75%'
});

</script>


