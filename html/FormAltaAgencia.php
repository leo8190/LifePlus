<?php 

if($_SESSION['id_rol'] == 1)
include("../html/LeftMenuAdmin.php");
else if ($_SESSION['id_rol'] == 3)
include("../html/LeftMenuSupervisor.php");
else
include("../html/LeftMenuBase.php");
 ?>
		<div id="contenedor" >
			<h1>Agregar Agencia</h1>
			<h2>Ingrese el nombre de la Agencia</h2>
			<form method="post" action="">
				<div class="div_in">
					<label for="nom">Nombre:</label><input id="nom" type="text" name="nombre" oninput="cambia()" required>
				</div>
			 		<!---<label for="sup">Supervisor:</label>
			 		<select id="sup" name="id_supervisor">
			 			<?php foreach($this->supervisores as $s) { ?>
			 			<option value=<?= $s['id_usuario']?>> <?=$s['nombre']." ". $s['apellido']?> </option>
			 			<?php } ?>
			 		</select> -->
			 	
			 		<input name="ok" id="ok" class="boton" type="submit" value="Cargar">
			 
	 		</form>
		</div>
	</div>
</body>
<script text="javascript">
var boton = document.getElementById("ok");
boton.disabled = true;	
boton.style.background = "#006666";

function cambia(){

 	var agencia = document.getElementById("nom").value;
 	
   
	//Caracteres invalidos
	if(agencia != "" ){
	 	if (agencia.indexOf("-") != -1  || agencia.indexOf("@") != -1 || agencia.indexOf("*") != -1 || agencia.indexOf("/") != -1 || agencia.indexOf(".") != -1 || agencia.indexOf(";") != -1){

			alert('No se permiten caracteres especiales');
			document.getElementById("nom").value = "";
			//Deshabilita
			var boton = document.getElementById("ok");
			boton.disabled = true;
			boton.style.background = "#006666";	
			boton.style.cursor = "pointer";	
		} 
	}

	//Validar todos campos vacios
	if ( agencia == "" ){
		//Deshabilita
		
		var boton = document.getElementById("ok");
		boton.disabled = true;
		boton.style.background = "#006666";

	} else {
			
		//Si paso todo ok, Habilita
		var boton = document.getElementById("ok");
		boton.disabled = false;
		boton.style.background = "#00cccc";
		boton.style.cursor = "pointer";
	}

   
}

function confirma(){

 	
   
}

</script> 
</html>