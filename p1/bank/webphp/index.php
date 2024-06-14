<!DOCTYPE html>
<html lang="es">
<?php include "head.php"; ?>   
<body>  
    <?php include "menu.php"; ?>
     
    <form action="http://localhost:8084/WebJava/Servlet" method="post">
        <h2>POST A JAVA</h2>
        <label>Dato 1:</label>
        <input class="form-field" type="text" name="dato1" required>
        <label>Dato 2:</label>
        <input class="form-field" type="text" name="dato2" required>

        <input class="guardar" type="submit" value="enviar">
    </form>

    <form action="https://localhost:44316/WebForm1.aspx" method="post">
        <h2>POST A .NET</h2>
        <label>Dato 1:</label>
        <input class="form-field" type="text" name="dato1" required>
        <label>Dato 2:</label>
        <input class="form-field" type="text" name="dato2" required>

        <input class="guardar" type="submit" value="enviar">
    </form>
</body>
</html>
