<?php   
include "../conexionB-D.php";
//--------CUIDADIO!!--- ---
    $id=$_REQUEST['id'];
    $query = "DELETE FROM perfil WHERE id_user='$id' ";
    $resultado= $conexion->query($query);

    if($resultado){
        echo 'eliminado';

    }else{
         echo 'Error: ' + $resultado;
    }

?>