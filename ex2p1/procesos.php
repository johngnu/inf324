<?php
    session_start();
    if(!isset($_SESSION["ci"])){
        header("Location: ./index.php");
    }
    include "cabecera.php";
    include "conexion.php";
    $nro=$_GET["nro"];
    $flujo=$_GET["flujo"];
    $proceso=$_GET["proceso"];
    $sacarprocesos=mysqli_query($con,"select * from procesos where procesoactual='".$proceso."' and flujo='".$flujo."'");
    $datosp=mysqli_fetch_array($sacarprocesos);
    $pantalla=$datosp["pantalla"];
    include "guardar.php";
    if($_SESSION["rol"]=="cliente"){
?>
    <div  id="layoutSidenav_content">
        <div class="container p-2">
            <form action="motor.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-2">
                    </div>  
                    <div class="col-8">
                        <input type="hidden" value="<?php echo $pantalla;?>" name="pantalla"/>
                        <input type="hidden" name="nro" value="<?php echo $nro;?>">
                        <input type="hidden" value="<?php echo $flujo;?>" name="flujo"/>
                        <input type="hidden" value="<?php echo $proceso;?>" name="proceso"/>
                        <input type="hidden" name="ci" value="<?php echo $_SESSION["ci"];?>">
                        <?php include "archivos/".$pantalla.".php";?>
                        <div class="row">
                            <?php
                                if($proceso!="P1"){
                                    echo '<div class="col-2"><input class="btn bg-danger text-light justify-content-end" type="submit" value="Atras" name="Atras"></div>';
                                }
                                if(($_SESSION["rol"]==$datosp["rol"] || $guardar==0) && $proceso!="P8" && $proceso!='P9'){
                                    echo '<div class="col-8"></div><div class="col-2"><input class="btn bg-primary text-light justify-content-start" type="submit" value="Adelante" name="Adelante"></div>';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-2">
                    </div>  
                </div>
            </form>
        </div>
    </div>
<?php
    }
    else{
?>
    <div  id="layoutSidenav_content">
        <div class="container px-5 p-2">
            <form action="motor.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-9">
                        <input type="hidden" value="<?php echo $pantalla;?>" name="pantalla"/>
                        <input type="hidden" name="nro" value="<?php echo $nro;?>">
                        <input type="hidden" value="<?php echo $flujo;?>" name="flujo"/>
                        <input type="hidden" value="<?php echo $proceso;?>" name="proceso"/>
                        <input type="hidden" name="ci" value="<?php echo $verdatos["usuario"];?>">
                        <?php include "archivos/".$pantalla.".php";?>
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <?php if($proceso=='P7'){?>
                            <h4 class="text-center text-info">Todos los documentos estan en order?</h4>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="respuesta" value="si">
                                <label class="form-check-label" for="">
                                    Si
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="respuesta" value="no" checked>
                                <label class="form-check-label" for="">
                                    No
                                </label>
                            </div>
                            <?php }?>
                            <?php
                                if($proceso!="P1"){
                                    echo '<div class="col-2"><input class="btn bg-danger text-light justify-content-end" type="submit" value="Atras" name="Atras"></div>';
                                }
                                if($_SESSION["rol"]==$datosp["rol"]){
                                    echo '<div class="col-8"></div><div class="col-2"><input class="btn bg-primary text-light justify-content-start" type="submit" value="Adelante" name="Adelante"></div>';
                                }
                            ?>
                        </div>       
                    </div>  
                </div>
            </form>
        </div>
    </div>
<?php
    }
    include "pie.php";
?>