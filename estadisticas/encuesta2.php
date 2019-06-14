<?php
    session_start();
    error_reporting(0);   
    if($_SESSION['validacion']==1){         
?>
<html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estadística</title>
    <?php
            include '../partes/link_head.php';
    ?>
</head>

<body style="background-color: #2a2a2a">
<?php
 
 include '../partes/menu_top.php';  
?>
<button onclick="topFunction()" id="btn-top" title="vuelve al comienzo">Subir</button>     
<div class="container-fluid">   
    <div class="col-md-12 pt-3">

        <div class="card border-info mb-2">
            <div class="card-header text-white border-info mb-3" style="background-color: #022606">
                    <h2>Estadística de encuesta 2019</h2>
            </div>
            <div class="card-body" id="graficar">
               
                <div class="row" style="min-width: 420px;">
                    <div class="col-md-6">
                        <form action="">
                            <div class="form-group">
                                <label for="type">Tipo de Gráfico:</label>
                                <select class="form-control" id="type">
                                    <option value="doughnut">Rosquilla</option>
                                    <!-- <option value="pie">Pastel</option> -->
                                    <option value="bar">Barra</option>
                                    <option value="horizontalBar">Barra Horizontal</option>
                                    <option value="line">Linea</option>
                                    
                                </select>
                
                            </div>
                        </form>
                        <div class="col-md-6">        
                        </div>
        
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</div>
    <?php
    
    include '../partes/footer.php';
    
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.js"></script> -->
    <!--Load the AJAX API-->
    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
    <script type="text/javascript" src="../assets/js/stats_encuesta2.js"></script>

    
</body>
</html>
<?php
    }else{
        header("location:../login.php");
    }
            
?>