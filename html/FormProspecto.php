<?php 

if($_SESSION['id_rol'] == 1)
include("../html/LeftMenuAdmin.php");
else if ($_SESSION['id_rol'] == 3)
include("../html/LeftMenuSupervisor.php");
else
include("../html/LeftMenuBase.php");

 ?>
		<div id="contenedor_" >
			<h1> Prospecto n° <?= $this->pr['id_prospectos']. " - ".$this->pr['estado']?></h1>
			<div id="sub_titulo">Datos personales</div>
				<div class="div_in"><label for="n">Nombre:</label>
					<input class="form-control form-control-sm" id="n"type="text" name="nombre" disabled value=<?=$this->pr['nombre']?> ></div>
				<div class="div_in"><label for="a">Apellido:</label>
					<input class="form-control form-control-sm"  id="a"type="text" name="apellido" disabled value=<?=$this->pr['apellido']?> ></div>
				<div class="div_in"><label for="s">Sexo:</label>
					<input class="form-control form-control-sm"  id="s"type="text" disabled name="sexo" value=<?=$this->pr['sexo']?> ></div>
				<!--<br/><br/>-->
				<div class="div_in"><label for="ag">Agencia:</label>
					<input class="form-control form-control-sm"  id="ag"type="text" name="agencia" disabled value=<?=$this->pr['agencia']?> ></div>
				<div class="div_in"><label for="v">Vendedor:</label>
					<input class="form-control form-control-sm"  id="v"type="text" name="vendedor" disabled value=<?=$this->pr['vendedor']?>></div>
				<div class="div_in"><label for="fech_a">Fecha Alta:</label>
					<input class="form-control form-control-sm"  id="fech_a"type="text" name="fecha_alta"  
					value=<?=$this->pr['fecha_alta']?> disabled ></div>
			<div id="sub_titulo">Datos de contacto</div>
				<div class="div_in"><label for="t">Telefono</label>
					<input class="form-control form-control-sm"  id="t"type="text" name="tel" value="1587675645" disabled></div>
				<div class="div_in"><label for="m">Mail:</label>
					<input class="form-control form-control-sm"  id="m"type="text" name="mail" disabled value=<?=$this->pr['email']?>></div>
				<div id="sub_titulo">Datos adicionales</div>
				<div class="div_in"><label for="es">Estado actual:</label>
					<input class="form-control form-control-sm"  id="es"type="text" name="estado" disabled value="<?=$this->pr['estado']?>"></div>
				<div class="div_in"><label for="a">Medio</label>
					<input class="form-control form-control-sm"  id="a"type="text" name="nom_contacto" disabled value="Llamada entrante"></div>
			<div id="sub_titulo">Comentarios (<?= count($this->seg_pr)?>) </div>
			<table class="tabla">
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
			<table class="tabla">
				<thead>
					<th class="th_prosp_" >Parentezco</th>
					<th class="th_prosp_">Nombre</th>
					<th class="th_prosp_">Apellido</th>
					<th class="th_prosp_">N° doc</th>
					<th class="th_prosp_">Sexo</th>
					<th class="th_prosp_">Fecha nacimiento</th>
					<!-- <th>Modificar.</th>
					<th>Borrar</th> -->
				</thead>
				<tbody>
					<?php foreach($this->int_pr as $i){ ?>
					<tr>
					<td><?= $i['tipo_nombre']?></td>
					<td><?= $i['nombre']?></td>
					<td><?= $i['apellido'] ?></td>
					<td><?= $i['dni']?></td>
					<td><?= $i['sexo'] ?></td>
					<td><?= $i['fech_nac'] ?></td>
					<!-- <td><input id="modif" type="image" name="modif" src="../img/pluma.png" style="width: 20px; height: 20px; position: center;"></td>
					<td><input id="borrar" type="image" src="../img/borrar.jpg" style="width: 20px; height: 20px; position: center;"></td> -->
					</tr>
					<?php } ?>
				</tbody>
				</table>
				<div id="sub_titulo">Subir archivo adjunto: </div>
				<div class="div_in">
				<!-- El tipo de codificación de datos, enctype, DEBE especificarse como sigue -->
				<form action="upload_file.php" method="post" enctype="multipart/form-data">
					<input class="form-control form-control-sm"   type="file" id="file" name="file" size="50" onchange="cambia();" />
					<input type="hidden" name="id_prospecto" value="<?= $this->pr['id_prospectos']?>"/>
					<input class="button.dt"   id="upload" style="margin-top:5px;" type="submit" value="Subir" class="boton" />
				</form></div>

				<div id="sub_titulo">Descargar archivos adjuntos: </div>	
				<div class="div_in">			
				<?php 
					if (file_exists("../attached_files/prospecto" . $this->pr['id_prospectos'] . "/")) 
					{
						if ($handle = opendir('../attached_files/prospecto'.$this->pr['id_prospectos'].'/')) 
						{

				?>
						<table>
							<?php while(false !== ($entry = readdir($handle))) { if($entry != "." && $entry != "..") { ?>
							<tr>
							<td><?php echo "<a href='download.php?file=".$entry."&id_prospecto=".$this->pr['id_prospectos']."'>".$entry."</a>"; } ?></td>
							</tr>
							<?php } ?>
						</table>

				<?=
							closedir($handle);
						}	
					}
					else{
						echo 'No hay aún archivos adjuntos subidos';
					}
				?> </div>

			<!--<br/><br/>-->

				<div id="botones"> 
					<form method="POST" action="../controllers/cambiarestado.php">
					<div class="div_in"><input  type="submit" id="cambiar_estado" name="cambiar_estado" class="boton" value="CAMBIAR ESTADO" >
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
					<input type="submit" name="agregar_comentario" class="boton" value="AGREGAR COMENTARIOS" >
					<input type="hidden" name="id_pr" 
					value="<?=$this->pr['id_prospectos']?>">
					<input  type="hidden" name="nom_est" 
					value="<?=$this->pr['estado']?>">
					</div>
					</form>

					<form method="POST" action="../controllers/agregarintegrante.php">
					<div class="div_in">
					<input type="submit" name="cambiar_estado" class="boton"
					value="AGREGAR INTEGRANTES" >
					<input type="hidden" name="id_pr" 
					value="<?=$this->pr['id_prospectos']?>">
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

<script>
var boton = document.getElementById("upload");
boton.disabled = true;
boton.style.background = "#006666";
boton.style.cursor = "default";



function cambia(){	
	if( document.getElementById("file").files.length == 0 ) 
	{
		var boton = document.getElementById("upload");
		boton.disabled = true;
		boton.style.background = "#006666";
		boton.style.cursor = "default";
	}
	else {
		//Si paso todo ok, Habilita
		var boton = document.getElementById("upload");
		boton.disabled = false;
		boton.style.background = "#00cccc";
		boton.style.cursor = "pointer";
	}
}


</script>