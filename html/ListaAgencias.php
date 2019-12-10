<?php 

	if($_SESSION['id_rol'] != 1)
		include("../html/LeftMenuBase.php");
	else
		include("../html/LeftMenuAdmin.php");
 ?>
		

		<div id="tabla" >
			<h1>Agencias</h1>

			<table cellpadding="0" cellspacing="0">
				<thead id="cabecera_tabla">
					<th>Numero de Agencia</th>
					<th>Nombre de Agencia</th>
					<th></th>
					
				</thead>
				<tbody>
					<?php foreach($this->agencias as $p){ ?>
					<tr>
						<td> <a href=<?="../controllers/veragencia.php?num_agen=".$p['id_agencia']?>><?=$p['id_agencia']?></a></td>
						<td><?= $p['nombre'] ?></td>
						<td>
						<div class="div_in">
							<form onsubmit="return confirm('¿Seguro que desea dar de baja esta agencia?');" action="../controllers/bajaagencia.php" method="POST">
							<input type="hidden" name="id_agencia" value="<?= $p['id_agencia']?>">
							<input type="submit" class="boton" value="Dar de baja" name="ok" />
							</form>
						</div>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<form method="GET" action="../controllers/crearagencia.php"">
				<input style="cursor:pointer" class="boton" type="submit" name="agregar_agencia" value="Agregar agencia+">
			</form>

			

		</div>

	</div>
	
</body>
</html>
