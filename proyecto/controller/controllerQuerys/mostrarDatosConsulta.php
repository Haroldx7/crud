<?php 
require('userControllerQuery.php');
$usuarios = new UserControllerQuery();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $jsondata = file_get_contents('php://input');
    $data = json_decode($jsondata, true);
    if($data !== null){ 
        $id = $data['id-con'];
        $cedula = $data['cedula-con'];
        $correo = $data['correo-con'];
        $direccion = $data['direccion-con'];
        $estado = $data['estado-con'];

        $arrayDatos = array($id,$cedula,$correo,$direccion,$estado);
            
        $datos = $usuarios->datosConsulta($arrayDatos);

        echo json_encode($datos);
    }else{
        http_response_code(400);    
        $response = ['mensaje'=> 'Mal'];
        echo json_encode($response);
    }

}else{
    http_response_code(405);
    $response = ['mensaje'=> 'pailas'];
    echo json_encode($response);
}
