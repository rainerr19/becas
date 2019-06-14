<?php
    include "../conexionB-D.php";
                        
//echo $_SESSION['nombre'];
//echo " ";
//echo $_SESSION['apellido'];
session_start();
error_reporting(0);

$fecha = date("d-m-Y H:i:s");

$apellido = $_SESSION["apellido"];

$nombre = $_SESSION["nombre"];

if($_SESSION["numeroDocumento"] == ""){
    $documento = $_POST["documento"];
}else{
    $documento = $_SESSION["numeroDocumento"];    
}


$correo = $_SESSION["correo"];

$escuela = $_POST["escuela"];

$preg_1 = $_POST["preg_1"];

$preg_2 = $_POST["preg_2"];

$preg_3 = $_POST["preg_3"];

$preg_4 = $_POST["preg_4"];

$preg_5_opc_1 = $_POST["preg_5_opc_1"];
$preg_5_opc_2 = $_POST["preg_5_opc_2"];
$preg_5_opc_3 = $_POST["preg_5_opc_3"];
$preg_5_opc_4 = $_POST["preg_5_opc_4"];
$preg_5_opc_5 = $_POST["preg_5_opc_5"];
$preg_5_opc_6 = $_POST["preg_5_opc_6"];

$preg_6 = $_POST["preg_6"];

$preg_7 = $_POST["preg_7"];
$preg_7_otro = $_POST["preg_7_otro"];

$preg_8_opc_1 = $_POST["preg_8_opc_1"];
$preg_8_opc_2 = $_POST["preg_8_opc_2"];
$preg_8_opc_3 = $_POST["preg_8_opc_3"];
$preg_8_opc_4 = $_POST["preg_8_opc_4"];
$preg_8_opc_5 = $_POST["preg_8_opc_5"];
$preg_8_opc_6 = $_POST["preg_8_opc_6"];
$preg_8_opc_7 = $_POST["preg_8_opc_7"];

$preg_9 = $_POST["preg_9"];
$preg_9_otro = $_POST["preg_9_otro"];

$preg_10 = $_POST["preg_10"];
$preg_10_otro = $_POST["preg_10_otro"];

$preg_11_opc_1 = $_POST["preg_11_opc_1"];
$preg_11_opc_2 = $_POST["preg_11_opc_2"];
$preg_11_opc_3 = $_POST["preg_11_opc_3"];
$preg_11_opc_4 = $_POST["preg_11_opc_4"];
$preg_11_opc_5 = $_POST["preg_11_opc_5"];
$preg_11_opc_6 = $_POST["preg_11_opc_6"];
$preg_11_opc_7 = $_POST["preg_11_opc_7"];

$preg_12 = $_POST["preg_12"];
$preg_12_otro = $_POST["preg_12_otro"];

$preg_13_opc_1 = $_POST["preg_13_opc_1"];
$preg_13_opc_2 = $_POST["preg_13_opc_2"];
$preg_13_opc_3 = $_POST["preg_13_opc_3"];
$preg_13_opc_4 = $_POST["preg_13_opc_4"];
$preg_13_opc_5 = $_POST["preg_13_opc_5"];

$preg_14_opc_1 = $_POST["preg_14_opc_1"];
$preg_14_opc_2 = $_POST["preg_14_opc_2"];
$preg_14_opc_3 = $_POST["preg_14_opc_3"];
$preg_14_opc_4 = $_POST["preg_14_opc_4"];
$preg_14_opc_5 = $_POST["preg_14_opc_5"];
$preg_14_opc_6 = $_POST["preg_14_opc_6"];

$preg_15 = $_POST["preg_15"];

$preg_16 = $_POST["preg_16"];

$preg_17 = $_POST["preg_17"];

$preg_18 = $_POST["preg_18"];

$preg_19_opc_1 = $_POST["preg_19_opc_1"];
$preg_19_opc_2 = $_POST["preg_19_opc_2"];
$preg_19_opc_3 = $_POST["preg_19_opc_3"];
$preg_19_opc_4 = $_POST["preg_19_opc_4"];
$preg_19_opc_5 = $_POST["preg_19_opc_5"];
$preg_19_opc_6 = $_POST["preg_19_opc_6"];
$preg_19_opc_7 = $_POST["preg_19_opc_7"];

$preg_20 = $_POST["preg_20"];
$preg_20_otro = $_POST["preg_20_otro"];

/*--------------------------------------------------------------CONTRA INYECCION SQL--------------------------------------------------------------*/

$apellido = trim($apellido);
$apellido = htmlspecialchars($apellido);

/*-----------------------------------------------------*/

$documento = trim($documento);
$documento = htmlspecialchars($documento);

/*-----------------------------------------------------*/

$correo = trim($correo);
$correo = htmlspecialchars($correo);

/*-----------------------------------------------------*/

