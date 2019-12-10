<?php 

	if($_SESSION['id_rol'] != 1)
		include("../html/LeftMenuBase.php");
	else
		include("../html/LeftMenuAdmin.php");
 ?>
		<div id="contenedor" >
			<h1> Prospecto n° <?= $this->pr['id_prospectos']. " - ".$this->pr['estado']?></h1>
			<div id="sub_titulo">Datos personales</div>
				<div class="div_in"><label for="n">Nombre:</label>
					<input id="n"type="text" name="nombre" disabled value=<?=$this->pr['nombre']?> ></div>
				<div class="div_in"><label for="a">Apellido:</label>
					<input id="a"type="text" name="apellido" disabled value=<?=$this->pr['apellido']?> ></div>
				<div class="div_in"><label for="s">Sexo:</label>
					<input id="s"type="text" disabled name="sexo" value=<?=$this->pr['sexo']?> ></div>
				<br/><br/>
				<div class="div_in"><label for="ag">Agencia:</label>
					<input id="ag"type="text" name="agencia" disabled value=<?=$this->pr['agencia']?> ></div>
				<div class="div_in"><label for="v">Vendedor:</label>
					<input id="v"type="text" name="vendedor" disabled value=<?=$this->pr['vendedor']?>></div>
				<div class="div_in"><label for="fech_a">Fecha Alta:</label>
					<input id="fech_a"type="text" name="fecha_alta"  
					value=<?=$this->pr['fecha_alta']?> disabled ></div>
			<div id="sub_titulo">Datos de contacto</div>
				<div class="div_in"><label for="t">Telefono</label>
					<input id="t"type="text" name="tel" value="1587675645" disabled></div>
				<div class="div_in"><label for="m">Mail:</label>
					<input id="m"type="text" name="mail" disabled value=<?=$this->pr['email']?>></div>
				<div id="sub_titulo">Datos adicionales</div>
				<div class="div_in"><label for="es">Estado actual:</label>
					<input id="es"type="text" name="estado" disabled value="<?=$this->pr['estado']?>"></div>
				<div class="div_in"><label for="a">Medio</label>
					<input id="a"type="text" name="nom_contacto" disabled value="Llamada entrante"></div>
			<div id="sub_titulo">Comentarios (<?= count($this->seg_pr)?>) </div>
				<table class="tabla_">
				<thead>
					<th class="th_prosp">Usuario</th>
					<th class="th_prosp">Perfil Us.</th>
					<th class="th_prosp">Observaciones</th>
					<th class="th_prosp">Fecha</th>
				</thead>
				<tbody>
					<?php foreach($this->seg_pr as $s){ ?>
					<tr>
					<td><?= $s['apellido'] . ", " . $s['nombre'] ?></td>
					<td><?= $s['nombre_rol'] ?></td>
					<td><?= $s['descripcion']?></td>
					<td><?= $s['fecha'] ?></td>
					</tr>
					<?php } ?>
				</tbody>
				</table>
			<div id="sub_titulo">Integrantes (<?= count($this->int_pr)?>)</div>
				<table class="tabla_">
				<thead>
					<th>Parentezco</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>N° doc</th>
					<th>Sexo</th>
					<th>Fecha nacimiento</th>
					<th>Modificar.</th>
					<th>Borrar</th>
				</thead>
				<tbody>
					<?php foreach($this->int_pr as $i){ ?>
					<tr>
					<td><?= $i['parentezco']?></td>
					<td><?= $i['nombre']?></td>
					<td><?= $i['apellido'] ?></td>
					<td><?= $i['dni']?></td>
					<td><?= $i['sexo'] ?></td>
					<td><?= $i['fech_nac'] ?></td>
					<td><input id="modif" type="image" name="modif" src="../img/pluma.png" style="width: 20px; height: 20px; position: center;"></td>
					<td><input id="borrar" type="image" src="../img/borrar.jpg" style="width: 20px; height: 20px; position: center;"></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<br>

				<div id="botones">
					
					
					<form method="POST" action="../controllers/cambiarestado.php">
					<div class="div_in"><input  type="submit" name="cambiar_estado" class="boton" value="CAMBIAR ESTADO" >
					</div>
					<input type="hidden" name="id_pr" 
					value="<?=$this->pr['id_prospectos']?>">
					<input  type="hidden" name="est_act" 
					value="<?=$this->pr['estado_actual']?>">
					<input  type="hidden" name="nom_est" 
					value="<?=$this->pr['estado']?>">
					</form>
					
					<form method="POST" action="../controllers/agregarseguimiento.php">
					<div class="div_in">
					<input type="submit" name="agregar_comentario" class="boton" value="AGRECAR COMENTARIOS" >
					<input type="hidden" name="id_pr" 
					value="<?=$this->pr['id_prospectos']?>">
					<input  type="hidden" name="nom_est" 
					value="<?=$this->pr['estado']?>">
					</div>
					</form>

					<form method="POST" action="../controllers/hola.php">
					<div class="div_in">
					<input type="submit" name="cambiar_estado" class="boton"
					value="AGREGAR INTEGRANTES" >
					</div>
					</form>

					<form method="POST" action="../controllers/vermovimientos.php">
					<div class="div_in">
					<input type="submit" name="ver_movimientos" class="boton" value="VER HISTORIAL DE ESTADOS" >
					</div>
					<input type="hidden" name="id_pr" 
					value="<?=$this->pr['id_prospectos']?>">
					<input  type="hidden" name="nom_est" 
					value="<?=$this->pr['estado']?>">
					</div>
					</form>
					
					
	
				</div>
		</div>
	</div>
</body>
</html>

<style>
	#botones{
		margin-top: 115px;
	}
	.boton{
		cursor: pointer;
	}
</style>