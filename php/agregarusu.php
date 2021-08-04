<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>QuickShip | Agregar usuario</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
</head>

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

if(isset($_POST['guardarusuario'])){
	
	$cedula = $_POST['cedula'];
	$nombre = $_POST['nombre'];
	$contrasena = MD5($_POST['contrasena']);
	$email = $_POST['email'];
	$codigo = $_POST['codigo'];
	
	if($cedula!="" && $nombre!="" && $contrasena!="" && $email!=""){	
	
		require("conexion.php");
		
		$sqlAltaUsuario = "INSERT INTO usuarios(cedula,nombre,contrasena,email,tipo) VALUES('$cedula','$nombre','$contrasena','$email','$codigo')";
		$query = $conexion->query($sqlAltaUsuario);
				
		if ($query == NULL) {
			echo "<script>alert('No se pudo realizar el alta de usuario.');window.location='".$url."';</script>";
			exit;
		}else{
			echo "<script>alert('Usuario agregado con exito.');window.location='".$url."';</script>";	

			exit;
		}	
		
	}else{
		echo "<script>alert('Debe rellenar los campos obligatorios.');window.location='".$url."';</script>";
	}
}

?>


<body>



	<div class="container">
		<h2><a href="../php/logout.php"><img src="../images/demo/qs1.png" alt=""></a></h2>
		<ol class="breadcrumb">
		  <li><a href="<?php echo $url ?>">Encomiendas y Usuarios</a></li>
		  <li class="active">Agregar Usuario</li>
		</ol>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Agregar Usuario</h3>
			</div>
			<div class="panel-body">
				<form name="form" action="<?php $_SERVER['PHP_SELF']?>" method="post">
					<p>
                        <label for="nombre">Cedula (*):</label>
                        <input type="number" name="cedula"  autofocus="true" class="form-control" required="true" />
                    </p>
					<p>
                        <label for="nombre">Nombre (*):</label>
                        <input type="text" name="nombre"  autofocus="true" class="form-control" required="true" />
                    </p>
					
                    <p>
                        <label for="correo">Contrasena (*):</label>
                        <input type="text" name="contrasena"  class="form-control" required="true" />
                    </p>
                    <p>
						<label for="telefono">Email (*):</label>
                        <input type="text" name="email"  class="form-control" required="true" />
                    </p>
                    <p>
                        <label for="fecha">Codigo (*):</label>
                        <input type="text" name="codigo" class="form-control" required="true" />
                    </p>
                    <hr />
                    <input type="submit" value="Guardar" name="guardarusuario" class="btn btn-primary"/>
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