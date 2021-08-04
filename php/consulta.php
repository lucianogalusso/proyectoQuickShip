<?php

	if (isset($_POST['consultaboton']) or isset($_POST['comentario'])){
		
		$nombreconsulta = $_POST['nombreconsulta'];
		$telefonoconsulta = $_POST['telefonoconsulta'];
		$emailconsulta = $_POST['emailconsulta'];
		$asuntoconsulta = $_POST['asuntoconsulta'];
		$consulta = $_POST['consulta'];
		
			if($consulta!="" && $emailconsulta!="" && $nombreconsulta!=""){	
	
				require("conexion.php");		
				
				$link = mysqli_connect('localhost', 'root', '', 'bd_proyecto');
				mysqli_select_db($link, "bd_proyecto");
				mysqli_query($link, "INSERT INTO consultas(nombre,telefono,email,asunto,consulta,estado) VALUES ('$nombreconsulta','$telefonoconsulta','$emailconsulta','$asuntoconsulta','$consulta','No leida')");
				mysqli_close($link); 
				print "<script>alert(\"Consulta enviada con exito.\");window.location='../index.html';</script>";
				
			}else{
			print "<script>alert(\"Debe rellenar los campos obligatorios para enviar la consulta.\");window.location='../index.html';</script>";
			exit;
		}

	}
	
?>
