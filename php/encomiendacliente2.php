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
 
 
	$nro_encomienda = $_GET['nro_encomienda'];
	
	include("conexion.php");

	$sql = "SELECT * FROM encomiendas WHERE nro_encomienda LIKE '%$nro_encomienda%'";
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
				<h3>Encomiendas relizadas</h3>
				<p><?php 
						session_start(); 
						echo $_SESSION['usuario']." : ".$_SESSION['perfil'] 
					?>
				</p>
				<p> <?php echo "<br>Cantidad de encomiendas encontradas: ".$numfilas."<br>"; ?></p>
				<a href="encomiendacliente1.php"><img src="../images/demo/atras.png" width="40" height="40"></a></h2>
			</div>
			<div class="panel-body">
				
				
				
				<table class="table table-bordered">	
				
						<thead>	
							<tr class="info">
								<th>Numero de encomienda</th>
								<th>Ciudad origen</th>
								<th>Ciudad destino</th>
								<th>Nombre despachante</th>
								<th>Nombre destinatario</th>
								<th>Estado</th>
							</tr>
						</thead>
						
						<tbody>

						
						<?php
						if($numfilas>0){
							while ($info = $resultado -> fetch_assoc()){
		
						?>

							<tr>
								<td><?php echo $info['nro_encomienda']?></td>
								<td><?php echo $info['ciudad_origen']?></td>
								<td><?php echo $info['ciudad_destino']?></td>
								<td><?php echo $info['nombre_dest']?></td>
								<td><?php echo $info['nombre_desp']?></td>
								<td><?php echo $info['estado']?></td>
							</tr>
							
						<?php	
						}
						}else{
							echo "<script>alert(\"No se han encontrado datos, debe ingresar algun dato valido.\");</script>";

						}
		
						?>	
							
							
						</tbody>
				</table>
				
				
			</div>
		</div>
		
	</div>
		<script src="../js/jquery-1.10.2.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/funciones.js"></script>
		
</body>
</html>