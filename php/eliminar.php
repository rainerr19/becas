<?php   
include "../conexionB-D.php";
//--------CUIDADIO!!--- ---
    $id=$_REQUEST['id'];
    $query = "DELETE FROM perfil WHERE id_user='$id' ";
    $resultado= $conexion->query($query);

    if($resultado){
        echo 'eliminado';
        echo'
        <script>
        alert ("Eliminado");
        </script>';
        header("location:../tables.php");

    }else{
         echo 'Error: ' + $resultado;
    }

?>