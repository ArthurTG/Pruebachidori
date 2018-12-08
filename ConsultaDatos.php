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
	<title>askdfjadf</title>
</head>
<body>
	<table border="1">
		<tr>
			<td>Asesino</td>
			<td>Coordenada X</td>
			<td>Coordenada Y</td>
			<td>Coordenada Z</td>
		</tr>
		<tr>
			<td>minion</td>
			<td>12</td>
			<td>34</td>
			<td>57</td>
		</tr>
	</table>
</body>
</html>
