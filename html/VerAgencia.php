<?php 
if($_SESSION['id_rol'] == 1)
include("../html/LeftMenuAdmin.php");
else if ($_SESSION['id_rol'] == 3)
include("../html/LeftMenuSupervisor.php");
else
include("../html/LeftMenuBase.php");
 ?>

		<div id="tabla" >
			<table cellpadding="0" cellspacing="0">
				<thead id="cabecera_tabla">
					<tr>
						<th>Agencia n°</th>
						<th>Nombre</th>
						<th></th>
					</tr>	
				</thead>
				<tbody>	
				<form onsubmit="return confirm('¿Esta seguro de la modificación?');" action="../controllers/veragencias.php" method="POST">
					<tr>
					<td><?= $this->agencias['id_agencia']?></td>
					<td><input name="nombre_ag"  id="nombre_ag" oninput="cambia()"
						value="<?= $this->agencias['nombre']?>">
					</td>
					<td>
					<div class="div_in">
					<input type="hidden" id="id_agencia" name="id_agencia" 
					value="<?=$this->agencias['id_agencia']?>">
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
<script text="javascript">
var boton = document.getElementById("ok");
boton.disabled = true;	
boton.style.background = "#006666";
	
var agenciaactual =	document.getElementById("nombre_ag").value;

function cambia(){

 	var agencia = document.getElementById("nombre_ag").value;
    
 	if(agencia != "" ){
	 	if (agencia.indexOf("-") != -1  || agencia.indexOf("@") != -1 || agencia.indexOf("*") != -1 || agencia.indexOf("/") != -1 || agencia.indexOf(".") != -1 || agencia.indexOf(";") != -1){

			alert('No se permiten caracteres especiales');
			document.getElementById("nombre_ag").value = "";
			//Deshabilita
			var boton = document.getElementById("ok");
			boton.disabled = true;
			boton.style.background = "#006666";		

		} 
	}


	//Validar todos campos vacios
	if ( agencia == ""  ||  agencia == agenciaactual ){
		//Deshabilita
		
		var boton = document.getElementById("ok");
		boton.disabled = true;
		boton.style.background = "#006666";

	} else {
			
		//Si paso todo ok, Habilita
		var boton = document.getElementById("ok");
		boton.disabled = false;
		boton.style.background = "#00cccc";
	}


   										
}


</script> 
</html>