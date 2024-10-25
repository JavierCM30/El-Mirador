<?php
session_start(); // Iniciar la sesión para usar variables de sesión
require_once '../../../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibiendo datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $user = $_POST['user'];
    $contrasena = $_POST['password']; // Guardar la contraseña sin hash para la validación

    // Validar que los campos no estén vacíos
    if (!empty($nombre) && !empty($apellido) && !empty($email) && !empty($telefono) && !empty($user) && !empty($contrasena)) {
        
        // Validar fortaleza de la contraseña
        if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $contrasena)) {
            $_SESSION['error'] = "La contraseña debe tener al menos 8 caracteres, incluyendo letras y números.";
            header("Location: ../../login/");
            exit();
        }

        // Verificar que el nombre de usuario, teléfono y correo electrónico sean únicos
        $stmt = $conn->prepare("SELECT * FROM cliente WHERE username = ? OR telefono = ? OR email = ?");
        $stmt->bind_param("sss", $user, $telefono, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['error'] = "El nombre de usuario, el teléfono o el correo electrónico ya están en uso. Por favor, elige otros.";
            $stmt->close();
            header("Location: ../../login/");
            exit();
        }

        // Si las verificaciones pasan, proceder a insertar el nuevo usuario
        $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT); // Hash de la contraseña

        // Preparar la consulta SQL para insertar
        $stmt = $conn->prepare("INSERT INTO cliente (nombre, apellidos, email, telefono, username, contrasena) 
                                VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nombre, $apellido, $email, $telefono, $user, $contrasenaHash);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            $_SESSION['mensaje'] = "Registro exitoso. Por favor, inicia sesión."; // Guardar mensaje en sesión
            header("Location: ../../login/"); // Redirigir a la página de login
            exit();
        } else {
            $_SESSION['error'] = "Error al registrar el usuario: " . $stmt->error;
            header("Location: ../../login/");
            exit();
        }

        // Cerrar la sentencia
        $stmt->close();
    } else {
        $_SESSION['error'] = "Todos los campos son obligatorios.";
        header("Location: ../../login/");
        exit();
    }

    // Cerrar la conexión
    $conn->close();
}
?>
