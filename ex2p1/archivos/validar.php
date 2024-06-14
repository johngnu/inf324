<h2 class="text-primary text-center">VALIDAR DOCUMENTOS</h2>
<?php
    if($_SESSION["rol"]=="administrador"){
        if($guardar==1){
            $ciusuario=$verdatos["usuario"];
            $sacardocumentos=mysqli_query($con,"SELECT * FROM jhonusuario.documento xd,jhonusuario.persona xp where xp.ci=xd.ci and $ciusuario=xp.ci and xd.nro=$nro");
            $datosdocumentos=mysqli_fetch_array($sacardocumentos);
            echo '<h4 class="text-center text-success">Te presentamos los documentos de revision del cliente '.$datosdocumentos["nombre"].' '.$datosdocumentos["apellido"].'</h4>';
            ?>
                <div class="row">
                    <div class="col-6">
                        <h2 class="text-center text-info fs-4">Certificado Medico</h2>  
                        <?php
                            $nombrearchivo=$datosdocumentos["cmedico"];
                            echo "<div class='row'>";
                            include "archivo.php";
                            echo "</div>";
                        ?> 
                    </div>
                    <div class="col-6">
                        <h2 class="text-center text-info fs-4">Certificado Antecedentes</h2>
                        <?php
                            $nombrearchivo=$datosdocumentos["cantecedentes"];
                            echo "<div class='row'>";
                            include "archivo.php";
                            echo "</div>";
                        ?>   
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h2 class="text-center text-info fs-4">Certificado de aprobacion de conduccion</h2>
                        <?php
                            $nombrearchivo=$datosdocumentos["caprobacion"];
                            echo "<div class='row'>";
                            include "archivo.php";
                            echo "</div>";
                        ?>     
                    </div>
                    <div class="col-6">
                        <h2 class="text-center text-info fs-4">Comprobante de pago</h2> 
                        <?php
                            $nombrearchivo=$datosdocumentos["cpago"];
                            echo "<div class='row'>";
                            include "archivo.php";
                            echo "</div>";
                        ?>     
                    </div>
                </div>
            <?php
        }
        else{
            echo '<h4 class="text-success text-center">Ya termino este proceso</h4>';
        }
    }
    else{
        if($guardar==1){
?>

<h4 class="text-warning text-center">Tus datos y documentos estan en revision, espere la respuesta</h4>
<?php
        }
        else{
            echo '<h4 class="text-success text-center">Tus datos y documentos ya fueron revisados</h4>';
        }
    }
?>