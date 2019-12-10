<?php 

	if($_SESSION['id_rol'] != 1)
		include("../html/LeftMenuBase.php");
	else
		include("../html/LeftMenuAdmin.php");
 ?>
		

		<div id="tabla" >
			<h1>Localidades</h1>

			<table cellpadding="0" cellspacing="0">
				<thead id="cabecera_tabla">
					<th>Localidad</th>
					<th>Provincia</th>
					<th>Nombre de agencia asignada</th>
				</thead>
				<tbody>
					<?php foreach($this->localidades as $l){ ?>
					<tr>
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
