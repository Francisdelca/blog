<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.php';
include_once 'app/entrada.php';

class RepositorioEntrada {

    public static function insertar_entrada($conexion, $entrada) {
        $entrada_insertada = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO entradas(autor_id, url, titulo, texto, fecha, activa) VALUES(:autor_id, :url, :titulo, :texto, NOW(), 0)";






                $autor_idtemp = $entrada->obtener_autor_id();
                $urltemp = $entrada->obtener_url();
                $titulotemp = $entrada->obtener_titulo();
                $textotemp = $entrada->obtener_texto();

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':autor_id', $autor_idtemp, PDO::PARAM_STR);
                $sentencia->bindParam(':url', $urltemp, PDO::PARAM_STR);
                $sentencia->bindParam(':titulo', $titulotemp, PDO::PARAM_STR);
                $sentencia->bindParam(':texto', $textotemp, PDO::PARAM_STR);

                $entrada_insertada = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $entrada_insertada;
    }

    public static function obtener_todas_por_fecha_decendiente($conexion) {

        $entradas = [];

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM entradas ORDER BY fecha DESC ";

                $sentencia = $conexion->prepare($sql);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll();



                if (count($resultado)) {
                    foreach ($resultado as $fila) {

                        $entradas[] = new Entrada(
                                $fila['id'], $fila['autor_id'],$fila['url'], $fila['titulo'], $fila['texto'], $fila['fecha'], $fila['activa']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR: ' . $ex->getMessage();
            }
        }

        return $entradas;
    }
     public static function obtener_entrada_por_url($conexion, $url) {
        $entrada = null;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM entradas WHERE url LIKE :url";
                $urltemp = $url -> obtener_url();
                
                $sentencia = $conexion -> prepare($sql);
                
                $sentencia->bindParam(':url', $urltemp, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                if (!empty($resultado)) {
                    $entrada= new Entrada(
                            $resultado['id'], $resultado['autor_id'], $resultado['url'],
                            $resultado['titulo'], $resultado['texto'], $resultado['fecha'],
                            $resultado['activa']
                            );
                }
            } catch (PDOException $ex) {
                print 'ERROR'. $ex -> getMessage();
            }
        }

        return $entrada;
    }

}
