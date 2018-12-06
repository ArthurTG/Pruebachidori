<?
$datos = parse_url($_ENV["DATABASE_URL"]);
// conectarse
$conexion = pg_connect(
  "host=" . $datos["host"] . 
  " port=" . $datos["port"] . 
  " dbname=" . substr($datos["path"], 1) . 
  " user=" . $datos["user"] . 
  " password=" . $datos["pass"]);

function getxd($asesino) {
  $variable = json_decode($_GET[$asesino]);
  return $variable;
}

function get1xd($numero) {
  $variablita = json_decode($_GET[$numero]);
  return $variablita;
}

$asdfg = getxd("asesino");
$asddsa = get1xd("numero");
// preparar consultas
pg_prepare($conexion, "insertar1", 'INSERT INTO XerathDatos (asesino, muertes) VALUES ($1, $2)');
pg_prepare($conexion, "insertar2", 'SELECT * FROM XerathDatos');
// ejecutar consultas
pg_execute($conexion, "insertar1", array("$asdfg", "$asddsa"));
$resultado = pg_execute($conexion, "insertar2", array());
// indicar que el resultado es JSON
header("Content-type: application/json; charset=utf-8");
// permitir acceso de otros lugares fuera del servidor
header('Access-Control-Allow-Origin: *');
// imprimir resultado
$gente = array();
while ($fila = pg_fetch_assoc($resultado)) {
  $fila["muertes"] = intval($fila["muertes"]);
  array_push($gente, $fila);
}
echo json_encode($gente);
