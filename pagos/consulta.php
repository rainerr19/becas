<?php
//consulta pagos ajax
session_start();
error_reporting(0);
require_once( "../conexionB-D.php");


if($_SESSION['validacion'] == 1){
    

//MYSQLI_NUM  //MYSQLI_ASSOC

    $params = $columns = $totalRecords = $data = array();
 
	$params = $_REQUEST;
 
	$columns = array(
        0 => 'pagos_id',
        1 => 'nombres', 	
        2 => 'cedula', 
        3 => 'escuela', 
        4 => 'grupo_nombre', 
        5 => 'sexo', 	
        6 => 'pagos_equipos',
        7 => 'pagos_matriculas', 	
        8 => 'pagos_bono_marzo', 
        9 => 'pago_bono_abril', 
        10 => 'pago_bono_mayo', 
        11 => 'total_consignado' 
	);
 
	$where_condition = $sqlTot = $sqlRec = "";
 
	if( !empty($params['search']['value']) ) {
		$where_condition .=	" WHERE ";
		$where_condition .= " ( nombres LIKE '%".$params['search']['value']."%' ";    
        $where_condition .= " OR escuela LIKE '%".$params['search']['value']."%' ";
        $where_condition .= " OR grupo_nombre LIKE '%".$params['search']['value']."%' )";
	}
 
	$sql_query = "SELECT * from pagos_becarios";
    
    
    $sqlTot .= $sql_query;
	$sqlRec .= $sql_query;
	
	if(isset($where_condition) && $where_condition != '') {//is emty
 
		$sqlTot .= $where_condition;
		$sqlRec .= $where_condition;
	}
 
 	$sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";
 
	$queryTot = mysqli_query($conexion, $sqlTot) or die("Database Error:". mysqli_error($conexion));
 
	$totalRecords = mysqli_num_rows($queryTot);
    
	$queryRecords = mysqli_query($conexion, $sqlRec) or die("Error to Get the Post details.");
    
  
	while( $row = mysqli_fetch_row($queryRecords) ) { 
        // $row[] = '<a href="php/modificar.php?id='.$row[0].'" type="button" class="btn btn-outline-secondary">
        //     <i class="fas fa-edit fa-1x"></i></a>';
        // $row[] = '<button type="button" onclick="del('.$row[0].')" class="btn btn-outline-danger">
        //     <i class="fas fa-ban fa-1x"></i></button>';
		$data[] = $row;
	}	
 
	$json_data = array(
		"draw"            => intval( $params['draw'] ),   
		"recordsTotal"    => intval( $totalRecords ),  
		"recordsFiltered" => intval($totalRecords),
		"data"            => $data
	);
	mysqli_close($conexion);
    echo json_encode($json_data);

}else{
    header("location:../login.php");
}