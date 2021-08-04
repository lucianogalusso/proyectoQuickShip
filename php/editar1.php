<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>QuickShip | Editar encomienda</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
</head>

<?php

$cedula = $_GET['cedula'];
	
	include("conexion.php");

	$sql = "SELECT * FROM usuarios WHERE cedula LIKE '%$cedula%'";
	$resultado = $conexion->query($sql);

	$numfilas = mysqli_num_rows($resultado);
	
	if ($numfilas==0){
		echo "<script>alert(\"No se han encontrado datos, debe ingresar algun dato valido.\");</script>";
		header('location:encomiendacliente1.php');
	}


?>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2><a href="logout.php"><img src="../images/demo/qs1.png" alt=""></a></h2>
				<h3>Encomiendas</h3>
				<p><?php 
						session_start(); 
						echo $_SESSION['usuario']." : ".$_SESSION['perfil'] 
					?>
				</p>
				<a href="usuencomiendas.php"><img src="../images/demo/atras.png" width="40" height="40"></a></h2>
			</div>
					<div class="panel-body">

						<div class="panel-body">
							<form name="form" action="editar2.php" method="GET">
							
							<?php
								if($numfilas>0){
									while ($info = $resultado -> fetch_assoc()){
		
							?>
								<p>
									<label for="correo">Cedula: <br> <?php echo $info['cedula']?></label>
								</p>
								<p>
									<label for="nombre">Nombre:</label>
									<input type="text" name="nombre" placeholder="<?php echo $info['nombre']?>" autofocus="true" class="form-control" required="true"/>
								</p>
								<p>
									<label for="nombre">Email:</label>
									<input type="text" name="email" placeholder="<?php echo $info['email']?>" autofocus="true" class="form-control" required="true"/>
								</p>
								<p>
								<label for="telefono">Tipo:</label>
									<input type="texto" name="tipo" placeholder="<?php echo $info['tipo']?>" class="form-control" required="true"/>
								</p>
								<hr />
								<input type="hidden" name="id" value="<?php echo $info['cedula']?>" />
								<input type="submit" class="btn btn-primary" value="Actualizar"/><br>
								
							<?php	
							}
							}else{
								echo "<script>alert(\"No se han encontrado datos, debe ingresar algun dato valido.\");</script>";

							}
		
							?>	
							</form>
						</div>
					</div>
		</div>
				<script src="js/jquery-1.10.2.js"></script>
				<script src="js/funciones.js"></script>
				<script src="js/modernizr-custom.js"></script>
					<!-- polyfiller file to detect and load polyfills -->
				<script src="js/polyfiller.js"></script>
				<script>
					  webshims.setOptions('waitReady', false);
					  webshims.setOptions('forms-ext', {types: 'date'});
					  webshims.polyfill('forms forms-ext');
				 </script>
			</body>
			</html>