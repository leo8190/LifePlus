<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
 	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
 	<script type="text/javascript" src="../DataTables/datatables.js"></script>
	<script type="text/javascript" src="../js/es-us.js"></script>
	<script type="text/javascript" src="../js/tempusdominus-bootstrap-4.min.js"></script>
	<script>
		$(document).ready( function () {
    			$('#table_id').DataTable();
		} );
	</script>
	<link rel="stylesheet" type="text/css" href="../css/stylehome.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="../DataTables/datatables.css"/>
	<title> Home </title>
</head>
<body>
	<div id="pagina">
<nav>
			<img src="../img/logo.png" class="logo">
	    	<div id="headernav" >
	   			<img style="width: 50px; height: 50px; position: center;" src="../img/login.png">
	   			<br>
	   			<div id="usuario"><?= $_SESSION['nombre_legajo'] . " " . $_SESSION['apellido_legajo']?></div> 
	   			<br>
	   			<div id="tipo_usuario"><?= $_SESSION['nombre_rol']  ?></div> 
	   		</div>
	   		<div id="cuerponav">
		   		<ul>		
					
					<a href="../controllers/verprospectos.php">
					<li>
						<div class="barra"></div>
						<p class="menu" >Home / Mis prospectos</p>
					</li>
					</a>
					

					<a href="../controllers/crearprospecto.php">
					<li>
						<div class="barra"></div>
						<p class="menu">Agregar prospecto</p>
					</li>
					<a/>

					<a href="../controllers/logout.php">
					<li>
						<div class="barra"></div>
						<p class="menu">Logout</p>
					</li>
					</a>

		   		</ul>
	   		</div>
		</nav>