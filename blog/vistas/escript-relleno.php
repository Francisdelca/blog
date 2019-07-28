<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.php';

include_once 'app/Usuarios.Class.php';
include_once 'app/entrada.php';
include_once 'app/comentario.php';

include_once 'app/RepositorioUsuario.php';
include_once 'app/repositorio-entrada.php';
include_once 'app/repositorio-comentario.php';

Conexion::abrir_conexion();

for ($usuarios = 0; $usuarios < 10; $usuarios++) {
    $nombre = sa(10);
    $email = sa(5).'@'.sa(3);
   $password = password_hash('123456', PASSWORD_DEFAULT);
    
    $usuario = new Usuario('', $nombre, $email, $password, '', '');
    RepositorioUsuario::insertar_usuario(Conexion::obtener_conexion(), $usuario);
}
for ($entradas = 0; $entradas < 10; $entradas++) {
    $titulo = sa(10);
   $url= $titulo;
    $texto = lorem();
    $autor = rand(1, 10);
    
    $entrada = new Entrada('', $autor,$url, $titulo, $texto, '', '');
    RepositorioEntrada::insertar_entrada(Conexion::obtener_conexion(), $entrada);
}

for($comentarios=0;$comentarios < 10; $comentarios++ ){
    $titulo = sa(10);
    $texto= lorem();
    $autor = rand(1,10);
    $entrada = rand(1,10);
    
    $comentario = new Comentario('',$autor,$entrada,$titulo,$texto,'');
    RepositorioComentario :: insertar_comentario(Conexion::obtener_conexion(),$comentario);
}


function sa($longitud){
    
    $caracteres = '0123456789abcdefghiklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numero_caracteres=strlen($caracteres);
    $string_aleatorio = '';
    
    for($i = 0; $i <$longitud; $i++){
        $string_aleatorio .= $caracteres[rand(0,$numero_caracteres -1)];
    }
    return $string_aleatorio;
}
function  lorem(){
    $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tellus ipsum, interdum a porttitor ac, sollicitudin sit amet turpis. Etiam ligula lacus, bibendum non tellus id, tincidunt commodo lacus. Nunc gravida nisl metus, non pulvinar diam tincidunt eu. Vestibulum posuere lacus vitae mattis porta. Nunc mattis volutpat nunc, eget finibus elit auctor vitae. Mauris urna magna, vehicula non ex ac, tempor iaculis sem. Etiam id sollicitudin est. Nulla porttitor ante sit amet libero luctus, eget faucibus metus placerat. Suspendisse commodo lobortis feugiat. Mauris aliquet ut turpis sed semper. Morbi et neque consectetur erat imperdiet euismod. Quisque iaculis luctus dapibus.

Nulla aliquet sapien nulla. Maecenas lacus arcu, aliquam sed posuere eu, vulputate id orci. Donec diam turpis, aliquet quis tortor vel, elementum consectetur sapien. In egestas tristique mi. Nam malesuada laoreet justo, quis aliquet sem venenatis eget. Morbi hendrerit pretium sollicitudin. In hac habitasse platea dictumst. Sed interdum turpis ut erat ultrices, non venenatis enim efficitur. Curabitur nec nulla mauris.

In et arcu et purus pretium egestas. Nam tempus urna a felis ultrices, molestie consequat orci imperdiet. Aliquam justo eros, dignissim in arcu at, viverra aliquam nisl. Nunc auctor lobortis porttitor. Quisque vitae egestas lectus, in consectetur elit. Suspendisse laoreet tellus eu malesuada ultricies. Vestibulum eget nisl pellentesque, viverra nibh a, dapibus odio. Aenean tristique sollicitudin ornare. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a dapibus purus, faucibus congue purus. Duis in velit justo. Sed facilisis lacus pharetra, iaculis enim id, eleifend dolor. Nullam vehicula erat id enim dictum suscipit. Aliquam erat volutpat. Nulla blandit, eros et vehicula fringilla, enim dui condimentum lacus, vel vulputate tortor sapien sit amet enim. Aenean ultricies gravida elit.

Ut viverra id augue eu semper. Nunc pharetra velit ex, ac imperdiet mauris viverra a. Fusce hendrerit, nisl non laoreet mattis, erat ligula lobortis diam, sit amet mollis neque est nec lectus. Nullam nec leo sollicitudin, maximus arcu ut, ornare ex. Praesent fringilla sapien ut odio laoreet, at convallis justo finibus. Sed mattis elit mauris, id imperdiet purus viverra posuere. Etiam et eros sed enim volutpat egestas. Fusce id lacinia tellus.

Aliquam quis euismod ex. Sed id diam efficitur tortor aliquam pharetra id eu orci. Aenean vel lectus non mauris pretium aliquam. Aliquam erat volutpat. Vivamus volutpat orci ut elit venenatis, id fringilla tortor suscipit. In pulvinar dui lorem. Vestibulum feugiat viverra velit eu commodo. Donec accumsan molestie lorem rutrum venenatis. Vestibulum finibus finibus sapien ut blandit. Duis dignissim ex consectetur dapibus vehicula. Aliquam nulla justo, dignissim ut semper nec, ultricies sed turpis. Suspendisse ac mi semper, auctor est nec, ullamcorper orci. Fusce mollis bibendum turpis ut vulputate. Morbi quis dignissim felis.';
            
    return  $lorem;
}