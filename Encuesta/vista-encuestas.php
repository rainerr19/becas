<?php

    session_start();
    error_reporting(0);
                include "../conexionB-D.php";
                $id=$_REQUEST['id'];
                $sql="SELECT * from encuesta_ingreso_policia WHERE id='$id'";
                $resultado=mysqli_query($conexion,$sql);
                $mostrar=mysqli_fetch_array($resultado);
   if($_SESSION['validacion'] == 1){
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Encuesta - Fundacion leones educando</title>
        <link href="../assets/css/style.css" rel="stylesheet" />
        <link href="../assets/css/main-style.css" rel="stylesheet" />

        <?php
            include '../partes/link_head.php';
        ?>
    </head>

<body class="body_encuesta">

<?php

include '../partes/menu_top.php';

?>
<div class="contenido">     
    <form action="" class="form-encuesta">
       <h2 class="form-titulo">Revisión de encuesta</h2>
       <h3 style="text-align:center;">ENCUESTA DE RECIÉN INGRESADOS A LA POLÍCIA NACIONAL</h3>
        <div class="contenedor-encuesta">
           <div class="div-encuesta">
                <div class="div-encuesta">
                    <h4>Nombre: <label><?php echo $mostrar['nombre']; ?></label></h4>
                    <h4>Apellido: <label><?php echo $mostrar['apellido']; ?></label></h4>
                    <h4>Documento: <label><?php echo $mostrar['documento']; ?></label></h4> <br>
                    <h4>Correo: <label><?php echo $mostrar['correo']; ?></label></h4> <br>
                    <h4>Escuela de policia: <label><?php echo $mostrar['escuela']; ?></label></h4> <br>
                    <h4>Municipio: <label><?php echo $mostrar['preg_1']; ?></label></h4> <br>
                    <h4>Barrio o Ranchería: <label><?php echo $mostrar['preg_2']; ?></label></h4> <br>
                    <h4>Sexo:<label><?php echo $mostrar['preg_3']; ?></label></h4> <br>
                    <h4>Estrato: <label><?php echo $mostrar['preg_4']; ?></label></h4> <br>
                </div>
                <div class="div-encuesta">
                    <h4>5. Composición Familiar: cantidad de personas en las siguientes edades que hay en su familia:</h4>
                    <h4>De 0 a 5 años: <label><?php echo $mostrar['preg_5_opc_1']; ?></label></h4> <br>
                    <h4>De 6 a 13 años: <label><?php echo $mostrar['preg_5_opc_2']; ?></label></h4> <br>
                    <h4>De 14 a 17 años: <label><?php echo $mostrar['preg_5_opc_3']; ?></label></h4> <br>
                    <h4>De 18 a 26 años: <label><?php echo $mostrar['preg_5_opc_4']; ?></label></h4> <br>
                    <h4>De 27 a 59 años: <label><?php echo $mostrar['preg_5_opc_5']; ?></label></h4> <br>
                    <h4>De 60 años o más: <label><?php echo $mostrar['preg_5_opc_6']; ?></label></h4> <br>
                </div>
                <div class="div-encuesta">    
                    <h4>6. ¿Número de Personas que trabajan en la familia?:<label><?php echo $mostrar['preg_6']; ?></label></h4> <br>
                    <h4>7. ¿Cómo Percibe usted la participación de miembros de su comunidad en el programa de formación de la Policía Nacional?: <label>
                    <?php
                    if($mostrar['preg_7'] == "Otro"){
                        echo $mostrar['preg_7'].": ".$mostrar['preg_7_otro'];  
                    }else{
                        if($mostrar['preg_7']=="A"){
                            echo $mostrar['preg_7'];
                            echo ": No lo conocía";
                        }else{
                            if($mostrar['preg_7']=="B"){
                                echo $mostrar['preg_7'];
                                echo ": No creía";
                            }else{
                                if($mostrar['preg_7']=="C"){
                                    echo $mostrar['preg_7'];
                                    echo ": No es bien visto";
                                }else{
                                    if($mostrar['preg_7']=="D"){
                                        echo $mostrar['preg_7'];
                                        echo ": Es necesario";
                                    }else{
                                        if($mostrar['preg_7']=="E"){
                                            echo $mostrar['preg_7'];
                                            echo ": Buena oportunidad";
                                        }else{
                                            echo $mostrar['preg_7'];
                                        }
                                    }
                                }
                            }   
                        }
                    }
                    ?>
                    </label></h4> <br>
                </div>
                <div class="div-encuesta">
                   <h4>8. ¿Qué percepción hay en su comunidad de la presencia de los siguientes actores?</h4>
                    <h4>Gobierno: <label><?php echo $mostrar['preg_8_opc_1']; ?></label></h4> <br>
                    <h4>Policía Nacional: <label><?php echo $mostrar['preg_8_opc_2']; ?></label></h4> <br>
                    <h4>Ejercito: <label><?php echo $mostrar['preg_8_opc_3']; ?></label></h4> <br>
                    <h4>Organizaciones al margen de la ley: <label><?php echo $mostrar['preg_8_opc_4']; ?></label></h4> <br>
                    <h4>Grupos ilegales armados: <label><?php echo $mostrar['preg_8_opc_5']; ?></label></h4> <br>
                    <h4>Pandillas: <label><?php echo $mostrar['preg_8_opc_6']; ?></label></h4> <br>
                    <h4>Otros: <label><?php echo $mostrar['preg_8_opc_7']; ?></label></h4> <br>
                </div>
                <div class="div-encuesta">
                    <h4>9. ¿Por qué razón los jóvenes de su comunidad  entrarían a ser parte de grupos ilegales?: <label>
                    <?php 
                    if($mostrar['preg_9'] == "Otro"){
                        echo $mostrar['preg_9'].": ".$mostrar['preg_9_otro'];  
                    }else{
                        if($mostrar['preg_9']=="A"){
                            echo $mostrar['preg_9'];
                            echo ": Influencia de amigos";
                        }else{
                            if($mostrar['preg_9']=="B"){
                                echo $mostrar['preg_9'];
                                echo ": Mejor paga";
                            }else{
                                if($mostrar['preg_9']=="C"){
                                    echo $mostrar['preg_9'];
                                    echo ": Dinero facil";
                                }else{
                                    if($mostrar['preg_9']=="D"){
                                        echo $mostrar['preg_9'];
                                        echo ": No hay oportunidades de trabajo";
                                    }else{
                                        if($mostrar['preg_9']=="E"){
                                            echo $mostrar['preg_9'];
                                            echo ": Presión de los grupos ilegales";
                                        }else{
                                            echo $mostrar['preg_9'];
                                        }
                                    }
                                }
                            }   
                        }
                    }
                    ?>
                    </label></h4> <br>
                    <h4>10. ¿Qué lo motivó a participar en la Policía Nacional?: <label>
                    <?php 
                    if($mostrar['preg_10'] == "Otro"){
                        echo $mostrar['preg_10'].": ".$mostrar['preg_10_otro'];  
                    }else{
                        if($mostrar['preg_10']=="A"){
                            echo $mostrar['preg_10'];
                            echo ": Gusto";
                        }else{
                            if($mostrar['preg_10']=="B"){
                                echo $mostrar['preg_10'];
                                echo ": Dinero";
                            }else{
                                if($mostrar['preg_10']=="C"){
                                    echo $mostrar['preg_10'];
                                    echo ": Poder";
                                }else{
                                    if($mostrar['preg_10']=="D"){
                                        echo $mostrar['preg_10'];
                                        echo ": Disciplina";
                                    }else{
                                        if($mostrar['preg_10']=="E"){
                                            echo $mostrar['preg_10'];
                                            echo ": Única opción";
                                        }else{
                                            if($mostrar['preg_10']=="F"){
                                                echo $mostrar['preg_10'];
                                                echo ": Servir";
                                            }else{
                                            echo $mostrar['preg_10'];
                                            }
                                        }
                                    }
                                }
                            }   
                        }
                    }
                    ?>
                    </label></h4> <br>
                </div>
                <div class="div-encuesta">
                   <h4>11. ¿Qué tan fácil es en su comunidad encontrar la presencia de los siguientes actores?:</h4>
                    <h4>Gobierno: <label><?php echo $mostrar['preg_11_opc_1']; ?></label></h4> <br>
                    <h4>Policía Nacional: <label><?php echo $mostrar['preg_11_opc_2']; ?></label></h4> <br>
                    <h4>Ejercito: <label><?php echo $mostrar['preg_11_opc_3']; ?></label></h4> <br>
                    <h4>Organizaciones al margen de la ley: <label><?php echo $mostrar['preg_11_opc_4']; ?></label></h4> <br>
                    <h4>Grupos ilegales armados: <label><?php echo $mostrar['preg_11_opc_5']; ?></label></h4> <br>
                    <h4>Pandillas: <label><?php echo $mostrar['preg_11_opc_6']; ?></label></h4> <br>
                    <h4>Otros: <label><?php echo $mostrar['preg_11_opc_7']; ?></label></h4> <br>
                </div>
                <div class="div-encuesta">
                    <h4>12. ¿A través de qué medio de comunicación recibió información sobre el programa de becas de la Policía Nacional?: <label>
                    <?php 
                    if($mostrar['preg_12'] == "Otro"){
                        echo $mostrar['preg_12'].": ".$mostrar['preg_12_otro'];  
                    }else{
                        if($mostrar['preg_12']=="A"){
                            echo $mostrar['preg_12'];
                            echo ": Ninguno";
                        }else{
                            if($mostrar['preg_12']=="B"){
                                echo $mostrar['preg_12'];
                                echo ": TV";
                            }else{
                                if($mostrar['preg_12']=="C"){
                                    echo $mostrar['preg_12'];
                                    echo ": Radio";
                                }else{
                                    if($mostrar['preg_12']=="D"){
                                        echo $mostrar['preg_12'];
                                        echo ": Internet";
                                    }else{
                                        if($mostrar['preg_12']=="E"){
                                            echo $mostrar['preg_12'];
                                            echo ": Celular";
                                        }else{
                                            if($mostrar['preg_12']=="F"){
                                                echo $mostrar['preg_12'];
                                                echo ": Prensa";
                                            }else{
                                                if($mostrar['preg_12']=="G"){
                                                    echo $mostrar['preg_12'];
                                                    echo ": Revistas";
                                                }else{
                                                     if($mostrar['preg_12']=="H"){
                                                    echo $mostrar['preg_12'];
                                                    echo ": Volantes";
                                                }else{
                                                    echo $mostrar['preg_12'];
                                                }
                                                }
                                            }
                                        }
                                    }
                                }
                            }   
                        }
                    }
                    ?>
                    </label></h4> <br>
                </div>
                <div class="div-encuesta">
                   <h4>13. Qué tan importante es para Ud. Los siguientes servicios al entrar a la Policía?</h4>
                    <h4>Variedad de trabajo: <label><?php echo $mostrar['preg_13_opc_1']; ?></label></h4> <br>
                    <h4>Recibir buena atención al entrar: <label><?php echo $mostrar['preg_13_opc_2']; ?></label></h4> <br>
                    <h4>Consideración en su Comunidad : <label><?php echo $mostrar['preg_13_opc_3']; ?></label></h4> <br>
                    <h4>Conocimiento y explicación clara por parte del personal: <label><?php echo $mostrar['preg_13_opc_4']; ?></label></h4> <br>
                    <h4>Otros: <label><?php echo $mostrar['preg_13_opc_5']; ?></label></h4> <br>
                </div>
                <div class="div-encuesta">
                    <h4>14. ¿Cómo Valora los siguientes atributos de la Policía Nacional ahora que hace parte de ella?:</h4>
                    <h4>Relación de Calidad: <label><?php echo $mostrar['preg_14_opc_1']; ?></label></h4> <br>
                    <h4>Orientación hacia la Satisfacción del Cliente: <label><?php echo $mostrar['preg_14_opc_2']; ?></label></h4> <br>
                    <h4>Servicio de respuestas a solicitudes: <label><?php echo $mostrar['preg_14_opc_3']; ?></label></h4> <br>
                    <h4>Difusión de programas y proyectos sociales: <label><?php echo $mostrar['preg_14_opc_4']; ?></label></h4> <br>
                    <h4>Profesionalidad: <label><?php echo $mostrar['preg_14_opc_5']; ?></label></h4> <br>
                    <h4>Bien Organizada: <label><?php echo $mostrar['preg_14_opc_6']; ?></label></h4> <br>
                </div>
                <div class="div-encuesta">
                    <h4>15. Qué percepción tienen en su comunidad y/o Familia sobre su ingreso al programa de Formación de la Policía Nacional?: <label><?php echo $mostrar['preg_15']; ?></label></h4> <br>
                    <h4>16. ¿Saben en su comunidad y/o familia que usted está becado por la embajada de los Estados Unidos?: <label>
                        <?php 
                        if($mostrar['preg_16']=="A"){
                            echo $mostrar['preg_16'];
                            echo ": No lo conocían";
                        }else{
                            if($mostrar['preg_16']=="B"){
                                echo $mostrar['preg_16'];
                                echo ": No creían";
                            }else{
                                if($mostrar['preg_16']=="C"){
                                    echo $mostrar['preg_16'];
                                    echo ": No es bien visto";
                                }else{
                                    if($mostrar['preg_16']=="D"){
                                        echo $mostrar['preg_16'];
                                        echo ": Es necesario";
                                    }else{
                                        if($mostrar['preg_16']=="E"){
                                            echo $mostrar['preg_16'];
                                            echo ": Plenamente conocido";
                                        }else{
                                            echo $mostrar['preg_16'];
                                        }
                                    }
                                }
                            }
                        }
                    
                    
                        ?>
                        </label></h4> <br>
                    <h4>17. ¿Cómo lo califica usted El programa de becas de la embajada de los E.E.U.U? Indiferente: <label>
                        <?php 
                        if($mostrar['preg_17']=="A"){
                            echo $mostrar['preg_17'];
                            echo ": Indiferente";
                        }else{
                            if($mostrar['preg_17']=="B"){
                                echo $mostrar['preg_17'];
                                echo ": Malo";
                            }else{
                                if($mostrar['preg_17']=="C"){
                                    echo $mostrar['preg_17'];
                                    echo ": Regular";
                                }else{
                                    if($mostrar['preg_17']=="D"){
                                        echo $mostrar['preg_17'];
                                        echo ": Bueno";
                                    }else{
                                        if($mostrar['preg_17']=="E"){
                                            echo $mostrar['preg_17'];
                                            echo ": Excelente";
                                        }else{
                                            echo $mostrar['preg_17'];
                                        }
                                    }
                                }
                            }
                        }
                        ?>
                        </label></h4> <br>
                    <h4>18. Usted le gustaría al momento de terminar esta fase: <label>
                        <?php 
                        if($mostrar['preg_18']=="A"){
                            echo $mostrar['preg_18'];
                            echo ": No continuar";
                        }else{
                            if($mostrar['preg_18']=="B"){
                                echo $mostrar['preg_18'];
                                echo ": Continuar";
                            }else{
                                if($mostrar['preg_18']=="C"){
                                    echo $mostrar['preg_18'];
                                    echo ": Estudiar otra cosa";
                                }else{
                                    if($mostrar['preg_18']=="D"){
                                        echo $mostrar['preg_18'];
                                        echo ": Buscar otra opción en las fuerzas militares";
                                    }else{
                                        echo $mostrar['preg_18'];
                                    }
                                }
                            }
                        }
                    
                        ?>
                        </label></h4> <br>
                </div>
                <div class="div-encuesta">
                    <h4>19. ¿Cuál de las siguientes opciones era  la más importante para usted?</h4>
                    <h4>Armada Nacional: <label><?php echo $mostrar['preg_19_opc_1']; ?></label></h4> <br>
                    <h4>Policía Nacional: <label><?php echo $mostrar['preg_19_opc_2']; ?></label></h4> <br>
                    <h4>Ejercito: <label><?php echo $mostrar['preg_19_opc_3']; ?></label></h4> <br>
                    <h4>Organizaciones al margen de la ley: <label><?php echo $mostrar['preg_19_opc_4']; ?></label></h4> <br>
                    <h4>Grupos ilegales armados: <label><?php echo $mostrar['preg_19_opc_5']; ?></label></h4> <br>
                    <h4>Pandillas: <label><?php echo $mostrar['preg_19_opc_6']; ?></label></h4> <br>
                    <h4>Otros: <label><?php echo $mostrar['preg_19_opc_7']; ?></label></h4> <br>
                </div>                
                <div class="div-encuesta">
                    <h4>20. A qué personas le ha recomendado o recomendaría  pertenecer a la Policía Nacional?: <label>
                    <?php 
                    if($mostrar['preg_20'] == "Otro"){
                        echo $mostrar['preg_20'].": ".$mostrar['preg_20_otro'];  
                    }else{
                        if($mostrar['preg_20']=="A"){
                            echo $mostrar['preg_20'];
                            echo ": Familiares";
                        }else{
                            if($mostrar['preg_20']=="B"){
                                echo $mostrar['preg_20'];
                                echo ": Amigos";
                            }else{
                                echo $mostrar['preg_20'];
                            }
                        }
                    }
                    ?>
                    </label></h4> <br> 
                </div>
                <div class="div-encuesta-top">
                <?php
       
                    $url = $mostrar['correo'];
                    echo "<a href='aceptar.php?correo=";
                    echo "$url";
                    echo "'class='submit-encuesta' style='text-decoration: none;'><input style='width:100%; text-decoration: none;' type='button' value='aceptar' class='submit-encuesta' ></a>";
       
                ?>     
                    
                <?php
       
                    $url = $mostrar['correo'];
                    echo "<a href='rechazar.php?correo=";
                    echo "$url";
                    echo "'class='submit-encuesta' style='text-decoration: none;'><input style='width:100%; text-decoration:none' type='button' value='rechazar' class='submit-encuesta2' style='text-decoration: none;'></a>";
       
                ?>                    
                    
                </div>
            </div>
        </div>
    </form>
</div>
<?php
        include '../partes/footer.php';

        ?>
</body>
</html>
<?php
  }else{
      header("location:../login.php");
  }
?> 