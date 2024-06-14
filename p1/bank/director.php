<!DOCTYPE html>
<html lang="es">
<?php include "head.php"; ?>     
<body>    
    <?php 
        include "menu.php";
        include "conexion.inc.php"; 
        $resultado = mysqli_query($con, "select * from case_when"); 
    ?>    
    <table>
        <thead>
            <tr>
                <th>LP</th>
                <th>CB</th>
                <th>SC</th>
                <th>OR</th>
                <th>BN</th>
                <th>PD</th>
                <th>PT</th>
                <th>TR</th>
                <th>CH</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        while($fila = mysqli_fetch_array($resultado)) { 
            echo '<tr>'; 
            echo '<td>'.$fila["LaPaz"].'</td>';  
            echo '<td>'.$fila["Cochabamba"].'</td>';  
            echo '<td>'.$fila["SantaCruz"].'</td>';  
            echo '<td>'.$fila["Oruro"].'</td>';  
            echo '<td>'.$fila["Beni"].'</td>';  
            echo '<td>'.$fila["Pando"].'</td>';  
            echo '<td>'.$fila["Potosi"].'</td>';  
            echo '<td>'.$fila["Tarija"].'</td>';  
            echo '<td>'.$fila["Chuquisaca"].'</td>';           
            echo '</tr>';
        }
        ?>             
        </tbody>
    </table>
</body>
</html>
