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
			<td>Jugadpr</td>
			<td>Asesino</td>
			<td>Coordenada X</td>
			<td>Coordenada Y</td>
			<td>Coordenada Z</td>
		</tr>
		
		<?
			pg_prepare($conexion, "sql3", 'SELECT * FROM XerathDatos');
			pg_prepare($conexion, "sql4", 'SELECT * FROM XerathDatosxd');
			$resultado = pg_execute($conexion, "sql3", array());
			$resultado1 = pg_execute($conexion, "sql4", array());
			header('Access-Control-Allow-Origin: *');
		?>
		
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		
		
		
	</table>
</body>
</html>
