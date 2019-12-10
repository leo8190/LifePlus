<?php 

	if($_SESSION['id_rol'] != 1)
		include("../html/LeftMenuBase.php");
	else
		include("../html/LeftMenuAdmin.php");
 ?>
 		<?php $ls=$this->localidades ?>
		<div id="tabla" >
			<table cellpadding="0" cellspacing="0">
				<thead id="cabecera_tabla">
					<tr>
						<th>Localidad</th>
						<th>Agencia</th>
						<th></th>
					</tr>	
			</thead>
			<tbody>	
				<form onsubmit="return confirm('¿Esta seguro de la modificación?');" action="../controllers/verlocalidades.php" method="POST">
					<tr>
						<?php foreach ($this->localidad as $key) { ?>
							<td><?= $key['nom_loc'] ?></td>
						<?php } ?>
						<td>
							<select id="agencia" name="id_ag" style="width: 100px;" required>
								<?php foreach ($this->localidad as $key) { ?>
									<option value="<?=$key['id_ag']?>"><?= $key['nom_ag']?></option>
								<?php } ?>	

								<?php foreach ($this->agencias as $key) { ?>
				 					<option value="<?=$key['id_agencia']?>"><?=$key['nombre']?></option>
				 				<?php } ?>

			 				</select>
						</td>
						<td>
							<div class="div_in">
						<?php foreach ($this->localidad as $key) { ?>
							<input type="hidden" id="id_loc" name="id_loc" value="<?=$key['id_loc']?>">
						<?php } ?>
							<input type="submit" class="boton" value="Confirmar" name="ok"  id="ok" />
							</div>
						</td>
					</tr>
				</form>
			</tbody>
			</table>
		</div>
	</div>
</body>