<?php 
class UserControllerQuery{
    public function consular(){
        require('./../model/conexion.php');
        $sql = 'select * from usuario';
        $stmt = $conn->prepare($sql);
        if($stmt->execute()){
            $stmt->store_result();
            $stmt->bind_result($id, $nombre, $apellidos, $tipodocumento, $documento, $direccion, $telefono, $ciudad, $barrio, $tipologia, $observacion,$correo, $contrasena, $rol, $estado);
            while( $stmt->fetch()){

                echo "<div class='datos'>";
                echo "<span class='span1'>".$id."</span>";
                echo "<span class='span2'>".$nombre." ".$apellidos."</span>";
                echo "<span class='span3'>".$telefono."</span>";
                echo "<span class='span4'>".$tipologia."</span>";
                echo "<span class='span5'>".$documento."</span>";
                echo "<span class='span6'>".$direccion."</span>";
                echo "<span class='span7'>".$estado."</span>";
                echo "<input type='hidden' id='idUsuario' value='".$id."'>";
                echo "<span>"."<button class='btn-editar' id='btn-editar'>editar</button>"."</span>";
                echo "</div>";
            };
        }
        $stmt->close();
        $conn->close();
    }

    public function datosUsuario($idUsuario){
        require '../../model/conexion.php';
        $sql = 'SELECT u.*, t.descripcion AS nomtipodoc, c.nomciu, b.nombar, tp.descripcion AS tipologia, r.descripcion AS rol FROM usuario u INNER JOIN tipodoc t ON u.tipdoc=t.nomtip 
        INNER JOIN ciudad c ON u.ciudad=c.idciudad INNER JOIN barrio b ON u.barrio=b.idbarrio 
        INNER JOIN tipologia tp ON u.tipologia=tp.abreviatura INNER JOIN rol r ON u.rol=r.idrol WHERE u.idusuario = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $idUsuario);

        if($stmt->execute()){
            $stmt->store_result();
            if($stmt->num_rows > 0){
                
                
                $stmt->bind_result($id, $nombres, $apellidos, $tipodocumento, $documento, $direccion, $telefono, $ciudad, $barrio, $tipologia, $observacion,$correo, $contrasena, $rol, $estado, $destipdoc, $nomciu, $nombar, $nomtip, $nomrol);   
                $stmt->fetch();
                return [
                    'id'=>$id,
                    'nombres'=>$nombres,
                    'apellidos'=>$apellidos,
                    'tipodocumento'=>$tipodocumento,
                    'documento'=>$documento,
                    'direccion'=>$direccion,
                    'telefono'=>$telefono,
                    'ciudad'=>$ciudad,
                    'barrio'=>$barrio,
                    'tipologia'=>$tipologia,
                    'observacion'=>$observacion,
                    'correo'=>$correo,
                    'contrasena'=>$contrasena,
                    'rol'=>$rol,
                    'estado'=>$estado,
                    'destipdoc'=>$destipdoc,
                    'nomciu'=>$nomciu,
                    'nombar'=>$nombar,
                    'nomtip'=>$nomtip,
                    'nomrol'=>$nomrol
                ];

            }else{
                return 'fdfdfd';
            }
            
        }else{
            return 'fdfdfdfdf';
        }
    }   



    public function datosConsulta($datosConsulta){
        require '../../model/conexion.php';
        $sql = 'SELECT * FROM usuario WHERE ';

        if (!empty($datosConsulta[0])) {
            $sql .= "idusuario = ".$datosConsulta[0]." OR ";
        }
        if (!empty($datosConsulta[1])) {
            $sql .= "documento = ".$datosConsulta[1]." OR ";
        }
        if (!empty($datosConsulta[2])) {
            $sql .= "coremp = "."'".$datosConsulta[2]."'"." OR ";
            
        }
        if (!empty($datosConsulta[3])) {
            $sql .= "direccion= "."'".$datosConsulta[3]."'"." OR ";
        }
        if (!empty($datosConsulta[4])) {
            $sql .= "estado = "."'".$datosConsulta[4]."'"." OR ";
        }
        if (empty($datosConsulta[0]) && empty($datosConsulta[1]) && empty($datosConsulta[2]) && empty($datosConsulta[3]) && empty($datosConsulta[4])) {
            $sql .= "1=1";
        }
        $sql = rtrim($sql, " OR ").";";
        
        $stmt = $conn->prepare($sql);
        if($stmt->execute()){
            $stmt->store_result();
            $resultado = [];
            if($stmt->num_rows > 0){

                $stmt->bind_result($id, $nombres, $apellidos, $tipodocumento, $documento, $direccion, $telefono, $ciudad, $barrio, $tipologia, $observacion,$correo, $contrasena, $rol, $estado);   
                while($stmt->fetch()){
                    $resultado[] = [
                        'id'=>$id,
                        'nombres'=>$nombres,
                        'apellidos'=>$apellidos,
                        'tipodocumento'=>$tipodocumento,
                        'documento'=>$documento,
                        'direccion'=>$direccion,
                        'telefono'=>$telefono,
                        'ciudad'=>$ciudad,
                        'barrio'=>$barrio,
                        'tipologia'=>$tipologia,
                        'observacion'=>$observacion,
                        'correo'=>$correo,
                        'contrasena'=>$contrasena,
                        'rol'=>$rol,
                        'estado'=>$estado,
                    ];
                }
                return $resultado;

            }else{
                return 'fdfdfd';
            }
            
        }else{
            return 'fdfdfdfdf';
        }
    }   


    


    public function validar($datos){
        require '../../model/conexion.php';
        $sql = 'select * from usuario where coremp = ? and conemp = ?';
        session_start();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $datos[0], $datos[1]);
        if($stmt->execute()){
            $stmt->store_result();
            if($stmt->num_rows>0){
                $stmt->bind_result($id, $nombre, $apellidos, $tipodocumento, $documento, $direccion, $telefono, $ciudad, $barrio, $tipologia, $observacion,$correo, $contrasena, $rol, $estado); 
                $stmt->fetch();
                $_SESSION['usuario'] = [
                    'id'=>$id,
                    'nombre'=>$nombre,
                    'apellidos'=>$apellidos,
                    'rol'=>$rol,
                    'estado'=>$estado
                ];
                    
                if($rol == 1){
                    header('Location: ../../view/index.php');
                }else if($rol == 2){
                    header('Location: ../../view/admin.php');
                }else{
                    header('Location: ../../view/login.php');
                }
                
                $stmt->close();
                $conn->close();
            }else{  
                header('Location: ../../view/login.php');
            }
        }else{
            header('Location: ../../view/usuario.php');
        }
    }

    public function consultarid(){
        require '../../model/conexion.php';
        $sql = 'SELECT idusuario FROM usuario order by idusuario desc limit 1';
        $stmt = $conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($id);
            if($stmt->fetch()){
                return $id; 
            }
        }
    }
}