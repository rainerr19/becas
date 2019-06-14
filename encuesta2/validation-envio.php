<?php
    include "../conexionB-D.php";
                        
// echo $_SESSION['nombre'];
// echo " ";
// echo $_SESSION['apellido'];
session_start();
error_reporting(0);
date_default_timezone_set('America/Bogota');
// fechas de envio
$fecha = date("Y-m-d H:i:s");

$apellido = $_SESSION["apellido"];

$nombre = $_SESSION["nombre"];

if($_SESSION["numeroDocumento"] == ""){
    $documento = $_POST["documento"];
}else{
    $documento = $_SESSION["numeroDocumento"];    
}

$correo = $_SESSION["correo"];
$departamento = $_POST["departamento"];
$municipio = $_POST['municipio'];
$barrio = $_POST['barrio'];
$sexo = $_POST["sexo"];
$estrato = $_POST["estrato"];


$preg_1 = $_POST["preg_1"];//formacion

//percepcion
$preg_2_1 = $_POST["preg_2_1"];
$preg_2_2 = $_POST["preg_2_2"];
$preg_2_3 = $_POST["preg_2_3"];
$preg_2_4 = $_POST["preg_2_4"];
$preg_2_5 = $_POST["preg_2_5"];
$preg_2_6 = $_POST["preg_2_6"];
$preg_2_7 = $_POST["preg_2_7"];
$preg_2_otra = $_POST["preg_2_otra"];

//razon
$preg_3 = $_POST["preg_3"];
$preg_3_otra = $_POST["preg_3_otra"];//nulable

//motivo
$preg_4 = $_POST["preg_4"];
$preg_4_otra = $_POST["preg_4_otra"];//nulable

//precencia
//
$preg_5_1 = $_POST["preg_5_1"];
$preg_5_2 = $_POST["preg_5_2"];
$preg_5_3 = $_POST["preg_5_3"];
$preg_5_4 = $_POST["preg_5_4"];
//armados
$preg_5_5 = $_POST["preg_5_5"];
//pandillas
$preg_5_6 = $_POST["preg_5_6"];
//otra
$preg_5_otra = $_POST["preg_5_otra"];//nulable
$preg_5_7 = $_POST["preg_5_7"];//nulable

//ingreso
$preg_6 = $_POST["preg_6"];
//enbjada
$preg_7 = $_POST["preg_7"];


/*--------------------------------------------------------------CONTRA INYECCION SQL--------------------------------------------------------------*/

$apellido = trim($apellido);
$apellido = htmlspecialchars($apellido);

/*-----------------------------------------------------*/

$documento = trim($documento);
$documento = htmlspecialchars($documento);

/*-----------------------------------------------------*/

$departamento = trim($departamento);
$departamento  = htmlspecialchars($departamento);
/*-----------------------------------------------------*/
$municipio =mb_strtolower($municipio,'UTF-8');
$municipio = trim($municipio);
$municipio = htmlspecialchars($municipio);

/*-----------------------------------------------------*/
$barrio =mb_strtolower($barrio,'UTF-8');
$barrio = trim($barrio);
$barrio = htmlspecialchars($barrio);
/*-----------------------------------------------------*/

$sexo = trim($sexo);
$sexo = htmlspecialchars($sexo);

/*-----------------------------------------------------*/

$estrato = trim($estrato);
$estrato = htmlspecialchars($estrato);

/*-----------------------------------------------------*/

$preg_1 = trim($preg_1);
$preg_1 = htmlspecialchars($preg_1);

/*-----------------------------------------------------*/

$preg_2 = trim($preg_2);
$preg_2 = htmlspecialchars($preg_2);
$preg_2_otra = mb_strtolower($preg_2_otra,'UTF-8');
$preg_2_otra = trim($preg_2_otra);
$preg_2_otra = htmlspecialchars($preg_2_otra);

/*-----------------------------------------------------*/

$preg_3 = trim($preg_3);
$preg_3 = htmlspecialchars($preg_3);
$preg_3_otra = mb_strtolower($preg_3_otra,'UTF-8');
$preg_3_otra = trim($preg_3_otra);
$preg_3_otra = htmlspecialchars($preg_3_otra);

/*-----------------------------------------------------*/

$preg_4 = trim($preg_4);
$preg_4 = htmlspecialchars($preg_4);
$preg_4_otra = mb_strtolower($preg_4_otra,'UTF-8');
$preg_4_otra = trim($preg_4_otra);
$preg_4_otra = htmlspecialchars($preg_4_otra);

