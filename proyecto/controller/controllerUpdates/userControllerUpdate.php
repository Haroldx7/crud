<?php

class userControllerUpdate{
    public function crear($datos){
        require '../../model/conexion.php';
        $sql = "insert into usuario(nomemp, apeemp, tipdoc,documento,direccion,telefono,ciudad,barrio,tipologia,observacion,coremp,conemp,rol,estado) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssssssss", $datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5], $datos[6], $datos[7], $datos[8], $datos[9], $datos[10], $datos[11], $datos[12], $datos[13]);
        if($stmt->execute()){
            echo "dsdsd";
            
        }else{
            echo "fdfdfdffd";
        }
        $stmt->close();
        $conn->close();
    }
    public function crearadmin($datos){
        require '../../model/conexion.php';
        $registro = new userControllerUpdate();
        $sql = "insert into usuario(nomemp, apeemp, tipdoc,documento,direccion,telefono,ciudad,barrio,tipologia,observacion,coremp,conemp,rol,estado) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssssssss", $datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5], $datos[6], $datos[7], $datos[8], $datos[9], $datos[10], $datos[11], $datos[12], $datos[13]);
        if($stmt->execute()){
            $stmt->close();
            $registro->registro($datos[14]);
            header("Location: ../../view/admin.php");  
        }        
    }

    private function registro($idcreacion){
        require '../../model/conexion.php';
        require('../../controller/controllerQuerys/userControllerQuery.php');
        $consulta = new UserControllerQuery();
        $sql = 'INSERT INTO registro(fecha_creacion, fecha_modificacion,usuario_creacion, usuario_modificacion, usuario_modificado, estado) VALUES(curdate(),"00-00-0000",?,?,?,"ACT")';
        $stmt = $conn->prepare($sql);
        $resultado = $consulta->consultarid();
        // $fechacreacion = date("Y-m-d");
        $stmt->bind_param('sss',$idcreacion,$idcreacion,$resultado);
        if($stmt->execute()){
            $stmt->close();
        }
    }

    private function editarregistro($idcreacion, $idusuariom){
        require '../../model/conexion.php';
        $sql = 'UPDATE registro SET fecha_modificacion = curdate(), usuario_modificacion = ? WHERE usuario_modificado = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",$idcreacion, $idusuariom);
        if($stmt->execute()){
            header("Location: ../../view/admin.php?=bien");
        }
    }

    public function editar($datos){
        require '../../model/conexion.php';
        require('../../controller/controllerQuerys/userControllerQuery.php');
        $registro = new userControllerUpdate();
        $sql = "
        UPDATE usuario SET `nomemp` = ?, `apeemp` = ?, `tipdoc` = ?, 
        `documento` = ?, `direccion` = ?, `telefono` = ?, `ciudad` = ?, 
        `barrio` = ?,`tipologia` = ?, `observacion` = ?, `coremp` = ?, 
        `conemp` = ?, `rol` = ?,`estado` = ? WHERE `idusuario` = ?;
        ";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssssssss", $datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5], $datos[6], $datos[7], $datos[8], $datos[9], $datos[10], $datos[11], $datos[12], $datos[13], $datos[14]);
        print_r($datos);
        if($stmt->execute()){
            $registro->editarregistro($datos[15], $datos[14]);
            $mensaje = "Editado con exito";
            header("Location: ../../view/admin.php?=".urldecode($mensaje));
        }else{
            echo "fdjkfdjkdsfjkdf";
        }
    }
}
