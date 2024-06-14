<h2 class="text-center text-primary">APROBADO</h2>
<?php
    if($_SESSION["rol"]=="administrador"){
        echo "<h4>Proceso acabado, ve a bandeja de salida para verificar otros procesos</h4>";
    }
    else{
        echo "<h4 class='text-center text-success'>Usted puede recoger su carnet de conducir en nuestras oficinas</h4>";
    }
?>