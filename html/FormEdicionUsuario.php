<?php 
if($_SESSION['id_rol'] == 1)
include("../html/LeftMenuAdmin.php");
else if ($_SESSION['id_rol'] == 3)
include("../html/LeftMenuSupervisor.php");
else
include("../html/LeftMenuBase.php");

	$u=$this->usuario;
	$a=$this->agencias;
	$r=$this->roles;

	$selectedHabilitado = "";
	$selectedDeshabilitado = "";
 ?>

		<?php $u=$this->usuario ?>
		<?php $a=$this->agencias ?>
		<?php $r=$this->roles ?>

		<div id="contenedor" >
			<h1> EDICION DE USUARIO </h1>
			
			<div id="sub_titulo">Datos personales</div>
			<form method="post" action="">
				<input type="hidden" name="id_usuario"  value="<?=$u['id_usuario']?>"/>

				<div class="div_in"><label for="n">Nombre:</label>
					<input id="n" type="text" name="nombre" disable value="<?=$u['nombre']?>"></input>
				</div>

				<div class="div_in"><label for="a">Apellido:</label>
					<input  id="a"type="text" name="apellido" disable value="<?=$u['apellido']?>"></input>
				</div>

				<div class="div_in"><label for="e">E-Mail:</label>
					<input id="e"type="text" name="email" disable  value="<?=$u['email']?>"></input>
				</div>
				<br/><br/>
				<div class="div_in"><label for="nu">Nombre de usuario:</label>
					<input  id="nu"type="text" disable name="nombre_usuario" value="<?=$u['nombre_usuario']?>"></input>
				</div>	

				<div class="div_in"><label for="dni">Dni</label>
					<input  id="dni"type="text" disable name="dni" value="<?=$u['dni']?>"></input>
				</div>

				<div class="div_in"><label for="nu">Password:</label>
					<input  id="p"type="text" name="password" disable value="<?=$u['password']?>"></input>
				</div>

				<br/><br/>

				<div class="div_in"><label for="n">Teléfono:</label>
					<input id="t"type="text" disable name="telefono" value="<?=$u['telefono']?>"></input>
				</div>
				
				

				<div class="div_in">
				<label for="agencia">Agencia: </label>
				<select id="agencia" name="id_agencia"  style="width: 200px;" onchange="cambia()">
					<?php foreach ($a as $key) { ?>
		 				<option value="<?=$key['id_agencia']?>"><?=$key['nombre']?></option>
		 			<?php } ?>
		 		</select>
		 		</div>

		 		<div class="div_in">
		 		<label for="rol">Rol: </label>
				<select id="rol" name="id_rol" style="width: 200px;" onchange="cambia()">
					<?php foreach ($r as $key) { ?>
		 				<option value="<?=$key['id_rol']?>"><?=$key['nombre']?></option>
		 			<?php } ?>
		 		</select>
		 		</div>

		 		<div class="div_in">
		 		<label for="estado">Estado: </label>
				<select id="estado" name="id_estado" style="width: 200px;" onchange="cambia()">
		 				<?php if ($u["estado"] == 'Deshabilitado') $selectedDeshabilitado = 'selected="selected"'; else $selectedHabilitado = 'selected="selected"'; ?>
						 <option <?=$selectedHabilitado?> value="1">Habilitado</option>
		 				<option <?=$selectedDeshabilitado?> value="47">Deshabilitado</option>
		 		</select>
		 		</div>

				<div class="div_in"><input type="submit" name="modif" id="modif"  class="boton" value="Modificar datos"></div>
				
			</form>

		
			<form onsubmit="return confirm('¿Seguro que desea dar de baja a este usuario?');" action="bajausuario.php" method="post">
				<input type="hidden" name="id_usuario" value=<?=$u['id_usuario']?>>
				<div class="div_in"><input id="baja" style="cursor:pointer" type="submit" class="boton" value="Dar de baja" /></div>
			</form>
			
		</div>
	</div>
</body>
<script type="text/javascript">
	
var id_rol = "<?php echo $_SESSION['id_rol'] ?>";

if (id_rol == 3) {
	document.getElementById("agencia").disabled = true;
	document.getElementById("rol").disabled = true;
	document.getElementById("estado").disabled = true;
	document.getElementById("modif").style.display = 'none';
	document.getElementById("baja").style.display = 'none';
}

document.getElementById("n").disabled = true;
document.getElementById("e").disabled = true;
document.getElementById("a").disabled = true;
document.getElementById("nu").disabled = true;
document.getElementById("dni").disabled = true;
document.getElementById("t").disabled = true;
document.getElementById("p").disabled = true;


var boton = document.getElementById("modif");
boton.disabled = true;	
boton.style.background = "#006666";
	
var agenciaactual =	document.getElementById("agencia").value;
var rolactual =	document.getElementById("rol").value;
var estadoactual =	document.getElementById("estado").value;



function cambia(){

 	var agencia =	document.getElementById("agencia").value;
	var rol =	document.getElementById("rol").value;
	var estado =	document.getElementById("estado").value;
	

	//Validar todos campos
	if (  agencia == agenciaactual  && estado == estadoactual && rol == rolactual){
		//Deshabilita
		
		var boton = document.getElementById("modif");
		boton.disabled = true;
		boton.style.background = "#006666";

	} else {
			
		//Si paso todo ok, Habilita
		var boton = document.getElementById("modif");
		boton.disabled = false;
		boton.style.background = "#00cccc";
		boton.style.cursor = "pointer";
	}


   										
}



</script>
</html>