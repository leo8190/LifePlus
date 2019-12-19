<?php 
if($_SESSION['id_rol'] == 1)
include("../html/LeftMenuAdmin.php");
else if ($_SESSION['id_rol'] == 3)
include("../html/LeftMenuSupervisor.php");
else
include("../html/LeftMenuBase.php");
 ?>
		

		<div id="tabla" >
			<h1>Localidades</h1>
			<table>
				<thead id="cabecera_tabla">
					<th>Localidad</th>
					<th>Provincia</th>
					<th>Nombre de agencia asignada</th>
				</thead>
				<tbody>
					<?php foreach($this->localidades as $l){ ?>
						<tr onclick="irALocalidad(<?=$l['id_loc']?>)">
						<td> <a href=<?="../controllers/verlocalidad.php?id_loc=".$l['id_loc']?>><?=$l['nom_loc']?></a></td>
						<td><?= $l['nom_prov'] ?></td>
						<td><?= $l['nom_ag'] ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>

			

		</div>

	</div>
	
</body>
</html>


<script text="javascript">

function irALocalidad(id_localidad){
	//alert(num_prospecto);
	window.location.href = "../controllers/verlocalidad.php?id_loc=" + id_localidad 
}
</script>
