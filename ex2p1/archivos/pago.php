<h2 class="text-center text-primary">COMPROBANTE DE PAGO</h2>
<?php
    if($guardar==1){
?>
<div class="row">
    <div class="col-3">
        
    </div>
    <div class="col-6">
        <div class="form-group">
            <i class="fa-solid fa-file fa-xl" style="color: #00ffcc;"></i><label for="formFileReadonly" class="text-info fs-4">Archivo:</label>
            <input id="medico" class="form-control" type="file" name="pago" accept=".pdf">
        </div>
    </div>
    <div class="col-3">
        
    </div>
</div>
<?php
    }
    else{
        echo '<h4 class="text-center text-success">Proceso completado, documento subido</h4>';
        $sacardocumento=mysqli_query($con,"select * from jhonusuario.documento where ci=".$_SESSION["ci"]." and nro=".$nro);
        $datosdocumentos=mysqli_fetch_array($sacardocumento);
        $nombrearchivo=$datosdocumentos["cpago"];
        echo "<div class='row'>";
        include "archivo.php";
        echo "</div>";
    }
?>