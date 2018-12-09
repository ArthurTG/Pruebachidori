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
			background-color: gray;
		}
		#tabla1
		{
			background-color: #629BCD;
			text-align: center;
			float: left;
		}
		#div1
		{
			padding: 4rem;
			width: 700px;

		}
	</style>
</head>
<body id="hola">
	<center>
	<div id="div1">
	<table id="tabla1" border="1">
		<tr>
			<td>Jugador</td>
			<td>Puntuación</td>
			<td>Asesino</td>
			<td>Coordenada X</td>
			<td>Coordenada Y</td>
			<td>Coordenada Z</td>
		</tr>		
		<?
			pg_prepare($conexion, "sql3", 'SELECT * FROM XerathDatosxd');
			$resultado = pg_execute($conexion, "sql3", array());
		
			pg_prepare($conexion, "sql4", 'SELECT * FROM XerathDatos');
			$resultado1 = pg_execute($conexion, "sql4", array());
			
			header('Access-Control-Allow-Origin: *');
			
			
			$usuarios = array();
			$gente = array();
			while ($fila1 = pg_fetch_assoc($resultado) || $fila = pg_fetch_assoc($resultado1)) 
			{
			  	array_push($usuarios, $fila1);	
				array_push($gente, $fila);
		?>			
		<tr>
				<td id="tabla"><? echo $fila1['usuario']?> </td>
				<td id="tabla"><? echo $fila1['puntuacion']?> </td>
		<?
			}
		?>
			
		</tr>
	</table>
	</div>
</center>
</body>
</html>
