<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8"> 	

  <link rel="stylesheet" type="text/css" href="../css/stylehome.css">
  <link rel="stylesheet" type="text/css" href="../DataTables/datatables.css"/>

  <script type="text/javascript" src="../jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
  <script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="../DataTables/datatables.js"></script>
  <script type="text/javascript" src="../js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="../js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="../js/jszip.min.js"></script>
  <script type="text/javascript" src="../js/pdfmake.min.js"></script>
  <script type="text/javascript" src="../js/vfs_fonts.js"></script>
  <script type="text/javascript" src="../js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="../js/buttons.print.min.js"></script>

	<script>
		$(document).ready( function () {
				$('#table_id').DataTable({
					dom: 'Bfrtip',
					buttons: [ 'copy', 'csv', 'excel', 'pdf', 'print' ]
				});
		} );
	</script>	
 	
	<title> Mis Prospectos </title>
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

					<a href="../controllers/veragencias.php">
					<li>
						<div class="barra"></div>
						<p class="menu" >Agencias</p>
					</li>
					</a>

					<a href="../controllers/verlocalidades.php">
					<li>
						<div class="barra"></div>
						<p class="menu">Localidades</p>
					</li>
					</a>

					<!-- <a href="../controllers/crearagencia.php">
					<li>
						<div class="barra"></div>
						<p class="menu" >Agregar agencia</p>
					</li>
					</a> -->

					<a href="../controllers/verusuarios.php">
					<li>
						<div class="barra"></div>
						<p class="menu" > Lista de usuarios </p>
					</li>
					</a>

					<a href="../controllers/crearusuario.php">
					<li>
						<div class="barra"></div>
						<p class="menu">Agregar usuario</p>
					</li>

					<a href="../controllers/logout.php">
					<li>
						<div class="barra"></div>
						<p class="menu">Logout</p>
					</li>
					</a>

					

					
		   		</ul>
	   		</div>
		</nav>