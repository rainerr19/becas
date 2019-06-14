<?php 
//include in the head!!
//$root_path = $_SERVER['DOCUMENT_ROOT'].'/becas/';
$root_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/becas/";
//<?php echo $_SESSION['avatar'];?
?>
<!-- ---------------------sidebar----------------------- -->
<div class="w3-sidebar w3-bar-block w3-animate-left bg-dark text-white" 
    style="display:none" id="mySidebar">

        <button class="w3-bar-item w3-button w3-large"
        onclick="close_sidebar()">Cerrar &times;</button>
        
        <div class="list-group">
            <li class="w3-bar-item">
                <img class="img-thumbnail rounded-circle" 
                style='max-height: 150px;max-width:150px' src="<?php echo($root_url);?>assets/img_perfil/no_avatar.jpg">
            </li>
            <li class="w3-bar-item">
                <h4>Bienvenido: </h4>
                <h5 class="text-success">
                <?php 
                    echo $_SESSION['nombre']." ";
                    echo $_SESSION['apellido'];
                ?>
                </h5>
            </li>
            <h4 class="pl-3">MENÚ</h4>
            <?php
            if ($_SESSION['validacion']==1) {
                # code...
                ?>
                <a class="w3-button list-group-item" href="<?php echo($root_url);?>index.php" class="encuestas">
                    Encuestas
                </a>
                <a class="w3-button list-group-item" href="<?php echo($root_url);?>estadisticas/" class="encuestas">
                    Estadística
                </a>
                <a class="w3-button list-group-item" 
                    href="<?php echo($root_url);?>tables.php" class="tables">
                    Todos los usuarios
                </a>
                
                <a class="w3-button list-group-item" 
                    href="<?php echo($root_url);?>pagos/table.php" class="pagos">
                    Consultar pagos
                </a>
                
                <a class="w3-button list-group-item" 
                    href="<?php echo($root_url);?>registroAdmin.php" class="registro">
                    Registar usuario
                </a>

                <?php
                } else {
                    ?>
                    <a class="w3-button list-group-item"
                        href="<?php echo($root_url);?>usuario.php" class="encuestas">
                        Encuestas
                    </a>
                    <a class="w3-button list-group-item"
                        href="<?php echo($root_url);?>pagos/pagos.php" class="encuestas">
                        Pagos
                    </a>
                    
                <?php
                    }
                ?> 
        </div>
    </div>
<header>
    <nav class="navbar navbar-expand navbar-toggleable-lg bg-light">
        
        <button id="openNav" class="btn btn-outline-dark btn-lg" onclick="open_sidebar()">
        <i class="fas fa-bars fa-2x"></i></button>

        <div class="container-fluid">
            <a class="navbar-brand pl-2" href="<?php echo($root_url);?>index.php">                
                <img style="max-width:170px; height:50px;" class="img-fluid" src="<?php echo($root_url);?>assets/img/logo2.png" />
            </a>

                    
            <div class="navbar-text float-rigth">
                <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="perfil-down" data-toggle="dropdown">
                            <i style="color:#022606;" class="fa fa-user fa-3x"></i>  
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                        
                            <a class="dropdown-item" href="<?php echo($root_url);?>perfil_user.php">
                                <i class="fa fa-user fa-fw"></i> Perfil de usuario
                            </a>
                            
                            <a class="dropdown-item" href="<?php echo($root_url);?>cerrar_session.php">
                                <i class="fas fa-sign-out-alt"></i> Cerrar sesion
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>