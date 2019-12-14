<?php 

	if($_SESSION['id_rol'] != 1)
		include("../html/LeftMenuBase.php");
	else
		include("../html/LeftMenuAdmin.php");
 ?>

<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../jquery-ui-1.12.1.custom/jquery-ui.css">
  <script type="text/javascript" src="../jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
  <script type="text/javascript" src="../jquery-ui-1.12.1.custom/jquery-ui.js"></script>    
  <script>
  $( function() {
    $( "#fecha_nacimiento" ).datepicker({
        dateFormat: "dd-mm-yy",
        defaultDate: '01-01-1989'
    });
  } );

  var boton = document.getElementById("ok");
boton.disabled = true;	
boton.style.background = "#006666";

function cambia(){

 	var nombre = document.getElementById("nom").value;
 	var apellido = document.getElementById("ape").value;
 	var tipodoc = document.getElementById("tipo_doc").value;
 	var numdoc = document.getElementById("num_doc").value;
    var sexo = document.getElementById("sexo").value;
    var tipo_ingresante = document.getElementById("tipo_ingresante").value;
    var fecha_nacimiento = document.getElementById("fecha_nacimiento").value;

 	existeletra = /[A-Za-z]/;

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
	
	//Validar todos campos vacios
	if ( nombre == "" || apellido == "" || tipodoc == 0 || numdoc == "" || sexo == 0 || tipo_ingresante == 0 || fecha_nacimiento == ""){
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
  <style>
 	#ok{
		max-height: 33px;
		width: 104px;
	 }
</style>
</head>

<body>
 	<div id="contenedor" >
			<h1>Agregar integrante</h1>
			<h2>Complete los datos para agregar un integrante al prospecto seleccionado</h2>            

			<form onsubmit="return confirm('¿Esta seguro que desea agregar este integrante?');" 
                method="post" action="agregarintegrante.php">
				<div class="div_in">
					<label for="nom">Nombre: </label><input id="nom" type="text" name="nom" oninput="cambia()" required>
				</div>
				<div class="div_in">
					<label for="ape">Apellido: </label><input id="ape" type="text" name="ape" oninput="cambia()" required>
				</div>
                
				<div class="div_in">
					<label for="tipo_doc">Tipo de documento: </label>
					<select id="tipo_doc" name="tipo_doc" style="width: 100px;" oninput="cambia()" required>
			 				<option value="0">Seleccionar</option>
			 				<option value="1">DNI</option>
			 				<option value="2">PA</option>
			 		</select>
			 	</div>
			 	<div class="div_in">
					<label for="num_d"> N°: </label>
					<input  type="text" name="num_doc" id="num_doc" style="width: 200px;" oninput="cambia()" required>
				</div>				
			 	<div class="div_in">
			 		<label for="sexo"> Sexo: </label>
			 		<select id="sexo" name="sexo" oninput="cambia()" required>
			 				<option value="0">Seleccionar</option>
			 				<option value="M">M</option>
			 				<option value="F">F</option>
			 		</select>
			 	</div>	
                <div class="div_in">
			 		<label for="tipo_ingresante"> Parentesco: </label>
			 		<select id="tipo_ingresante" name="tipo_ingresante" oninput="cambia()" required>
			 				<option value="0">Seleccionar</option>
			 				<option value="1">Titular del plan</option>
			 				<option value="2">Cónyuge</option>
							<option value="3">Hijo/a</option>
			 		</select>
			 	</div>		
                 <div class="div_in">
			 		<label for="fecha_nacimiento"> Fecha de Nacimiento: </label>
                    <input name="fecha_nacimiento" type="text" id="fecha_nacimiento" onchange="cambia()">
			 	</div>                 
            	<input name="id_prospecto" id="id_prospecto" type="hidden" value="<?=$this->id_prospecto?>">		 				 								 		
			    <input name="ok" id="ok" class="boton" type="submit" value="Finalizar">
	 		</form>
	</div>
</body>
</html>