<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/slate/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
    <a href="index.php" class="nav-link"><--Inicio</a>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Consecutivo</th>
                    <th>Tipo Documento</th>
                    <th>Nro Documento</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Sexo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        <tbody id="tabla_persona">
            <?php
                  require_once "php/conexion.php";
                  require_once "controlador/ConsultasController.php";
                $sentencia = new consultas();
                   $mostrardatos = $sentencia->select_paciente();
                   foreach($mostrardatos as $res){
                       $cons = $res["consecutivo"];
                        echo "<tr>";
                        echo "<td>".$cons."</td>";
                        echo "<td>".$res["tipo_doc"]."</td>";
                        echo "<td>".$res["documento"]."</td>";
                        echo "<td>".$res["fecha"]."</td>";
                        echo "<td>".$res["nombre"]."</td>";
                        echo "<td>".$res["apellidos"]."</td>";
                        echo "<td>".$res["sexo"]."</td>";
                        echo "<td class='text-center'>
                        <button class='btn btn-primary btn-sm' onClick='editar($cons);'>Editar</button>           
                        <button class='btn btn-danger btn-sm' onClick='eliminar($cons);'>Eliminar</button>
                        </td>";
                        echo "</tr>";
                   }        
            ?>
            </tbody>
        </table>
    </div>
    <script src="js/listar_editar_eliminar.js" ></script>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>  
    
</body>
</html>