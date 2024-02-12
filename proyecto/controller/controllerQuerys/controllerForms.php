<?php 

class Formularios {
    public function nomen($nom){
        require './../model/conexion.php';
        
        if($nom == 'nomen1'){
            $sql = "select * from nomen1 ";
            $stmt = $conn->prepare($sql);
            if($stmt->execute()){
                $stmt->store_result();
                $stmt->bind_result($id, $descripcion, $abreviatura, $estado);
    
                while($stmt->fetch()){
                    if($estado == "ACT"){
                        $html = '<option value="'.$abreviatura.'">'.$descripcion.'</option>';
                        echo $html;
                    }   
                }
            }

        }elseif($nom == 'nomen2'){
            $sql = "select * from nomen2 ";
            $stmt = $conn->prepare($sql);
            if($stmt->execute()){
                $stmt->store_result();
                $stmt->bind_result($id, $descripcion, $estado);
    
                while($stmt->fetch()){
                    if($estado == "ACT"){
                        $html = '<option value="'.$descripcion.'">'.$descripcion.'</option>';
                        echo $html;
                    }   
                }
            }
        }elseif($nom == 'nomen3'){
            $sql = "select * from nomen3 ";
            $stmt = $conn->prepare($sql);
            if($stmt->execute()){
                $stmt->store_result();
                $stmt->bind_result($id, $descripcion, $abreviatura, $estado);
    
                while($stmt->fetch()){
                    if($estado == "ACT"){
                        $html = '<option value="'.$abreviatura.'">'.$descripcion.'</option>';
                        echo $html;
                    }   
                }
            }
        }elseif($nom == 'nomen4'){
            $sql = "select * from nomen4";
            $stmt = $conn->prepare($sql);
            if($stmt->execute()){
                $stmt->store_result();
                $stmt->bind_result($id, $descripcion, $abreviatura, $estado);
    
                while($stmt->fetch()){
                    if($estado == "ACT"){
                        $html = '<option value="'.$abreviatura.'">'.$descripcion.'</option>';
                        echo $html;
                    }   
                }
            }
        }elseif($nom == 'nomen5'){
            $sql = "select * from nomen5";
            $stmt = $conn->prepare($sql);
            if($stmt->execute()){
                $stmt->store_result();
                $stmt->bind_result($id, $descripcion, $abreviatura, $estado);
    
                while($stmt->fetch()){
                    if($estado == "ACT"){
                        $html = '<option value="'.$abreviatura.'">'.$descripcion.'</option>';
                        echo $html;
                    }   
                }
            }
        }else{
            echo "No se ecnontro";
        }
    }

    public function tipodoc(){
        require './../model/conexion.php';
        $sql = "select * from tipodoc";
        $stmt = $conn->prepare($sql);
        if($stmt->execute()){
            $stmt->store_result();
            $stmt->bind_result($abreviatura, $descripcion, $estado);
    
            while($stmt->fetch()){
                if($estado == "ACT"){
                    $html = '<option value="'.$abreviatura.'" class="tipodoc" >'.$descripcion.'</option>';
                    echo $html;
                }   
            }
        }
    }

    public function ciudad() {
        require './../model/conexion.php';
        $sql = "select * from ciudad";
        $stmt = $conn->prepare($sql);
        if($stmt->execute()){
            $stmt->store_result();
            $stmt->bind_result($id,$descripcion, $estado);
    
            while($stmt->fetch()){
                if($estado == "ACT"){
                    $html = '<option value="'.$id.'" class="ciudad">'.$descripcion.'</option>';
                    echo $html;
                }   
            }
        }
    }

    public function barrio(){
        require './../model/conexion.php';
        $sql = "select * from barrio";
        $stmt = $conn->prepare($sql);
        if($stmt->execute()){
            $stmt->store_result();
            $stmt->bind_result($id,$descripcion, $estado);
    
            while($stmt->fetch()){
                if($estado == "ACT"){
                    $html = '<option value="'.$id.'" class="barrio">'.$descripcion.'</option>';
                    echo $html;
                }   
            }
        }
    }

    public function tipologia(){
        require './../model/conexion.php';
        $sql = "select * from tipologia";
        $stmt = $conn->prepare($sql);
        if($stmt->execute()){
            $stmt->store_result();
            $stmt->bind_result($abreviatura, $descripcion, $estado);
    
            while($stmt->fetch()){
                if($estado == "ACT"){
                    $html = '<option value="'.$abreviatura.'" class="tipologia">'.$descripcion.'</option>';
                    echo $html;
                }   
            }
        }
    }
}
