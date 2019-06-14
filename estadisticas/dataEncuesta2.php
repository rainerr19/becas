<?php
//data table2
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
$pregs = ['sexo','departamento','estrato','preg_1','preg_2_1','preg_2_2','preg_2_3','preg_2_4',
        'preg_2_5','preg_2_6','preg_3','preg_4','preg_5_1','preg_5_2','preg_5_3','preg_5_4',
        'preg_5_5','preg_5_6','preg_6','preg_7'
];//database sexo , departamento
/*************************** Titulos por cada pregunta **************/
$titulos = ['Genero de personas que realizaron la encuesta',
    'Cantidad  de personas encuestadas en distintos departamentos',
    'Estrato social de las personas encuestadas',
    'Programa de formación en que se encuentra las personas',
    'Percepción que se antes de estar en el programa ante el Gobierno',
    'Percepción que se antes de estar en el programa ante la Policía nacional',
    'Percepción que se antes de estar en el programa ante el Ejército',
    'Percepción que se antes de estar en el programa ante Organizaciones al margen de la ley',
    'Percepción que se antes de estar en el programa ante Grupos ilegales armados',
    'Percepción que se antes de estar en el programa ante Pandillas',
    'Razónes por la cual jóvenes entrarían a grupos ilegales, según encuestados',
    'Motivó de la participación en la Policía Nacional de los encuestados',
    'Facilidad de encontrar el Gobierno en la comunidad, según encuestados',
    'Facilidad de encontrar la Policía Nacional en la comunidad, según encuestados',
    'Facilidad de encontrar al Ejercito en la comunidad, según encuestados',
    'Facilidad de encontrar Organizaciones al margen de la ley en la comunidad, según encuestados',
    'Facilidad de encontrar Grupos ilegales armados en la comunidad, según encuestados',
    'Facilidad de encontrar Pandillas en la comunidad, según encuestados',
    'Percepción tiene la comunidad y/o familia el ingreso al programa',
    'Conocimiento de la comunidad y/o familia sobre la obtención de la beca de la embajada de los Estados Unidos'
];
/********************** Nombre de tabla en Base de datos *************/
$table ='encuesta_ingreso_2019';
// encuesta_ingreso_policia
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
    $sentencia = "SELECT $preg , COUNT(*) AS cantidad FROM $table GROUP BY $preg";
    $q = mysqli_query($conexion,$sentencia);
    $size = mysqli_num_rows($q);

    $labels=[];$val= []; 
    while( $row = mysqli_fetch_row($q) ) { 
            $labels[] = $row[0];
            $val[] = $row[1]; 
        }	
    $dataset["backgroundColor"] = RamdonColorArray($size);
    $dataset["data"] = $val;
    $data=["labels" => $labels, "datasets" =>[$dataset]];
    $config = [  'type'=>'doughnut',
    'data' =>  $data,
    'options' => $titulo
    ];
    $datas[$preg]=$config;
}
mysqli_close($conexion);
echo json_encode($datas);