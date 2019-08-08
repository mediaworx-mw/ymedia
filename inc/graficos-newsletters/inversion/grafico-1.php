<script>

function  graficoInversion1() {
  
  enCadenas = (cadena, cadenas) => cadenas.filter( 
      x => (x.cadena.toLowerCase().indexOf(cadena.toLowerCase()) > -1) );

  // Set data
  input = [];
  input = datosGraficos['Inversión'];
  
  var medios = Object.keys(input[0]).filter( x => x !== 'Medio');

  
  
  mediosMoreData = medios.map(x => {
    const moreData = x !== undefined ? enCadenas(x, cadenas) : false;
    // console.log(x, moreData);
    if (moreData && moreData.length !== 0) {
      var medio = {};
      // x["Cuota (%)"] = x["Cuota (%)"];
      medio['Medio'] = moreData[0].cadena.replace(/ *\([^)]*\) */g, "").toUpperCase();
      // medio['Color'] = moreData[0].color;
      // medio['Logo'] = moreData[0].logo;
      // console.log(medio)
    }
    return medio;
  });

  // console.log(mediosMoreData);

  var id = "grafico-inversion-1";

  var data = input;

  // // Modify chart's colors
  // var colores = mediosMoreData.filter((x) => {
  //   return x.CONFIG === 'COLORES';
  // })[0];

  // var logos = mediosMoreData.filter((x) => {
  //   return x.CONFIG === 'COLORES';
  // })[0];


  // if (colores !== undefined) {
    // var cols = Object.keys(colores);
    // cols.shift();
    // var colores = mediosMoreData.map((x) => x['Color']);
    // var logos = mediosMoreData.map((x) => x['Logo']);
  // } 
  // else {
    // colores = ["#e64b3e", "#9bd6f3", "#74bb55", "#f8c32f", "#3ee697", "#f39bae", "#6455bb", "#2fd2f8", "#f3bb9b", "#a055bb", "#2f5df8",];
  // }

  const pSBC = (p, c0, c1, l) => {
    let r, g, b, P, f, t, h, i = parseInt, m = Math.round, a = typeof (c1) == "string";
    if (typeof (p) != "number" || p < -1 || p > 1 || typeof (c0) != "string" || (c0[0] != 'r' && c0[0] != '#') || (c1 && !a)) return null;
    if (!this.pSBCr) this.pSBCr = (d) => {
      let n = d.length, x = {};
      if (n > 9) {
        [r, g, b, a] = d = d.split(","), n = d.length;
        if (n < 3 || n > 4) return null;
        x.r = i(r[3] == "a" ? r.slice(5) : r.slice(4)), x.g = i(g), x.b = i(b), x.a = a ? parseFloat(a) : -1
      } else {
        if (n == 8 || n == 6 || n < 4) return null;
        if (n < 6) d = "#" + d[1] + d[1] + d[2] + d[2] + d[3] + d[3] + (n > 4 ? d[4] + d[4] : "");
        d = i(d.slice(1), 16);
        if (n == 9 || n == 5) x.r = d >> 24 & 255, x.g = d >> 16 & 255, x.b = d >> 8 & 255, x.a = m((d & 255) / 0.255) / 1000;
        else x.r = d >> 16, x.g = d >> 8 & 255, x.b = d & 255, x.a = -1
      } return x
    };
    h = c0.length > 9, h = a ? c1.length > 9 ? true : c1 == "c" ? !h : false : h, f = pSBCr(c0), P = p < 0, t = c1 && c1 != "c" ? pSBCr(c1) : P ? { r: 0, g: 0, b: 0, a: -1 } : { r: 255, g: 255, b: 255, a: -1 }, p = P ? p * -1 : p, P = 1 - p;
    if (!f || !t) return null;
    if (l) r = m(P * f.r + p * t.r), g = m(P * f.g + p * t.g), b = m(P * f.b + p * t.b);
    else r = m((P * f.r ** 2 + p * t.r ** 2) ** 0.5), g = m((P * f.g ** 2 + p * t.g ** 2) ** 0.5), b = m((P * f.b ** 2 + p * t.b ** 2) ** 0.5);
    a = f.a, t = t.a, f = a >= 0 || t >= 0, a = f ? a < 0 ? t : t < 0 ? a : a * P + t * p : 0;
    if (h) return "rgb" + (f ? "a(" : "(") + r + "," + g + "," + b + (f ? "," + m(a * 1000) / 1000 : "") + ")";
    else return "#" + (4294967296 + r * 16777216 + g * 65536 + b * 256 + (f ? m(a * 255) : 0)).toString(16).slice(1, f ? undefined : -2)
  }

  tableCreate(id, data);


  function tableCreate(id, data) {

    // console.log(data);
    // console.log(data.length, Object.keys(data[0]).length);

    var rowsNum = data.length;
    var colsNum = Object.keys(data[0]).length;

    //body reference 
    var body = document.getElementById(id);

    // create elements <table> and a <tbody>
    var tbl = document.createElement("table");
    tbl.classList.add('custom-tabla');
    var tblBody = document.createElement("tbody");

    // cells creation

    for (var j = -1, ani = 0; j < rowsNum; j++) {
      // table row creation
      var row = document.createElement("tr");

      for (var i = 0; i < colsNum; i++) {
        // create element <td> and text node 
        //Make text node the contents of <td> element
        // put <td> at end of the table row
        if (j === -1) {
          var cell = document.createElement("th");
          var cellInner = document.createElement("span");
          var cellText = document.createTextNode(Object.keys(data[0])[i]);

          // if (i > 0) {
          //   // cell.style.backgroundColor = colores[i - 1];
          //   // cell.style.color = colores[i - 1];
          //   cell.classList.add('head');

          //   cell.style.textAlign = "center";
          //   var logo = document.createElement("img");
          //   // logo.setAttribute('src', logos[i - 1]);
          //   var cellText = document.createTextNode(Object.keys(data[0])[i]);
          //   // cellInner.appendChild(logo);
          //   cell.appendChild(cellInner);
          //   cell.style.opacity = 0;
          // }

        } else {

          var cell = document.createElement("td");
          var cellInner = document.createElement("span");
          var cellText = document.createTextNode(data[j][Object.keys(data[0])[i]] !== undefined ? data[j][Object.keys(data[0])[i]] : '');

          if ( j === 0 ) {
            cellInner.classList.add('total');
          }
          
          if (i == 3) {
            cellInner.classList.add('colored');
            // console.log(cellText.data)
            // cellInner.style.backgroundColor = pSBC(0.70, colores[i - 1]);
            // cellInner.style.backgroundColor = pSBC(0.70, colores[i - 1]);
            if(cellText.data.replace('%','').replace(',','.') < 0) {              
              cellInner.classList.add('negative');
            } else {
              cellInner.classList.add('positive');
            }
          }

        }

        if (i === 0) {
          cell.classList.add('categorias');
          // cell.style.backgroundColor = '#fcfcfc';
        }

        cellInner.appendChild(cellText);
        cell.appendChild(cellInner);
        cell.style.opacity = 0;

        cell.style.animationDelay = (ani++ * 0.05) + 's';
        row.appendChild(cell);
      }

      //row added to end of table body
      tblBody.appendChild(row);
    }

    // append the <tbody> inside the <table>
    tbl.appendChild(tblBody);
    // put <table> in the <body>
    body.appendChild(tbl);
    // tbl border attribute to 
    tbl.setAttribute("border", "2");
  }

  
  jQuery(document).ready(function(){
    jQuery("g[aria-labelledby]:not(g[aria-controls])").hide();
  })
}

var graficoInversion1_show = false;

ScrollReveal().reveal("#grafico-inversion-1", {
  afterReveal: function activar (el) {
    if(!graficoInversion1_show) {
      thischart = graficoInversion1();
    }
    graficoInversion1_show = true;
  },
  afterReset: function activar (el) {
    if(graficoInversion1_show) {
      
      thischart = null;
      jQuery("#grafico-inversion-1")[0].innerHTML = "";
    }
    graficoInversion1_show = false;
  },
  reset: true
});

</script>


