<?
$datos = parse_url($_ENV["DATABASE_URL"]);
// conectarse
$conexion = pg_connect(
  "host=" . $datos["host"] . 
  " port=" . $datos["port"] . 
  " dbname=" . substr($datos["path"], 1) . 
  " user=" . $datos["user"] . 
  " password=" . $datos["pass"]);

// preparar consultas
pg_prepare($conexion, "conexion1", 'CREATE TABLE XerathDatos (asesino VARCHAR(30), X FLOAT(20), Y FLOAT(20), Z FLOAT(20))');
pg_prepare($conexion, "conexion2", 'CREATE TABLE XerathDatosxd (usuario VARCHAR(20), puntuacion INT)');
// ejecutar consultas
pg_execute($conexion, "conexion1", array());
pg_execute($conexion, "conexion2", array());
// indicar que el resultado es JSON
header("Content-type: application/json; charset=utf-8");
// permitir acceso de otros lugares fuera del servidor
header('Access-Control-Allow-Origin: *');
