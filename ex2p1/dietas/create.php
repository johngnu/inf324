<?php
// Incluimos el archivo config.php
require_once "config.php";

// Definimos variables e inicializamos vacio
$nombre = $descripcion = $precio = $documento = "";
$nombre_err = $descripcion_err = $precio_err = $documento_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validacion nombre
    $input_nombre = trim($_POST["nombre"]);
    if (empty($input_nombre)) {
        $nombre_err = "Por favor ingresa un nombre.";
    } elseif (!filter_var($input_nombre, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $nombre_err = "Ingresa un nombre valido.";
    } else {
        $nombre = $input_nombre;
    }

    // Validacion descripcion
    $input_descripcion = trim($_POST["descripcion"]);
    if (empty($input_descripcion)) {
        $descripcion_err = "Por favor ingresa una descripcion.";
    } else {
        $descripcion = $input_descripcion;
    }

    // Validacion estatura
    $input_estatura = trim($_POST["precio"]);
    if (empty($input_estatura)) {
        $estatura_err = "Ingresa un valor de precio";
    } elseif (!ctype_digit($input_estatura)) {
        $estatura_err = "Ingresa un valor positivo.";
    } else {
        $estatura = $input_estatura;
    }
	
	// Validacion documento
    $input_documento = trim($_POST["documento"]);
    if (empty($input_documento)) {
        $documento_err = "Ingresa un valor de precio";
    } elseif (!ctype_digit($input_estatura)) {
        $documento_err = "Ingresa un valor positivo.";
    } else {
        $documento = $input_documento;
    }

    // Revisamos errores antes de continuar
    if (empty($nombre_err) && empty($direccion_err) && empty($estatura_err) && empty($documento_err)) {
		
		$nRows = $link->query('SELECT count(*) FROM Producto')->fetchColumn(); 
		$nRows++;
        // preparamos la sentancia INSERT
        $sql = "INSERT INTO PACIENTE(idproducto, nombre, descripcion, nrodocumento, precio) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = $link->prepare($sql)) {
			
			// Se hace el bindeo de variables para la sentencia
			$stmt->bindParam(1, $param_id, PDO::PARAM_STR);
            $stmt->bindParam(2, $param_nombre, PDO::PARAM_STR);
            $stmt->bindParam(3, $param_direccion, PDO::PARAM_STR);
			$stmt->bindParam(4, $param_documento, PDO::PARAM_INT);
            $stmt->bindParam(5, $param_estatura, PDO::PARAM_STR);

			// settear variables
			$param_id = 'P00'.$nRows;
            $param_nombre = $nombre;
            $param_direccion = $direccion;
			$param_documento = $documento;
            $param_estatura = $estatura;
			echo $param_id;
			
            // Intentando ejecutar la declaración preparada
            if ($stmt->execute()) {
                // Registros creados con éxito. Redirigiendo a la página de destino
                header("location: index.php");
                exit();
            } else {
                echo "Paso algo, intente mas tarde...";
            }
        }

        // Cerrando sentencia
        $stmt->closeCursor(); //PDO close
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear Registro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper {
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Crear Registro</h2>
                    </div>
                    <p>Llena este formulario para agregar un producto a la base de datos</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($nombre_err)) ? 'has-error' : ''; ?>">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>">
                            <span class="help-block"><?php echo $nombre_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($direccion_err)) ? 'has-error' : ''; ?>">
                            <label>Direccion</label>
                            <textarea name="direccion" class="form-control"><?php echo $direccion; ?></textarea>
                            <span class="help-block"><?php echo $direccion_err; ?></span>
                        </div>
						<div class="form-group <?php echo (!empty($documento_err)) ? 'has-error' : ''; ?>">
                            <label>Nro. documento</label>
                            <input type="text" name="documento" class="form-control" value="<?php echo $documento; ?>">
                            <span class="help-block"><?php echo $documento_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($estatura_err)) ? 'has-error' : ''; ?>">
                            <label>Estatura</label>
                            <input type="text" name="estatura" class="form-control" value="<?php echo $estatura; ?>">
                            <span class="help-block"><?php echo $estatura_err; ?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Crear">
                        <a href="index.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>