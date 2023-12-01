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

// Recupera el estado de los switches desde la base de datos
$stmt = $pdo->query("SELECT id, estado FROM estado_switch WHERE id IN (1, 2)");
$switchStates = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

// Devuelve el estado de los switches en formato JSON
header('Content-Type: application/json');
echo json_encode($switchStates);
?>
