<?php
session_start();
include 'conexion_be.php';

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Verifica si es el correo y la contraseña especiales para el CRUD
if ($correo === 'crud@gmail.com' && $contrasena === 'crud') {
    // Redirige al CRUD
    header("Location: ../crud/crud.php");
    exit();
}

// Hash para la verificación en la base de datos
$contrasena_hash = hash('sha512', $contrasena);

// Consulta a la base de datos para verificar las credenciales
$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' AND contrasena='$contrasena_hash'");

if (mysqli_num_rows($validar_login) > 0) {
    $_SESSION['usuario'] = $correo; // VARIABLE DE SESION
    header("Location: ../home.php");
    exit();
} else {
    echo '
        <script>
            alert("Datos incorrectos");
            window.location = "../index.php";
        </script>
    ';
    exit();
}
?>
