<?php
include("../../controller/controllerQuerys/userControllerQuery.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $datos = array($correo, $contrasena);
    $user = new UserControllerQuery();
    $user->validar($datos);
}