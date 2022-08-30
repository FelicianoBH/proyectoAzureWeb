<?php 
	require "conexion.php";
 

	$id_responsableActualizada="";
	$actualizar_fam="";
	$acontar="no";
	$pagina=0;
	$num_paginas=0; 
	$desde=0;
	$fechaHoy=0;
	$codigo_buscar;
	$alta=""; 
	$nuevoCodigo="";
	$nuevoNombre="";
	$nuevoDescuento1="";
	$nuevoDescuento2="";
	$borrar_cli="";
	$codigo_borrar="";
	$desdecodigo="";
	$formulario="";
	$clientes="";
	$operacion="";
	$nifAc="";
	$razonAc="";
	$nombreAc="";
	$direccionAc="";
	$telefonoAc="";
	$correoAc="";
	$tarifaAc="";
	$formaAc="";
	$limiteAc="";
	$bancoAc="";
	$actualizar_cliente="";
	$codigo_actualizar="";
	$buscacliente="";
	$n_nif="";
	$n_razon="";
	$n_nombre="";
	$n_direccion="";
	$n_telefono="";
	$n_correo="";
	$n_tarifa="";
	$n_forma="";
	$n_limite="";
	$n_banco="";
	$n_codigo="";

	
	if (isset($_GET['actualizar_cliente'])) {

		$codigo_actualizar=$_GET['codigo'];
		$actualizar_cliente=$_GET['actualizar_cliente'];
		$nifAc=$_GET['nif'];
		$razonAc=$_GET['razon'];
		$nombreAc=$_GET['nombre'];
		$direccionAc=$_GET['direccion'];
		$telefonoAc=$_GET['telefono'];
		$correoAc=$_GET['correo'];
		$tarifaAc=$_GET['tarifa'];
		$formaAc=$_GET['forma'];
		$limiteAc=$_GET['limite'];
		$bancoAc=$_GET['banco'];
	}


	if (isset($_GET['buscacliente'])) {
		$buscacliente = $_GET['buscacliente'];
		$codigo_buscar= $_GET['id'];
		}

	if (isset($_GET['formulario'])) {
		$formulario = $_GET['formulario'];
		$operacion =$_GET['operacion'];
		}


	if (isset($_GET['clientes'])) {
		$clientes = $_GET['clientes'];
		$pagina=$_GET['pagina'];
		$num_paginas=$_GET['num_paginas'];
		$desdecodigo=$_GET['desdecodigo'];
		}


	if (isset($_GET['acontar'])) {
		$acontar="si";
		$desdecodigo=$_GET['desdecodigo'];
		} else {
			$acontar="no";
		}
	

	if (isset($_GET['alta'])) {

		$alta=$_GET['alta'];
		$n_codigo=$_GET['codigo'];
		$n_nif=$_GET['nif'];
		$n_razon=$_GET['razon'];
		$n_nombre=$_GET['nombre'];
		$n_direccion=$_GET['direccion'];
		$n_telefono=$_GET['telefono'];
		$n_correo=$_GET['correo'];
		$n_tarifa=$_GET['tarifa'];
		$n_forma=$_GET['forma'];
		$n_limite=$_GET['limite'];
		$n_banco=$_GET['banco'];
	}

	if (isset($_GET['borrar'])) {
		$borrar_cli=$_GET['borrar'];
		$codigo_borrar=$_GET['cliente_borrar'];
	 	}


	$codigo = "CLI_CODIGO";
	$nif="CLI_NIF";
	$razon="CLI_RAZON";
	$nombre = "CLI_NOMBRE";
	$ventas="CLI_VENTAS";
	$saldo="CLI_SALDO";
	$limite="CLI_LIMITE_RIESGO";
	$valor="VALOR";
	$direccion="CLI_DIRECCION";
	$telefono="CLI_TELEFONO";
	$correo="CLI_CORREO";
	$tarifa="CLI_TIPO_TARIFA";
	$pago="CLI_TIPO_PAGO";
	$banco="CLI_BANCO_IBAN";

	$actualizar ="ACTUALIZAR";
	$borrar = "BORRAR";
	$tamanio=12;

	
	if ($acontar=="si") {

		$resultado = mysqli_query($con, "SELECT * FROM clientes WHERE CLI_CODIGO >= '$desdecodigo'");
		$num_filas = mysqli_num_rows($resultado);
		echo $num_filas;

	}


	if($clientes==="si") {

			$desde=(($pagina-1)*$tamanio);

		 	$resultado = mysqli_query($con, "SELECT * FROM clientes WHERE CLI_CODIGO >= '$desdecodigo' ORDER BY CLI_CODIGO LIMIT $desde,$tamanio");

		 	
			$table = '<div class = "container">';
			$table .=  '<table class = "table table-striped table-hover table-condensed table-responsive">';
			$table .= '<tr>';
			$table .= '<th class="col-sm-0">Código</th>';
			$table .= '<th class="col-sm-0">Nif/Cif</th>';
			$table .= '<th class="col-sm-0">Razon</th>';
			$table .= '<th class="col-sm-0">Apellidos</th>';
			$table .= '<th class="col-sm-0">Ventas</th>';
			$table .= '<th class="col-sm-0">Saldo</th>';
			$table .= '<th class="col-sm-1">Limite_Riesgo</th>';
			$table .= '<th class="col-sm-0"> </th>';
			$table .= '<th class="col-sm-0"> </th>';
			$table .= '<th class="col-sm-0"> </th>';
			$table .= '</tr>';


			while ($fila = mysqli_fetch_assoc($resultado)) {

			$table .= '<tr>';
			$table .= '<td id="'.$codigo.$fila['CLI_CODIGO'].'">' . $fila['CLI_CODIGO'] . '</td>';
			$table .= '<td id="'.$nif.$fila['CLI_CODIGO'].'" style="white-space:nowrap">' . $fila['CLI_NIF'] . '</td>';
			$table .= '<td id="'.$razon.$fila['CLI_CODIGO'].'" style="white-space:nowrap">' . $fila['CLI_RAZON'] . '</td>';
			$table .= '<td id="'.$nombre.$fila['CLI_CODIGO'].'" style="white-space:nowrap">' . $fila['CLI_NOMBRE'] . '</td>';
			$table .= '<td id="'.$ventas.$fila['CLI_CODIGO'].'" style="white-space:nowrap">' .number_format($fila['CLI_VENTAS'], 2, ',','.'). '</td>';
			$table .= '<td id="'.$saldo.$fila['CLI_CODIGO'].'" style="white-space:nowrap">'  .number_format($fila['CLI_SALDO'], 2, ',','.'). '</td>';
			$table .= '<td id="'.$limite.$fila['CLI_CODIGO'].'" style="white-space:nowrap">' .number_format($fila['CLI_LIMITE_RIESGO'], 2, ',','.'). '</td>';
			$table .= '<td id="'.$valor.$fila['CLI_CODIGO'].'" hidden="hidden">' .$fila['CLI_LIMITE_RIESGO']. '</td>';
			$table .= '<td id="'.$direccion.$fila['CLI_CODIGO'].'" style="white-space:nowrap" hidden="hidden">' . $fila['CLI_DIRECCION'] . ' </td>';
			$table .= '<td id="'.$telefono.$fila['CLI_CODIGO'].'" style="white-space:nowrap" hidden="hidden">' . $fila['CLI_TELEFONO'] . ' </td>';
			$table .= '<td id="'.$correo.$fila['CLI_CODIGO'].'" style="white-space:nowrap" hidden="hidden">' . $fila['CLI_CORREO'] . ' </td>';
			$table .= '<td id="'.$tarifa.$fila['CLI_CODIGO'].'" style="white-space:nowrap" hidden="hidden">' . $fila['CLI_TIPO_TARIFA'] . ' </td>';
			$table .= '<td id="'.$pago.$fila['CLI_CODIGO'].'" style="white-space:nowrap" hidden="hidden">' . $fila['CLI_TIPO_PAGO'] . ' </td>';
			$table .= '<td id="'.$banco.$fila['CLI_CODIGO'].'" style="white-space:nowrap" hidden="hidden">' . $fila['CLI_BANCO_IBAN'] . ' </td>';
			$table .= '<td><input id="'.$fila['CLI_CODIGO'].'" onclick="ampliarCliente(this.id)" type = "button" value ="AMPLIA INFO " class = "btn btn-info"></td>';
			$table .= '<td><input id="'.$fila['CLI_CODIGO'].'" onclick="editarCliente(this.id)" type = "button" value ="Editar" class = "btn btn-success"></td>';
			$table .= '<td><input  id="'.$borrar.$fila['CLI_CODIGO'].'" onclick="borrarCliente('.$fila['CLI_CODIGO'].')"  type = "button" value ="Borrar" class = "btn btn-danger"></td>';
			$table .= '<td><input id="'.$actualizar.$fila['CLI_CODIGO'].'" onclick = "actualizarCliente('.$fila['CLI_CODIGO'].')" type = "button" value ="Actualizar" class = "btn btn-primary" style="display:none;"></td>';
 			$table .= '</tr>';
			}
		$table.= '</table>';
		$table.= '<button onclick="ejecutarNuevaVentana()" class="btn btn-primary">Agregar Cliente</button>';
		$table.="<br>";

		$table.="<h4>Mostrar Página:<span id='mostrandopagina'> </span> Desde código : ".$desdecodigo."</h4>";
		$table.="<button class='botones' onclick="."'retrocedoPagina()'>"."<"."</button>";
		$eligepagina="1-".$num_paginas;
		$table.=' Pagina: <input type="text" id="eligepagina" size="3" maxlength="3" placeholder="'.$eligepagina.'">';
		$table.="<button class='botones' onclick="."'iraPagina()'>"."Ir"."</button>";
		$table.="<button  class='botones' onclick="."'avanzoPagina()'>".">"."</button>";
		$table.='Desde codigo:<input type="text" id="desdecodigo" size="8" maxlength="8">';
		$table.="<button class='botones' onclick="."'desdeCodigo()'>"."Ir"."</button>";
		echo $table;
		mysqli_close($con);

	} 


	if ($formulario=="si") {

			$vista="<div>";
				$vista.'<form>';
			 
		      	$vista.='<div id="divac1">';
			      	$vista.='<p><label for="codigo" padding="15px">Código Cliente : </label>';
			      	$vista.='<input type="text" id="codigo" size="12" maxlength="12" onfocus="colorTexto(this.id)""   onblur="noFoco(this.id)" style="width:110px;height:35px;padding:15px"/></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac2">'; 
			      	$vista.='<p><label for="nif">Nif/Cif: </label>';
			      	$vista.='<input type="text" id="nif" size="10" maxlength="10"  style="width:150px;height:35px;font-size:12px;padding:15px" onfocus="colorTexto(this.id)"  onblur="noFoco(this.id)"/></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac3">';
			      	$vista.='<p><label for="razon">Razon: </label>';
			      	$vista.='<input type="text" id="razon" size="3" maxlength="40"  style="width:300px;height:35px;font-size:12px;padding:15px" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac4">';
			      	$vista.='<p><label for="nombre">Nombre: </label>';
			      	$vista.='<input type="text" id="nombre" size="30" maxlength="30"  style="width:300px;height:35px;font-size:12px;padding:15px" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac5">';
			      	$vista.='<p><label for="direccion">Direccion: </label>';
			      	$vista.='<input type="text" id="direccion" size="30" maxlength="30" style="width:300px;height:35px;font-size:12px;padding:15px" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac6">';
			      	$vista.='<p><label for="telefono">Telefono: </label>';
			      	$vista.='<input type="text" id="telefono" size="10" maxlength="10" style="width:150px;height:35px;font-size:12px;padding:15px" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/></p>';
		      	$vista.='</div>';

		      	$vista.='<div id="divac7">';
			      	$vista.='<p><label for="correo">Correo: </label>';
			      	$vista.='<input type="text" id="correo" size="30" maxlength="30" style="width:300px;height:35px;font-size:12px;padding:15px" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/></p>';
		      	$vista.='</div>';

		      	$vista.='<div id="divac8">';
			      	$vista.='<p><label for="tarifa">Tipo Tarifa: </label>';
			      	$vista.='<input type="text" id="tarifa" size="3" maxlength="3" style="width:150px;height:35px;font-size:12px;padding:15px" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac9">';
			      	$vista.='<p><label for="forma">Forma pago: </label>';
			      	$vista.='<input type="text" id="forma" size="3" maxlength="3" style="width:150px;height:35px;font-size:12px;padding:15px" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac10">';
			      	$vista.='<p><label for="limite">Límite Riesgo: </label>';
			      	$vista.='<input type="text" id="limite" size="12" maxlength="12" style="width:150px;height:35px;font-size:12px;padding:15px" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac11">';
			      	$vista.='<p><label for="banco">Banco Iban: </label>';
			      	$vista.='<input type="text" id="banco" size="24" maxlength="24" style="width:300px;height:35px;font-size:12px;padding:15px" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac12">';
			      	$vista.='<p><label for="saldo">Saldo : </label>';
			      	$vista.='<input type="text" id="saldo" size="12" maxlength="12" style="width:150px;height:35px;font-size:12px;padding:15px" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac13">';
			      	$vista.='<p><label for="ventas">Ventas: </label>';
			      	$vista.='<input type="text" id="ventas" size="12" maxlength="12" style="width:150px;height:35px;font-size:12px;padding:15px" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/></p>';
		      	$vista.='</div>';
		     $vista.='<div>';
		     if ($operacion=="alta"){
			 $vista.='<input type="button" class="btn btn-success upload" id="botonGrabar" value="Validar Alta" onclick="agregarCliente()" style="margin-left:450px;">';
			 	}
			 if ($operacion=="edicion") {
			 $vista.='<input type="button" class="btn btn-success upload" id="botonGrabar" value="Actualizar Cambios" onclick="actualizarCliente()" style="margin-left:450px;">';
			 } 
			  if ($operacion=="consulta"){
			 $vista.='<input type="button" class="btn btn-success upload" id="botonGrabar" value="CONSULTA" disabled style="margin-left:450px;">';
			 	}
			$vista.='</div>';  
			$vista.='</form>';
		    echo $vista;
	}

		if($actualizar_cliente=="si") {
	
				$resultado=mysqli_query($con, "UPDATE clientes SET CLI_NIF = '$nifAc', CLI_RAZON = '$razonAc', CLI_NOMBRE ='$nombreAc', CLI_DIRECCION = '$direccionAc', CLI_TELEFONO = '$telefonoAc', CLI_CORREO = '$correoAc', CLI_TIPO_TARIFA = '$tarifaAc', CLI_TIPO_PAGO = '$formaAc', CLI_LIMITE_RIESGO = '$limiteAc', CLI_BANCO_IBAN = '$bancoAc'  WHERE CLI_CODIGO = '$codigo_actualizar'");
				if ($resultado) {
					echo "correcto". mysqli_affected_rows($con);
				} else { 
					echo "No correcto". mysqli_error($con);
				}
				mysqli_close($con); 
			}
				if($borrar_cli=="si"){
				$resultado=mysqli_query($con, "DELETE FROM clientes WHERE CLI_CODIGO = $codigo_borrar");
				if ($resultado){
					echo " eliminado: ". mysqli_affected_rows($con);
				} else echo "error";
				mysqli_close($con);
	} 

		
		if($alta=="si") {

				$cero_uno=0;
				$cero_dos=0;

				$resultado = mysqli_query($con, "INSERT INTO clientes (CLI_CODIGO, CLI_NIF, CLI_RAZON, CLI_NOMBRE, CLI_DIRECCION, CLI_TELEFONO, CLI_CORREO, CLI_TIPO_TARIFA, CLI_TIPO_PAGO, CLI_LIMITE_RIESGO, CLI_BANCO_IBAN, CLI_SALDO, CLI_VENTAS) VALUES ('$n_codigo', '$n_nif', '$n_razon', '$n_nombre', '$n_direccion', '$n_telefono', '$n_correo', '$n_tarifa', '$n_forma', '$n_limite', '$n_banco', '$cero_uno', '$cero_dos')");

				if ($resultado) {
					echo "correcto ". mysqli_affected_rows($con)." registros";
				} else {echo "error " . mysqli_error($con);}

				mysqli_close($con);
	} 

	if ($buscacliente=="si") {


		$resultado = mysqli_query($con, "SELECT CLI_CODIGO, CLI_NOMBRE FROM clientes WHERE CLI_CODIGO = '$codigo_buscar'");
			
		if ($resultado) { 

			$fila = mysqli_fetch_assoc($resultado);

			if (mysqli_num_rows($resultado)> 0) {
				
					echo $fila['CLI_NOMBRE'];
				} 

			  else {
			  		 echo "INEXISTENTE";
					}

		} else echo "INEXISTENTE"." ".mysqli_error($con);											   

		mysqli_close($con); 

	}

	

?>


