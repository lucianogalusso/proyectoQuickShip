<?php

if(isset($_POST['enviardatos'])){
	
	$usu = $_POST['usuario'];
	$psw = MD5($_POST['contrasena']); 
	$nom = $_POST['nombre']; 	
	$cod = $_POST['codigo']; 	
	$email = $_POST['email']; 
	
	if($usu!="" && $psw!="" && $nom!="" ){
		
		require("conexion.php");
		
		$sqlAlta = "INSERT INTO usuarios(cedula,contrasena,nombre,tipo,email) VALUE('$usu','$psw','$nom','$cod','$email')";
		
		$query = $conexion->query($sqlAlta);
		
		$sqlperfil = "SELECT cedula, tipo, nombre FROM usuarios WHERE cedula = '$usu'";			
		$resultado = $conexion->query($sqlperfil);
		$info = $resultado -> fetch_assoc(); 
				
		
		if ($query == NULL) {
			echo "<script>alert('No se pudo realizar el alta de registro.');window.location='../index.html';</script>";
			exit;
		}else{
			$codadmin = "SELECT * FROM usuarios WHERE cedula = '$usu' AND contrasena ='$psw' AND tipo = 'admin2018'";
			$codrecep = "SELECT * FROM usuarios WHERE cedula = '$usu' AND contrasena ='$psw' AND tipo = 'recep2018'";	
			$numfilascodadmin = mysqli_num_rows($conexion->query($codadmin));
			$numfilascodrecep = mysqli_num_rows($conexion->query($codrecep));
			
			if($numfilascodadmin>0){
			echo "<script>alert('Registrado nuevo administrador con exito.');window.location='../php/usuencomiendas.php';</script>";
			session_start();
			$_SESSION['usuario'] = $info['nombre'];
			$_SESSION['cedula'] = $usu;
			$_SESSION['perfil'] = "Administrador";
			$_SESSION['loggedin'] = true;
			
			}elseif($numfilascodrecep>0){
			echo "<script>alert('Registrado nuevo recepcionista con exito.');window.location='../php/encomiendas.php';</script>";
			session_start();
			$_SESSION['usuario'] = $info['nombre'];
			$_SESSION['perfil'] = "Recepcionista";
			$_SESSION['cedula'] = $usu;
			$_SESSION['loggedin'] = true;

			}else{
			echo "<script>alert('Registrado nuevo cliente con exito.');window.location='../php/encomiendacliente1.php';</script>";
			session_start();
			$_SESSION['usuario'] = $info['nombre'];
			$_SESSION['perfil'] = "Cliente";
			$_SESSION['loggedin'] = true;

			}
			exit;
		}	
		
	}else{
		$msgA = "<span style='color:red;'>Error: No pueden quedar campos vacíos.</span>";
		header("location:../index.php");
	}
	$conexion->close();
}
?>