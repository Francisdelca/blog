<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.php';
include_once 'app/RepositorioUsuario.php';
include_once 'app/validador-login.php';
include_once 'app/control-sesion.php';
include_once 'app/Redireccion.php';

if (ControlSesion:: sesion_iniciada()){
     Redireccion::redirigir(RUTA_index);
}

if(isset($_POST['login'])){
    Conexion::abrir_conexion();
    
    $validador = new ValidadorLogin($_POST['email'],$_POST['clave'],Conexion::obtener_conexion());
    
    if ($validador -> obtener_error()===''&&
            !is_null($validador -> obtener_usuario())){
         
        ControlSesion::iniciar_sesion(
                $validador -> obtener_usuario() -> obtener_id(),
                 $validador -> obtener_usuario() -> obtener_nombre());
                Redireccion::redirigir(RUTA_index);
    }
    Conexion::cerrar_conexion();
}

$titulo = 'Login';

include_once 'plantillas/documento-declaracion.php';
include_once 'plantillas/navbar.php';
?>

<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel panel-heading text-center">
                <h4>Iniciar sesion</h4>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                    <h2 class="text-center">Introduce tus datos</h2>
                    <br>

                   
                        <label for="email" class="sr-only">email</label>
                        <input type="email" name="email" id="email" class="form-control"   placeholder="Email"
                             <?php
                               if (isset($_POST['login']) && isset($_POST['email']) && !empty($_POST['email'])) {
                                   echo 'value="' . $_POST['email'] . '"';
                               } 
                               ?> required autofocus> 
                        <br>
                  
                 
                  
                       <label for="clave" class="sr-only">clave</label>
                       <input type="password" name="clave" id="clave" class="form-control" placeholder="Contraseña" required>
                       <?php
                        if (isset($_POST['login'])) {
                            $validador -> mostrar_error();
                        }
                        ?>
                    <button type="submit" name="login" class="btn btn-lg btn-primary btn-block">iniciar sesion</button>
                </form>
                <br>
                <br>
                <div class="text-center">
                    <a href="#">¿ ol vidaste tu contraseña ?</a>
                </div>

            </div>
        </div>
    </div>
</div>