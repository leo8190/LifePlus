<?php 
	
	if($_SESSION['id_rol'] == 1)
		include("../html/LeftMenuAdmin.php");
	else if($_SESSION['id_rol'] == 3)
		include("../html/LeftMenuSupervisor.php");
	else
		include("../html/LeftMenuBase.php");
 ?>
		

		<div id="contenedor" >
			<?php $a=$this->agencias ?>
			<?php $r=$this->roles ?>
			<h1>Agregar usuario</h1>
			<h2>Complete los datos para dar de alta un nuevo usuario</h2>
			<form method="post" action="" onsubmit="return validateForm()">
				<!--No se deberian poner en un select los datos del leg y a partir de ahi crear el usuario ?? Es un alta de usuario no de un empleado de la empresa -->
				<div class="div_in">
					<label for="nombre">Nombre: </label><input id="nom" type="text" name="nom" oninput="cambia()" required>
				</div>
					
				<div class="div_in">
					<label for="apellido">Apellido: </label><input id="ape" type="text" name="ape" oninput="cambia()" required>
				</div>	

				<div class="div_in">
					<label for="email"> Correo electrónico: </label>
			 		<input type="text" name="email" id="email" style="width: 200px;" onchange="cambia()" required>
				</div>	

				<div class="div_in">
					<label for="tipo">Tipo de documento: </label>
					<select id="tipo_doc" name="tipo_doc" style="width: 100px;" oninput="cambia()" required>
			 				<option value="0">Seleccionar</option>
			 				<option value="1">DNI</option>
			 				<option value="2">PA</option>
			 				<option value="3">LE</option>
			 				<option value="4">LC</option>
			 		</select>
				</div>	

				<div class="div_in">
					<label for="num_doc"> N°: </label><input type="text" name="dni" id="num_doc" style="width: 200px;" oninput="cambia()" required>
				</div>	

				<div class="div_in">
					<label for="nombre_usuario"> Nombre de usuario: </label>
			 		<input type="text" id="nombre_usuario" name="nombre_usuario" oninput="cambia()" required>
				</div>	
					
				<div class="div_in">
					<label for="password"> Password: </label>
			 		<input type="text" id="password" name="password" oninput="cambia()" required>
				</div>	
				<div class="div_in">
					<label for="agencia">Agencia: </label>
					<select id="agencia" name="id_agencia" style="width: 100px;" oninput="cambia()" required>
					<option value="0">Seleccionar</option>
						<?php foreach ($a as $key) { ?>
			 				<option value="<?=$key['id_agencia']?>"><?=$key['nombre']?></option>
			 			<?php } ?>
			 		</select>
				</div>	
				<div class="div_in">
					<label for="rol">Rol: </label>
					<select id="rol" name="id_rol" style="width: 100px;" oninput="cambia()" required>
						<option value="0">Seleccionar</option>
						<?php foreach ($r as $key) { ?>
			 				<option value="<?=$key['id_rol']?>"><?=$key['nombre']?></option>
			 			<?php } ?>
			 		</select>
				</div>	

				<div class="div_in">
					<label for="estado">Estado: </label>
					<select id="estado" name="id_estado" style="width: 100px;" oninput="cambia()" required>
					<?php if	($_SESSION['id_rol'] == 1) { ?>
						<option value="1">Habilitado</option>
					<?php }	?>
						<option value="0">Deshabilitado</option>
			 		</select>
				</div>	
				<div class="div_in">
					<label for="telefono"> Telefono: </label>
			 		<input type="text" id="tel" name="tel" oninput="cambia()" required>
				</div>	
				<div class="div_in">
					<input name="ok" id="ok" class="boton" type="submit"  
					value="Finalizar carga">
				</div>		
	 		</form>
		</div>
	</div>
</body>
<script text="javascript">
var boton = document.getElementById("ok");
boton.disabled = true;	
boton.style.background = "#006666";

function validateForm() {
	var pass = document.getElementById("password").value;
    if (pass.length < 6) {
    	alert("La contraseña debe contener al menos 6 caracteres");
    	return false;
    }
}

function cambia(){

 	var nombre = document.getElementById("nom").value;
 	var apellido = document.getElementById("ape").value;
 	var tipodoc = document.getElementById("tipo_doc").value;
 	var numdoc = document.getElementById("num_doc").value;
 	var user = document.getElementById("nombre_usuario").value;
 	var pass = document.getElementById("password").value;
 	var email = document.getElementById("email").value;
 	var tel = document.getElementById("tel").value;
 	var agencia = document.getElementById("agencia").value;
 	var rol = document.getElementById("rol").value;

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
	//Formato email
	if(email != "" ){
	 	if (email.indexOf(".com") == -1 || email.indexOf("@") == -1 ){

			alert('Formato de mail no valido.\nCambie su email\n\nejemplo@ejemplo.com');
			document.getElementById("email").value = "";
			//Deshabilita
			var boton = document.getElementById("ok");
			boton.disabled = true;
			boton.style.background = "#006666";		
			return;
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
	if ( nombre == "" || apellido == "" || tipodoc == 0 || numdoc == "" || user == "" || pass == "" || email == "" || tel == "" || agencia == 0 || rol == 0){
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


</script> 
</html>