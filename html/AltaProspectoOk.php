<?php 

	if($_SESSION['id_rol'] != 1)
		include("../html/LeftMenuBase.php");
	else
		include("../html/LeftMenuAdmin.php");
 ?>
		<div id="principal">
			<h1>
				<a href="verprospectos.php">ALTA OK. VER LISTADO DE PROSPECTOS</a>
			</h1>
		</div>
	</div>
</body>
</html>

<style type="text/css">
	#principal{
		margin-left: 600px;
		margin-top: 200px;
	}
</style>

	
