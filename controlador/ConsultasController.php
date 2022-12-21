<?php
    class consultas extends dbconexion{



        public function select_paciente(){
                $sqlp = dbconexion::conexion()->prepare("select * from paciente;");
                $sqlp -> execute();
                return $array = $sqlp->fetchAll(PDO::FETCH_ASSOC);
          } 

        public function insert_paciente($tipo_doc,$documento,$fecha,$nombre,$apellidos,$sexo){
            $sql = dbconexion::conexion()->prepare("INSERT INTO  paciente(tipo_doc,documento,fecha,nombre,apellidos,sexo) VALUES ('$tipo_doc','$documento','$fecha','$nombre','$apellidos','$sexo')");
            if ($sql -> execute()) {
                $resultado = self::select_paciente();
                return $resultado;
            }
        }
        public function obtener_paciente($cons){
            $sql = dbconexion::conexion()->prepare("SELECT * FROM paciente WHERE consecutivo ='".$cons."'");
            if($sql -> execute()){
                return $array = $sql->fetchAll(PDO::FETCH_ASSOC);  
            }else{
                return "error";
            }
        }
    
        public function update_paciente($cons,$tipo,$doc,$fec,$nom,$ape,$sexo){
            $sql = dbconexion::conexion()->prepare("UPDATE paciente SET tipo_doc='".$tipo."',documento='".$doc."',fecha='".$fec."',nombre='".$nom."',apellidos='".$ape."',sexo='".$sexo."' where consecutivo= '".$cons."'");
            $sql->execute();
            if($sql->rowCount() > 0){
                $resultado = self::select_paciente();
                return $resultado;
            }else{
                return "error";
                }
            }
            
        public function eliminar_paciente($cons){
            $sql = dbconexion::conexion()->prepare("DELETE FROM paciente WHERE consecutivo = '".$cons."'");
            $sql->execute();
            if($sql->rowCount() > 0){
                $resultado = self::select_paciente();
                return $resultado;

            }else{
                return "error";
            }
        }








    }

?>