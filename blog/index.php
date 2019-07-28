<?php 
include_once 'app/config.inc.php';
include_once 'app/Conexion.php';

include_once 'app/Usuarios.Class.php';
include_once 'app/entrada.php';
include_once 'app/comentario.php';

include_once 'app/RepositorioUsuario.php';
include_once 'app/repositorio-entrada.php';
include_once 'app/repositorio-comentario.php';


$componentes_url = parse_url($_SERVER['REQUEST_URI']);

$ruta = $componentes_url['path'];

$partes_ruta = explode('/',$ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);

$ruta_elegida = 'vistas/entrada_valido.php';
if($partes_ruta[0] == 'blog'){
    if(count($partes_ruta) == 1){
        $ruta_elegida='vistas/home.php';
    }elseif (count($partes_ruta)==2) {
        switch ($partes_ruta[1]){
            case 'login':
                $ruta_elegida = 'vistas/login.php' ;
                break;
                case 'logout':
                    $ruta_elegida = 'vistas/logou.php';
                    break;
                    case 'registro':
                        $ruta_elegida = 'vistas/registro.php';
                        break;
                     case 'relleno-jei':
                        $ruta_elegida = 'vistas/escript-relleno.php';
                        break;
        }
    }elseif (count($partes_ruta) == 3) {
        if (($partes_ruta[1]) == 'registro-correcto'){
            $nombre = $partes_ruta[2];
            $ruta_elegida = 'vistas/registro-correcto.php';
        }
        if($partes_ruta[1] == 'entrada_valido'){
            $url = $partes_ruta[2];
            Conexion:: abrir_conexion();
             $entrada = RepositorioEntrada::obtener_entrada_por_url(Conexion::abrir_conexion(),$url);
            
            if ($entrada != null){
               $ruta_elegida= 'vistas/entrada_valido.php';
            }
        }
    }
}

include_once $ruta_elegida;



?>
