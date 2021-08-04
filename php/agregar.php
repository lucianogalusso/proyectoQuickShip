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

if(isset($_POST['guardarencomienda'])){
	
	$nombre_desp = $_POST['nombre_desp'];
	$nombre_dest = $_POST['nombre_dest'];
	$ciudad_origen = $_POST['ciudad_origen'];
	$ciudad_destino = $_POST['ciudad_destino'];
	$fecha = $_POST['fecha'];
	$tipo = $_POST['tipo'];
	$observaciones = $_POST['observaciones']; 
	
	if($nombre_desp!="" && $nombre_dest!="" && $ciudad_origen!="" && $ciudad_destino!="" && $fecha!="" && $tipo!=""){	
	
		require("conexion.php");
		
		$nroencomiendas = "SELECT * FROM encomiendas";
		$numfilas = mysqli_num_rows($conexion->query($nroencomiendas));
	
		$sqlAltaEncomienda = "INSERT INTO encomiendas(fecha,nombre_desp,nombre_dest,ciudad_origen,ciudad_destino,tipo,observaciones,estado) VALUE('$fecha','$nombre_desp','$nombre_dest','$ciudad_origen','$ciudad_destino','$tipo','$observaciones','Pendiente')";
		$query = $conexion->query($sqlAltaEncomienda);
				
		if ($query == NULL) {
			echo "<script>alert('No se pudo realizar el alta de encomienda.');window.location='".$url."';</script>";
			exit;
		}else{
			echo "<script>alert('Encomienda agregada con exito. El precio total es de: $".rand(50, 10000)." y el numero de encomienda es: ".($numfilas+1).".');window.location='".$url."';</script>";	

			exit;
		}	
		
	}else{
		echo "<script>alert('Debe rellenar los campos obligatorios.');window.location='".$url."';</script>";
	}
}

?>