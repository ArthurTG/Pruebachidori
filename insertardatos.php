<?
$datos = parse_url($_ENV["DATABASE_URL"]);
// conectarse
$conexion = pg_connect(
  "host=" . $datos["host"] . 
  " port=" . $datos["port"] . 
  " dbname=" . substr($datos["path"], 1) . 
  " user=" . $datos["user"] . 
  " password=" . $datos["pass"]);

function getxd($insertar) {
  $variable = json_decode($_GET[$insertar]);
  return $variable;
}

function get1xd($posX) {
  $variablita = json_decode($_GET[$posX]);
  return $variablita;
}

function get2xd($posY) {
  $variablita2 = json_decode($_GET[$posY]);
  return $variablita2;
}

function get3xd($posZ) {
  $variablita3 = json_decode($_GET[$posZ]);
  return $variablita3;
}

$asdfg = getxd("insertar");
$asddsa = get1xd("posX");
$asddsa2 = get2xd("posY");
$asddsa3 = get3xd("posZ");

// preparar consultas
pg_prepare($conexion, "sql3", 'INSERT INTO XerathDatos (asesino, X, Y, Z) VALUES ($1, $2, $3, $4)');
pg_prepare($conexion, "sql4", 'SELECT * FROM XerathDatos');
// ejecutar consultas
pg_execute($conexion, "sql3", array("$asdfg", "$asddsa", "$asddsa2", "$asddsa3"));
$resultado = pg_execute($conexion, "sql4", array());
// indicar que el resultado es JSON
header("Content-type: application/json; charset=utf-8");
// permitir acceso de otros lugares fuera del servidor
header('Access-Control-Allow-Origin: *');
// imprimir resultado
$gente = array();
while ($fila = pg_fetch_assoc($resultado)) {
  array_push($gente, $fila);
}
echo json_encode($gente);


