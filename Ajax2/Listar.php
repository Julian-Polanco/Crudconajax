
<table class="table table-Light table-striped">
	               	<thead>
	            		<tr>
	            			<th> Numero De Documento </th>
	            			<th> Nombres </th>
	            			<th> Direccion </th>
                            <th> Telefono </th>
                            <th> Eliminar </th>
                            <th> Actualizar </th>
	            		</tr>
	            	</thead>
	                <tbody>
                    <?php
                include 'Conexion.php';
                $SQL="SELECT * FROM datos"; 
                $dato = $mysqli -> query($SQL) or die ($mysqli->connect_errno);
                while ($fila=$dato->fetch_assoc()){
                
        echo "<tr>";
            echo "<td>".$fila['cedula']."</td>";
            echo "<td>".$fila['nombre']."</td>";
            echo "<td>".$fila['direccion']."</td>";
            echo "<td>".$fila['telefono']."</td>";
            // echo "<td> <a id='elimina' class='text-danger' href=#?TipoConsulta=Eliminar&cedula=".$fila['cedula'].">Eliminar</a></td>";
            echo"<td><form id='formularioElimina' method='POST' action='Eliminar.php'>";
            echo"<input type='hidden' name='cedula' value='".$fila['cedula']."'>";
            echo"<input type='hidden' name='TipoConsulta' value='Eliminar'>";
            echo"<input id='BtnEliminar' type='submit' value='Eliminar' name='BtnEliminar'>";
            echo"</form></td>";
            echo "<td> <a href=actualizar.php?cedula=".$fila['cedula'].">Actualizar</a></td>";
        echo "</tr>";
        echo "</div>";
}
?>
<script>
               $(document).ready(function(){
                $('#BtnEliminar').click(function(e){
                    e.preventDefault();
                           var datosElimina=$('#formularioElimina').serialize();
                           console.log(datosElimina);
                            $.ajax({
                            type:'POST',
                            url:'Crud.php',
                            data: datosElimina,
                            success:function(elimina){
                                console.log(elimina);
                                if(elimina==1){
                                    alert('datos eliminados');
                                }else{
                                    alert('¡error!');
                                }
                            }
                            });
                    });    
                }); 
               </script>