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
	$stocks="";
	$desde_codigo="";
	$desde_almacen="";
	$busca_almacen="";
	$id_almacen="";
	$limite=0;
	$saldo=0;
	$busca_codigo="";
	$id_codigo="";
	$busca_stock="";
	$ubi_calleAc="";
 	$ubi_pasilloAc="";
 	$ubi_numeroAc="";
 	$minimoAc="";
 	$p_pedidoAc="";
 	$codigoAc="";
 	$almacenAc="";
 	$actualizar_stock="";
 	$borrar_stock="";


	if (isset($_GET['actualizar_stock'])) {

		$actualizar_stock=$_GET['actualizar_stock'];
		$ubi_calleAc=$_GET['ubi_calleAc'];;
 		$ubi_pasilloAc=$_GET['ubi_pasilloAc'];
 		$ubi_numeroAc=$_GET['ubi_numeroAc'];
 		$minimoAc=$_GET['minimoAc'];
 		$p_pedidoAc=$_GET['p_pedidoAc'];
 		$codigoAc=$_GET['codigoAc'];
 		$almacenAc=$_GET['almacenAc'];
		
	}

	if (isset($_GET['busca_almacen'])) {
		$busca_almacen = $_GET['busca_almacen'];
		$id_almacen= $_GET['id_almacen'];
		}

	if (isset($_GET['busca_codigo'])) {
		$busca_codigo = $_GET['busca_codigo'];
		$id_codigo= $_GET['id_codigo'];
		}

	if (isset($_GET['busca_stock'])) {
		$busca_stock = $_GET['busca_stock'];
		$id_codigo= $_GET['id_codigo'];
		$id_almacen= $_GET['id_almacen'];
		}

	if (isset($_GET['formulario'])) {
		$formulario = $_GET['formulario'];
		$operacion =$_GET['operacion'];
		}


	if (isset($_GET['stocks'])) {
		$stocks=$_GET['stocks'];
		$desde_codigo = $_GET['desdecodigo'];
		$pagina=$_GET['pagina'];
		$num_paginas=$_GET['num_paginas'];
		$desdecodigo=$_GET['desdecodigo'];
		$desde_almacen=$_GET['desdealmacen'];
		}


	if (isset($_GET['acontar'])) {
		$acontar="si";
		$desdecodigo=$_GET['desdecodigo'];
		$desde_almacen=$_GET['desdealmacen'];
		} else {
			$acontar="no";
		}
	
	if (isset($_GET['alta'])) {

		$alta=$_GET['alta'];
		$n_codigo=$_GET['n_codigo'];
		$n_almacen=$_GET['n_almacen'];
		$n_existencias=$_GET['n_existencias'];
		$n_ubi_calle=$_GET['n_ubi_calle'];
		$n_ubi_pasillo=$_GET['n_ubi_pasillo'];
		$n_ubi_numero=$_GET['n_ubi_numero'];
		$n_minimo=$_GET['n_minimo'];
		$n_p_pedido=$_GET['n_p_pedido'];
		$n_faltas=$_GET['n_faltas'];
		$n_entradas=$_GET['n_entradas'];
		$n_salidas=$_GET['n_salidas'];
	}

	if (isset($_GET['borrar_stock'])) {
		$borrar_stock=$_GET['borrar_stock'];
		$id_almacen=$_GET['id_almacen'];
		$id_codigo=$_GET['id_codigo'];
	 	}


	$almacen = "STOCKS_ALMACEN";
	$codigo="STOCKS_CODIGO";
	$existencias="STOCKS_EXISTENCIAS";
	$minimo = "STOCKS_MINIMO";
	$punto_pedido="STOCKS_PUNTO_PEDIDO";
	$faltas="STOCKS_FALTAS";
	$calle="STOCKS_UBI_CALLE";
	$pasillo="STOCKS_UBI_PASILLO";
	$numero="STOCKS_UBI_NUMERO";
	$entradas="STOCKS_UNI_ENTRADA";
	$salidas="STOCKS_UNI_SALIDA";	
	$ubicacion="UBICACION";
	$descripcion="PRE_DESCRIPCION";
	$actualizar ="ACTUALIZAR";
	$borrar = "BORRAR";
	$tamanio=12;

	
	if ($acontar=="si") {

		$resultado = mysqli_query($con, "SELECT * FROM stocks WHERE STOCKS_CODIGO >= '$desde_codigo' AND STOCKS_ALMACEN >= '$desde_almacen' ORDER BY STOCKS_ALMACEN, STOCKS_CODIGO ");
		$num_filas = mysqli_num_rows($resultado);
		echo $num_filas;

	}


	if($stocks==="si") {

			$msg="";
			$desde=(($pagina-1)*$tamanio);

		 	$resultado = mysqli_query($con, "SELECT STOCKS_ALMACEN, STOCKS_CODIGO, STOCKS_EXISTENCIAS, STOCKS_FALTAS, STOCKS_MINIMO, STOCKS_PUNTO_PEDIDO, STOCKS_UBI_CALLE, STOCKS_UBI_PASILLO, STOCKS_UBI_NUMERO, STOCKS_UNI_ENTRADA, STOCKS_UNI_SALIDA, PRE_CODIGO, PRE_DESCRIPCION
		 		 FROM stocks
		 		 LEFT JOIN precios ON PRE_CODIGO = STOCKS_CODIGO
		 		 WHERE STOCKS_CODIGO >= '$desde_codigo' AND STOCKS_ALMACEN >= '$desde_almacen' 
		 		 ORDER BY STOCKS_ALMACEN, STOCKS_CODIGO 
		 		 LIMIT $desde,$tamanio ");
 
			$table = '<div class = "container">';
			$table .=  '<table class = "table table-striped table-hover table-condensed table-responsive">';
			$table .= '<tr>';
			$table .= '<th class="col-sm-0">ALMACEN</th>';
			$table .= '<th class="col-sm-0">CODIGO</th>';
			$table .= '<th class="col-sm-0">DESCRIPCION</th>';
			$table .= '<th class="col-sm-0">EXISTENCIAS</th>';
			$table .= '<th class="col-sm-0">UBICACION_(C_P_N)</th>';
			$table .= '<th class="col-sm-0">MINIMO</th>';
			$table .= '<th class="col-sm-0">P_PEDIDO</th>';
			$table .= '<th class="col-sm-0">FALTAS</th>';
			$table .= '<th class="col-sm-0">ENTRADAS</th>';
			$table .= '<th class="col-sm-0">SALIDAS</th>';

			$table .= '</tr>';

			if ($resultado) { 

				while ($fila = mysqli_fetch_assoc($resultado)) {

			$table .= '<tr>';
			$table .= '<td id="'.$almacen.$fila['STOCKS_ALMACEN'].$fila['STOCKS_CODIGO'] .'">' . $fila['STOCKS_ALMACEN'] . '</td>';
			$table .= '<td id="'.$codigo.$fila['STOCKS_ALMACEN'].$fila['STOCKS_CODIGO'].'">' . $fila['STOCKS_CODIGO'] . '</td>';
			$table .= '<td id="'.$descripcion.$fila['STOCKS_ALMACEN'].$fila['STOCKS_CODIGO'].'" style="white-space:nowrap">' . $fila['PRE_DESCRIPCION'] . '</td>';
			$table .= '<td id="'.$existencias.$fila['STOCKS_ALMACEN'].$fila['STOCKS_CODIGO'].'" style="white-space:nowrap">' . $fila['STOCKS_EXISTENCIAS'] . '</td>';
			$table .= '<td id="'.$ubicacion.$fila['STOCKS_ALMACEN'].$fila['STOCKS_CODIGO'].'" style="white-space:nowrap">' .$fila['STOCKS_UBI_CALLE']."-".$fila['STOCKS_UBI_PASILLO']."-".$fila['STOCKS_UBI_NUMERO'] .'</td>';
			$table .= '<td id="'.$minimo.$fila['STOCKS_ALMACEN'].$fila['STOCKS_CODIGO'].'" style="white-space:nowrap">' .$fila['STOCKS_MINIMO']. '</td>';
			$table .= '<td id="'.$punto_pedido.$fila['STOCKS_ALMACEN'].$fila['STOCKS_CODIGO'].'" style="white-space:nowrap">'  .$fila['STOCKS_PUNTO_PEDIDO']. '</td>';
			$table .= '<td id="'.$faltas.$fila['STOCKS_ALMACEN'].$fila['STOCKS_CODIGO'].'" style="white-space:nowrap">' .$fila['STOCKS_FALTAS']. '</td>';
			$table .= '<td id="'.$entradas.$fila['STOCKS_ALMACEN'].$fila['STOCKS_CODIGO'].'" style="white-space:nowrap">' .$fila['STOCKS_UNI_ENTRADA']. '</td>';
			$table .= '<td id="'.$salidas.$fila['STOCKS_ALMACEN'].$fila['STOCKS_CODIGO'].'" style="white-space:nowrap">' .$fila['STOCKS_UNI_SALIDA']. '</td>';
			$table .= '<td><input id="'.$fila['STOCKS_ALMACEN'].$fila['STOCKS_CODIGO'].'" onclick="editarStocks(this.id)" type = "button" value ="Editar" class = "btn btn-success"></td>';
			$comi="'";
			$table .= '<td><input  id="'.$borrar.$fila['STOCKS_ALMACEN'].$fila['STOCKS_CODIGO'].'" onclick = "borrarStocks('.$comi.$fila['STOCKS_ALMACEN'].$comi.','.$comi.$fila['STOCKS_CODIGO'].$comi.')" type = "button" value ="Borrar" class = "btn btn-danger"></td>';

			$table .= '<td><input id="'.$actualizar.$fila['STOCKS_ALMACEN'].$fila['STOCKS_CODIGO'].'" onclick = "actualizarStock('.$fila['STOCKS_ALMACEN'].$fila['STOCKS_CODIGO'].')" type = "button" value ="Actualizar" class = "btn btn-primary" style="display:none;"></td>';
 			$table .= '</tr>';
			}

		$table.= '</table>';
		$table.= '<button onclick="ejecutarNuevaVentana()" class="btn btn-primary">Agregar Stock</button>';
		$table.="<br>";

		$table.="<h4>Mostrar Página:<span id='mostrandopagina'> </span> .'Desde Almacen: ".$desde_almacen . "  Desde código : ".$desdecodigo."</h4>";
		$table.="<button class='botones' onclick="."'retrocedoPagina()'>"."<"."</button>";
		$eligepagina="1-".$num_paginas;
		$table.=' Pagina: <input type="text" id="eligepagina" size="3" maxlength="3" placeholder="'.$eligepagina.'">';
		$table.="<button class='botones' onclick="."'iraPagina()'>"."Ir"."</button>";
		$table.="<button  class='botones' onclick="."'avanzoPagina()'>".">"."</button>";
		$table.='Desde almacen:<input type="text" id="desdealmacen" size="3" maxlength="3">';
		$table.='Desde codigo:<input type="text" id="desdecodigo" size="12" maxlength="12">';
		$table.="<button class='botones' onclick="."'desdeCodigo()'>"."Ir"."</button>";
	} else { $msg= "error". mysqli_error($con);
			}
		echo $table." ".$msg;
		mysqli_close($con);

	} 


	if ($formulario=="si") {

			$vista="<div>";
				$vista.'<form>';
			 
		      	$vista.='<div id="divac0">';
		      	$vista.='<p><label for="almacen" padding="15px">Código Almacen : </label>';
			      	$vista.='<input type="text" id="almacen" size="12" maxlength="12" onfocus="colorTexto(this.id)""   onblur="noFoco(this.id)" style="width:110px;height:35px;padding:15px"/>
			      		<input type="text" id="nom_almacen" size="12" maxlength="12" onfocus="colorTexto(this.id)""   onblur="noFoco(this.id)" style="width:300px;height:35px;padding:15px" readonly="readonly"/></p>';
		      	$vista.='</div>';
			    $vista.='<p><label for="codigo" padding="15px">Código Artículo : </label>';
			    $vista.='<input type="text" id="codigo" size="12" maxlength="12" onfocus="colorTexto(this.id)""   onblur="noFoco(this.id)" style="width:160px;height:35px;padding:15px"/>';
			    $vista.='<input type="text" id="descripcion" size="10" maxlength="10"  style="width:300px;height:35px;font-size:12px;padding:15px" onfocus="colorTexto(this.id)"  onblur="noFoco(this.id)" readonly="readonly"/></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac3">';
			      	$vista.='<p><label for="existencias">Existencias: </label>';
			      	$vista.='<input type="text" id="existencias" size="10" maxlength="10"  style="width:100px;height:35px;font-size:12px;padding:5px" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)" readonly="readonly"/></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac4">';
			      	$vista.='<p><label for="ubi_calle">Ubicacion : </label>';
			      	$vista.='<input type="text" id="ubi_calle" size="3" maxlength="3"  style="width:40px;height:35px;font-size:12px;padding:5px" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/>';
			      	$vista.='<input type="text" id="ubi_pasillo" size="3" maxlength="3" style="width:40px;height:35px;font-size:12px;padding:5px" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/>';
			      	$vista.='<input type="text" id="ubi_numero" size="3" maxlength="3" style="width:40px;height:35px;font-size:12px;padding:5px" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/>  Calle/Pasillo/Número </p>';
		      	$vista.='</div>';

		      	$vista.='<div id="divac7">';
			      	$vista.='<p><label for="minimo">Exis. Minima: </label>';
			      	$vista.='<input type="text" id="minimo" size="10" maxlength="30" style="width:100px;height:35px;font-size:12px;padding:15px" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac8">';
			      	$vista.='<p><label for="p_pedido">Punto Pedido: </label>';
			      	$vista.='<input type="text" id="p_pedido" size="10" maxlength="30" style="width:100px;height:35px;font-size:12px;padding:15px" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/></p>';
		      	$vista.='</div>';
		    	$vista.='<div id="divac9">';
			    $vista.='<p><label for="faltas">Faltas: </label>';
			    $vista.='<input type="text" id="faltas" size="10" maxlength="30" style="width:100px;height:35px;font-size:12px;padding:15px" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/ readonly="readonly"></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac10">';
			    $vista.='<p><label for="entradas">Entradas: </label>';
			    $vista.='<input type="text" id="entradas" size="10" maxlength="30" style="width:100px;height:35px;font-size:12px;padding:15px" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/ readonly="readonly"></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac11">';
			    $vista.='<p><label for="salidas">Salidas: </label>';
			    $vista.='<input type="text" id="salidas" size="10" maxlength="30" style="width:100px;height:35px;font-size:12px;padding:15px" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/ readonly="readonly"></p>';

		      	$vista.='</div>';
		     $vista.='<div>';
		     if ($operacion=="alta"){
			 $vista.='<input type="button" class="btn btn-success upload" id="botonGrabar" value="Validar Alta" onclick="agregarStocks()" style="margin-left:450px;">';
			 	}
			 if ($operacion=="edicion") {
			 $vista.='<input type="button" class="btn btn-success upload" id="botonGrabar" value="Actualizar Cambios" onclick="actualizarStocks()" style="margin-left:450px;">';
			 } 
			  if ($operacion=="consulta"){
			 $vista.='<input type="button" class="btn btn-success upload" id="botonGrabar" value="CONSULTA" disabled style="margin-left:450px;">';
			 	}
			$vista.='</div>';  
			$vista.='</form>';
		    echo $vista;
	}

		if($actualizar_stock=="si") {
	
				$resultado=mysqli_query($con, "UPDATE stocks SET STOCKS_MINIMO = '$minimoAc', STOCKS_PUNTO_PEDIDO = '$p_pedidoAc', STOCKS_UBI_CALLE = '$ubi_calleAc', STOCKS_UBI_PASILLO = '$ubi_pasilloAc', STOCKS_UBI_NUMERO = '$ubi_numeroAc'  WHERE STOCKS_CODIGO = '$codigoAc' AND STOCKS_ALMACEN = '$almacenAc'");

				if ($resultado) {
					echo "correcto". mysqli_affected_rows($con);
				} else { 
					echo "No correcto". mysqli_error($con);
				}
				mysqli_close($con); 
			}

		if($borrar_stock=="si"){
				$resultado=mysqli_query($con, "DELETE FROM stocks WHERE STOCKS_ALMACEN = '$id_almacen' AND STOCKS_CODIGO = '$id_codigo'");

				if ($resultado){
					echo " eliminado: ". mysqli_affected_rows($con);
				} else echo "error";
				mysqli_close($con);
	} 

		
		if($alta=="si") {


			$resultado = mysqli_query($con, "INSERT INTO stocks (STOCKS_ALMACEN, STOCKS_CODIGO, STOCKS_EXISTENCIAS, STOCKS_MINIMO, STOCKS_PUNTO_PEDIDO, STOCKS_FALTAS, STOCKS_UBI_CALLE, STOCKS_UBI_PASILLO, STOCKS_UBI_NUMERO, STOCKS_UNI_ENTRADA, STOCKS_UNI_SALIDA) VALUES ('$n_almacen','$n_codigo','$n_existencias', '$n_minimo', '$n_p_pedido', '$n_faltas', '$n_ubi_calle', '$n_ubi_pasillo', '$n_ubi_numero', '$n_entradas', '$n_salidas')");

				if ($resultado) {
					echo "correcto ". mysqli_affected_rows($con)." registros";
				} else {echo "error " . mysqli_error($con);}

				mysqli_close($con);
	} 

	if ($busca_almacen=="si") {


		$resultado = mysqli_query($con, "SELECT SEDE_CODIGO, SEDE_NOMBRE FROM sedes WHERE SEDE_CODIGO = '$id_almacen'");
			
		if ($resultado) { 

			$fila = mysqli_fetch_assoc($resultado);

			if (mysqli_num_rows($resultado)> 0) {
				
					echo $fila['SEDE_NOMBRE'];
				} 

			  else {
			  		 echo "INEXISTENTE";
					}

		} else echo "INEXISTENTE"." ".mysqli_error($con);											   

		mysqli_close($con); 

	}

	if ($busca_codigo=="si") {


		$resultado = mysqli_query($con, "SELECT PRE_CODIGO, PRE_DESCRIPCION FROM precios WHERE PRE_CODIGO = '$id_codigo'");
			
		if ($resultado) { 

			$fila = mysqli_fetch_assoc($resultado);

			if (mysqli_num_rows($resultado)> 0) {
				
					echo $fila['PRE_DESCRIPCION'];
				} 

			  else {
			  		 echo "INEXISTENTE";
					}

		} else echo "INEXISTENTE"." ".mysqli_error($con);											   

		mysqli_close($con); 

	}

	if ($busca_stock=="si") {
		$resultado = mysqli_query($con, "SELECT STOCKS_ALMACEN, STOCKS_CODIGO FROM stocks WHERE STOCKS_ALMACEN = '$id_almacen' AND STOCKS_CODIGO = '$id_codigo'");
		if ($resultado) { 
			$fila = mysqli_fetch_assoc($resultado);
			if (mysqli_num_rows($resultado)> 0) {
					echo "YA EXISTE";
				} 
			  else {
			  		 echo "INEXISTENTE";
					}
		} else echo "INEXISTENTE"." ".mysqli_error($con);											   
		mysqli_close($con); 
	}
?>


