<?php
    session_start();
    error_reporting(0);

//usuario o admi
    if($_SESSION['validacion'] == 2 || $_SESSION['validacion'] == 1){   
        $DepJson = file_get_contents("../assets/js/departamentos.json"); 
        $Dep = json_decode($DepJson, true);      
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta - Fundacion leones educando</title>
    <?php
        include '../partes/link_head.php';
    ?>
</head>

<?php
 
 include '../partes/menu_top.php';  
?>
<body style="background-color: #2a2a2a">

    <button onclick="topFunction()" id="btn-top" title="vuelve al comienzo">Subir</button>     
    <div class="container-fluid"> 
        <div class="col-md-10 offset-md-1 pt-3">

            <div class="card border-info mb-2">
                <div class="card-header text-white border-info mb-3" style="background-color: #022606">
                    
                    <h2 >Encuesta para recién ingresado a la Policía Nacional</h2>
                </div>
                <div class="card-body">
                    <form action="validation-envio.php" method="post">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nombre" class="col-form-label-lg">Nombres</label>
                                <input type="text" class="form-control form-control-lg" placeholder="nombre" id="nombre" 
                                    name="nombre" value="<?php
                                        echo $_SESSION['nombre'];?>"
                                    disabled>
                                    
                                
                            </div>
                            <div class="form-group col-md-6">
                                <label for="apellido" class="col-form-label-lg">Apellido</label>
                            
                                <input type="text" class="form-control form-control-lg" placeholder="Apellido" id="apellido" 
                                    name="apellido" value="<?php 
                                        echo $_SESSION['apellido']; 
                                        echo" "; 
                                        echo $_SESSION['segundoApellido'];?>" 
                                    disabled>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="documento" class="col-form-label-lg">Documento</label>
                                <input type="text" class="form-control form-control-lg" placeholder="Documento" id="documento" 
                                    name="documento"
                                    <?php if(!empty($_SESSION['numeroDocumento'])){
                                        echo "value='";
                                        echo $_SESSION['numeroDocumento'];
                                        echo "'";
                                        echo "disabled";
                                    } ?>    
                                    required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="departamento" class="col-form-label-lg">Departamento</label>
                                <select name="departamento" class="form-control form-control-lg" required>
                                    <option></option>
                                <?php  foreach ($Dep as $key => $departamento) {
                                    echo '<option value="'.$departamento.'">'.$departamento.'</option>';
                                    }
                                     ?>
                                
                                </select>
                                

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="municipio" class="col-form-label-lg">Municipio</label>
                                <input type="text" class="form-control form-control-lg" placeholder="Municipio"
                                    name="municipio" required>
                                
                            </div>
                            <div class="form-group col-md-6">
                                <label for="barrio" class="col-form-label-lg">Barrio o Ranchería</label>
                            
                                <input type="text" class="form-control form-control-lg" placeholder="Barrio o Ranchería" id="departamento" 
                                    name="barrio" required>

                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="col-form-label-lg">Sexo</label>
                                
                                <select name="sexo" class="form-control form-control-lg" required>
                                        <option></option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    
                                </select>
                                
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-form-label-lg">Estrato</label>
                                <select name="estrato" class="form-control form-control-lg" required>
                                        <option></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="rural">Rural</option>
                                    
                                </select>
                            </div>
                        </div>              
                            
                        <div class="form-group">
                            <h4>1.	¿En qué programa de formación se encuentra?</h4>
                            <select class="form-control form-control-lg" name="preg_1" required>
                                    <option></option>
                                    <option value="Sub oficial">Sub oficial</option>
                                    <option value="Oficial">Oficial</option>
                                    <option value="Patrullero">Patrullero</option>
                            </select>
                        </div>
                        
                        <hr>
                        
                        <h4>2.	¿Qué percepción tenías antes de estar al programa de  los siguientes actores? </h4>
                        <div class="container table-responsive">

                            <table class="table table-bordered">
                                <thead>
                                        <!-- <th colspan="3">Acción</th> -->
                                        <th><label>Actores</label></th>
                                        <th><label>Nivel de percepción</label></th>
                                </thead>
                                <tr>
                                    <td class="col-form-label-lg"><label>Gobierno</label></td>
                                    <td class="form-control">
                                        <select class="form-control" name="preg_2_1" required>
                                            <option></option>
                                            <option value="Nada Beneficiosa">Nada Beneficiosa</option>
                                            <option value="Poco Beneficiosa">Poco Beneficiosa</option>
                                            <option value="Indiferente">Indiferente</option>
                                            <option value="Beneficiosa">Beneficiosa</option>
                                            <option value="Muy Beneficiosa">Muy Beneficiosa</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="col-form-label-lg">Policía nacional</label></td>
                                    <td class="form-control">
                                        <select class="form-control" class="form-control" name="preg_2_2" required>
                                            <option></option>
                                            <option value="Nada Beneficiosa">Nada Beneficiosa</option>
                                            <option value="Poco Beneficiosa">Poco Beneficiosa</option>
                                            <option value="Indiferente">Indiferente</option>
                                            <option value="Beneficiosa">Beneficiosa</option>
                                            <option value="Muy Beneficiosa">Muy Beneficiosa</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="col-form-label-lg">Ejército</label></td>
                                    <td class="form-control">
                                        <select class="form-control" name="preg_2_3" required>
                                            <option></option>
                                            <option value="Nada Beneficiosa">Nada Beneficiosa</option>
                                            <option value="Poco Beneficiosa">Poco Beneficiosa</option>
                                            <option value="Indiferente">Indiferente</option>
                                            <option value="Beneficiosa">Beneficiosa</option>
                                            <option value="Muy Beneficiosa">Muy Beneficiosa</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="col-form-label-lg">Organizaciones al margen de la ley</label></td>
                                    <td class="form-control">
                                        <select class="form-control" name="preg_2_4" required>
                                            <option></option>
                                            <option value="Nada Beneficiosa">Nada Beneficiosa</option>
                                            <option value="Poco Beneficiosa">Poco Beneficiosa</option>
                                            <option value="Indiferente">Indiferente</option>
                                            <option value="Beneficiosa">Beneficiosa</option>
                                            <option value="Muy Beneficiosa">Muy Beneficiosa</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="col-form-label-lg">Grupos ilegales armados</label></td>
                                    <td class="form-control">
                                        <select class="form-control" name="preg_2_5" required>
                                            <option></option>
                                            <option value="Nada Beneficiosa">Nada Beneficiosa</option>
                                            <option value="Poco Beneficiosa">Poco Beneficiosa</option>
                                            <option value="Indiferente">Indiferente</option>
                                            <option value="Beneficiosa">Beneficiosa</option>
                                            <option value="Muy Beneficiosa">Muy Beneficiosa</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="col-form-label-lg">Pandillas</label></td>
                                    <td class="form-control">
                                        <select class="form-control" name="preg_2_6" required>
                                            <option></option>
                                            <option value="Nada Beneficiosa">Nada Beneficiosa</option>
                                            <option value="Poco Beneficiosa">Poco Beneficiosa</option>
                                            <option value="Indiferente">Indiferente</option>
                                            <option value="Beneficiosa">Beneficiosa</option>
                                            <option value="Muy Beneficiosa">Muy Beneficiosa</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="col-form-label-lg">Otros:</label><input type="text" name="preg_2_otra" maxlength="99" placeholder="¿Cuáles?"></td>
                                    <td class="form-control">
                                        <select class="form-control" name="preg_2_7" id='preg_2_7'>
                                            <option></option>
                                            <option value="Nada Beneficiosa">Nada Beneficiosa</option>
                                            <option value="Poco Beneficiosa">Poco Beneficiosa</option>
                                            <option value="Indiferente">Indiferente</option>
                                            <option value="Beneficiosa">Beneficiosa</option>
                                            <option value="Muy Beneficiosa">Muy Beneficiosa</option>
                                        </select>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>

                        <hr>

                        <div class="form-group">
                            
                            <h4>3.	¿Por qué razón los jóvenes de su comunidad entrarían a ser parte de grupos ilegales?</h4>
                            <div class="form-check">
                                
                                <label><input type="radio" name="preg_3" value="Influencia de amigos" required> A. Influencia de amigos.</label> <br>
                                <label><input type="radio" name="preg_3" value="Mejor paga"> B. Mejor paga.</label> <br>
                                <label><input type="radio" name="preg_3" value="Dinero fácil"> C. Dinero fácil.</label> <br>
                                <label><input type="radio" name="preg_3" value="No hay oportunidades de trabajo"> D. No hay oportunidades de trabajo.</label> <br>
                                <label><input type="radio" name="preg_3" value="Presión de grupos ilegales"> E. Presión de grupos ilegales.<br></label> <br>
                                <label><input type="radio" name="preg_3" value="otra"> ¿Otra?: </label><input type="text" name="preg_3_otra"  maxlength="99" placeholder="¿Cuál?">
                            </div>

                        </div>

                        <hr>
                        
                        <div class="form-group">
                            <h4>4.	¿Qué lo motivo a participar en la Policía Nacional?</h4>
                            <div class="form-check">
                                
                                <label><input type="radio" name="preg_4" value="Gusto" required> A. Gusto</label> <br>
                                <label><input type="radio" name="preg_4" value="Dinero"> B. Dinero</label> <br>
                                <label><input type="radio" name="preg_4" value="Poder"> C. Poder</label> <br>
                                <label><input type="radio" name="preg_4" value="Disciplina"> D. Disciplina</label> <br>
                                <label><input type="radio" name="preg_4" value="Única opción"> E. Única opción<br></label> <br>
                                <label><input type="radio" name="preg_4" value="Servir"> F. Servir<br></label> <br>
                                <label><input type="radio" name="preg_4" value="otra"> ¿Otra?: </label><input type="text" name="preg_4_otra" maxlength="99" placeholder="¿Cuál?">
                            
                            </div> 
                        </div>

                        <div class="container table-responsive">
                            <h4>5.	¿Qué tan fácil es en su comunidad encontrar la presencia de los siguientes actores?:</h4>
                            <table class="table table-bordered">
                                <thead>
                                        <!-- <th colspan="3">Acción</th> -->
                                        <th><label>Actores</label></th>
                                        <th><label>Presencia</label></th>
                                </thead>
                                <tr>
                                    <td><label class="col-form-label-lg">Gobierno</label></td>
                                    <td class="form-control">
                                        <select class="form-control" name="preg_5_1" required>
                                            <option></option>
                                            <option value="Muy difícil">Muy difícil</option>
                                            <option value="Algo difícil">Algo difícil</option>
                                            <option value="No sé si es facíl o difícil">No sé si es facíl o difícil</option>
                                            <option value="Algo facíl">Algo facíl</option>
                                            <option value="Muy facíl">Muy facíl</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="col-form-label-lg">Policía nacional</label></td>
                                    <td class="form-control">
                                        <select class="form-control" name="preg_5_2" required>
                                            <option></option>
                                            <option value="Muy difícil">Muy difícil</option>
                                            <option value="Algo difícil">Algo difícil</option>
                                            <option value="No sé si es facíl o difícil">No sé si es facíl o difícil</option>
                                            <option value="Algo facíl">Algo facíl</option>
                                            <option value="Muy facíl">Muy facíl</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="col-form-label-lg">Ejército</label></td>
                                    <td class="form-control">
                                        <select class="form-control" name="preg_5_3" required>
                                            <option></option>
                                            <option value="Muy difícil">Muy difícil</option>
                                            <option value="Algo difícil">Algo difícil</option>
                                            <option value="No sé si es facíl o difícil">No sé si es facíl o difícil</option>
                                            <option value="Algo facíl">Algo facíl</option>
                                            <option value="Muy facíl">Muy facíl</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="col-form-label-lg">Organizaciones al margen de la ley</label></td>
                                    <td class="form-control">
                                        <select class="form-control" name="preg_5_4" required>
                                            <option></option>
                                            <option value="Muy difícil">Muy difícil</option>
                                            <option value="Algo difícil">Algo difícil</option>
                                            <option value="No sé si es facíl o difícil">No sé si es facíl o difícil</option>
                                            <option value="Algo facíl">Algo facíl</option>
                                            <option value="Muy facíl">Muy facíl</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="col-form-label-lg">Grupos ilegales armados</label></td>
                                    <td class="form-control">
                                        <select class="form-control" name="preg_5_5" required>
                                            <option></option>
                                            <option value="Muy difícil">Muy difícil</option>
                                            <option value="Algo difícil">Algo difícil</option>
                                            <option value="No sé si es facíl o difícil">No sé si es facíl o difícil</option>
                                            <option value="Algo facíl">Algo facíl</option>
                                            <option value="Muy facíl">Muy facíl</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="col-form-label-lg">Pandillas</label></td>
                                    <td class="form-control">
                                        <select class="form-control" name="preg_5_6" required>
                                            <option></option>
                                            <option value="Muy difícil">Muy difícil</option>
                                            <option value="Algo difícil">Algo difícil</option>
                                            <option value="No sé si es facíl o difícil">No sé si es facíl o difícil</option>
                                            <option value="Algo facíl">Algo facíl</option>
                                            <option value="Muy facíl">Muy facíl</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="col-form-label-lg">Otros: </label><input type="text" name="preg_5_otra" maxlength="99" placeholder="¿Cuáles?"></td>
                                    <td class="form-control">
                                        <select class="form-control" name="preg_5_7" id='preg_5_7'>
                                            <option></option>
                                            <option value="Muy difícil">Muy difícil</option>
                                            <option value="Algo difícil">Algo difícil</option>
                                            <option value="No sé si es facíl o difícil">No sé si es facíl o difícil</option>
                                            <option value="Algo facíl">Algo facíl</option>
                                            <option value="Muy facíl">Muy facíl</option>
                                        </select>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>

                        <hr>
                        
                        <div class="form-group">
                            <h4>6.	¿Qué percepción tienen en su comunidad y/o familia sobre su ingreso al programa de Formación de la Policía Nacional?</h4>
                            <div class="input-group">
                                <select class="form-control form-control-lg" name="preg_6"required>
                                    <option></option>
                                    <option value="Ninguno">Ninguno</option>
                                    <option value="Malo">Malo</option>
                                    <option value="Regular">Regular</option>
                                    <option value="Bueno">Bueno</option>
                                    <option value="Muy Bueno">Muy Bueno</option>
                                </select>
                            </div> 
                        </div>
                        <hr>
                        <div class="form-group">
                            <h4>7.	¿Saben en su comunidad y/o familia que usted está becado por la embajada de los Estados Unidos?</h4>
                            <div class="input-group">
                                <select class="form-control form-control-lg" name="preg_7"required>
                                    <option></option>
                                    <option value="No lo conocían">No lo conocían</option>
                                    <option value="No lo creían">No lo creían</option>
                                    <option value="No es bien visto">No es bien visto</option>
                                    <option value="Es necesario">Es necesario</option>
                                    <option value="Plenamente conocido">Plenamente conocido</option>
                                </select>
                            </div> 
                        </div>  
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <input type="submit" class="btn btn-success btn-block btn-lg">
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="reset" class="btn btn-danger btn-block btn-lg" value="limpiar">
                            </div>

                        </div>
                        
                    </form>
                </div>

            </div>
        </div>
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
