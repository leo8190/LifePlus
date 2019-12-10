<?php 

	if($_SESSION['id_rol'] != 1)
		include("../html/LeftMenuBase.php");
	else
		include("../html/LeftMenuAdmin.php");
 ?>
		<div id="contenedor">
			<h1> Prospecto n° <?= $this->id_prospecto." - ".
			$this->estado_pros ?></h1>

			<div id="sub_titulo">Historial de movimientos de estados</div>

						<div id="sub_titulo">Movimientos (<?= count($this->movimientos)?>)</div>
				<table >
				<thead>
					<th class="th_prosp">Fecha</th>
					<th class="th_prosp">Usuario</th>
					<th class="th_prosp">Perfil</th>
					<th class="th_prosp">Estado nuevo</th>
				</thead>
				<tbody>
					<?php foreach($this->movimientos as $m){ ?>
					<tr>
					<td><?= $m['fecha']?></td>
					<td><?= $m['nombre_usuario']?></td>
					<td><?= $m['rol_nombre'] ?></td>
					<td><?= $m['est_nombre']?></td>
					</tr>
					<?php } ?>
				</tbody>
				</table>

			
				<form action="../controllers/verprospecto.php" method="get">
				<div class="div_in">
				<input type="submit" name="volver" value="Volver">
				<input type="hidden" name="num_prosp" 
				value="<?= $this->id_prospecto ?>">
				</div>
				</form>

			
		</div>
</div>
</body>

<script type="text/javascript">

var boton = document.getElementById("ok");
boton.disabled = true;	
boton.style.background = "#006666";

function cambia(){
	var comentarios = document.getElementById("coments").value;
	if(comentarios == "" ) {
		var boton = document.getElementById("ok");
		boton.disabled = true;
		boton.style.background = "#006666";
		return;
		}
	else {
		//Si paso todo ok, Habilita
		var boton = document.getElementById("ok");
		boton.disabled = false;
		boton.style.background = "#00cccc";
		}
	}
</script>
</html>