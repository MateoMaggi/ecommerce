<?php

include("../php/conexion_be.php");

//$id=$_GET["id"];
$id=$_POST["id"];


$nombre_completo = $_POST['nombre_completo']; //NAME
$usuario = $_POST['usuario']; //USERNAME
$contrasena = $_POST['contrasena'];
$correo = $_POST['correo'];

$sql = "UPDATE usuarios SET nombre_completo='$nombre_completo', usuario='$usuario', contrasena='$contrasena', correo='$correo' WHERE id='$id'";
$query = mysqli_query($conexion, $sql);

if($query){
    Header("Location: crud.php");
}else{

}

?>