<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.php';
include_once 'app/RepositorioUsuario.php';
include_once 'app/Redireccion.php';


$titulo = '¡registro correcto!';
include_once 'plantillas/documento-declaracion.php';
include_once 'plantillas/navbar.php';
?>
<div class="container">
    <div class=" row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <span class="glyphicon glyphicon-ok-circle" aria-hidden ="true"></span> registro corecto
                </div>
                <div class=" panel-body text-center">
                    <p>¡gracias por registrarte<b><?php echo $nombre ?></b>
                        <br>
                    <p><a href="<?php echo RUTA_LOGIN ?>">iniciar sesion</a> para comensar a usar tu cuenta</p>
                </div>
            </div>

        </div>
    </div>
</div>