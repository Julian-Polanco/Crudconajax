<?php
    include 'Conexion.php';
    if(isset($_GET["cedula"])){
        $cedula=$_GET["cedula"];
        $consulta="SELECT * FROM datos WHERE cedula='$cedula'";
        $valida =$mysqli -> query($consulta);
        $dato=$valida->fetch_assoc();
        $nombre=$dato["nombre"]; 
        $direccion=$dato["direccion"]; 
        $telefono=$dato["telefono"];
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="estilos.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pruebas de ajax</title>
</head>
<body>
    <div class="container-sm">
        <div class="container-sm">
                <h2>actualiza tus datos</h2>
                <form id="formuactualiza"  class="row-12" name="actualizar" action="Crud.php" method="POST">
                    <div class="col-12">
                        <input readonly value="<?php echo $cedula; ?>" class="form-control" type="text" id="cedula" name="cedula" placeholder="Ingrese Su Numero De Cedula">
                    </div>
                    <div class="col-12">
                        <input value="<?php echo$nombre; ?>" class="form-control"type="text" id="nombre" name="nombre" placeholder="Ingrese Su Nombre">
                    </div>
                    <div class="col-12">
                        <input value="<?php echo $direccion ?>" class="form-control"type="text" id="direccion" name="direccion" placeholder="Ingrese Su Direccion">
                    </div>   
                    <div class="col-12"> 
                        <input value="<?php echo$telefono;?>" class="form-control"type="text" id="telefono" name="telefono" placeholder="Ingrese Su Numero De telefono">
                    </div>    
                    <input  type="hidden" name="TipoConsulta" value="Actualizar" >
                    <div class="col-12">
                        <input id="enviar" class="btn btn-primary d-block mx-auto" type="submit" value="Actualizar datos">
                    </div>
                </form>
    </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
                <script>
                $(document).ready(function(){
                    $('#enviar').click(function(){
                           var datosActualiza=$('#formuactualiza').serialize();
                           console.log(datosActualiza);
                        $.ajax({
                            type:'POST',
                            url:'Crud.php',
                            data: datosActualiza,
                            success:function(respuesta){
                                console.log(respuesta);
                                if(respuesta==1){
                                    alert('datos actualizados');
                                    window.location.href='inicio.php';
                                    $(document).reload(true);
                                }else{
                                    alert('¡error!');
                                    $(document).reload(true);
                                }
                            }
                        });
                        return false;
                    });
                });     
               </script>
    </body>
</html>