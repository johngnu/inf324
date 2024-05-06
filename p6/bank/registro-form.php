<!DOCTYPE html>
<html lang="es">
<?php include "head.php"; ?>   
<body>  
    <?php 
        include "menu.php";
    ?>
    <br> 
    &nbsp;<a class="addButton" href="registro-form.php">Cuentas</a>  
    <form action="registro.php" method="post">
        <h2>Formulario de registro</h2>
        <label for="ci">CI:</label>
        <input class="form-field" type="text" id="ci" name="ci" required>
        <label for="nombre">Nombres:</label>
        <input class="form-field" type="text" id="nombres" name="nombres" required>
        <label for="paterno">Apellido paterno:</label>
        <input class="form-field" type="text" id="paterno" name="paterno" required>
        <label for="materno">Apellido materno:</label>
        <input class="form-field" type="text" id="materno" name="materno" required>

        <label for="celular">Celular:</label>
        <input class="form-field" type="number" id="celular" name="celular" required>

        <label for="direccion">Dirección:</label>
        <textarea class="form-field" id="direccion" name="direccion" rows="4" required></textarea>
        <input class="guardar" type="submit" value="Guardar">
    </form>
</body>
</html>
