    <?php
    $db = 'localhost/XE';
    $user = 'proyecto'; //base de datos ya creada...
    $password = '123456';
    $base = oci_connect($user, $password, $db);
    if ($base) {
        echo 'Conexion Exitosa al la base de datos: ' . $user;
        return $base;
    } else {
        echo 'Conexion Fallida..';
    }
    ?>