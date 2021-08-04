<?php

if(isset($_POST['login'])){
	
	$usu = $_POST['usuario'];
	$psw = MD5($_POST['contrasena']); // Encriptamos el valor ingresado para poder compararlo con la encropción guardada
	
	if($usu!="" && $psw!=""){	
	
		require("conexion.php");
		
		$ingresocliente = "SELECT * FROM usuarios WHERE cedula = '$usu' AND contrasena ='$psw' AND tipo =''";
		$ingresoadmin = "SELECT * FROM usuarios WHERE cedula = '$usu' AND contrasena ='$psw' AND tipo ='admin2018'";
		$ingresorecep = "SELECT * FROM usuarios WHERE cedula = '$usu' AND contrasena ='$psw' AND tipo ='recep2018'";
		
		$numfilascliente = mysqli_num_rows($conexion->query($ingresocliente));
		$numfilasadmin = mysqli_num_rows($conexion->query($ingresoadmin));
		$numfilasrecep = mysqli_num_rows($conexion->query($ingresorecep));
		
		$sqlperfil = "SELECT cedula, tipo, nombre FROM usuarios WHERE cedula = '$usu'";			
		$resultado = $conexion->query($sqlperfil);
		$info = $resultado -> fetch_assoc(); 	
			
		if($numfilasadmin>0){
			echo "<script>alert('Bienvenido de vuelta administrador.');window.location='../php/usuencomiendas.php';</script>";	
			session_start();
			$_SESSION['usuario'] = $info['nombre'];
			$_SESSION['cedula'] = $usu;
			$_SESSION['perfil'] = "Administrador";	
			$_SESSION['loggedin'] = true;

			
		}elseif($numfilasrecep>0){
			echo "<script>alert('Bienvenido de vuelta recepcionista.');window.location='../php/encomiendas.php';</script>";
			session_start();
			$_SESSION['usuario'] = $info['nombre'];
			$_SESSION['cedula'] = $usu;
			$_SESSION['perfil'] = "Recepcionista";
			$_SESSION['loggedin'] = true;

			
		}elseif($numfilascliente>0){
			echo "<script>alert('Bienvenido de vuelta estimado cliente.');window.location='../php/encomiendacliente1.php';</script>";
			session_start();
			$_SESSION['usuario'] = $info['nombre'];
			$_SESSION['perfil'] = "Cliente";
			$_SESSION['loggedin'] = true;

		}else{
			print "<script>alert(\"Usuario y/o contraseña incorrectos.\");window.location='../index.html';</script>";
			exit;	
		}
		
		
	}
}

?>