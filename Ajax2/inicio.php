<!DOCTYPE html>
<html lang="en">
<head>
    <link href="estilos.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pruebas de ajax2</title>
    
</head>
<body>
    <div class="container-sm">
        <div class="container-sm">
                <h2>Inserta tus datos</h2>
                <form id="formu" class="row-12" name="insertar" action="insertar.php" method="POST">
                    <div class="col-12">
                        <input class="form-control" type="text" id="cedula" name="cedula" placeholder="Ingrese Su Numero De Cedula">
                    </div>
                    <div class="col-12">
                        <input class="form-control"type="text" id="nombre" name="nombre" placeholder="Ingrese Su Nombre">
                    </div>
                    <div class="col-12">
                        <input class="form-control"type="text" id="direccion" name="direccion" placeholder="Ingrese Su Direccion">
                    </div>   
                    <div class="col-12"> 
                        <input class="form-control"type="text" id="telefono" name="telefono" placeholder="Ingrese Su Numero De telefono">
                    </div>    
                <input  type="hidden" name="TipoConsulta" value="Insertar" >
                    <div class="col-12">
                        <input id="enviar" class="btn btn-primary d-block mx-auto" type="submit" value="Enviar datos">
                    </div>
                  
                </form>
                </div>
                <div class="alert  alert-info col-7" role="alert" id="AlertInserta">
                  ¡Dato insertado correctamente¡
                </div>
                <div class="alert alert-dismissible alert-danger col-7 visually-hidden-focusable" role="alert" id="AlertErrores">
                  ¡Oops algo salio mal¡
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
               
               <div  id="tablalista">

               </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

</body>
               <script>
                $(document).ready(function(){
                    let AlertInserta = document.getElementById('AlertInserta');
                    let AlertErrores = document.getElementById('AlertErrores');
                    $('#AlertInserta').hide();
                        
                });
               </script>
               <script>
                $(document).ready(function(){
                    $('#enviar').click(function(){
                           let datosformulario=$('#formu').serialize();
                           console.log(datosformulario);
                        $.ajax({
                            type:'POST',
                            url:'Crud.php',
                            data: datosformulario,
                            success:function(respuesta){
                                console.log(respuesta);
                                if(respuesta == 1){
                                    alert('datos almacenados');
                                    let AlertInserta = document.getElementById('AlertInserta');
                                        $('#AlertInserta').show();
                                        Cargar();                                        
                                        
                                }else{
                                    alert('¡error!');
                                    let AlertErrores = document.getElementById('AlertErrores');
                                        AlertErrores.classList.remove('visually-hidden-focusable');
                                }
                            }
                        });
                        return false;
                    });
                }); 
                
               </script>       
               <script>
               
               $(document).ready(function Cargar(){
                    $('#tablalista').load('Listar.php');  
                    
                   });
           </script>        
</html>