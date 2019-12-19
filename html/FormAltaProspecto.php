<?php 

	if($_SESSION['id_rol'] == 1)
		include("../html/LeftMenuAdmin.php");
	else if($_SESSION['id_rol'] == 3)
		include("../html/LeftMenuSupervisor.php");
	else
		include("../html/LeftMenuBase.php");
 ?>
		<div id="contenedor" >
			<h1>Agregar prospecto</h1>
			<h2>Complete los datos para dar de alta un nuevo prospecto</h2>
			<form onsubmit="return isEmailCorrect()" method="post" action="">
				<div class="div_in">
					<label for="nom">Nombre: </label>
					<input class="form-control form-control-sm" id="nom" type="text" name="nom" oninput="cambia()" required>
				</div>
				<div class="div_in">
					<label for="ape">Apellido: </label><input class="form-control form-control-sm" id="ape" type="text" name="ape" oninput="cambia()" required>
				</div>
				<div class="div_in">
					<label for="tipo_doc">Tipo Doc: </label>
					<select class="form-control form-control-sm"  id="tipo_doc" name="tipo_doc" oninput="cambia()" required>
			 				<option value="1">DNI</option>
			 				<option value="2">PA</option>
			 		</select>
			 	</div>
			 	<div class="div_in">
					<label for="num_d"> N°: </label>
					<input  class="form-control form-control-sm" type="text" name="num_doc" id="num_doc" style="width: 200px;" oninput="cambia()" required>
				</div>
				<div class="div_in">
				<label for="loc"> Localidad: </label>
					<select class="form-control form-control-sm"  id="localidad" name="localidad" style="width: 227px;" oninput="cambia()" required>
						<option value="0">Seleccionar</option>
						<?php foreach($this->localidades as $l) { ?>
			 				<option value= <?=$l['id_loc']?>> <?=$l['nom_loc'] .
			 				" - ".$l['nom_prov'] .
			 				" - ".$l['nom_ag']?>
			 				</option>
			 			<?php } ?>
			 		</select>
			 	</div>
			 	<div class="div_in">
			 		<label for="sexo"> Sexo: </label>
			 		<select class="form-control form-control-sm"  id="sexo" name="sexo" oninput="cambia()" required>
			 				<option value="0">Seleccionar</option>
			 				<option value="M">M</option>
			 				<option value="F">F</option>
			 		</select>
			 	</div>
			 	<div class="div_in">
			 		<label for="email"> Correo electrónico </label>
			 		<input class="form-control form-control-sm" type="text" name="email" id="email" style="width: 200px;" oninput="cambia()" required>
			 	</div>
			 	
				<div class="div_in">
			 			<label for="tel"> Teléfono </label>
			 			<input class="form-control form-control-sm" type="text" name="tel" id="tel" style="width: 200px;" oninput="cambia()" required>
			 	</div>

			 	<div class="div_in">
					 <label for="medio"> Medio de contacto </label>
					 <select class="form-control form-control-sm"  name="medio" id="medio" style="width: 200px;" oninput="cambia()" required>
			 				<option value="0">Teléfono</option>
			 				<option value="0">Mail</option>
							<option value="0">Página Web</option>
			 				<option value="0">Agencia</option>
							<option value="0">Presencial</option>
			 		</select>
				</div>

		<!--	 <label for="medio"> Medio </label>
			 		<input type="text" name="medio" id="medio" style="width: 200px;" oninput="cambia()" required>
					  -->

			 		<div class="div_in">
			 		<!--<input type="text" name="comp" id="comp" style="width: 200px;" oninput="cambia()" required>-->
					 <label for="comp"> Competencia </label>
					 <select class="form-control form-control-sm" name="comp" id="comp" style="width: 200px;" oninput="cambia()" required>
			 				<option value="0">Swiss Medical</option>
			 				<option value="0">Galeno</option>
							<option value="0">Osde</option>
			 				<option value="0">Medicus</option>
							<option value="0">Obra Social Rel. Dependencia</option>
							<option value="0">Obra Social Monotributistas</option>
			 		</select>

			 		</div>
			 		<input name="ok" id="ok" class="boton" type="submit" value="Finalizar">
	 		</form>
		</div>
	</div>
