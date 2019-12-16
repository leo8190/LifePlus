<?php 

	if($_SESSION['id_rol'] == 1)
		include("../html/LeftMenuAdmin.php");
	else if ($_SESSION['id_rol'] == 3)
		include("../html/LeftMenuSupervisor.php");
	else
		include("../html/LeftMenuBase.php");
 ?>
		
		<div id="tabla" >
			<h1>Mis prospectos</h1>
			<div id="exportar_grilla">Exportar grilla de prospectos: </div>
			<table id="table_id" class="display" cellpadding="0" cellspacing="0">
				<thead id="cabecera_tabla">
					<th>Nro. de Prospecto</th>
					<th>Nombre Cliente</th>
					<th>Estado</th>
					<th>Fecha de alta</th>
				</thead>
				<tbody>
					<?php foreach($this->prospectos as $p){ ?>
					<tr>
					<td> <a href=<?="../controllers/verprospecto.php?num_prosp=".$p['id_prospectos']?>><?=$p['id_prospectos']?></a></td>
					<td><?= $p['nombre'] ?> <?= $p['apellido'] ?></td>
					<td><?= $p['estado'] ?></td>
					<td><?= $p['fecha_alta'] ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>