<?php
// Datos de conexión
$servidor = "localhost";    // En caso de que estés trabajando localmente
$usuario = "root";    // El usuario de tu base de datos
$password = ""; // La contraseña del usuario
$basedatos = "hospedaje"; // El nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servidor, $usuario, $password, $basedatos);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}
?>


