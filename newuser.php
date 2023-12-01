<?php
$servername = "localhost";
$username = "id21502446_prueba";
$password = "123Of456.";
$dbname = "id21502446_prueba";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST["new_uname"];
    $new_password = $_POST["new_psw"];

    // Cifra la contraseña
    $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);

    // Consulta SQL para agregar el nuevo usuario
    $sql = "INSERT INTO usuarios (nombre_usuario, contraseña) VALUES ('{$new_username}', '{$new_password_hashed}')";

    if ($conn->query($sql) === TRUE) {
      echo "Nuevo usuario creado con éxito";
    } else {
      echo "Error al crear el usuario: " . $conn->error;
    }
}

$conn->close();
?>
