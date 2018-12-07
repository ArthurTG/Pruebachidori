<?
$datos = parse_url($_ENV["DATABASE_URL"]);
// conectarse
$conexion = pg_connect(
  "host=" . $datos["host"] . 
  " port=" . $datos["port"] . 
  " dbname=" . substr($datos["path"], 1) . 
  " user=" . $datos["user"] . 
  " password=" . $datos["pass"]);

?>
	
<!DOCTYPE html>
<html>
<head>
	<title>Página</title>
</head>
<body>
	<table border="1">
		<tr>
			<td>Asesino</td>
			<td>Coordenada X</td>
			<td>Coordenada Y</td>
			<td>Coordenada Z</td>
		</tr>
		
		<?php
		// preparar consultas
		pg_prepare($conexion, "sql4", 'SELECT * FROM XerathDatos');
		// ejecutar consultas
		$resultado = pg_execute($conexion, "sql4");
		
		// indicar que el resultado es JSON
		header("Content-type: application/json; charset=utf-8");
		// permitir acceso de otros lugares fuera del servidor
		header('Access-Control-Allow-Origin: *');
		
		while($fila = pg_fetch_assoc($resultado))
		{		
			?>
			<tr>
				<td><?php echo $fila['asesino']?></td>
				<td><?php echo $fila['X']?></td>
				<td><?php echo $fila['Y']?></td>
				<td><?php echo $fila['Z']?></td>
			</tr>

			<?php
		}
		?>
	</table>
</body>
</html>
