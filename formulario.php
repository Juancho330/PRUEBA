<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/slate/bootstrap.min.css" crossorigin="anonymous">

</head>
<body>
    <div class="card text-center">
        Bienvenido
    </div>
<div class="row pt-5 justify-content-center">
<!-- Inicio del formulario -->
    <form action="" id="form" class="form-horizontal">
        <div class="card-header">
            <input type="text" name="tipo_operacion" value="guardar" hidden="true">
            <div>
                <h5>FORMULARIO PARA EL REGISTRO DE PACIENTES</h5>                
            </div>
                <div class="form-group">
                    <select name="tipo_doc" id="tipo_doc" class="form-control" require   >
                        <option value="">Seleccione el tipo de documento de identidad</option>
                        <option value="CC">Cedula de ciudadania</option>
                        <option value="TI">Tarjeta de Identidad</option>
                        <option value="CE">Cedula de extranjeria</option>
                        <option value="RC">Registro Civil</option>
                        <option value="NIT">Nit</option>                      
                    </select>
                </div>
                <div class="form-group">
                    <input type="number" name="documento" id="documento" class="form-control" placeholder="Digite su numero de identidad"  size="30" minlength="0" onkeypress="return valideKey(event);"  maxlength="10">
                </div>
                <div class="form-group"> 
                    <input type="date" name="fecha" id="fecha" class="form-control" max=<?php $hoy=date("Y-m-d"); echo $hoy;?> >  
                </div>
                <div class="form-group">
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Digite sus Nombres" pattern="[A-Za-z]+" size="30" minlength="4" onkeypress="return soloLetras(event)" maxlength="50">
                </div>
                <div class="form-group">
                    <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Digite sus Apellidos" pattern="[A-Za-z]+" size="30" minlength="4" onkeypress="return soloLetras(event)" maxlength="50">
                </div>
                <div class="form-group">
                    <select name="sexo" id="sexo"  class="form-control" require>
                        <option value="">Elija es sexo</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
                
                <input style="opacity:1;" type="checkbox" data-require="1" name="terminos" >Aceptar los <a style="color:blue;" href="#">Terminos y condiciones</a>
                <hr>
                <div class="form-group">
                    <button type="submit" class="btn-info btn-block">Aceptar</button>
                </div>
               
        </div> 
        <div>
                    <a  class="nav-link" href="index.php"><--Inicio</a>
                </div>      
    </form>
  <!-- Fin del formulario -->
</div>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>  
    <script src="js/funciones.js"></script> 
    <script src="js/limitador.js"></script> 
</body>
</html>