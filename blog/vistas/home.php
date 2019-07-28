<?php 
include_once 'app/Conexion.php';
include_once 'app/RepositorioUsuario.php';
include_once 'app/escritor-entradas.php';

Conexion :: abrir_conexion();

 $total_usuarios = RepositorioUsuario :: obtener_numero_usuarios(Conexion::obtener_conexion());


$titulo = 'jeisonVB';

include_once 'plantillas/documento-declaracion.php';
include_once 'plantillas/navbar.php';
?>


      

        <div class="container  text-center">
            <div class="jumbotron">
                <h1> el mundo de jeison</h1>
                <p> el camido no es lejos si es el camino asia tus metas</p>
            </div> 
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class=" panel panel-default">
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span> busqueda
                                </div>
                                <div class="panel-body">
                                    <div class="from-group">
                                        <input type="search" class="from-control" placeholder="¿que buscas?">
                                    </div>

                                    <button  class="from-control">buscar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-12">
                            <div class=" panel panel-default">
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-fire" aria-hidden="true"></span>  usuarios registrados
                                </div>
                                <div class="panel-body">
                                    <div class="from-group">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php  echo $total_usuarios; ?>
                                    </div>

                                    <button  class="from-control">buscar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                   <?php 
                   EscritorEntradas :: escribir_entradas();
                   ?>
                </div>
            </div>
        </div>
      <?php
        include_once 'plantillas/documento-cierre.php';
      ?>
    
    

