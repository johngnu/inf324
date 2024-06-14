<?php
    session_start();
    include "conexion.php";
    if(isset($_SESSION["ci"])){
        include "cabecera.php";
?>
    <div  id="layoutSidenav_content">
        <div class="container-fluid px-5 p-3">
            <div class="row bg-dark rounded">
                <div class="col-12">
                    <h2 class="text-center text-warning">Procesos que necesitan tu revision</h2>
                </div>
            </div>
            <div class="row bg-info rounded">
                <div class="col-2">
                    
                </div>
                <div class="col-8 p-3">
                <table class="table table-light">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Flujo</th>
                            <th>Proceso Actual</th>
                            <th>Fecha inicio</th>
                            <th>Terminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $sacarseguimiento=mysqli_query($con,"SELECT * FROM seguimiento where procesoactual in (SELECT procesoactual FROM procesos where rol='administrador') and fechafin is NULL");
                                $icono='<i class="fa-solid fa-clipboard-list fa-2xl" style="color: #ff0000;"></i>';
                                while($datosseguimiento=mysqli_fetch_array($sacarseguimiento)){
                                    $parametros="nro=".$datosseguimiento["nro"]."&proceso=".$datosseguimiento["procesoactual"]."&flujo=".$datosseguimiento["flujo"];
                                    echo "<tr>";
                                    echo "<td>".$datosseguimiento["nro"]."</td>";
                                    echo "<td>".$datosseguimiento["flujo"]."</td>";
                                    echo "<td>".$datosseguimiento["procesoactual"]."</td>";
                                    echo "<td>".$datosseguimiento["fechainicio"]."</td>";
                                    echo "<td><a href='procesos.php?".$parametros."'>".$icono."</a></td>";
                                    echo "</tr>";
                                }
    
                            ?>
                    </tbody>
                </table>  
                </div>
                <div class="col-2">
                    
                </div>  
            </div>
        </div>
    </div>
<?php
        include "pie.php";
    }
    else{
        header("Location: ./index.php");
    }
?>