//   var csv = google.visualization.dataTableToCsv(data);
//     console.log(csv);
function sizeObj(object) {
    var k=0;
    for (const preg in object) {
        k++;
    }
    return k;
}
/***************************** ajax  datos de graficos  ***********************/
var dataAjax = {url: "dataEncuesta.php",
    type:"post",
    dataType: "json",
    async: false};
//pregunt es un objeto
var configDatas = $.ajax(dataAjax).responseJSON;
var numGraficas = sizeObj(configDatas);
var idElmts1 = [];
switch (numGraficas) {
    case 0:
        alert('no hay datos.');
        break;
    case 1:
        $("#graficar").append(
            "<div class='row' style='min-width: 520px;'>"+
            "<div class='col-lg-6'><canvas id='chart_0'></canvas></div></div><hr>");
        break;
    default:
        if (numGraficas>1) {
            var row = parseInt(numGraficas/2)+parseInt(numGraficas % 2); 
            var id = 0;
            var ht = ''; 
            for (let r = 0; r < row; r++) { 
                ht = "<div class='table-responsive'><div class='row table' style='min-width: 520px;'>"
                for (let c = 0; c < 2; c++) {
                   if (id<numGraficas) {
                        ht = ht+"<div class='col-lg-6'><canvas id='chart_"+id+"'></canvas></div>";   
                        idElmts1[id]= "chart_"+id; 
                    }
                   id++; 
                }
                $("#graficar").append( ht+"</div></div><hr>");
            }  
        }
        break;
}
/**********************************  NOMBRES DE ELEMENTOS******************/
// var idElmts = ['chart_sexo','chart_estado'];    
var idElmts = idElmts1;
/******************************************************************** */

/******************************* CREACION DE GRAFICOS******************************/
var ctxs = [];  
var charts = [];
if (idElmts.length == sizeObj(configDatas)) {
    var i=0;
    for (const preg in configDatas) {
        ctxs[i] = document.getElementById(idElmts[i]).getContext('2d');
        charts[i] = new Chart(ctxs[i], configDatas[preg]);
        i++;
    }
} else {
    alert('ERROR: La cantidad de elementos deben ser igual a ls preguntas.');
    console.log('ERROR: Array de diferentes tamaños');    
}
/**************** Funcion de cambio de tipo de grafico ************************/
function change(newType) {
    // Remove the old chart
    for (const k in charts) {
        charts[k].destroy();
    }
    charts=[];
    //create new chart with new config
    var j = 0;
    for (const preg in configDatas) {
      var temp = jQuery.extend(true, {}, configDatas[preg]);
      temp.type = newType;
      charts[j] = new Chart(ctxs[j], temp);
      j++;
    }
  };
/**************** jquery cambio de tipo de grafico ************************/
$('#type').on('change', function(e){
    switch (this.value) {
        case 'pie':
            change(this.value);
            break;
        case 'doughnut':
            change(this.value);
            break;
        case 'bar':
            change(this.value);
            break;
        case 'horizontalBar':
            change(this.value);
            break;
        case 'line':
            change(this.value);
            break;
        default:
            break;
    } 
});