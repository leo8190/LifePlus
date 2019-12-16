<!DOCTYPE html>
<?php 

if($_SESSION['id_rol'] == 1)
include("../html/LeftMenuAdmin.php");
else if ($_SESSION['id_rol'] == 3)
include("../html/LeftMenuSupervisor.php");
else
include("../html/LeftMenuBase.php");
 ?>
		<?php $p=$this->prospectos?>
		<div id="contenedor" >
			<h1> Prospecto n° <?= $p['id_prospectos']. "  -  " .  $p['estado']?></h1>
			<div id="sub_titulo"></div>
				<div class="div_in">
				<form method="post" action="" id="formu">
					<h3 name="tit" id="tit">Datos de contacto</h3>
					<label name="campo" id="campo">Nombre:</label>
					<label><?=$p['nombre']?></label>
					<br/><label name="campo" id="campo">Apellido:</label>
					<label ><?=$p['apellido']?></label>
					<br/><label name="campo" id="campo">Sexo:</label>
					<label><?=$p['sexo']?></label>
					<br/><label name="campo" id="campo">Agencia:</label>
					<label><?=$p['agencia']?></label>
					<br/><label name="campo" id="campo">Vendedor:</label>
					<label><?=$p['vendedor']?></label>
					<br/><label name="campo" id="campo">Fecha Alta:</label>
					<label><?=$p['fecha_alta']?></label>

					<br/><h3 name="tit" id="tit">Datos de contacto</h3>
					<br/><label name="campo" id="campo">Email:</label>
					<label><?=$p['email']?></label>

					<br/><h3 name="tit" id="tit">Datos adicionales</h3>
							
					<br/><br/><textarea name="comment" form="formu" placeholder="Ingrese sus comentarios..." style="width: 300px; height:70px;" required="required"></textarea>
					<br/><br/><label> Cambiar a estado: </label>
					<select id="estados_aud" name="estados_aud" onchange="hab()"style="width: 190px;"  />
							<option value="0">Seleccione estado</option>
			 				<option value="5" >Ok Carpeta</option>
			 				<option value="8" >Pedido doc. faltante</option>
			 				<option value="11" >Cuota diferencial</option>
			 		</select>
					<br/><br/>
					<input type="button" onclick="location.href='../controllers/verprospectosAud.php'" name="Volver" class="boton" value="Volver"></input>
					<input type="hidden" name="id_pros"  value=<?=$p['id_prospectos']?>></input>

					<input type="submit" name="Actualizar" id="Actualizar" class="boton" value="Actualizar"   > </input>

					
					
					
				</form>
				</div>
				
				
					

		</div>
	</div>

</body>
<script text="javascript">
var boton = document.getElementById("Actualizar");
boton.disabled = true;	
boton.style.background = "#006666";
function hab(){
 	var x = document.getElementById("estados_aud");
 	
	if (x.value == 0){
		var boton = document.getElementById("Actualizar");
		boton.disabled = true;
		boton.style.background = "#006666";
	} else {
		var boton = document.getElementById("Actualizar");
		boton.disabled = false;
		boton.style.background = "#00cccc";
	}
}
</script> 
</html>