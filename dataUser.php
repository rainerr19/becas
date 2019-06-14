<?php
session_start();
error_reporting(0);
require_once( "conexionB-D.php");


if($_SESSION['validacion'] == 1){

//MYSQLI_NUM  //MYSQLI_ASSOC

    $params = $columns = $totalRecords = $data = array();
 
	$params = $_REQUEST;
 
	$columns = array(
		0 => 'id_user',
		1 => 'nombre', 
        2 => 'apellido',
        3 => 'telefono',
        4 => 'correo',
        5 => 'tipoUsuario',
        6 => 'fechaIngresoNew'
	);
 
	$where_condition = $sqlTot = $sqlRec = "";
 
	if( !empty($params['search']['value']) ) {
		$where_condition .=	" WHERE ";
		$where_condition .= " ( nombre LIKE '%".$params['search']['value']."%' ";    
        $where_condition .= " OR apellido LIKE '%".$params['search']['value']."%' ";
        $where_condition .= " OR correo LIKE '%".$params['search']['value']."%' )";
	}
 
	$sql_query = "SELECT id_user, nombre, apellido, telefono, correo, tipoUsuario,fechaIngresoNew  from perfil";
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
        $row[] = '<a href="php/modificar.php?id='.$row[0].'" type="button" class="btn btn-outline-secondary">
            <i class="fas fa-edit fa-1x"></i></a>';
        $row[] = '<button type="button" onclick="del('.$row[0].')" class="btn btn-outline-danger">
            <i class="fas fa-ban fa-1x"></i></button>';
		$data[] = $row;
	}	
 
	$json_data = array(
		"draw"            => intval( $params['draw'] ),   
		"recordsTotal"    => intval( $totalRecords ),  
		"recordsFiltered" => intval($totalRecords),
		"data"            => $data
	);
 
    echo json_encode($json_data);

}else{
    header("location:login.php");
}