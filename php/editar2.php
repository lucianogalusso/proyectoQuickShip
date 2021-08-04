<?php

	$nombre = $_GET['nombre'];
	$cedula = $_GET['id'];
	$tipo = $_GET['tipo'];
	$email = $_GET['email'];
	
	if($nombre!="" && $cedula!="" && $tipo!=""){	
	
		require("conexion.php");
		
		$sqlEdicion="UPDATE usuarios SET nombre='".$nombre."', tipo='".$tipo."', email='".$email."' WHERE cedula='".$cedula."'";
		$query = $conexion->query($sqlEdicion);
				
		if ($query == NULL) {
			echo "<script>alert('No se pudo realizar la modificacion de usuario.');window.location='usuencomiendas.php';</script>";
			exit;
		}else{
			echo "<script>alert('Usuario modificado con exito.');window.location='usuencomiendas.php';</script>";	

			exit;
		}	
		
	}else{
		echo "<script>alert('Debe rellenar los campos obligatorios.');window.location='usuencomiendas.php';</script>";
	}

?>