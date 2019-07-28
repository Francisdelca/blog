<?php 
include_once 'app/Conexion.php';
include_once 'app/Usuarios.Class.php';
include_once 'app/RepositorioUsuario.php';
include_once 'app/validador-registro.php';
include_once 'app/Redireccion.php';
include_once 'app/config.inc.php';

if(isset($_POST['enviar'])){
    Conexion ::abrir_conexion();
    $validador = new ValidadorRegistro($_POST['nombre'],$_POST['email'],$_POST['clave1'],$_POST['clave2'], Conexion::obtener_conexion());
    
    if ($validador -> registro_valido()){
        $usuario = new Usuario('',$validador -> obtener_nombre(),
                $validador -> obtener_email(),
               password_hash($validador -> obtener_clave(), PASSWORD_DEFAULT),
                '',
                '');
        $usuario_insertado = RepositorioUsuario :: insertar_usuario(Conexion::obtener_conexion(), $usuario);
        if ($usuario_insertado){
            Redireccion::redirigir(RUTA_REGISTRO_CORRECTO .'/' .$usuario-> obtener_nombre());
          
        }
    }
    Conexion ::cerrar_conexion();
}
$titulo = 'registro';

include_once 'plantillas/documento-declaracion.php';
include_once 'plantillas/navbar.php';
?>

<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">formulario de registro</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Instrucciones
                    </h3>
                </div>
                <div class="panel-body">
                    <br>
                    <p class="text-justify">
                        para unirte a jeisonVB, introduce un nombre
                        de usuario, tu email y unacontaseña, el email que escribas
                        debe ser real ya que lo nesecitaras pa restinar tu cuenta.
                        te recomendamos que uses una comtraseña que tenga letras 
                        minusculas, mayúsculas,números y símbolos.
                    </p>
                    <br>
                    <a href="#">¿ya tienes una cuenta?</a><br>
                    <br> 
                    <a href="#">¿olvidaste tu contraseña?</a>
                     <br>
                      <br>
                      
                </div>
            </div>
            
        </div>
        <div class="col-md-6 text-center">
            <div class=" panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Introduse tus datos
                    </h3>
                </div>
                <div class="panel-body">
                    <form  role='form' method="post" action="<?php echo RUTA_REGISTRO ?>">
                       <?php 
                       if(isset($_POST['enviar'])){
                           include_once 'plantillas/registro-validado.php'; 
                       } else {
                           include_once 'plantillas/registro-vacio.php';
                       }
                       ?>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

 <?php
        include_once 'plantillas/documento-cierre.php';
      ?>
