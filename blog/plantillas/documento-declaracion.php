<!DOCTYPE html>
<html>
    <head>
        <?php 
        if(!isset($titulo)|| empty($titulo)){
            $titulo = 'jeisonVB';
        }
        echo "<title>$titulo</title>";     

        ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href=" <?php echo RUTA_CSS ?>bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo RUTA_CSS ?>estilos.css" rel="stylesheet">

    </head>
    <body>
