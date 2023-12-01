<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "id21502446_prueba";
$password = "123Of456.";
$dbname = "id21502446_prueba";
$charset = 'utf8mb4';

$dsn = "mysql:host=$servername;dbname=$dbname;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $username, $password, $opt);

// Comprueba si las claves "switchNumber" y "switchState" existen en $_POST
if (isset($_POST['switchNumber']) && isset($_POST['switchState'])) {
  // Recupera los datos del interruptor desde la petición POST
  $switchNumber = $_POST['switchNumber'];
  $switchState = $_POST['switchState'] == 'on' ? 1 : 0;

  // Prepara y ejecuta la consulta de inserción o actualización
  $stmt = $pdo->prepare("INSERT INTO estado_switch (id, estado) VALUES (?, ?) ON DUPLICATE KEY UPDATE estado = ?");
  $stmt->execute([$switchNumber, $switchState, $switchState]);
}
?>
