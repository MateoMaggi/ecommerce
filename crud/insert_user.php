<?php
include("../php/conexion_be.php");
include("../php/registro_usuario_be.php");

$id = null;
$nombre_completo = $_POST['nombre_completo']; //NAME
$usuario = $_POST['usuario']; //USERNAME
$contrasena = $_POST['contrasena'];
$correo = $_POST['correo'];

$sql = "INSERT INTO usuarios VALUES('$nombre_completo','$usuario','$contrasena','$correo')";
$query = mysqli_query($conexion, $sql);

if($query){
    Header("Location: crud.php");
}else{

}

?>