/*-----------------------------------------------------*/

$preg_5_1 = trim($preg_5_1);
$preg_5_1 = htmlspecialchars($preg_5_1);

$preg_5_2 = trim($preg_5_2);
$preg_5_2 = htmlspecialchars($preg_5_2);

$preg_5_3 = trim($preg_5_3);
$preg_5_3 = htmlspecialchars($preg_5_3);

$preg_5_4 = trim($preg_5_4);
$preg_5_4 = htmlspecialchars($preg_5_4);

$preg_5_5 = trim($preg_5_5);
$preg_5_5 = htmlspecialchars($preg_5_5);

$preg_5_6 = trim($preg_5_6);
$preg_5_6 = htmlspecialchars($preg_5_6);

$preg_5_7 = trim($preg_5_7);
$preg_5_7 = htmlspecialchars($preg_5_7);

$preg_5_otra = mb_strtolower($preg_5_otra,'UTF-8');
$preg_5_otra = trim($preg_5_otra);
$preg_5_otra = htmlspecialchars($preg_5_otra);

/*-----------------------------------------------------*/

$preg_6 = trim($preg_6);
$preg_6 = htmlspecialchars($preg_6);

/*-----------------------------------------------------*/

$preg_7 = trim($preg_7);
$preg_7 = htmlspecialchars($preg_7);

/*-----------------------------------------------------*/

$verificar_correo = mysqli_query($conexion, "SELECT * FROM encuesta_ingreso_2019 WHERE correo ='$correo' ");
    
     if (mysqli_num_rows($verificar_correo) >0){
        echo '
        <script>
        alert ("Ya ha relizado esta encuesta anteriormente, espere su respuesta");
        window.location.href = "../usuario.php";
        </script>';
        exit;
     }else{

 if( empty($departamento) || empty($municipio) || empty($sexo) || empty($estrato) || empty($preg_1) || 
    empty($preg_2_1) || empty($preg_2_2) || empty($preg_2_3) || empty($preg_2_4) || empty($preg_2_5) ||
    empty($preg_2_6) || empty($preg_3) || empty($preg_4) || empty($preg_5_1) || empty($preg_5_2) || 
    empty($preg_5_3) || empty($preg_5_4) || empty($preg_5_5) || empty($preg_5_6) ||
    empty($preg_6) || empty($preg_7) || empty($barrio)){
     
     echo '
        <script>
        alert ("llene todos los campos");
        window.history.go(-1);
        </script>';
    exit;
    
}else{
     if (is_numeric($departamento) || is_numeric($municipio) || is_numeric($sexo)){
           echo '
            <script>
            alert ("la pregunta 10 no es valida");
            window.history.go(-1);
            </script>
            ';
            exit;
        }else{
         
     
        $estado = 'Realizado';   
        $insertar = "INSERT INTO encuesta_ingreso_2019 (apellido, nombre, fecha, documento, correo, departamento, municipio, barrio, sexo, estrato, preg_1, preg_2_1, preg_2_2, preg_2_3, preg_2_4, preg_2_5, preg_2_6, preg_2_7, preg_2_otra, preg_3, preg_3_otra, preg_4, preg_4_otra, preg_5_1, preg_5_2, preg_5_3, preg_5_4, preg_5_5, preg_5_6, preg_5_7, preg_5_7_otra, preg_6, preg_7, estado) VALUES ('$apellido','$nombre','$fecha','$documento','$correo','$departamento','$municipio','$barrio','$sexo','$estrato','$preg_1','$preg_2_1','$preg_2_2','$preg_2_3','$preg_2_4','$preg_2_5','$preg_2_6','$preg_2_7','$preg_2_otra','$preg_3','$preg_3_otra','$preg_4','$preg_4_otra','$preg_5_1','$preg_5_2','$preg_5_3','$preg_5_4','$preg_5_5','$preg_5_6','$preg_5_7','$preg_5_otra','$preg_6','$preg_7','$estado')";
        $resultado = mysqli_query($conexion, $insertar);

        }
    }
if(!$resultado){
    //var_dump($insertar);
        echo '
        <script>
        alert ("Hubo un error en el envio, contacte al area de soporte.");
        window.location.href = "../usuario.php";
        </script>';
}else{
        echo '
        <script>
        alert ("Encuesta enviada, espere su respuesta");
        window.location.href = "../usuario.php";
        </script>';
}    
}


?>
