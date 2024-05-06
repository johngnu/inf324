<!DOCTYPE html>
<html lang="es">
<?php include "head.php"; ?>     
<body>    
    <?php 
        include "menu.php";
        include "conexion.inc.php"; 
        $resultado = mysqli_query($con, "select * from tipo_cuenta"); 
    ?>    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo de cuenta</th>
                <th>Monto mínimo</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        while($fila = mysqli_fetch_array($resultado)) { 
            echo '<tr>'; 
            echo '<td>'.$fila["id"].'</td>'; 
            echo '<td>'.$fila["descripcion"]."</td>"; 
            echo '<td class="style: text-align: rigth">'.$fila["monto_minimo"].'</td>';             
            echo '</tr>';
        }
        ?>             
        </tbody>
    </table>
</body>
</html>
