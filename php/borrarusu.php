<?php

require("conexion.php");
require("usuencomiendas.php");

$cedula = $_GET['cedula'];

include("conexion.php");

	$sql = "UPDATE usuarios SET tipo='Borrado' WHERE cedula='".$cedula."'";  
	$resultado = $conexion->query($sql);

	$numfilas = mysqli_num_rows($resultado);
	


	if ($resultado == NULL) {
				echo "<script>alert('No se pudo borrar usuario nro:".$nro_encomienda.".');window.location='usuencomiendas.php';</script>";
				exit;
			}else{
				echo "<script>alert('Usuario borrado con exito.');window.location='usuencomiendas.php';</script>";
				exit;
			}	
				
		
?>