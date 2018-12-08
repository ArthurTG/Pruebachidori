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
	<title>Consulta de Datos</title>
</head>
<body>
	<table border="1">
		<tr>
			<td>Asesino</td>
			<td>Coordenada X</td>
			<td>Coordenada Y</td>
			<td>Coordenada Z</td>
		</tr>
		
		<?
			pg_prepare($conexion, "sql3", 'SELECT * FROM XerathDatos');
			$resultado = pg_execute($conexion, "sql3", array());
			header('Access-Control-Allow-Origin: *');
			$gente = array();
			while ($fila = pg_fetch_assoc($resultado)) 
			{
			  array_push($gente, $fila);
		?>
		
		<tr>
			<td><? echo $fila['asesino']; ?></td>
			<td><? echo $fila['x']; ?></td>
			<td><? echo $fila['y']; ?></td>
			<td><? echo $fila['z']; ?></td>
		</tr>
		<?
			}
		?>
		
	</table>
</body>
</html>
