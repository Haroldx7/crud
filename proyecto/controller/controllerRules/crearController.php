<?php

include("../../controller/controllerUpdates/userControllerUpdate.php");



if($_SERVER['REQUEST_METHOD'] == 'POST'){

    try{
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

    if($datos = array($nombres,$apellidos,$tipodoc,$numerodoc,$direccion,$telefono,$ciudad,$barrio,$tipologia,$observacion,$correo,$contrasena,$rol,$estado)){
        $user = new userControllerUpdate();
        $user->crear($datos);
    }else{
        header('Location: ../../view/login.php');
    }
    }catch(Exception $e){
        header('Location: ../../view/login.php');
    };
}else{
    
}

