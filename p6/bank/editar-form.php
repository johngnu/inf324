<!DOCTYPE html>
<html lang="es">
<?php include "head.php"; ?>   
<body>  
    <?php 
        include "menu.php";
        include "conexion.inc.php";
        $ci=$_GET["ci"]; 
        $resultado = mysqli_query($con, "select * from persona where ci='$ci'"); 
        //echo $ci;
        $row = mysqli_fetch_array($resultado);
    ?>  
    <form action="editar.php" method="post">
        <h2>Formulario de registro</h2>
        <label for="ci">CI:</label>
        <input class="form-field" type="text" id="ci" value="<?php echo $row['ci']; ?>" readonly>
        <label for="nombre">Nombres:</label>
        <input class="form-field" type="text" id="nombres" name="nombres" value="<?php echo $row['nombres']; ?>" required>
        <label for="paterno">Apellido paterno:</label>
        <input class="form-field" type="text" id="paterno" name="paterno" value="<?php echo $row['paterno']; ?>" required>
        <label for="materno">Apellido materno:</label>
        <input class="form-field" type="text" id="materno" name="materno" value="<?php echo $row['materno']; ?>" required>

        <label for="celular">Celular:</label>
        <input class="form-field" type="number" id="celular" name="celular" value="<?php echo $row['celular']; ?>" required>

        <label for="direccion">Dirección:</label>
        <textarea class="form-field" id="direccion" name="direccion" rows="4" required><?php echo $row['direccion']; ?></textarea>
        <input type="hidden" name="ci" value="<?php echo $row['ci']; ?>">
        <input class="guardar" type="submit" value="Guardar">
    </form>
</body>
</html>
