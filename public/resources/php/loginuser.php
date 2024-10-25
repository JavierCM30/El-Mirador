<?php
session_start(); // Iniciar la sesión
require_once '../../../config/conexion.php'; // Conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibiendo datos del formulario
    $correo = $_POST['correo'];
    $contrasena = $_POST['contraseña'];

    // Validar que los campos no estén vacíos
    if (!empty($correo) && !empty($contrasena)) {
        // Preparar la consulta SQL para buscar el usuario
        $stmt = $conn->prepare("SELECT * FROM cliente WHERE email = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc();
            // Verificar la contraseña
            if (password_verify($contrasena, $usuario['contrasena'])) {
                // Almacenar datos del usuario en la sesión
                $_SESSION['usuario_id'] = $usuario['id']; // Almacena el ID del usuario
                $_SESSION['nombre'] = $usuario['nombre']; // Almacena el nombre del usuario
                header("Location: ../../"); // Redirigir a la página de inicio
                exit();
            } else {
                $_SESSION['error'] = "Contraseña incorrecta.";
                header("Location: ../../login/");
                exit();
            }
        } else {
            $_SESSION['error'] = "No se encontró un usuario con ese correo electrónico.";
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
