<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.php';

include_once 'app/Usuarios.Class.php';
include_once 'app/entrada.php';
include_once 'app/comentario.php';

include_once 'app/RepositorioUsuario.php';
include_once 'app/repositorio-entrada.php';
include_once 'app/repositorio-comentario.php';

echo $entrada -> obtener_titulo();
echo 'si existe';


?>

