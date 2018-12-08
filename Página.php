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
	
<html>
	<head>
	</head>
	<body>
		<h1>hola</h1>
	</body>	
</html>

  <?php
  
  echo json_encode($fila['asesino']);  
  echo json_encode($fila['x']);
  echo json_encode($fila['y']);
  echo json_encode($fila['z']);
}
