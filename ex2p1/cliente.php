<?php
    include "conexion.php";
    session_start();
    if(isset($_SESSION["ci"])){
        include "cabecera.php";
        ?>
    <div  id="layoutSidenav_content">
        <div class="container-fluid px-5 p-3">
            <div class="row bg-light">
                <div class="col-12">
                    <h2 class="text-center text-primary fs-1">Para iniciar un nuevo proceso <a href="crearproceso.php"><i class="fa-regular fa-square-plus fa-lg" style="color: #4dff00;"></a></i></h2>   
                </div>
            </div>
            <div class="row">
                <div class="col-6 bg-primary rounded">
                    <h2 class="text-center text-light">Procesos en espera</h2>
                    <table class="table table-light table-sm">
                        <thead class="table-info">
                            <tr>
                                <th>#</th>
                                <th>Flujo</th>
                                <th>Proceso Actual</th>
                                <th>Fecha inicio</th>
                                <th>Terminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php
                                $sacarseguimiento=mysqli_query($con,"select * from seguimiento where usuario=".$_SESSION["ci"]." and fechafin is NULL");
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
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-6 proceso rounded">
                    <h2 class="text-center">Proceso terminados</h2>
                    <table class="table table-light table-sm">
                        <thead class="thead">
                            <tr class="table-warning">
                                <th>#</th>
                                <th>Flujo</th>
                                <th>Proceso</th>
                                <th>Fecha inicio</th>
                                <th>Fecha fin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php
                                $sacarseguimiento=mysqli_query($con,"select * from seguimiento where usuario=".$_SESSION["ci"]." and fechafin is not NULL");
                                while($datosseguimiento=mysqli_fetch_array($sacarseguimiento)){
                                    echo "<tr>";
                                    echo "<td>".$datosseguimiento["nro"]."</td>";
                                    echo "<td>".$datosseguimiento["flujo"]."</td>";
                                    echo "<td>".$datosseguimiento["procesoactual"]."</td>";
                                    echo "<td>".$datosseguimiento["fechainicio"]."</td>";
                                    echo "<td>".$datosseguimiento["fechafin"]."</td>";
                                    echo "</tr>";
                                }
    
                            ?>
                            </tr>
                        </tbody>
                    </table>
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