<?
$datos = parse_url($_ENV["DATABASE_URL"]);
// conectarse
$conexion = pg_connect(
  "host=" . $datos["host"] . 
  " port=" . $datos["port"] . 
  " dbname=" . substr($datos["path"], 1) . 
  " user=" . $datos["user"] . 
  " password=" . $datos["pass"]);

function getase($asesino) {
  $variable = json_decode($_GET[$asesino]);
  return $variable;
}

function getposX($posX) {
  $variablita = json_decode($_GET[$posX]);
  return $variablita;
}

function getposY($posY) {
  $variablitaY = json_decode($_GET[$posY]);
  return $variablitaY;
}

function getposZ($posZ) {
  $variablitaZ = json_decode($_GET[$posZ]);
  return $variablitaZ;
}

$asdfg = getase("asesino");
$asddsa = getposX("posX");
$asddsay = getposY("posY");
$asddsaz = getposZ("posZ");

// preparar consultas
pg_prepare($conexion, "insertar1", 'INSERT INTO XerathDatos (asesino, x, y, z) VALUES ($1, $2, $3, $4)');
pg_prepare($conexion, "insertar2", 'SELECT * FROM XerathDatos');
// ejecutar consultas
pg_execute($conexion, "insertar1", array("$asdfg", "$asddsa", "$asddsay", "$asddsaz"));
$resultado = pg_execute($conexion, "insertar2", array());
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
