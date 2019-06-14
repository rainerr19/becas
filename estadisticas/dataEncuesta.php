<?php
//data table
function RamdonColorArray($size)
{
    $coloresJson = file_get_contents("../assets/js/colors.json"); 
    $colores = json_decode($coloresJson, true); 
    $k_color = array_rand($colores,$size);
    $Array = array();
    if ($size>1) {
        foreach ($k_color as $key) {
            $Array[] ="#".$colores[$key][1];
        }
    }else{
        if ($size==1) {
            $Array[] ="#".$colores[$k_color][1];
        }
    }
    return $Array;
}
require_once( "../conexionB-D.php");
/*************************** CONFIGURACION **********************************/
/*****************nombre pregunta en base de datos ******************/
$pregs = ['preg_3','Estado','preg_4','preg_5_opc_1','preg_5_opc_2','preg_5_opc_3','preg_5_opc_4',
    'preg_5_opc_5','preg_5_opc_6','preg_6','preg_7','preg_8_opc_1','preg_8_opc_2','preg_8_opc_3',
    'preg_8_opc_4','preg_8_opc_5','preg_8_opc_6','preg_9','preg_10','preg_11_opc_1','preg_11_opc_2',
    'preg_11_opc_3','preg_11_opc_4','preg_11_opc_5','preg_11_opc_6',
];//database sexo , departamento
/*************************** Titulos por cada pregunta **************/
$titulos = ['Genero de personas que realizaron la encuesta','Estados del usuario',
    'Estrato social de las personas','Cantidad de personas de 0 a 5 años en las familias',
    'Cantidad de personas de 6 a 13 años en las familias',
    'Cantidad de personas de 14 a 17 años en las familias',
    'Cantidad de personas de 18 a 26 años en las familias',
    'Cantidad de personas de 27 a 59 años en las familias',
    'Cantidad de personas de 60 años o más en las familias',
    'Número de Personas que trabajan en la familia',
    'Percepción en participación de miembros de su comunidad en el programa',
    'Percepción en comunidad del Gobierno','Percepción en comunidad de la Policía Naciona',
    'Percepción en comunidad del Ejercito','Percepción en comunidad de Organizaciones al margen de la ley',
    'Percepción en comunidad de Grupos ilegales armados','Percepción en comunidad de Pandillas',
    'Razónes por la cual jóvenes entrarían a grupos ilegales, según encuestados',
    'Motivó de la participación en la Policía Nacional de los encuestados',
    'Facilidad de encontrar el Gobierno en la comunidad, según encuestados',
    'Facilidad de encontrar la Policía Nacional en la comunidad, según encuestados',
    'Facilidad de encontrar al Ejercito en la comunidad, según encuestados',
    'Facilidad de encontrar Organizaciones al margen de la ley en la comunidad, según encuestados',
    'Facilidad de encontrar Grupos ilegales armados en la comunidad, según encuestados',
    'Facilidad de encontrar Pandillas en la comunidad, según encuestados',
];
/***************************** Excepción cambiar label de cada item ************/
$labels2 = ['preg_7' => [' No lo conocía','No creía','No es bien visto','Es necesario','Buena oportunidad','Otro'],
            'preg_9' => ['Influencia de amigos','Mejor paga','Dinero facil','No hay oportunidades de trabajo','Presión de los grupos ilegales','otro'],
            'preg_10' => ['Gusto','Dinero','Poder','Disciplina','Única opción','Servir','Otro']
        ];
/********************** Nombre de tabla en Base de datos *************/
$table ='encuesta_ingreso_policia';
// 	encuesta_ingreso_2019
/****************************************************************************/

/************************ Codigo para graficos **********************/
$titulo["title"] = ["display" => true,
    "fontFamily" => 'Helvetica Neue',
    "fontSize" => 14,
    "text" => '',
    "position" => 'top'];//bottom  
$dataset = ["backgroundColor" => [],
    "data" => [],
    "borderColor" => "black",
    "borderWidth" => 0.3,'fill'=> false ];
$datas = [];
foreach ($pregs as $key => $preg) {
    $titulo["title"]["text"] = $titulos[$key];
    $sentencia = "SELECT $preg , COUNT(*) AS cantidad FROM $table GROUP BY $preg ";
    $q = mysqli_query($conexion,$sentencia);
    $size = mysqli_num_rows($q);
    $labels=[];$val= []; 
    while( $row = mysqli_fetch_row($q) ) { 
            $labels[] = $row[0];
            $val[] = $row[1]; 
        }	
    $dataset["backgroundColor"] = RamdonColorArray($size);
    $dataset["data"] = $val;
    if (!empty($labels2[$preg])) {
        
        $data=["labels" => $labels2[$preg], "datasets" =>[$dataset]];
    }else {
        $data=["labels" => $labels, "datasets" =>[$dataset]];
    }

    $config = [  'type'=>'doughnut',
    'data' =>  $data,
    'options' => $titulo
    ];
    $datas[$preg]=$config;
}
mysqli_close($conexion);
echo json_encode($datas);