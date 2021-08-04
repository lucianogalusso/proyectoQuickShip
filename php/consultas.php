<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>QuickShip | Consultas</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
</head>

<?php
session_start(); 
include("conexion.php");

$sql = "SELECT * FROM consultas";
$listado = $conexion->query($sql);

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
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2><a href="logout.php"><img src="../images/demo/qs1.png" alt=""></a></h2>
				<h3>Consultas</h3>
				<p><?php 
						
						echo $_SESSION['usuario']." : ".$_SESSION['perfil'] 
					?>
				</p>
				<a href="<?php echo $url ?>"><img src="../images/demo/atras.png" width="40" height="40"></a></h2>
			</div>
			<div class="panel-body">
				
				
				<table class="table table-bordered">	
				
						<thead>	
							<tr class="info">
								<th>Numero de consulta</th>
								<th>Nombre</th>
								<th>Telefono</th>
								<th>Email</th>
								<th>Asunto</th>
								<th>Consulta</th>
								<th>Estado</th>
							</tr>
						</thead>
						
						<tbody>
							<?php while ($r=$listado->fetch_array()):?>

							<tr>
								<td><?php echo $r['nro_consulta']?></td>
								<td><?php echo $r['nombre']?></td>
								<td><?php echo $r['telefono']?></td>
								<td><?php echo $r['email']?></td>
								<td><?php echo $r['asunto']?></td>
								<td><?php echo $r['consulta']?></td>
								<td><?php echo $r['estado']?></td>
								<td name="nro_encomienda">
							 		<a href="leido.php?nro_consulta=<?php echo $r['nro_consulta'] ?>">Marcar como leida</a>
							 	</td>
								

							<?php endwhile; 
		
		
							$listado->free();
							$conexion->close();
							?>
							</tr>
							
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