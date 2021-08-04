<?php

require("conexion.php");
require("consultas.php");

$nro_consulta = $_GET['nro_consulta'];

include("conexion.php");

	$sql = "UPDATE consultas SET estado='Leida' WHERE nro_consulta='".$nro_consulta."'";  
	$resultado = $conexion->query($sql);

	$numfilas = mysqli_num_rows($resultado);
	


	if ($resultado == NULL) {
				echo "<script>alert('No se pudo marcar como leida la consulta nro:".$nro_consulta.".');window.location='consultas.php';</script>";
				exit;
			}else{
				echo "<script>alert('Consulta marcada con exito.');window.location='consultas.php';</script>";
				exit;
			}	
				
		
?>