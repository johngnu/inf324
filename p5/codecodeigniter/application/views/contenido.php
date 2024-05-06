<?php 
  echo "Identificador: ".$identificador;
  echo "<br>";
  print_r($alumnos);
  echo "<table>";
  foreach($alumnos as $alumno)
  {
	echo "<tr>";
	echo "<td>";
	echo $alumno->id;
	echo "</td>";
	echo "<td>";
	echo $alumno->nombre;
	echo "</td>";
	echo "</tr>";
  } 
  echo "</table>";
  print_r($datos2);
?>
<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>


