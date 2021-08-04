<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>QuickShip | Encomiendas realizadas</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
</head>

<?php

if(isset($_POST['ingresarnro'])){
	
	$nro_encomienda = $_POST['nro_encomienda'];
	
	header("location:encomiendacliente2.php?nro_encomienda=".$nro_encomienda);
	
}	
?>

<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2><a href="logout.php"><img src="../images/demo/qs1.png" alt=""></a></h2>
				<h3>Encomiendas realizadas</h3>
				<br>
				<p><?php 
						session_start(); 
						echo $_SESSION['usuario']." : ".$_SESSION['perfil'] 
					?>
				</p><br>
				<p>(En caso de ingresar un numero de encomienda incorrecto se reseteara la pagina hasta introducir uno valido)</p>
			</div>
			<div class="panel-body">
				
				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
          
					<div class="field-wrap">
						<label>
							Ingrese su numero de encomienda  <span class="req">*: </span>
						</label>
						<input id="lol" type="number" name="nro_encomienda" required autocomplete="off"/>
					</div><br>
				  
				  <button type="submit" name="ingresarnro"  class="button button-block"/>Buscar encomienda</button>

				</form><br>
				
				
			</div>
		</div>
		
	</div>
		<script src="../js/jquery-1.10.2.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/funciones.js"></script>
		
</body>
</html>