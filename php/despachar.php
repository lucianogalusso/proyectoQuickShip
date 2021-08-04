<?php
session_start(); 
require("conexion.php");

$tipoAdmin = "SELECT * FROM usuarios WHERE cedula ='".$_SESSION['cedula']."' AND tipo = 'admin2018'";
$resultadoAdmin = $conexion->query($tipoAdmin);
$numfilasAdmin = mysqli_num_rows($resultadoAdmin);

$tipoRecep = "SELECT * FROM usuarios WHERE cedula ='".$_SESSION['cedula']."' AND tipo = 'recep2018'";
$resultadoRecep = $conexion->query($tipoRecep);
$numfilasRecep = mysqli_num_rows($resultadoRecep);

if($numfilasAdmin>0){	
	
		$url = "usuencomiendas.php";
		
}

if($numfilasRecep>0){	
	
		$url = "encomiendas.php";
		
}

require("encomiendas.php");

$nro_encomienda = $_GET['nro_encomienda'];

include("conexion.php");

	$sql = "UPDATE encomiendas SET estado='Despachada' WHERE nro_encomienda='".$_GET["nro_encomienda"]."'";  
	$resultado = $conexion->query($sql);

	
			if ($resultado == NULL) {
				echo "<script>alert('No se pudo despachar.');window.location='".$url."';</script>";
				exit;
			}else{
				echo "<script>alert('Despacho realizado con exito.');window.location='".$url."';</script>";
				exit;
			}	
				
		
?>