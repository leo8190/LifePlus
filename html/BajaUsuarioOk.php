<?php 

if($_SESSION['id_rol'] == 1)
include("../html/LeftMenuAdmin.php");
else if ($_SESSION['id_rol'] == 3)
include("../html/LeftMenuSupervisor.php");
else
include("../html/LeftMenuBase.php");
 ?>
		<div id="principal">
			<h1>
				<a href="verusuarios.php">BAJA OK. VER LISTADO DE USUARIOS</a>
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