</body>
<script text="javascript">
var boton = document.getElementById("ok");
boton.disabled = true;	
boton.style.background = "#006666";

function isEmailCorrect(){
	//Formato email
	if(email != "" ){
	 	if (email.indexOf(".com") == -1 || email.indexOf("@") == -1 ){

			alert('Formato de mail no valido.\nCambie su email\n\nejemplo@ejemplo.com');
			document.getElementById("email").value = "";
			//Deshabilita
			var boton = document.getElementById("ok");
			boton.disabled = true;
			boton.style.background = "#006666";		
			return false;
		} 
		else{
			return true;
		}
	}
}

function cambia(){

 	var nombre = document.getElementById("nom").value;
 	var apellido = document.getElementById("ape").value;
 	var tipodoc = document.getElementById("tipo_doc").value;
 	var numdoc = document.getElementById("num_doc").value;
 	var localidad = document.getElementById("localidad").value;
 	var sexo = document.getElementById("sexo").value;
 	var email = document.getElementById("email").value;
 	var tel = document.getElementById("tel").value;
 	var medio = document.getElementById("medio").value;
 	var comp = document.getElementById("comp").value;

 	existeletra = /[A-Za-z]/;

 /*	alert(nombre);alert(apellido);alert(tipodoc);alert(numdoc);alert(localidad);alert(sexo);
 	alert(email);alert(tel);alert(medio);alert(comp);
   */
   //Sin numeros en Nombre
    if(nombre != "" ){
		for (var i = 0 ; i<=9 ; i++){

	 		if ( (nombre.indexOf(i) != -1) ){

				alert('No se permite ingresar numeros para Nombre');

				document.getElementById("nom").value = "";

				var boton = document.getElementById("ok");
				boton.disabled = true;
				boton.style.background = "#006666";
				return;
				
			}

		} 
	}
	

	//Sin numeros en Apellido
	if(apellido != "" ){
		for (var i = 0 ; i<=9 ; i++){

	 		if (apellido.indexOf(i) != -1 ){

				alert('No se permite ingresar numeros para Apellido');
				document.getElementById("ape").value = "";
				var boton = document.getElementById("ok");
				boton.disabled = true;
				boton.style.background = "#006666";
				return;
			}
		}
	}	
	//Sin letras en Numero de documento
	if(numdoc != "" ){
		if( existeletra.test(numdoc) ){
			alert('No se permite ingresar letras para Numero de Documento');
			document.getElementById("num_doc").value = "";
			var boton = document.getElementById("ok");
			boton.disabled = true;
			boton.style.background = "#006666";
			return;
		} 
	}
	//Sin letras en Telefono
	if(tel != "" ){
		if( existeletra.test(tel) ){
			alert('No se permite ingresar letras para Telefono');
			document.getElementById("tel").value = "";
			var boton = document.getElementById("ok");
			boton.disabled = true;
			boton.style.background = "#006666";
			return;
		} 
	}
	//Validar todos campos vacios
	if ( nombre == "" || apellido == "" || tipodoc == 0 || numdoc == "" || localidad == 0 || sexo == 0  || email == ""  || tel == "" || medio == "" || comp == ""){
		//Deshabilita
		
		var boton = document.getElementById("ok");
		boton.disabled = true;
		boton.style.background = "#006666";
		boton.style.cursor = "default";

	} else {
			
		//Si paso todo ok, Habilita
		var boton = document.getElementById("ok");
		boton.disabled = false;
		boton.style.background = "#00cccc";
		boton.style.cursor = "pointer";
	}


   										
}


</script> 
</html>

<style>
 	#ok{
		max-height: 33px;
		width: 104px;
	 }
</style>