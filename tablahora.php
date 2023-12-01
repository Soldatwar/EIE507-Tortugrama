<?php
$servername = "localhost";
$username = "id21502446_prueba";
$password = "123Of456.";
$dbname = "id21502446_prueba";
$tbl_name="tabla_por_hora"; // Table name 

// Connect to server and select database.
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("cannot connect"); 

// Get data sent from Raspberry Pi
$data = json_decode(file_get_contents('php://input'), true);
$temperatura = isset($data['temperatura']) ? $data['temperatura'] : null;
$humedad = isset($data['humedad']) ? $data['humedad'] : null;
$humo = isset($data['humo']) ? $data['humo'] : null;

// Insert data into table
$sql="INSERT INTO $tbl_name(marca_de_tiempo, temperatura, humedad, humo) VALUES (now(), '$temperatura', '$humedad', '$humo')";
$result=mysqli_query($conn, $sql);

// if successfully insert data into database 
if($result){
echo "Successful";
}
else {
echo "ERROR";
}
?>
