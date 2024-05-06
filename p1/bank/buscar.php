<!DOCTYPE html>
<html lang="es">
<?php include "head.php"; ?>   
    <body>  
        <?php 
            include "menu.php";
            if( isset($_POST['search']) ) {
                $search = $_POST['search'];
                include "conexion.inc.php";
                
                $resultado = mysqli_query($con, "select * from persona where ci='$search'"); 
                if (mysqli_num_rows($resultado) == 0) {
                    $sw = false;
                } else {
                    header("Location: cuentas.php?ci=$search"); 
                }
                //echo $ci;
                //$row = mysqli_fetch_array($resultado);
            }

            //include "conexion.inc.php";
            //$ci=$_GET["ci"]; 
            //$resultado = mysqli_query($con, "select * from persona where ci='$ci'"); 
            //echo $ci;
            //$row = mysqli_fetch_array($resultado);
        ?>  
        <form class="form-search" action="buscar.php" method="post">
            <input class="search-field" type="text" placeholder="Ingresar CI..." name="search">
            <button class="search-button" type="submit">Buscar</button>
        </form>    
            <?php
            if( isset($_POST['search']) ) { 
                echo '<div class="results">'; 
                echo '<h3>Ningún resultado encontrado con: '.$_POST['search'].'</h3>';        
                echo '</div>';
            } 
            ?>    
    </body>
</html>
