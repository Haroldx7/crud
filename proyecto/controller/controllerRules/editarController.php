<?php

include("../../controller/controllerUpdates/userControllerUpdate.php");



if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $tipodoc = $_POST['tipodoc'];
    $numerodoc = $_POST['numerodoc'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $ciudad = $_POST['ciudad'];
    $barrio = $_POST['barrio'];
    $tipologia = $_POST['tipologia'];
    $observacion = $_POST['observacion'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $rol = $_POST['rol'];
    $estado = $_POST['estado']; 
    $id = $_POST['id'];
    $idcreacion = $_POST['idcreacion'];
    $datos = array($nombres,$apellidos,$tipodoc,$numerodoc,$direccion,$telefono,$ciudad,$barrio,$tipologia,$observacion,$correo,$contrasena,$rol,$estado, $id, $idcreacion);
    print_r($datos);
    $user = new userControllerUpdate();
    $user->editar($datos);
}
