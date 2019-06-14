<?php

//include "../conexionB-D.php";
if(isset($_GET["correo"]) || isset($_GET['val'])){
    
    $correo = $_GET['correo'];
    $token = $_GET['val'];
    
}
   
//$verificar_token = mysqli_query($conexion, "SELECT tipoUsuario FROM perfil WHERE correo ='$correo' AND token= '$token'");
//$resultado=mysqli_query($conexion,$verificar_token);
//$row = mysqli_fetch_array($resultado);

include "../conexionB-D.php";
$verificar_token="SELECT tipoUsuario FROM perfil WHERE correo ='$correo' AND token= '$token'";
$resultado=mysqli_query($conexion,$verificar_token);
$filas=mysqli_num_rows($resultado);
$row = mysqli_fetch_array($resultado);

if ($filas >0){
    
    if($row['tipoUsuario']==1){
    echo '
    <script>
    alert ("su cuenta ya ha sido activada anteriormente");
    window.location.href = "../login.php";
    </script>';
    exit; 
    
    }else{
        
        if($row['tipoUsuario']==0){
            
        echo '
        <script>
        alert ("su cuenta ya ha sido activada anteriormente");
        window.location.href = "../login.php";
        </script>';
        exit; 
        
        }else{
        
            if($row['tipoUsuario']==2){
            
            $tipoUsuario = 0;
            $modificar = "UPDATE perfil SET tipoUsuario='$tipoUsuario' WHERE token='$token' AND correo='$correo'";
            $resultado = mysqli_query($conexion, $modificar);
            
            if(!$resultado){
                echo '<script>
                alert ("Ocurrio un error...\nIntente mas tarde o contacte al area de soporte");
                window.history.go(-1);
                location.reload(true);
                </script>';
            }else{
                echo '
                <script>
                alert ("Su cuenta ha sido activada!");
                window.location.href = "../login.php";
                </script>';
                exit;
            }
            mysqli_close($conexion);
            
            }else{
        
            echo '
            <script>
            alert ("error");
            window.history.go(-1);
            </script>';
            exit; 
       
            }
       
        }
        
    }
    
    
}
else{
    echo '
    <script>
    alert ("no existe");
    window.history.go(-1);
    </script>';
    exit;
}
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
?>