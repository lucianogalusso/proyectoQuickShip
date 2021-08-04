<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>QuickShip | Usuarios y Encomiendas</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
</head>

<?php
session_start(); 

include("conexion.php");
include("alta_usuario.php");
include("login.php");

$usu = $_SESSION['cedula'];

$sqlEncomiendas = "SELECT * FROM encomiendas";
$listadoenco = $conexion->query($sqlEncomiendas);

$sqlUsuarios = "SELECT * FROM usuarios WHERE (tipo = 'admin2018' OR tipo = 'recep2018') AND cedula <> '".$usu."'";
$listadousu = $conexion->query($sqlUsuarios);

$sqlConsultas = "SELECT * FROM consultas WHERE estado = 'No leida'";
$numeroConsultas = $conexion->query($sqlConsultas);
$numfilasConsultas = mysqli_num_rows($numeroConsultas);
?>

<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2><a href="logout.php"><img src="../images/demo/qs1.png" alt=""></a></h2>	
				<h3>Encomiendas y Usuarios</h3>
				<p><?php 
						echo $_SESSION['usuario']." : ".$_SESSION['perfil'] 
					?>
				</p>
			</div>
			<div class="panel-body">
				<p>
					<a href="agregarpag.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar encomienda</a>
					&nbsp;&nbsp;&nbsp;
					<a href="consultas.php" class="btn btn-primary">Consultas (<?php echo $numfilasConsultas?> sin leer)</a>
				</p>
				
				
				<table class="table table-bordered">	
				
						<thead>	
							<tr class="info">
								<th>Numero de encomienda</th>
								<th>Fecha y hora</th>
								<th>Ciudad origen</th>
								<th>Ciudad destino</th>
								<th>Nombre despachante</th>
								<th>Nombre destinatario</th>
								<th>Estado</th>
								<th>Tipo</th>
								<th>Observaciones</th>
							</tr>
						</thead>
						
						<tbody>
							<?php while ($r=$listadoenco->fetch_array()):?>

							<tr>
								<td><?php echo $r['nro_encomienda']?></td>
								<td><?php echo $r['fecha']?></td>
								<td><?php echo $r['ciudad_origen']?></td>
								<td><?php echo $r['ciudad_destino']?></td>
								<td><?php echo $r['nombre_dest']?></td>
								<td><?php echo $r['nombre_desp']?></td>
								<td><?php echo $r['estado']?></td>
								<td><?php echo $r['tipo']?></td>
								<td><?php echo $r['observaciones']?></td>
								<td>
							 		<a href="despachar.php?nro_encomienda=<?php echo $r['nro_encomienda'] ?>">Despachar<br></a>

							 		<a href="borrar.php?nro_encomienda=<?php echo $r['nro_encomienda'] ?>">Dar de baja</a>
							 		
							 	</td>
								

							<?php endwhile; 
		
		
							$listadoenco->free();
							$conexion->close();
							?>
							</tr>
							
						</tbody>
				</table><br><br>
				
				<p>
					<a href="agregarusu.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar usuario</a>
				</p>
				<table class="table table-bordered">	
				
						<thead>	
							<tr class="info">
								<th>Cedula</th>
								<th>Nombre completo</th>
								<th>Email</th>
								<th>Clave de usuario</th>
							</tr>
						</thead>
						
						<tbody>
							<?php while ($r=$listadousu->fetch_array()):?>

							<tr>
								<td><?php echo $r['cedula']?></td>
								<td><?php echo $r['nombre']?></td>
								<td><?php echo $r['email']?></td>
								<td><?php echo $r['tipo']?></td>
								<td name="cedula">
									<a href="editar1.php?cedula=<?php echo $r['cedula'] ?>">Editar</a><br>
							 		<a href="borrarusu.php?cedula=<?php echo $r['cedula'] ?>">Borrar</a>
							 	</td>
								

							<?php endwhile; 
		
		
							$listadousu->free();
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