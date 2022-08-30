<?php 
		$vista='<form>';
			$vista.='<fieldset>';  
		      	$vista.='<div id="divac1">';
			      	$vista.='<label for="cuenta-1">Código Cuenta : </label>';
			      	$vista.='<input type="text" id="cuenta-1" size="3" maxlength="3" onfocus="colorTexto(this.id)"   onblur="noFoco(this.id)" placeholder="1ºGra." style="width:35px;height:35px"/>';
			      	$vista.='<input type="text" id="cuenta-2" size="3" maxlength="3" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)" placeholder="2ºGra." style="width:35px;height:35px"/>';
			      	$vista.='<input type="text" id="cuenta-3" size="6" maxlength="6" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)" placeholder="3ºGra." style="width:60px;height:35px"/>';
			    $vista.='<button type="button" class="botones" onclick="leerCuenta()">Leer</button>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac2">'; 
			      	$vista.='<label for="tit-1">Mayor 1ºgrado: </label>';
			      	$vista.='<input type="text" id="tit-1" size="30" maxlength="40" readonly="readonly" style="width:350px;height:35px;font-size:12px;"/>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac3">';
			      	$vista.='<label for="tit-2">Mayor 2ºgrado: </label>';
			      	$vista.='<input type="text" id="tit-2" size="30" maxlength="40" readonly="readonly" style="width:350px;height:35px;font-size:12px;"/>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac4">';
			      	$vista.='<label for="tit-3">TÍTULO CUENTA: </label> ';
			      	$vista.='<input type="text" id="tit-3" size="30" maxlength="40" readonly="readonly" style="width:350px;height:35px;font-weight:bold;"/>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac5">';
			      	$vista.='<label for="masa">Masa Patrimonial: </label> ';
			      	$vista.='<select id="masa">';
			      			$vista.='<option value="6700GESTION"  onchange="marcaSeleccion()">GESTION</option>';
					      	$vista.='<option value="1110INMOVILIZADO INTANGIBLE">INMOVILIZADO INTANGIBLE</option>';
					      	$vista.='<option value="1120INMOVILIZADO FINANCIERO">INMOVILIZADO FINANCIERO</option>';
					      	$vista.='<option value="1131MAQUINARIA">MAQUINARIA</option>';
					      	$vista.='<option value="1132ELE.TRANSPORTE">ELE.TRANSPORTE</option>';
					      	$vista.='<option value="1133MOBILIARIO">MOBILIARIO</option>';
					      	$vista.='<option value="1210EXISTENCIAS">EXISTENCIAS</option>';
					      	$vista.='<option value="1221CLIENTES">CLIENTES</option>';
					      	$vista.='<option value="1222INVERSIONES A C.P.">INVERSIONES A C.P.</option>';
					      	$vista.='<option value="1223BANCOS">BANCOS</option>';
					      	$vista.='<option value="1230DISPONIBLE CAJA">DISPONIBLE CAJA</option>';
					      	$vista.='<option value="2110CAPITAL SOCIAL">CAPITAL SOCIAL</option>';
					      	$vista.='<option value="2120RESULTADO DEL EJER.">RESULTADO DEL EJER.</option>';
					      	$vista.='<option value="2210DEUDAS A L.P.">DEUDAS A L.P.</option>';
					      	$vista.='<option value="2221PROVEEDORES">PROVEEDORES</option>';
					      	$vista.='<option value="2222ACREEDORES">ACREEDORES</option>';
			      	$vista.='</select>';
		      		$vista.='</div>';
		      	$vista.='<div id="divac6">';
			      	$vista.='<button  type="button" class="botones" onclick="crearPrimerGrado()" id="botoncrearpg">[F1]Crear 1º gr</button>';
			      	$vista.='<button type="button" class="botones" onclick="crearSegundoGrado()" id="botoncrearsg">[F2]Crear 2º gr</button>';
			      	$vista.='<button type="button" class="botones" onclick="crearTercerGrado()" id="botoncreartg">[F3]Crear 3º gr</button>';
		      		$vista.='</div>';
		      	$vista.='<div id="divac7">';
		      	$vista.='<br>';
				$vista.='</div>';
			$vista.='</fieldset>';
		$vista.='</form>';
		$vista.='<span id="feedback"></span>';
		$vista.='<button onmousedown="crearCuenta()" style="margin-left:40%;" class="btn btn-success">Grabar Cuenta</button><br>';
		echo $vista;   




?> 