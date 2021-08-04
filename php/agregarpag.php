<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>QuickShip | Agregar encomiendas</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
</head>
<?php
session_start(); 
include("conexion.php");

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
?>

<body>



	<div class="container">
		<h2><a href="../php/logout.php"><img src="../images/demo/qs1.png" alt=""></a></h2>
		<ol class="breadcrumb">
		  <li><a href="<?php echo $url ?>">Encomiendas</a></li>
		  <li class="active">Agregar Encomienda</li>
		</ol>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Agregar Encomienda</h3>
			</div>
			<div class="panel-body">
				<form name="form" action="../php/agregar.php" method="post">
					<p>
                        <label for="nombre">Nombre despachante (*):</label>
                        <input type="text" name="nombre_desp" placeholder="Nombre completo del despachante" autofocus="true" class="form-control" required="true" />
                    </p>
					<p>
                        <label for="nombre">Nombre destinatario (*):</label>
                        <input type="text" name="nombre_dest" placeholder="Nombre completo del destinatario" autofocus="true" class="form-control" required="true" />
                    </p>
					
                    <p>
                        <label for="correo">Ciudad origen (*):</label>
                        <input type="text" name="ciudad_origen" placeholder="Ciudad de origen de la encomienda" class="form-control" required="true" />
                    </p>
                    <p>
                    <label for="telefono">Ciudad destino (*):</label>
                        <input type="text" name="ciudad_destino" placeholder="Ciudad de destino de la encomienda" class="form-control" required="true" />
                    </p>
                    <p>
                        <label for="fecha">Fecha (*):</label>
                        <input type="datetime-local" name="fecha" class="form-control" />
                    </p>
					<p>
                        <label for="nombre">Tipo (*):  </label><br>
						<input type="radio" name="tipo" value="sobre" checked>Sobre<br>
						<input type="radio" name="tipo" value="paquete">Paquete<br>
						<input type="radio" name="tipo" value="giro">Giro<br>   
						<input type="radio" name="tipo" value="otro">Otro<br>                   
						
					</p>
					<p>
                        <label >Observaciones:</label>
                        <input type="text" name="observaciones" placeholder="Observaciones a destacar" autofocus="true" class="form-control" />
                    </p>
                    <hr />
                    <input type="submit" value="Guardar" name="guardarencomienda" class="btn btn-primary"/>
				</form>
			</div>
			<p>...(*) Campo obligatorio... </p>
		</div>
	</div>
	
	<script src="../js/jquery-1.10.2.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/funciones.js"></script>
	<script src="../js/modernizr-custom.js"></script>
        <!-- polyfiller file to detect and load polyfills -->
    <script src="../js/polyfiller.js"></script>
	<script>
          webshims.setOptions('waitReady', false);
          webshims.setOptions('forms-ext', {types: 'date'});
          webshims.polyfill('forms forms-ext');
    </script>
</body>
</html>