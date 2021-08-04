<?php

session_start();

	if (empty($_SESSION['usuario']) && $_SESSION['loggedin'] != true){
		header('location:../index.html');
		echo "Esta pagina es solo para usuarios registrados.<br> Fallo al ingresar usuario.";
	}
	


?>