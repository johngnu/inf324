<h2 class="text-center text-danger">NO APROBADO</h2>
<?php
    if($_SESSION["rol"]=="administrador"){
        echo "<h4>Proceso acabado, ve a bandeja de salida para verificar otros procesos</h4>";
    }
    else{
        echo "<h4 class='text-center text-danger'>No ha sido aprobado para obtener su carnet de conducir</h4>";
    }
?>