<?php 
    include("../php/conexion_be.php");


    $id=$_GET['id'];

    $sql="SELECT * FROM usuarios WHERE id='$id'";
    $query=mysqli_query($conexion, $sql);

    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Editar usuarios</title>
        
    </head>
    <body>
        <div class="users-form">
            <form action="edit_user.php" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>"> 
               
            <input type="text" name="nombre_completo" placeholder="Nombre Completo" value="<?= $row['nombre_completo']?>">
                <input type="text" name="usuario" placeholder="Usuario" value="<?= $row['usuario']?>">
                <input type="text" name="contrasena" placeholder="Contraseña" value="<?= $row['contrasena']?>">
                <input type="text" name="correo" placeholder="Correo" value="<?= $row['correo']?>">

                <input type="submit" value="Actualizar">
            </form>
        </div>
    </body>
</html>