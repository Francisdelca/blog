<?php 
include_once 'app/control-sesion.php';
include_once 'app/config.inc.php';


?>

<nav class ="navbar navbar-default navbar-static-top" id="jeison">
    <div class="container" >
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only"> este boton despliega la barra de navegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo SERVIDOR ?>">jeisonVB</a> 
        </div>
        <div id="navbar" class=" navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="#">entrada</a></li>
                <li><a href="#">favoristos</a></li>
                <li><a href="#">sugerido</a></li>
            </ul>
            
             <ul class="nav navbar-nav navbar-right">
                 <?php 
                 if (ControlSesion:: sesion_iniciada()){
                     ?> 
                 <li>
                     <a href="#">
                         <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                         <?php echo ' ' .$_SESSION['nombre_usuario']; ?>
                     </a>
                 </li>
                 <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                         <span class="glyphicon glyphicon-dashboard" aria-hidden ="true"></span> gestor <span class="caret"></span>
                     </a>
                     <ul class="dropdown-menu">
                         <li>
                         <a href="#">
                             entradas
                         </a>
                         </li>
                         <li>
                         <a href="#">
                             comenarios
                         </a>
                         </li>
                         <li>
                         <a href="#">
                             usuarios
                         </a>
                         </li>
                         <li>
                         <a href="#">
                             favoritos
                         </a>
                         </li>
                     </ul>
                 <li>
                     <a href="<?php echo RUTA_LOGOUT; ?>">
                         <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> cerrer sesíon
                     </a>
                 </li>
                 </li>
                 <?php
                 }else{
                     ?>
                  <li><a href="<?php echo RUTA_REGISTRO ?>"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> registro</a></li>
                <li><a href="<?php echo RUTA_LOGIN ?>"> <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> iniciar sesion</a></li>
               
                 <?php
                 }
                 ?>
                
                 
                
            </ul>
        </div>
    </div>
</nav>

