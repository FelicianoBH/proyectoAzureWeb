<?php 
	session_start();
	require "conexion.php";
 
	$sedes="";

	$acontar_precios="";
	$acontar_historico="";
	$pagina=0;
	$num_paginas=0;
	$desde=0;
	$fechaHoy=0;
	$desdecodigo="";
	$desdealmacen="";
	$cambiar_responsable="";
	$responsable_buscar="";
	$busca_responsable="";
	$actualizar="";
	$actualizar_sede="";
	$crear_sede="";
	$sede_buscar="";
	$buscar_sede="";

	$busca_almacen="";
	$busca_articulo="";
	$id_articulo="";
	$graba_historico="";
	$almacen="";
	$unidades="";
	$documento="";
	$leer_ref="";
	$fecha;
	$orden=0;
	$graba_stocks="";
	$graba_ref="";
	$precio="";
	$precios="";
	$historico="";
	$busca_precio="";
	$alta_stock="";
	$id_almacen="";
	$acontar_sedes="";
	$formulario="";
	$actualizar_compra="";
	$almacen_ac="";
	$codigo_ac="";
	$fecha_ac="";
	$orden_ac="";
	$unidades_ac="";
	$precio_ac="";
	$actualiza_stocks="";
	$actualiza_stocks_borrar="";
	$borrar_compra="";
	$existencia_anterior="";

	if (isset($_GET['actualiza_stocks'])) {

		$actualiza_stocks=$_GET['actualiza_stocks'];
		$almacen_ac=$_GET['id_almacen'];
		$codigo_ac=$_GET['codigo'];
		$unidades_antes=$_GET['unidades_antes'];
		$unidades_despues=$_GET['unidades_despues'];
	}

	if (isset($_GET['actualiza_stocks_borrar'])) {

		$actualiza_stocks_borrar=$_GET['actualiza_stocks_borrar'];
		$almacen_ac=$_GET['id_almacen'];
		$codigo_ac=$_GET['codigo'];
		$unidades_antes=$_GET['unidades_antes'];
	}

	if (isset($_GET['actualizar_compra'])) {

		$actualizar_compra=$_GET['actualizar_compra'];
		$almacen_ac=$_GET['almacen_ac'];
		$codigo_ac=$_GET['codigo_ac'];
		$fecha_ac=$_GET['fecha_ac'];
		$orden_ac=$_GET['orden_ac'];
		$documento_ac=$_GET['documento_ac'];
		$unidades_ac=$_GET['unidades_ac'];
		$precio_ac=$_GET['precio_ac'];
	}
	if (isset($_GET['borrar_compra'])) {

		$borrar_compra=$_GET['borrar_compra'];
		$almacen_ac=$_GET['almacen_ac'];
		$codigo_ac=$_GET['codigo_ac'];
		$fecha_ac=$_GET['fecha_ac'];
		$orden_ac=$_GET['orden_ac'];
	}

	if (isset($_GET['alta_stock'])) {

		$alta_stock=$_GET['alta_stock'];
		$id_almacen=$_GET['id_almacen'];
		$id_articulo=$_GET['id_articulo'];
		
	}
	if (isset($_GET['formulario'])) {

		$formulario=$_GET['formulario'];

	}

	if (isset($_GET['leer_ref'])) {

		$leer_ref=$_GET['leer_ref'];

	}
	if (isset($_GET['graba_ref'])) {

		$graba_ref=$_GET['graba_ref'];

	}

	if (isset($_GET['graba_historico'])) {

		$graba_historico=$_GET['graba_historico'];
		$almacen=$_GET['id_almacen'];
		$unidades=$_GET['unidades'];
		$precio=$_GET['precio'];
		$documento=$_GET['documento'];
		$id_articulo=$_GET['codigo'];
		$fecha=$_GET['fecha'];
		$orden=$_GET['orden'];
		$existencia_anterior=$_GET['existencia'];
	}

	if (isset($_GET['graba_stocks'])) {

		$graba_stocks=$_GET['graba_stocks'];
		$almacen=$_GET['id_almacen'];
		$unidades=$_GET['unidades'];
		$id_articulo=$_GET['codigo'];
		
	}

	if (isset($_GET['busca_almacen'])) {

		$busca_almacen=$_GET['busca_almacen'];
		$id_almacen=$_GET['id_almacen'];
	}

	if (isset($_GET['busca_precio'])) {

		$busca_precio=$_GET['busca_precio'];
		$id_articulo=$_GET['id_articulo'];
	}

	if (isset($_GET['busca_articulo'])) {

		$busca_articulo=$_GET['busca_articulo'];
		$id_articulo=$_GET['id_articulo'];
		$id_almacen=$_GET['id_almacen'];
	}

	if (isset($_GET['actualizar']))  {

		$actualizar_sede=$_GET['actualizar'];
		$codigoAc=$_GET['codigoAc'];
		$nombreAc=$_GET['nombreAc'];
		$descripcionAc=$_GET['descripcionAc'];
		$direccionAc=$_GET['direccionAc'];
		$telefonoAc=$_GET['telefonoAc'];
		$id_responsableAc=$_GET['id_responsableAc'];
		$plan_ventasAc=$_GET['plan_ventasAc'];
		$ventas_realizadasAc=$_GET['ventas_realizadasAc'];
	}

	if (isset($_GET['busca_responsable']))  {

		$busca_responsable=$_GET['busca_responsable'];
		$responsable_buscar=$_GET['responsable_buscar'];
	}

	if (isset($_GET['cambiar_responsable']))  {

		$cambiar_responsable=$_GET['cambiar_responsable'];

	}

	if (isset($_GET['sedes'])) {
		$sedes = $_GET['sedes'];
		$pagina=$_GET['pagina'];
		$num_paginas=$_GET['num_paginas'];
		$desdecodigo=$_GET['desdecodigo'];
		}

	if (isset($_GET['precios'])) {
		$precios = $_GET['precios'];
		$pagina=$_GET['pagina'];
		$num_paginas=$_GET['num_paginas'];
		$desdecodigo=$_GET['desdecodigo'];
		}
	if (isset($_GET['historico'])) {
		$historico = $_GET['historico'];
		$pagina=$_GET['pagina'];
		$num_paginas=$_GET['num_paginas'];
		}
	if (isset($_GET['acontar_sedes'])) {

		$acontar_sedes="si";

		} 

	if (isset($_GET['acontar_precios'])) {

		$acontar_precios="si";

		} 
	if (isset($_GET['acontar_historico'])) {

		$acontar_historico="si";

		}
	if (isset($_GET['crear_sede'])) {

		$crear_sede=$_GET['crear_sede'];

	}
	

	$sede_codigo = "SEDE_CODIGO";
	$sede_nombre = "SEDE_NOMBRE";
	$sede_descripcion = "SEDE_DESCRIPCION";
	$tamanio=10;
	$pre_codigo = "PRE_CODIGO";
	$descripcion = "PRE_DESCRIPCION";
	$borrar = "BORRAR";
	$actualizar="ACTUALIZAR";

	$halmacen="HIS_ALMACEN";
	$hcodigo="HIS_CODIGO";
	$hfecha="HIS_FECHA";
	$horden="HIS_ORDEN";
	$hdocumento="HIS_DOCUMENTO";
	$halmacen_contra="HIS_ALMACEN_CONTRA";
	$hunidades="HIS_UNIDADES";
	$hprecio="HIS_PRECIO";
	$htipo="HIS_TIPO_MOVIMIENTO";
	$hdescripcion="PRE_DESCRIPCION";

	if($leer_ref=="si") {

			$user=$_SESSION["usuario"];

			$id_usuario=$_SESSION["id_usuario"];

			$query="SELECT FECHA_CONTABLE, ORDEN FROM referencias WHERE ID_USUARIO = '$id_usuario'";

			$resultado = mysqli_query($con, $query);

			if (mysqli_num_rows($resultado)> 0) {

			$fila = mysqli_fetch_assoc($resultado);
			
					$datos_ref= new stdClass();
					$datos_ref->fechaRef_ed=date('d/m/Y',strtotime($fila['FECHA_CONTABLE']));
					$datos_ref->fechaRef=$fila['FECHA_CONTABLE'];
					$datos_ref->ordenRef=$fila['ORDEN'];
					$json=json_encode($datos_ref);
					echo $json;

			} else {

					echo "INEXISTENTE";
					} 
		}

	if ($acontar_precios=="si") {

		$resultado = mysqli_query($con, "SELECT * FROM precios");
		$num_filas = mysqli_num_rows($resultado);
		echo $num_filas;
	}

	if ($acontar_historico=="si") {

		$resultado = mysqli_query($con, "SELECT * FROM historico WHERE HIS_CODIGO >= '$desdecodigo' AND HIS_CODIGO >= '$desdealmacen' AND SUBSTRING(HIS_TIPO_MOVIMIENTO, 1, 8) = 'TRASLADO'");

		if ($resultado) { echo mysqli_num_rows($resultado); } 
		else {echo mysqli_error($con);}
	}

	if ($historico=="si") {
			
			$desde=(($pagina-1)*$tamanio);

		 	$resultado = mysqli_query($con, "SELECT  HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_PRECIO, HIS_TIPO_MOVIMIENTO, PRE_CODIGO, PRE_DESCRIPCION
		 		 FROM historico 
		 		 LEFT JOIN precios ON HIS_CODIGO = PRE_CODIGO
		 		 WHERE HIS_CODIGO >= '$desdecodigo' AND HIS_CODIGO >= '$desdealmacen' AND SUBSTRING(HIS_TIPO_MOVIMIENTO, 1, 7) = 'COMPRAS'
		 		 ORDER BY HIS_ORDEN DESC LIMIT $desde,$tamanio ");
 
			$table = '<div class = "container">';
			$table .=  '<table class = "table table-striped table-hover table-bordered table-condensed table-responsive">';
			$table .= '<tr>';
			$table .= '<th class="col-sm-0">ALMACEN</th>';
			$table .= '<th class="col-sm-0">CODIGO</th>';
			$table .= '<th class="col-sm-0">DESCRIPCION</th>';
			$table .= '<th class="col-sm-0">FECHA</th>';
			$table .= '<th class="col-sm-0">ORDEN</th>';
			$table .= '<th class="col-sm-0">DOCUMENTO</th>';
			$table .= '<th class="col-sm-0">UNIDADES</th>';
			$table .= '<th class="col-sm-0">PRECIO</th>';
			$table .= '<th class="col-sm-0">TIPO </th>';
			$table .= '</tr>';

			if ($resultado) { 

				while ($fila = mysqli_fetch_assoc($resultado)) {

					$table .= '<tr>';
					$codigo_linea=$fila['HIS_CODIGO'].$fila['HIS_ALMACEN'].$fila['HIS_FECHA'].$fila['HIS_ORDEN'];
					$table .= '<td id="'.$halmacen.$codigo_linea.'">' . $fila['HIS_ALMACEN'] . '</td>';
					$table .= '<td id="'.$hcodigo.$codigo_linea.'">' . $fila['HIS_CODIGO'] . '</td>';
					$table .= '<td id="'.$hdescripcion.$codigo_linea.'" style="white-space:nowrap">' . htmlentities($fila['PRE_DESCRIPCION']) . '</td>';
					$table .= '<td id="'.$hfecha.$codigo_linea.'">' . $fila['HIS_FECHA'] . '</td>';
					$table .= '<td id="'.$horden.$codigo_linea.'">' . $fila['HIS_ORDEN'] . '</td>';
					$table .= '<td id="'.$hdocumento.$codigo_linea.'">' . $fila['HIS_DOCUMENTO'] . '</td>';
					$table .= '<td id="'.$hunidades.$codigo_linea.'">' . $fila['HIS_UNIDADES'] . '</td>';
					$table .= '<td id="'.$hprecio.$codigo_linea.'">' . $fila['HIS_PRECIO'] . '</td>';
					$table .= '<td id="'.$htipo.$codigo_linea.'">' . $fila['HIS_TIPO_MOVIMIENTO'] . '</td>';
					//$table .= '<td><input id="'.$codigo_linea.'" onclick="editarCompra(this.id)" type = "button" value ="Editar" class = "btn btn-success"></td>';
			//$table .= '<td><input  id="'.$codigo_linea.'" onclick="borrarCompra(this.id)"  type = "button" value ="Borrar" class = "btn btn-danger"></td>';

		 			$table .= '</tr>';
				}

				$table.= '</table>';
				$table.="<button class='botones' onclick="."'retrocedoPaginaHistorico()'>"."<"."</button>";
				$eligepagina="1-".$num_paginas;
				$table.=' Pagina: <input type="text" id="eligepagina" size="3" maxlength="3" placeholder="'.$eligepagina.'">';
				$table.="<button class='botones' onclick="."'iraPaginaHistorico()'>"."Ir"."</button>";
				$table.="<button  class='botones' onclick="."'avanzoPaginaHistorico()'>".">"."</button>";
			
		} else { echo "error". mysqli_error($con);
					}
				echo $table;
				mysqli_close($con);
	} 

	if ($precios==="si") {
			
			$desde=(($pagina-1)*$tamanio);

		 	$resultado = mysqli_query($con, "SELECT  PRE_CODIGO, PRE_DESCRIPCION
		 		 FROM precios WHERE PRE_CODIGO >= '$desdecodigo' LIMIT $desde,$tamanio ");
 
			$table = '<div class = "container">';
			$table .=  '<table class = "table table-striped table-hover table-condensed table-responsive">';
			$table .= '<tr>';
			$table .= '<th class="col-sm-0">CODIGO</th>';
			$table .= '<th class="col-sm-0">DESCRIPCION</th>';
			$table .= '<th class="col-sm-0">Seleccionar</th>';
			$table .= '</tr>';

			if ($resultado) { 

				while ($fila = mysqli_fetch_assoc($resultado)) {

					$table .= '<tr>';
					$table .= '<td id="'.$pre_codigo.$fila['PRE_CODIGO'].'">' . $fila['PRE_CODIGO'] . '</td>';
					$table .= '<td id="'.$descripcion.$fila['PRE_CODIGO'].'" style="white-space:nowrap">' . htmlentities($fila['PRE_DESCRIPCION']) . '</td>';
					$coma="'";
					$table .= '<td><input  onclick="seleccionarPrecio('.$coma.$fila['PRE_CODIGO'].$coma.')" type = "button" value ="Seleccionar" class = "btn btn-success" ></td>'; 

		 			$table .= '</tr>';
				}

				$table.= '</table>';
				$table.="<h4>Mostrar Página:<span id='mostrandopagina'> </span> .' Desde código : ".$desdecodigo."</h4>";
				$table.="<button class='botones' onclick="."'retrocedoPaginaPrecios()'>"."<"."</button>";
				$eligepagina="1-".$num_paginas;
				$table.=' Pagina: <input type="text" id="eligepagina" size="3" maxlength="3" placeholder="'.$eligepagina.'">';
				$table.="<button class='botones' onclick="."'iraPaginaPrecios()'>"."Ir"."</button>";
				$table.="<button  class='botones' onclick="."'avanzoPaginaPrecios()'>".">"."</button>";
				

		} else { echo "error". mysqli_error($con);
					}
				echo $table;
				mysqli_close($con);

	} 

	if ($acontar_sedes=="si") {

		$resultado = mysqli_query($con, "SELECT * FROM sedes");
		$num_filas = mysqli_num_rows($resultado);
		echo $num_filas;

	}

	if ($sedes==="si") {
			
			$desde=(($pagina-1)*$tamanio);

		 	$resultado = mysqli_query($con, "SELECT SEDE_CODIGO, SEDE_NOMBRE, SEDE_DESCRIPCION, SEDE_DIRECCION, SEDE_TELEFONO, SEDE_COD_RESPONSABLE, SEDE_PLAN_VENTAS, SEDE_VENTAS_REALIZADAS, EMP_NOMBRE  FROM sedes
		 		 LEFT JOIN empleado ON SEDE_COD_RESPONSABLE = EMP_CODIGO 
		 		 WHERE SEDE_CODIGO >= '$desdecodigo'  
		 		 ORDER BY SEDE_CODIGO LIMIT $desde, $tamanio");


			$table = '<div class = "container">';
			$table .=  '<table class = "table table-striped table-hover table-condensed table-responsive">';
			$table .= '<tr>';
			$table .= '<th class="col-sm-0">Codigo</th>';
			$table .= '<th class="col-sm-4">Nombre</th>';
			$table .= '<th class="col-sm-4">Descripcion</th>';
			$table .= '<th class="col-sm-0">Seleccionar</th>';
			$table .= '</tr>';

			$mensaje="";
			if ($resultado)  {
				while ($fila = mysqli_fetch_assoc($resultado)) {
			

			$table .= '<tr>';
			$table .= '<td id="'.$sede_codigo.$fila['SEDE_CODIGO'].'">' . $fila['SEDE_CODIGO'] . '</td>';
			$table .= '<td id="'.$sede_nombre.$fila['SEDE_CODIGO'].'" style="white-space:nowrap">' . $fila['SEDE_NOMBRE'] . '</td>';
			$table .= '<td id="'.$sede_descripcion.$fila['SEDE_CODIGO'].'" style="white-space:nowrap">' . $fila['SEDE_DESCRIPCION'] . '</td>';
			$coma="'";
			$table .= '<td><input  id="'.$borrar.$fila['SEDE_CODIGO'].'" onclick="seleccionarAlmacen('.$coma.$fila['SEDE_CODIGO'].$coma.')"  type = "button" value ="Seleccionar" class = "btn btn-success"></td>';
			$table .= '</tr>';
			}

		
		$table.= '</table>';
		
		$table.="<h4>Mostrar Página:<span id='mostrandopagina'> </span> Desde código : ".$desdecodigo."</h4>";
		$table.="<button class='botones' onclick="."'retrocedoPaginaAlmacen()'>"."<"."</button>";
		$eligepagina="1-".$num_paginas;
		$table.=' Pagina: <input type="text" id="eligepagina" size="3" maxlength="3" placeholder="'.$eligepagina.'">';
		$table.="<button class='botones' onclick="."'iraPaginaAlmacen()'>"."Ir"."</button>";
		$table.="<button  class='botones' onclick="."'avanzoPaginaAlmacen()'>".">"."</button>";
		$table.='Desde codigo:<input type="text" id="desdecodigoAlmacen" size="8" maxlength="8">';
		$table.="<button class='botones' onclick="."'desdeCodigoAlmacen()'>"."Ir"."</button>";
		echo $table." ".$mensaje;
		mysqli_close($con);

		} else $mensaje=" Pues no, ".mysqli_error($con);

	} 

	if ($graba_historico=="si") {

		$tipo_mov="COMPRAS";
		$resultado=mysqli_query($con, "INSERT INTO historico
		 (HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_PRECIO, HIS_TIPO_MOVIMIENTO, HIS_SALDO_ANTERIOR) 
		 VALUES
		 ('$almacen', '$id_articulo', '$fecha', '$orden', '$documento', '', '$unidades', '$precio', '$tipo_mov', '$existencia_anterior' )");

		if ($resultado) {
			echo mysqli_affected_rows($con).$almacen."_". $id_articulo."_". $fecha."_". $orden."_". $documento."_". $unidades."_". $tipo_mov;
		} else {
			echo "error ".mysqli_error($con);
		}
		mysqli_close($con);
	}


	if ($graba_stocks=="si") {

		
		$resultado=mysqli_query($con, "UPDATE stocks SET STOCKS_EXISTENCIAS = STOCKS_EXISTENCIAS + '$unidades' WHERE STOCKS_ALMACEN = '$almacen' AND STOCKS_CODIGO = '$id_articulo' ");

		if ($resultado) {
			echo mysqli_affected_rows($con)." unidades";
		} else {
			echo "error ".mysqli_error($con);
		}
		mysqli_close($con);

	}
	if ($actualiza_stocks=="si") {

		
		$resultado=mysqli_query($con, "UPDATE stocks SET STOCKS_EXISTENCIAS = STOCKS_EXISTENCIAS - '$unidades_antes' + '$unidades_despues' WHERE STOCKS_ALMACEN = '$almacen_ac' AND STOCKS_CODIGO = '$codigo_ac' ");

		if ($resultado) {
			echo mysqli_affected_rows($con)." unidades";
		} else {
			echo "error ".mysqli_error($con);
		}
		mysqli_close($con);

	}

	if ($actualiza_stocks_borrar=="si") {

		
		$resultado=mysqli_query($con, "UPDATE stocks SET STOCKS_EXISTENCIAS = STOCKS_EXISTENCIAS - '$unidades_antes' WHERE STOCKS_ALMACEN = '$almacen_ac' AND STOCKS_CODIGO = '$codigo_ac' ");

		if ($resultado) {
			echo mysqli_affected_rows($con)." unidades";
		} else {
			echo "error ".mysqli_error($con);
		}
		mysqli_close($con);

	}

	if ($graba_ref=="si") {

		$id_usuario=$_SESSION["id_usuario"];

		$resultado=mysqli_query($con, "UPDATE referencias SET ORDEN = ORDEN + 1 WHERE ID_USUARIO= '$id_usuario'");

		if ($resultado) {
			echo mysqli_affected_rows($con);
		} else {
			echo "error ".mysqli_error($con);
		}
		mysqli_close($con);
	}


	if($actualizar_sede=="si") {

		$plan_vtas_float=(float)$plan_ventasAc;
		$vtas_realizadas_float=(float)$ventas_realizadasAc;

		$antes=$plan_ventasAc;	
		$despues=$plan_vtas_float;

		$resultado=mysqli_query($con, "UPDATE sedes SET SEDE_NOMBRE = '$nombreAc', SEDE_DESCRIPCION = '$descripcionAc' , SEDE_DIRECCION = '$descripcionAc', SEDE_TELEFONO = '$telefonoAc' , SEDE_COD_RESPONSABLE = '$id_responsableAc' , SEDE_PLAN_VENTAS = '$plan_ventasAc', SEDE_VENTAS_REALIZADAS = '$vtas_realizadas_float'  WHERE SEDE_CODIGO = '$codigoAc'");

		if ($resultado) {

			echo mysqli_affected_rows($con)." afectadas "." antes de: ".$antes." despues de: ".$despues;
			
		} else {
			echo "error ".mysqli_error($con);
		}
		mysqli_close($con);
	
	}

	if($actualizar_compra =="si") {

		
		$resultado=mysqli_query($con, "UPDATE historico SET HIS_DOCUMENTO = '$documento_ac', HIS_UNIDADES = '$unidades_ac', HIS_PRECIO = '$precio_ac' WHERE HIS_ALMACEN= '$almacen_ac' AND HIS_CODIGO = '$codigo_ac' AND HIS_FECHA = '$fecha_ac' AND HIS_ORDEN = '$orden_ac' ");

		if ($resultado) {

			echo mysqli_affected_rows($con);
			
		} else {
			echo "error ".mysqli_error($con);
		}
		mysqli_close($con);
	
	}

	if($borrar_compra =="si") {

		
		$resultado=mysqli_query($con, "DELETE FROM historico  WHERE HIS_ALMACEN = '$almacen_ac' AND HIS_CODIGO = '$codigo_ac' AND HIS_FECHA = '$fecha_ac' AND HIS_ORDEN = '$orden_ac' ");

		if ($resultado) {

			echo mysqli_affected_rows($con);
			
		} else {
			echo "error, la fecha: ".$fecha_ac." ".mysqli_error($con);
		}
		mysqli_close($con);
	
	}	
		
		if(!empty($id_sedeEliminada)){

		$id_sede=mysqli_real_escape_string($con, $id_sedeEliminada);

		$resultado=mysqli_query($con, "DELETE FROM sedes WHERE SEDE_CODIGO = $id_sede");

		if ($resultado) {
			echo "correcto, ".mysqli_affected_rows($con);
		} else { 
			echo "No ejecutado".mysqli_error($con);
		}

		mysqli_close($con);

		} 
		
	if ($cambiar_responsable=="si") {

		$vista='<form>';
		      	$vista.='<div id="divac1">';
			      	$vista.='<label for="responsable_actual" >Responsable actual : </label>';
			      	$vista.='<input type="text" id="responsable_actual" readonly="readonly" style="width:55px;height:35px"/>';
			      	 $vista.='</div>';
		      	$vista.='<div id="divac2">';
			      	$vista.='<label for="responsable_actual_nombre" >Nombre : </label>';
			      	$vista.='<input type="text" id="responsable_actual_nombre" readonly="readonly" style="width:250px;height:35px"/>';
			    $vista.='</div>';
			    $vista.='<div id="divac3">';
			      	$vista.='<label for="responsable_nuevo">Nuevo Responsable: </label>';
			      	$vista.='<input type="text" id="responsable_nuevo" style="width:55px;height:35px" />';
			      	$vista.='</div>';
			    	$vista.='<div id="divac2">';
			      	$vista.='<label for="responsable_nuevo_nombre" >Nombre : </label>';
			      	$vista.='<input type="text" id="responsable_nuevo_nombre" style="width:250px;height:35px" readonly="readonly"/>';
			    $vista.='</div>';
			    $vista.='<div id="divac4">';
			    $vista.='<button type="button" class="botones" onclick="confirmarResponsable()">Confirmar</button>';
		      	$vista.='</div>';
				$vista.='</form>';

		      	echo $vista;

	}

	if ($busca_responsable=="si") {

		
		$resultado=mysqli_query($con, "SELECT EMP_NOMBRE, EMP_CODIGO FROM empleado WHERE EMP_CODIGO = '$responsable_buscar' ");

		if ($resultado) {

			$fila = mysqli_fetch_assoc($resultado);

			if (mysqli_num_rows($resultado) > 0) {
					echo $fila['EMP_NOMBRE'];
				} else {
					echo "INEXISTENTE";
				}
		} else { 
			echo "INEXISTENTE";
		}

		mysqli_close($con);

	}


	if ($crear_sede=="si") {

		$vista='<form>';
			$vista.='<fieldset>';  
		      	$vista.='<div id="divac1">';
			      	$vista.='<label for="codigo_sede">Código Sede : </label>';
			      	$vista.='<input type="text" id="codigo_sede" size="3" maxlength="3" onfocus="colorTexto(this.id)"   onblur="noFoco(this.id)"  style="width:75px;height:35px;font-weight:bold;"/>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac2">'; 
			      	$vista.='<label for="nombre_sede">Nombre: </label>';
			      	$vista.='<input type="text" id="nombre_sede" size="30" maxlength="40" disabled style="width:350px;height:35px;font-weight:bold;"/>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac3">';
			      	$vista.='<label for="descripcion_sede">Descripcion: </label>';
			      	$vista.='<input type="text" id="descripcion_sede" size="30" maxlength="40" disabled style="width:350px;height:35px;font-weight:bold;"/>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac4">';
			      	$vista.='<label for="direccion_sede">Direccion: </label> ';
			      	$vista.='<input type="text" id="direccion_sede" size="30" maxlength="40" disabled style="width:350px;height:35px;font-weight:bold;"/>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac5">';
			      	$vista.='<label for="telefono_sede">Telefono: </label> ';
			      	$vista.='<input type="text" id="telefono_sede" size="12" maxlength="12" disabled style="width:175px;height:35px;font-weight:bold;"/>';
		      		$vista.='</div>';
		      	$vista.='<div id="divac6">';
			      	$vista.='<label for="cod_responsable_sede">Responsable codigo: </label> ';
			      	$vista.='<input type="text" id="cod_responsable_sede" size="3" maxlength="3" disabled style="width:75px;height:35px;font-weight:bold;"/>';
		      		$vista.='</div>';
		      	$vista.='<div id="divac7">';
			      	$vista.='<label for="nom_responsable_sede">Resp. Nombre : </label> ';
			      	$vista.='<input type="text" id="nom_responsable_sede" size="30" maxlength="40" disabled style="width:350px;height:35px;font-weight:bold;"/>';
		      		$vista.='</div>';
		      	$vista.='<div id="divac8">';
			      	$vista.='<label for="plan_vtas_sede">Plan de Ventas : </label> ';
			      	$vista.='<input type="text" id="plan_vtas_sede" size="30" maxlength="40" disabled style="width:175px;height:35px;font-weight:bold;"/>';
		      		$vista.='</div>';
		      	$vista.='<div id="divac9">';
			      	$vista.='<label for="vtas_realizadas_sede">Ventas realizadas : </label> ';
			      	$vista.='<input type="text" id="vtas_realizadas_sede" size="30" maxlength="40" disabled style="width:175px;height:35px;font-weight:bold;"/>';
		      		$vista.='</div>';	

		      	$vista.='<div id="divac10">';
		      	$vista.='<br>';
				$vista.='</div>';
			$vista.='</fieldset>';
		$vista.='</form>';
		$vista.='<span id="feedback"></span>';
		$vista.='<button onmousedown="agregarSede()" style="margin-left:40%;" class="btn btn-success">Grabar Cuenta</button><br>';
		echo $vista;   

	}

	if ($busca_articulo=="si") {
		$resultado = mysqli_query($con, "SELECT STOCKS_ALMACEN, STOCKS_CODIGO, STOCKS_EXISTENCIAS, PRE_CODIGO, PRE_DESCRIPCION FROM stocks LEFT JOIN precios ON PRE_CODIGO = STOCKS_CODIGO
			 WHERE STOCKS_ALMACEN = '$id_almacen' AND STOCKS_CODIGO = '$id_articulo'");
		if ($resultado) { 

			$fila = mysqli_fetch_assoc($resultado);
			if (mysqli_num_rows($resultado)> 0) {
			
					$datos_stocks= new stdClass();
					$datos_stocks->stock_existencia=$fila['STOCKS_EXISTENCIAS'];
					$datos_stocks->stock_descripcion=$fila['PRE_DESCRIPCION'];
					$json=json_encode($datos_stocks);
					echo $json;
				} 
			  else {
			  		 echo "INEXISTENTE";
					}
		} else echo "INEXISTENTE"." ".mysqli_error($con);											   
		mysqli_close($con); 
	}

	if ($busca_almacen=="si") {

		$resultado=mysqli_query($con, "SELECT SEDE_CODIGO, SEDE_NOMBRE FROM sedes WHERE SEDE_CODIGO = '$id_almacen' ");
		if ($resultado) {
			$fila = mysqli_fetch_assoc($resultado);
			if (mysqli_num_rows($resultado) > 0) {
					echo $fila['SEDE_NOMBRE'];
				} else {
					echo "INEXISTENTE";
				}
		} else { 
			echo "INEXISTENTE ".mysqli_error($con);
		}
		mysqli_close($con);

	}

	if ($busca_precio=="si") {

		$resultado=mysqli_query($con, "SELECT PRE_CODIGO, PRE_DESCRIPCION FROM precios WHERE PRE_CODIGO = '$id_articulo' ");
		if ($resultado) {
			$fila = mysqli_fetch_assoc($resultado);
			if (mysqli_num_rows($resultado) > 0) {
					echo $fila['PRE_DESCRIPCION'];
				} else {
					echo "INEXISTENTE";
				}
		} else { 
			echo "INEXISTENTE ".mysqli_error($con);
		}
		mysqli_close($con);
	}

	if ($alta_stock=="si") {

		$resultado=mysqli_query($con, "INSERT INTO stocks (STOCKS_ALMACEN, STOCKS_CODIGO, STOCKS_EXISTENCIAS, STOCKS_MINIMO, STOCKS_PUNTO_PEDIDO, STOCKS_FALTAS, STOCKS_UBI_CALLE, STOCKS_UBI_PASILLO, STOCKS_UBI_NUMERO, STOCKS_UNI_ENTRADA, STOCKS_UNI_SALIDA) VALUES ('$id_almacen', '$id_articulo', 0, 0, 0, 0, ' ', ' ', ' ', 0, 0)");
		if ($resultado) {
			echo mysqli_affected_rows($con);
		} else { 
			echo "error".mysqli_error($con);
		}
		mysqli_close($con);
	}

	if ($formulario=="si") {

			$vista="<div>";
				$vista.'<form>';
			 
			 	$vista.='<div id="divac0">';
			      	$vista.='<p><label for="almacen_ed" padding="15px">Almacen : </label>';
			      	$vista.='<input type="text" id="almacen_ed" size="3" maxlength="3" style="width:110px;height:35px;padding:15px"/></p>';
		      	$vista.='</div>';

		      	$vista.='<div id="divac1">';
			      	$vista.='<p><label for="codigo_ed" padding="15px">Código Artículo : </label>';
			      	$vista.='<input type="text" id="codigo_ed" size="12" maxlength="12"  style="width:110px;height:35px;padding:15px"/></p>';
		      	$vista.='</div>';

				$vista.='<div id="divac2">';
			      	$vista.='<p><label for="descripcion_ed" padding="15px">Descripción: </label>';
			      	$vista.='<input type="text" id="descripcion_ed" size="40" maxlength="40"  style="width:440px;height:35px;padding:15px"/></p>';
		      	$vista.='</div>';

		      	$vista.='<div id="divac3">';
			      	$vista.='<p><label for="fecha_ed" padding="15px">Fecha: </label>';
			      	$vista.='<input type="text" id="fecha_ed" size="12" maxlength="12"  style="width:110px;height:35px;padding:15px"/></p>';
		      	$vista.='</div>';

		      	$vista.='<div id="divac4">';
			      	$vista.='<p><label for="orden_ed" padding="15px">Orden: </label>';
			      	$vista.='<input type="text" id="orden_ed" size="9" maxlength="9"  style="width:110px;height:35px;padding:15px"/></p>';
		      	$vista.='</div>';
		      	
		      	$vista.='<div id="divac5">';
			      	$vista.='<p><label for="documento_ed" padding="15px">Documento: </label>';
			      	$vista.='<input type="text" id="documento_ed" size="15" maxlength="15" style="width:110px;height:35px;padding:15px"/></p>';
		      	$vista.='</div>';
		      	
		      	$vista.='<div id="divac6">';
			      	$vista.='<p><label for="unidades_ed" padding="15px">Unidades: </label>';
			      	$vista.='<input type="text" id="unidades_ed" size="15" maxlength="15" style="width:110px;height:35px;padding:15px"/></p>';
		      	$vista.='</div>';

				$vista.='<div id="divac6">';
			      	$vista.='<p><label for="precio_ed" padding="15px">Precio: </label>';
			      	$vista.='<input type="text" id="precio_ed" size="15" maxlength="15" style="width:110px;height:35px;padding:15px"/></p>';
		      	$vista.='</div>';
		     $vista.='<div>';
		     
			 $vista.='<input type="button" class="btn btn-success upload" id="botonGrabar" value="Grabar Cambios" onclick="actualizarCompra()" style="margin-left:450px;">';
			  
			$vista.='</div>';  
			$vista.='</form>';
		    echo $vista;
	}

?>


