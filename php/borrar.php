<?php

require("conexion.php");
require("usuencomiendas.php");

$nro_encomienda = $_GET['nro_encomienda'];

include("conexion.php");

	$sql = "UPDATE encomiendas SET estado='Cancelada' WHERE nro_encomienda='".$nro_encomienda."'";  
	$resultado = $conexion->query($sql);

	$numfilas = mysqli_num_rows($resultado);
	


	if ($resultado == NULL) {
				echo "<script>alert('No se pudo cancelar la encomienda nro:".$nro_encomienda.".');window.location='usuencomiendas.php';</script>";
				exit;
			}else{
				echo "<script>alert('Encomienda cancelada con exito.');window.location='usuencomiendas.php';</script>";
				exit;
			}	
				
		
?>