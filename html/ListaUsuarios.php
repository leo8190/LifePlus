<?php 

	if($_SESSION['id_rol'] != 1)
		include("../html/LeftMenuBase.php");
	else
		include("../html/LeftMenuAdmin.php");
 ?>
		<div id="tabla" >
			<h1>Usuarios</h1>
			<table id="table_id" class="display" cellpadding="0" cellspacing="0">
				<thead id="cabecera_tabla">
					<th>Usuario n°</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Nombre de usuario</th>
					<th>Agencia</th>
					<th>Rol</th>
					<th>Estado</th>
				</thead>
				<tbody>
					<?php foreach($this->usuarios as $u){ ?>
					<tr>
					<td> <a href=<?="../controllers/editarusuario.php?id_usu=".$u['id_usuario']?>><?=$u['id_usuario']?></a></td>
					<td><?= $u['nombre'] ?></td>
					<td><?= $u['apellido'] ?></td>
					<td><?= $u['nombre_usuario'] ?></td>
					<td><?= $u['agencia'] ?></td>
					<td><?= $u['rol'] ?></td>
					<td><?= $u['estado'] ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>