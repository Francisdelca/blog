<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.php';
include_once 'app/Comentario.php';

class RepositorioComentario {
    
    public static function insertar_comentario($conexion, $comentario) {
        $comentario_insertado = false;
        
        if (isset($conexion)){
            try {
                $sql = "INSERT INTO comentarios(autor_id, entrada_id,titulo, texto, fecha) VALUES(:autor_id, :entrada_id,:titulo, :texto, NOW() )";
                $autor_idtemp = $comentario -> obtener_autor_id();
                $entrada_idtemp = $comentario->obtener_entrada_id();
                $titulotemp = $comentario->obtener_titulo();
                $textotemp = $comentario->obtener_texto();
                
                
                $sentencia= $conexion -> prepare($sql);
                
                $sentencia -> bindParam(':autor_id',$autor_idtemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':entrada_id',$entrada_idtemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':titulo', $titulotemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':texto', $textotemp, PDO::PARAM_STR);
                
                $comentario_insertado = $sentencia -> execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $comentario_insertado;
    }
}
