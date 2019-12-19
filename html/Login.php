<?php
	if (isset($_SESSION['message']))
	{
		$message = $_SESSION['message'];
		unset($_SESSION['message']);
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Login - Life +</title>
	<style>
		*{
			font-family: 'Arial';
			box-sizing: border-box;
			margin:0;
			padding:0;
		}
		#contenedor{
			background: url("../img/fondo.jpg") no-repeat center;
			background-size: cover;
			height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		#contenido h2{
			text-align: center;
		}
		#contenido{
			color:white;
			background: rgba(47, 115, 102, 0.54) !important;
			padding: 2rem;
			border-radius: 5px;
		}
		#contenido form{
			width: 40vw;
		}
		#contenido div{
			text-align: center;
		}
		#contenido div input[type="text"],#contenido div input[type="password"]{
			width: 100%;
			display: block;
			background: white;
			border:1px solid white;
			padding: 9px;
			margin-bottom: 1rem;
			color: grey;
			font-size: 16px;
		}
		input[type="submit"]{
			color:white;
			background: transparent;
			padding: 8px 2rem;
			border: 1px solid #31bc60;
			transition: 0.2s;
			font-size: 16px;
			border-radius: 5px;
		}
		input[type="submit"]:hover{
			background: #31bc60;
		}
		.center{
			text-align: center;
		}

		.logo{
			display: block;
			margin-top: 20px;
    		margin-left: auto;
    		margin-right: auto;
    		margin-bottom: 20px;
    		width: 85%;
    	}
		#message{
			margin-top: 15px;
		}

	</style>

</head>
<body>
	<section id="contenedor">
		<div id="contenido">
			<h2>Login</h2>
			<img src="../img/logo.png" class="logo">
			<form action="login.php" method="post">
				<div>
					<input  minlength="10" maxlength="50"  type="text" id="usuario" name="usuario" placeholder="Usuario:" oninput="cambia()" required>
				</div>
				<div>
					<input minlength="8" maxlength="25" type="password" id="password" name="password" placeholder="Password:" oninput="cambia()" required>
				</div>
				<div class="center">
					<input type="submit" id="Ingresar" name="Ingresar" value="Ingresar">
				</div>		
				<div id="message"> <?php if (isset($message)) echo $message ?> </div>
			</form>
		</div>
	</section>
</body>
</html>

<script src="../js/jquery-3.3.1.min.js"></script>

<script text="javascript">

$(document).ready(function(){
	var user = document.getElementById("usuario").value;
	var pass = document.getElementById("password").value;
	var boton = document.getElementById("Ingresar");

	if(pass == "" || user == ""){
		boton.disabled = true;
		boton.style.background = "#006666";
	}
	else{
		boton.disabled = false;
		boton.style.background = "#00cccc";
	}
	boton.focus();
});

function cambia(){

 	var user = document.getElementById("usuario").value;
 	var pass = document.getElementById("password").value;

	//Validar todos campos vacios
	if ( pass == "" || user == "" ){
		//Deshabilita

		var boton = document.getElementById("Ingresar");
		boton.disabled = true;
		boton.style.background = "#006666";
		// boton.createAttribute("style", "cursor: default");
		boton.style.cursor = "default";

	} else {

		//Si paso todo ok, Habilita
		var boton = document.getElementById("Ingresar");
		boton.disabled = false;

		boton.style.background = "#00cccc";
		// boton.createAttribute("style", "cursor: pointer");
		boton.style.cursor = "pointer";
	}
	//Caracteres invalidos
	if(user != "" ){
	 	if (user.indexOf("\.") != -1  || user.indexOf("@") != -1 || user.indexOf("*") != -1 || user.indexOf("/") != -1 ||  user.indexOf(";") != -1){

			alert('No se permiten algunos caracteres especiales para Usuario');
			document.getElementById("usuario").value = "";
			//Deshabilita
			var boton = document.getElementById("Ingresar");
			boton.disabled = true;
			boton.style.background = "#006666";
			// boton.createAttribute("style", "cursor: default");
			boton.style.cursor = "default";
			return;

		}
	}

	if(pass != "" ){
	 	if (pass.indexOf("\.") != -1  || pass.indexOf("@") != -1 || pass.indexOf("*") != -1 || pass.indexOf("/") != -1 ||  pass.indexOf(";") != -1){

			alert('No se permiten algunos caracteres especiales para Password');
			document.getElementById("pass").value = "";
			//Deshabilita
			var boton = document.getElementById("Ingresar");
			boton.disabled = true;
			boton.style.background = "#006666";
			// boton.createAttribute("style", "cursor: default");
			boton.style.cursor = "default";
			return;
		}
	}



}

</script>


<!-- <style>
	#Ingresar{
		cursor: pointer;
	}
</style> -->

