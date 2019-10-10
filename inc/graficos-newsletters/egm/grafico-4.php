<script>

function  graficoEGM4() {
  am4core.ready(function() {

  enMedios = (medio, medios) => medios.filter( x => x.medio.toLowerCase().indexOf(medio.toLowerCase()) > -1 );
  clean = (valor) => valor !== undefined ? Number(valor.toString().replace(/\./g, '').replace(/,/g, '.').replace(/%/g, '')) : 0;

  var input = datosGraficos["DiariosRegion"];
  

  var total = input[0]["3ª EGM '18."];

  input.splice(18, 1);
  input.splice(0, 1);

  var  regiones = [{
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
    "latitude": 44.0000000,
    "longitude": 1.750000,
    "label": "Aragón",
    "id": "ES-AR"
  }, {
    "latitude": 44.6695167,
    "longitude": -6,
    "label": "Asturias",
    "id": "ES-AS"
  }, {
    "latitude": 39,
    "longitude": 2.752209,
    "label": "Baleares",
    "id": "ES-IB"
  }, {
    "latitude": 44.5360307,
    "longitude": -4,
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
    "latitude": 41.722521,
    "longitude": -2.3233934,
    "label": "C.Catalana",
    "id": "ES-CT"
  }, {
    "latitude": 39.2105954,
    "longitude": -8.3173371,
    "label": "Extremadura",
    "id": "ES-EX"
  }, {
    "latitude": 42.3,
    "longitude": -10.2,
    "label": "Galicia",
    "id": "ES-GA"
  } , {
    "latitude": 36.8805649,
    "longitude": -0.9,
    "label": "Murcia",
    "id": "ES-MC"
  } , {
    "latitude": 44.5000000,
    "longitude": 0.3000000,
    "label": "Navarra",
    "id": "ES-NC"
  } , {
    "latitude": 39.3130147,
    "longitude": 0.5398937,
    "label": "C.Valenciana",
    "id": "ES-VC"
  } , {
    "latitude": 44.4643889,
    "longitude": -2,
    "label": "País Vasco",
    "id": "ES-PV"
  }, {
    "latitude": -29.8444144,
    "longitude": -68.6249033,
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

  // console.log(input)

  regiones = regiones.map(x => { 
    // console.log(x["label"], input); 

    const moreData = x["label"] !== undefined ? input.filter( y => y["Region"].toLowerCase().indexOf(x["label"].toLowerCase()) > -1 ) : false;
    if (moreData && moreData.length !== 0) {
      x['imageURL'] = moreData[0]["LOGO"];
      x["3ª EGM '18"] = moreData[0]["3ª EGM '18"] !== undefined ? Math.floor(Number(moreData[0]["3ª EGM '18"].replace(',','.'))) + " Lectores" : "";
      x["dif"] = moreData[0]["Dif. 3ª EGM '18 vs 3ª EGM '17"] !== undefined ? '(' + moreData[0]["Dif. 3ª EGM '18 vs 3ª EGM '17"] + ')' : "";
      x["fill"] = moreData[0]["3ª EGM '18."] > total ? am4core.color("#cc1f11") : am4core.color("#aaa") 
    }
      return x;
  })
  // .filter( x => { if (x["dif"] !== "")  { return x; } });


  // console.log(regiones);


  // Themes begin
  am4core.useTheme(am4themes_animated);
  // Themes end

  // Create map instance
  var chart = am4core.create("grafico-EGM-4", am4maps.MapChart);
  chart.maxZoomLevel = 4;
  chart.minZoomLevel = 1.5;

  // Set map definition
  chart.geodata = am4geodata_spainHigh;

  // Set projection
  chart.projection = new am4maps.projections.Mercator();

  // Center on the groups by default
  chart.homeZoomLevel = 2;
  chart.homeGeoPoint = { longitude: -3.703790, latitude: 41.16775 };

  // Polygon series
  var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());
  polygonSeries.exclude = ["AQ"];
  polygonSeries.useGeodata = true;
  polygonSeries.nonScalingStroke = true;
  polygonSeries.strokeOpacity = 0.5;

  // Configure series
  var polygonTemplate = polygonSeries.mapPolygons.template;
  polygonTemplate.tooltipHTML =  "<small style='font-size:12px;text-align:center'><strong style='font-size:14px'>{label}</strong><br> {3ª EGM '18} <br> {dif}</small> ";
  polygonTemplate.fill = am4core.color("#ccc");

  polygonSeries.data = regiones;

  // Bind "fill" property to "fill" key in data
  polygonTemplate.propertyFields.fill = "fill";


  // Image series
  var imageSeries = chart.series.push(new am4maps.MapImageSeries());
  var imageTemplate = imageSeries.mapImages.template;
  imageTemplate.propertyFields.longitude = "longitude";
  imageTemplate.propertyFields.latitude = "latitude";
  imageTemplate.nonScaling = true;

  var image = imageTemplate.createChild(am4core.Image);
  image.propertyFields.href = "imageURL";
  image.width = 80;
  image.height = 80;
  image.horizontalCenter = "middle";
  image.verticalCenter = "middle";

  var label = imageTemplate.createChild(am4core.Label);
  label.html = "<small style='display:block;font-size:12px;text-align:center'><strong style='font-size:14px'>{label}</strong><br> {3ª EGM '18} <br> {dif}</small> ";
  label.horizontalCenter = "middle";
  label.verticalCenter = "top";
  label.dy = 20;

  imageSeries.data = regiones;

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


