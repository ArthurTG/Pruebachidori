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
pg_prepare($conexion, "borrar1", 'DROP TABLE IF EXISTS XerathDatos');
pg_prepare($conexion, "borrar2", 'DROP TABLE IF EXISTS XerathDatosxd');
// ejecutar consultas
pg_execute($conexion, "borrar1", array());
pg_execute($conexion, "borrar2", array());
// indicar que el resultado es JSON
header("Content-type: application/json; charset=utf-8");
// permitir acceso de otros lugares fuera del servidor
header('Access-Control-Allow-Origin: *');
