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
    $username = $_POST["uname"];
    $password = $_POST["psw"];

    // Consulta SQL para obtener los datos del usuario
    $sql = "SELECT * FROM usuarios WHERE nombre_usuario = '{$username}'";
    $result = $conn->query($sql);

    if ($result) {
      $row = $result->fetch_assoc();
      if ($row && password_verify($password, $row["contraseña"])) {
        // Inicio de sesión exitoso, redirige al usuario a la página principal
        header("Location: index2.html");
        exit();
      } else {
        echo "Nombre de usuario o contraseña incorrectos";
      }
    } else {
      echo "Error al consultar la base de datos";
    }
}

$conn->close();
?>