$escuela = trim($escuela);
$escuela = htmlspecialchars($escuela);

/*-----------------------------------------------------*/

$preg_1 = trim($preg_1);
$preg_1 = htmlspecialchars($preg_1);

/*-----------------------------------------------------*/

$preg_2 = trim($preg_2);
$preg_2 = htmlspecialchars($preg_2);

/*-----------------------------------------------------*/

$preg_3 = trim($preg_3);
$preg_3 = htmlspecialchars($preg_3);

/*-----------------------------------------------------*/

$preg_4 = trim($preg_4);
$preg_4 = htmlspecialchars($preg_4);

/*-----------------------------------------------------*/

$preg_5_opc_1 = trim($preg_5_opc_1);
$preg_5_opc_1 = htmlspecialchars($preg_5_opc_1);

$preg_5_opc_2 = trim($preg_5_opc_2);
$preg_5_opc_2 = htmlspecialchars($preg_5_opc_2);

$preg_5_opc_3 = trim($preg_5_opc_3);
$preg_5_opc_3 = htmlspecialchars($preg_5_opc_3);

$preg_5_opc_4 = trim($preg_5_opc_4);
$preg_5_opc_4 = htmlspecialchars($preg_5_opc_4);

$preg_5_opc_5 = trim($preg_5_opc_5);
$preg_5_opc_5 = htmlspecialchars($preg_5_opc_5);

$preg_5_opc_6 = trim($preg_5_opc_6);
$preg_5_opc_6 = htmlspecialchars($preg_5_opc_6);

/*-----------------------------------------------------*/

$preg_6 = trim($preg_6);
$preg_6 = htmlspecialchars($preg_6);

/*-----------------------------------------------------*/

$preg_7 = trim($preg_7);
$preg_7 = htmlspecialchars($preg_7);

$preg_7_otro = trim($preg_7_otro);
$preg_7_otro = htmlspecialchars($preg_7_otro);

/*-----------------------------------------------------*/

$preg_8_opc_1 = trim($preg_8_opc_1);
$preg_8_opc_1 = htmlspecialchars($preg_8_opc_1);

$preg_8_opc_2 = trim($preg_8_opc_2);
$preg_8_opc_2 = htmlspecialchars($preg_8_opc_2);

$preg_8_opc_3 = trim($preg_8_opc_3);
$preg_8_opc_3 = htmlspecialchars($preg_8_opc_3);

$preg_8_opc_4 = trim($preg_8_opc_4);
$preg_8_opc_4 = htmlspecialchars($preg_8_opc_4);

$preg_8_opc_5 = trim($preg_8_opc_5);
$preg_8_opc_5 = htmlspecialchars($preg_8_opc_5);

$preg_8_opc_6 = trim($preg_8_opc_6);
$preg_8_opc_6 = htmlspecialchars($preg_8_opc_6);

$preg_8_opc_7 = trim($preg_8_opc_7);
$preg_8_opc_7 = htmlspecialchars($preg_8_opc_7);

/*-----------------------------------------------------*/

$preg_9 = trim($preg_9);
$preg_9 = htmlspecialchars($preg_9);

$preg_9_otro = trim($preg_9_otro);
$preg_9_otro = htmlspecialchars($preg_9_otro);

/*-----------------------------------------------------*/

$preg_10 = trim($preg_10);
$preg_10 = htmlspecialchars($preg_10);

$preg_10_otro = trim($preg_10_otro);
$preg_10_otro = htmlspecialchars($preg_10_otro);

/*-----------------------------------------------------*/

$preg_11_opc_1 = trim($preg_11_opc_1);
$preg_11_opc_1 = htmlspecialchars($preg_11_opc_1);

$preg_11_opc_2 = trim($preg_11_opc_2);
$preg_11_opc_2 = htmlspecialchars($preg_11_opc_2);

$preg_11_opc_3 = trim($preg_11_opc_3);
$preg_11_opc_3 = htmlspecialchars($preg_11_opc_3);

$preg_11_opc_4 = trim($preg_11_opc_4);
$preg_11_opc_4 = htmlspecialchars($preg_11_opc_4);

$preg_11_opc_5 = trim($preg_11_opc_5);
$preg_11_opc_5 = htmlspecialchars($preg_11_opc_5);

$preg_11_opc_6 = trim($preg_11_opc_6);
$preg_11_opc_6 = htmlspecialchars($preg_11_opc_6);

$preg_11_opc_7 = trim($preg_11_opc_7);
$preg_11_opc_7 = htmlspecialchars($preg_11_opc_7);

/*-----------------------------------------------------*/

$preg_12 = trim($preg_12);
$preg_12 = htmlspecialchars($preg_12);

$preg_12_otro = trim($preg_12_otro);
$preg_12_otro = htmlspecialchars($preg_12_otro);

