<?php
$servername = "localhost";
$username = "id21502446_prueba";
$password = "123Of456.";
$dbname = "id21502446_prueba";

// Crea la cadena de conexión para MySQL
$connection_string = "mysql:host={$servername};dbname={$dbname}";

// Crea la conexión
$conn = new PDO($connection_string, $username, $password);

// Verifica la conexión
if (!$conn) {
  die("Conexión fallida");
}

// Consulta SQL para obtener los datos más recientes de tabla_por_minuto
$sql = "SELECT marca_de_tiempo, temperatura, humedad, humo FROM tabla_por_minuto ORDER BY marca_de_tiempo DESC LIMIT 10";
$result = $conn->query($sql);

$data = array();
if ($result->rowCount() > 0) {
  // Guarda los datos de cada fila en un array
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $data['tabla_por_minuto'][] = $row;
  }
}

// Consulta SQL para obtener los datos más recientes de tabla_por_hora
$sql = "SELECT marca_de_tiempo, temperatura, humedad, humo FROM tabla_por_hora ORDER BY marca_de_tiempo DESC LIMIT 10";
$result = $conn->query($sql);

if ($result->rowCount() > 0) {
  // Guarda los datos de cada fila en un array
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $data['tabla_por_hora'][] = $row;
  }
}

// Consulta SQL para obtener los datos más recientes de tabla_por_dia
$sql = "SELECT marca_de_tiempo, temperatura, humedad, humo FROM tabla_por_dia ORDER BY marca_de_tiempo DESC LIMIT 7";
$result = $conn->query($sql);

if ($result->rowCount() > 0) {
  // Guarda los datos de cada fila en un array
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $data['tabla_por_dia'][] = $row;
  }
}

// Devuelve los datos en formato JSON
echo json_encode($data);

$conn = null;
?>
