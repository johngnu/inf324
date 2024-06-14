<?php
define('DB_SERVER', '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)
(HOST=127.0.0.1)(PORT=1521))(CONNECT_DATA=(SERVICE_NAME=XE)))');
define('DB_USERNAME', 'proyecto');
define('DB_PASSWORD', '123456');

//Oracle database
try {
    $link = new PDO("oci:dbname=" . DB_SERVER, DB_USERNAME, DB_PASSWORD);
    if($link){
        echo 'Conexion Exitosa...';
    }
} catch (PDOException $e) {
    echo ($e->getMessage());
}
?>