/*-----------------------------------------------------*/

$preg_13_opc_1 = trim($preg_13_opc_1);
$preg_13_opc_1 = htmlspecialchars($preg_13_opc_1);

$preg_13_opc_2 = trim($preg_13_opc_2);
$preg_13_opc_2 = htmlspecialchars($preg_13_opc_2);

$preg_13_opc_3 = trim($preg_13_opc_3);
$preg_13_opc_3 = htmlspecialchars($preg_13_opc_3);

$preg_13_opc_4 = trim($preg_13_opc_4);
$preg_13_opc_4 = htmlspecialchars($preg_13_opc_4);

$preg_13_opc_5 = trim($preg_13_opc_5);
$preg_13_opc_5 = htmlspecialchars($preg_13_opc_5);

/*-----------------------------------------------------*/

$preg_14_opc_1 = trim($preg_14_opc_1);
$preg_14_opc_1 = htmlspecialchars($preg_14_opc_1);

$preg_14_opc_2 = trim($preg_14_opc_2);
$preg_14_opc_2 = htmlspecialchars($preg_14_opc_2);

$preg_14_opc_3 = trim($preg_14_opc_3);
$preg_14_opc_3 = htmlspecialchars($preg_14_opc_3);

$preg_14_opc_4 = trim($preg_14_opc_4);
$preg_14_opc_4 = htmlspecialchars($preg_14_opc_4);

$preg_14_opc_5 = trim($preg_14_opc_5);
$preg_14_opc_5 = htmlspecialchars($preg_14_opc_5);

$preg_14_opc_6 = trim($preg_14_opc_6);
$preg_14_opc_6 = htmlspecialchars($preg_14_opc_6);

/*-----------------------------------------------------*/

$preg_15 = trim($preg_15);
$preg_15 = htmlspecialchars($preg_15);

/*-----------------------------------------------------*/

$preg_16 = trim($preg_16);
$preg_16 = htmlspecialchars($preg_16);

/*-----------------------------------------------------*/

$preg_17 = trim($preg_17);
$preg_17 = htmlspecialchars($preg_17);

/*-----------------------------------------------------*/

$preg_18 = trim($preg_18);
$preg_18 = htmlspecialchars($preg_18);

/*-----------------------------------------------------*/

$preg_19_opc_1 = trim($preg_19_opc_1);
$preg_19_opc_1 = htmlspecialchars($preg_19_opc_1);

$preg_19_opc_2 = trim($preg_19_opc_2);
$preg_19_opc_2 = htmlspecialchars($preg_19_opc_2);

$preg_19_opc_3 = trim($preg_19_opc_3);
$preg_19_opc_3 = htmlspecialchars($preg_19_opc_3);

$preg_19_opc_4 = trim($preg_19_opc_4);
$preg_19_opc_4 = htmlspecialchars($preg_19_opc_4);

$preg_19_opc_5 = trim($preg_19_opc_5);
$preg_19_opc_5 = htmlspecialchars($preg_19_opc_5);

$preg_19_opc_6 = trim($preg_19_opc_6);
$preg_19_opc_6 = htmlspecialchars($preg_19_opc_6);

$preg_19_opc_7 = trim($preg_19_opc_7);
$preg_19_opc_7 = htmlspecialchars($preg_19_opc_7);

/*-----------------------------------------------------*/

$preg_20 = trim($preg_20);
$preg_20 = htmlspecialchars($preg_20);

$preg_20_otro = trim($preg_20_otro);
$preg_20_otro = htmlspecialchars($preg_20_otro);

/*-----------------------------------------------------*/



