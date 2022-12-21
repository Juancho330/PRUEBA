<?php
    require_once "../php/conexion.php";
    require_once "../controlador/ConsultasController.php";


     $tipo_consulta = $_POST['tipo_operacion']; 
     switch($tipo_consulta){
        case 'guardar':
                $tipo_doc = $_POST['tipo_doc'];
                $documento = $_POST['documento'];
                $fecha = $_POST['fecha'];
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
                $sexo = $_POST['sexo'];
                
                $consultas = new consultas();
                $ejecutar = $consultas->insert_paciente($tipo_doc,$documento,$fecha,$nombre,$apellidos,$sexo);
                echo json_encode($ejecutar); 

            break;
            case 'editar':     
                $cons = $_POST['cons'];                
                $consultas = new consultas();
                $ejecutar = $consultas->obtener_paciente($cons);
                echo json_encode($ejecutar);
            break;
            case 'update':
                $cons = $_POST['consac'];
                $tipo = $_POST['tipoac'];
                $doc = $_POST['docac'];
                $fec = $_POST['fecac'];
                $nom = $_POST['nomac'];
                $ape = $_POST['apeac'];
                $sexo = $_POST['sexou'];
                $consultas = new consultas();
                $ejecutar = $consultas->update_paciente($cons,$tipo,$doc,$fec,$nom,$ape,$sexo);
                echo json_encode($ejecutar);
            break;
            case 'eliminar':
                $cons=$_POST['cons'];
                $consultas = new consultas();
                $ejecutar = $consultas -> eliminar_paciente($cons);
                echo json_encode($ejecutar);
            break;
            default:
        break;


     }

?>