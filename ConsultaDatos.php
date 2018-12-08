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
	<style type="text/css">
		#hola
		{
			background-color: #629BCD;
		}
		#tabla
		{
			text-align: center;
			float: left;
		}
	</style>
</head>
<body id="hola">
	<center>
		
	<table id="tabla" border="1">
		<tr>
			<td>Jugador</td>
			<td>Puntuación</td>
		</tr>		
		<?
			pg_prepare($conexion, "sql3", 'SELECT * FROM XerathDatos');
			$resultado = pg_execute($conexion, "sql3", array());
			header('Access-Control-Allow-Origin: *');
			
			$usuarios = array();
			while ($fila1 = pg_fetch_assoc($resultado1)) 
			{
			  array_push($usuarios, $fila1);		
		?>		
		<tr>
			<td id="tabla"> <? echo $fila1['usuario']?> </td>
			<td id="tabla"> <? echo $fila1['puntuacion']?> </td>
		</tr>
			
		<?
			}
		?>		
	</table>
		
	<table id="tabla" border="1">
		<tr>
			<td>Asesino</td>
			<td>Coordenada X</td>
			<td>Coordenada Y</td>
			<td>Coordenada Z</td>
		</tr>		
		<?
			pg_prepare($conexion, "sql4", 'SELECT * FROM XerathDatosxd');
			$resultado1 = pg_execute($conexion, "sql4", array());
			header('Access-Control-Allow-Origin: *');
			
			$gente = array();
			while ($fila = pg_fetch_assoc($resultado)) 
			{
			  array_push($gente, $fila);
		?>
			<td id="tabla"><? echo $fila['asesino']; ?></td>
			<td id="tabla"><? echo $fila['x']; ?></td>
			<td id="tabla"><? echo $fila['y']; ?></td>
			<td id="tabla"><? echo $fila['z']; ?></td>
		</tr>
		<?
			}
		?>	
	</table>
	</center>
</body>
</html>