$verificar_correo = mysqli_query($conexion, "SELECT * FROM encuesta_ingreso_policia WHERE correo ='$correo' ");
    
     if (mysqli_num_rows($verificar_correo) >0){
        echo '
        <script>
        alert ("Ya ha relizado esta encuesta anteriormente, espere su respuesta");
        window.location.href = "../usuario.php";
        </script>';
        exit;
     }else{

 if(empty($escuela) || empty($preg_1) || empty($preg_2)  || $preg_3 == ""  || $preg_4 == "" || $preg_5_opc_1 == "" || $preg_5_opc_2 == "" || $preg_5_opc_3 == "" || $preg_5_opc_4 == "" || $preg_5_opc_5 == "" || $preg_5_opc_6 == "" || $preg_6 == "" || $preg_7 == "" || $preg_8_opc_1 == "" || $preg_8_opc_2 == "" || $preg_8_opc_3 == "" || $preg_8_opc_4 == "" || $preg_8_opc_5 == "" || $preg_8_opc_6 == "" || $preg_9 == "" || $preg_10 == "" || $preg_11_opc_1 == "" || $preg_11_opc_2 == "" || $preg_11_opc_3 == "" || $preg_11_opc_4 == "" || $preg_11_opc_5 == "" || $preg_11_opc_6 == "" || $preg_12 == "" || $preg_13_opc_1 == "" || $preg_13_opc_2 == "" || $preg_13_opc_3 == "" || $preg_13_opc_4 == "" || $preg_14_opc_1 == "" || $preg_14_opc_2 == "" || $preg_14_opc_3 == "" || $preg_14_opc_4 == "" || $preg_14_opc_5 == "" || $preg_14_opc_6 == "" || $preg_15 == "" || $preg_16 == "" || $preg_17 == "" || $preg_18 == "" || $preg_19_opc_1 == "" || $preg_19_opc_2 == "" || $preg_19_opc_3 == "" || $preg_19_opc_4 == "" || $preg_19_opc_5 == "" || $preg_19_opc_6 == "" || $preg_20 == ""  ){
     
     echo '
    <script>
    alert ("llene todos los campos");
    window.history.go(-1);
    </script>
    ';
    exit;
    
}else{
     /*if (!is_numeric($documento)){
           echo '
            <script>
            alert ("el documento no es valido");
            window.history.go(-1);
            </script>
            ';
            exit;
     }else{*/
     if (!is_numeric($preg_6)){
           echo '
            <script>
            alert ("la pregunta 10 no es valida");
            window.history.go(-1);
            </script>
            ';
            exit;
     }else{
     if (!is_numeric($preg_5_opc_1) || !is_numeric($preg_5_opc_2) || !is_numeric($preg_5_opc_3) || !is_numeric($preg_5_opc_4) || !is_numeric($preg_5_opc_5) || !is_numeric($preg_5_opc_6)){
           echo '
            <script>
            alert ("la pregunta 9 no es valida");
            window.history.go(-1);
            </script>
            ';
            exit;
     }else{
         

   $insertar = "INSERT INTO encuesta_ingreso_policia(fecha, apellido, nombre, documento, correo, escuela, preg_1, preg_2, preg_3, preg_4, preg_5_opc_1, preg_5_opc_2, preg_5_opc_3, preg_5_opc_4, preg_5_opc_5, preg_5_opc_6, preg_6, preg_7, preg_7_otro, preg_8_opc_1, preg_8_opc_2, preg_8_opc_3, preg_8_opc_4, preg_8_opc_5, preg_8_opc_6, preg_8_opc_7, preg_9, preg_9_otro, preg_10, preg_10_otro, preg_11_opc_1, preg_11_opc_2, preg_11_opc_3, preg_11_opc_4, preg_11_opc_5, preg_11_opc_6, preg_11_opc_7, preg_12, preg_12_otro, preg_13_opc_1, preg_13_opc_2, preg_13_opc_3, preg_13_opc_4, preg_13_opc_5, preg_14_opc_1, preg_14_opc_2, preg_14_opc_3, preg_14_opc_4, preg_14_opc_5, preg_14_opc_6, preg_15, preg_16, preg_17, preg_18, preg_19_opc_1, preg_19_opc_2, preg_19_opc_3, preg_19_opc_4, preg_19_opc_5, preg_19_opc_6, preg_19_opc_7, preg_20, preg_20_otro) VALUES ('$fecha','$apellido','$nombre','$documento','$correo','$escuela','$preg_1','$preg_2','$preg_3','$preg_4','$preg_5_opc_1','$preg_5_opc_2','$preg_5_opc_3','$preg_5_opc_4','$preg_5_opc_5','$preg_5_opc_6','$preg_6','$preg_7','$preg_7_otro','$preg_8_opc_1','$preg_8_opc_2','$preg_8_opc_3','$preg_8_opc_4','$preg_8_opc_5','$preg_8_opc_6','$preg_8_opc_7','$preg_9','$preg_9_otro','$preg_10','$preg_10_otro','$preg_11_opc_1','$preg_11_opc_2','$preg_11_opc_3','$preg_11_opc_4','$preg_11_opc_5','$preg_11_opc_6','$preg_11_opc_7','$preg_12','$preg_12_otro','$preg_13_opc_1','$preg_13_opc_2','$preg_13_opc_3','$preg_13_opc_4','$preg_13_opc_5','$preg_14_opc_1','$preg_14_opc_2','$preg_14_opc_3','$preg_14_opc_4','$preg_14_opc_5','$preg_14_opc_6','$preg_15','$preg_16','$preg_17','$preg_18','$preg_19_opc_1','$preg_19_opc_2','$preg_19_opc_3','$preg_19_opc_4','$preg_19_opc_5','$preg_19_opc_6','$preg_19_opc_7','$preg_20','$preg_20_otro')";


$resultado = mysqli_query($conexion, $insertar);
     }}}
if(!$resultado){
        echo '
        <script>
        alert ("Hubo un error en el envio, contacte al area de soporte");
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
