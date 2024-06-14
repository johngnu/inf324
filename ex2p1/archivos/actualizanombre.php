<h2 class="text-center text-primary">ACTUALIZAR DATOS</h2>
<?php
    include "conexion.php";
    $sacarnombre=mysqli_query($con,"select * from jhonusuario.persona where ci=".$_SESSION["ci"]);
    $datosnombre=mysqli_fetch_array($sacarnombre);
    if($guardar==1){
?>
<div class="row">
    <div class="col-3">
        
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="nombre" class="text-info fs-4">Nombre:</label>
            <input type="text" class="form-control" name="nombre" value="<?php echo $datosnombre["nombre"]?>">
        </div>
        <div class="form-group">
            <label for="apellido" class="text-info fs-4">Apellido</label>
            <input id="apellido" class="form-control" type="text" name="apellido" value="<?php echo $datosnombre["apellido"]?>">
        </div>
    </div>
    <div class="col-3">
        
    </div>
</div>
<?php
    }
    else{
        echo '<h4 class="text-center text-success">Proceso completado</h4>';
    }
?>