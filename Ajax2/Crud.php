<?php
include 'Conexion.php';
	$tipoconsulta=$_REQUEST['TipoConsulta'];
	$cedula=$_REQUEST['cedula'];
switch($tipoconsulta){
    case 'Insertar':
		$nombre=$_REQUEST['nombre']; 
		$direccion=$_REQUEST['direccion']; 
		$telefono=$_REQUEST['telefono'];
        $inserta="INSERT INTO datos (cedula, nombre, direccion, telefono)
        	VALUES ('$cedula', '$nombre', '$direccion', '$telefono')"; 
        	$SQL = mysqli_query($mysqli,$inserta);
        	echo $SQL; 
        	break;
	case 'Actualizar':
		$nombre=$_REQUEST['nombre']; 
		$direccion=$_REQUEST['direccion']; 
		$telefono=$_REQUEST['telefono'];
	        $actualiza="UPDATE datos SET nombre='$nombre', direccion='$direccion', 
	        telefono='$telefono' WHERE cedula='$cedula'"; 
	        $SQL2 = mysqli_query($mysqli,$actualiza);
	        echo $SQL2;   
	        break;
	case 'Eliminar':
	        $elimina="DELETE FROM datos WHERE cedula='$cedula'";
	        $SQL3 = mysqli_query($mysqli,$elimina);
	        echo $SQL3;
	        break;
	}
?>