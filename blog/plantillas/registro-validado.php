<div class="form-group">
    <label>nombre de usuario</label>
    <input type="text"class="form-control" name='nombre' <?php $validador -> mostrar_nombre() ?>> 
    <?php 
    $validador -> mostrar_error_nombre();
    ?>
</div> 
<div class="form-group">
    <label>email</label>
    <input type="email"class="form-control" name="email" <?php $validador -> mostrar_email() ?>> 
     <?php 
    $validador -> mostrar_error_email();
    ?>
</div> 
<div class="form-group">
    <label>comtraseña</label>
    <input type="password"class="form-control" name="clave1"> 
     <?php 
    $validador -> mostrar_error_clave1();
    ?>
</div> 
<div class="form-group">
    <label>repita la comtraseña</label>
    <input type="password"class="form-control" name="clave2"> 
     <?php 
    $validador -> mostrar_error_clave2();
    ?>
</div> 
<br>
<button type="reset" class="btn btn-default ">limpiar fromulario</button>
<br>
<br>
<button type="submit" class="btn btn-default text-center" name="enviar">enviad datos</button>
