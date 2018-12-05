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

function get1xd($numeritos) {
  $variablita = json_decode($_GET[$numeritos]);
  return $variablita;
}

$asdfg = getxd("insertar");
$asddsa = get1xd("numeritos");
// preparar consultas
pg_prepare($conexion, "sql1", 'DROP TABLE IF EXISTS XerathDatos');
pg_prepare($conexion, "sql7", 'DROP TABLE IF EXISTS XerathDatosxd');
pg_prepare($conexion, "sql2", 'CREATE TABLE XerathDatos (nombre VARCHAR(30), numero INT)');
pg_prepare($conexion, "sql5", 'CREATE TABLE XerathDatosxd (usuario VARCHAR(30), contraseña VARCHAR(20))');
pg_prepare($conexion, "sql3", 'INSERT INTO XerathDatos (nombre, numero) VALUES ($1, $2)');
pg_prepare($conexion, "sql6", 'INSERT INTO XerathDatosxd (nombre, contraseña) VALUES ($1, $2)');
pg_prepare($conexion, "sql4", 'SELECT * FROM XerathDatos');
// ejecutar consultas
pg_execute($conexion, "sql1", array());
pg_execute($conexion, "sql7", array());
pg_execute($conexion, "sql2", array());
pg_execute($conexion, "sql3", array("$asdfg", "$asddsa"));
pg_execute($conexion, "sql5", array());
$resultado = pg_execute($conexion, "sql4", array());
// indicar que el resultado es JSON
header("Content-type: application/json; charset=utf-8");
// permitir acceso de otros lugares fuera del servidor
header('Access-Control-Allow-Origin: *');
// imprimir resultado
$gente = array();
while ($fila = pg_fetch_assoc($resultado)) {
  $fila["numero"] = intval($fila["numero"]);
  array_push($gente, $fila);
}
echo json_encode($gente);
