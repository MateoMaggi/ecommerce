<?php
include("../php/conexion_be.php");
//$usuario=$_GET["usuario"];

$sql = "SELECT * FROM usuarios";
$query = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/style.css" rel="stylesheet">
    <title>Users CRUD</title>
</head>

<body>
    <div class="users-form">
        <h1>Crear usuario</h1>
        <form action="insert_user.php" method="POST">
            <input type="text" name="nombre_completo" placeholder="Nombre Completo">
            <input type="text" name="usuario" placeholder="Usuario">
            <input type="password" name="contrasena" placeholder="Contrasena">
            <input type="email" name="correo" placeholder="Correo">

            <input type="submit" value="Agregar">
        </form>
    </div>

    <div class="users-table">
        <h2>Usuarios registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre completo</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Correo</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['id'] ?></th>
                        <th><?= $row['nombre_completo'] ?></th>
                        <th><?= $row['usuario'] ?></th>
                        <th><?= $row['contrasena'] ?></th>
                        <th><?= $row['correo'] ?></th>
                        <th><a href="update.php?id=<?= $row['id'] ?>" class="users-table--edit">Editar</a></th>
                        <th><a href="delete_user.php?id=<?= $row['id'] ?>" class="users-table--delete" >Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <div class="botones">
            <a href="crudpdf.php" class="button">Generar PDF</a>
            <a href="crudexcel.php" class="button">Generar Excel</a>
        </div>         
                     

</body>

</html>