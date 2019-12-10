<<?php 

	if($_SESSION['id_rol'] != 1)
		include("../html/LeftMenuBase.php");
	else
		include("../html/LeftMenuAdmin.php");
 ?>
		<div id="contenedor">
			<h1> Prospecto n° <?= $this->id_prospecto." - ".
			$this->nom_est_act ?></h1>

			<div id="sub_titulo">Agregar comentario al prospecto</div>

			<form method="POST" action="../controllers/agregarseguimiento.php" 
			onsubmit="return confirm('¿Seguro que desea agregar un comentario al prospecto?');"
			>

					<input type="hidden" class="boton" name="id_estado_act" 
					value=<?= $this->nom_est_act?>>

					<input type="hidden" class="boton" name="id_prospecto" 
					value=<?= $this->id_prospecto?>>

				<div id="sub_titulo">Agregar comentario</div>
				<div class="div_in"
				style="width: 100%; height: 60px; font-size: 16px;"> 
				<input type="text" class="text" id="coments"  name="comentarios" oninput="cambia()"  style="width: 100%; height: 100%" required >
				</div>

				<div class="div_in"> 
					<input type="submit" class="boton" id="ok" name="agregar_coment" value="Confirmar">
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
		boton.style.cursor = "pointer";
		}
	}
</script>
</html>