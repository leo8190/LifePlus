<<?php 

if($_SESSION['id_rol'] == 1)
include("../html/LeftMenuAdmin.php");
else if ($_SESSION['id_rol'] == 3)
include("../html/LeftMenuSupervisor.php");
else
include("../html/LeftMenuBase.php");
 ?>
		<div id="contenedor">
			<h1> Prospecto n° <?= $this->id_prospecto." - ".
			$this->nom_est_act ?></h1>

			<div id="sub_titulo">Cambiar estado del prospecto</div>

			<form method="POST" action="../controllers/cambiarestado.php" onsubmit="return confirm('¿Seguro que desea cambiar el estado del prospecto?');">

				<div class="div_in">
					<label for="est_a">Estado Actual:</label>
					<input class="form-control form-control-sm" disabled="true" id="est_a" type="text" name="id_estado_act" value=<?=$this->nom_est_act?>>
				</div>

				<div class="div_in">
					<label for="est_n">Estado Nuevo:</label>
					<select class="form-control form-control-sm"  name="id_estado_nuevo">
						<?php foreach($this->est_disp as $es){ ?>
						<option value="<?=$es['estado_permitido']?>">
							<?=$es['nombre']?></option>
						<?php 	}	 ?>
					</select>
				</div>

				<div class="div_in"> 
					<input type="submit" class="boton" id="ok" name="modif_est" value="Confirmar">
				</div>

					<input type="hidden" class="boton" name="id_estado_act" 
					value=<?= $this->est_act ?>>
					<input type="hidden" class="boton" name="id_prospecto" 
					value=<?= $this->id_prospecto?>>

				<div id="sub_titulo">Agregar comentario</div>
				<div class="div_in" 
				style="width: 100%; height: 60px; font-size: 16px;"> 
				<input class="form-control form-control-sm" type="text" class="text" id="coments"  name="comentarios" oninput="cambia()" required style="width: 100%; height: 100%">
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