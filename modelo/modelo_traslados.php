<?php 
	session_start();
	require "conexion.php";
 

	$sedes="";
	$filtraid_sede="";
	$filtranombre="";
	$filtradescripcion=""; 
	$filtradirecion="";
	$filtraid_responsable="";

	$id_sedeActualizada="";
	$nombre_Actualizado="";
	$descripcionActualizada="";
	$direccionActualizada="";
	$id_responsableActualizada=""; 
	
	$id_sedeEliminada=""; 
 
	$alta_sede="";
	$nuevo_codigo_sede="";
	$nuevo_nombre="";
	$nueva_descripcion="";
	$nueva_direccion="";
	$nuevo_telefono="";
	$nuevo_cod_responsable="";
	$nuevo_plan_vtas="";
	$nuevo_vtas_realizadas="";

	$acontar_sedes="";
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
	$id_almacen="";
	$busca_articulo="";
	$id_articulo="";
	$graba_historico_o="";
	$graba_historico_d="";
	$almacen_o="";
	$almacen_d="";
	$unidades="";
	$documento="";
	$leer_ref="";
	$fecha;
	$orden=0;
	$graba_stocks_o="";
	$graba_stocks_d="";
	$graba_ref="";
	$precios="";
	$historico="";
	$busca_precio="";
	$alta_stock="";
	$id_almacen_d="";

		if (isset($_GET['alta_stock'])) {

		$alta_stock=$_GET['alta_stock'];
		$id_almacen_d=$_GET['id_almacen_d'];
		$id_articulo=$_GET['id_articulo'];
		
	}

	if (isset($_GET['leer_ref'])) {

		$leer_ref=$_GET['leer_ref'];

	}
	if (isset($_GET['graba_ref'])) {

		$graba_ref=$_GET['graba_ref'];

	}

	if (isset($_GET['graba_historico_o'])) {

		$graba_historico_o=$_GET['graba_historico_o'];
		$almacen_o=$_GET['id_almacen_o'];
		$almacen_d=$_GET['id_almacen_d'];
		$unidades=$_GET['unidades'];
		$documento=$_GET['documento'];
		$id_articulo=$_GET['codigo'];
		$fecha=$_GET['fecha'];
		$orden=$_GET['orden'];
		$existencia_o=$_GET['existencia_o'];
	}

	if (isset($_GET['graba_historico_d'])) {

		$graba_historico_d=$_GET['graba_historico_d'];
		$almacen_o=$_GET['id_almacen_o'];
		$almacen_d=$_GET['id_almacen_d'];
		$unidades=$_GET['unidades'];
		$documento=$_GET['documento'];
		$id_articulo=$_GET['codigo'];
		$fecha=$_GET['fecha'];
		$orden=$_GET['orden'];
		$existencia_d=$_GET['existencia_d'];
	}

	if (isset($_GET['graba_stocks_o'])) {

		$graba_stocks_o=$_GET['graba_stocks_o'];
		$almacen_o=$_GET['id_almacen_o'];
		$almacen_d=$_GET['id_almacen_d'];
		$unidades=$_GET['unidades'];
		$id_articulo=$_GET['codigo'];
		
	}
	if (isset($_GET['graba_stocks_d'])) {

		$graba_stocks_d=$_GET['graba_stocks_d'];
		$almacen_o=$_GET['id_almacen_o'];
		$almacen_d=$_GET['id_almacen_d'];
		$unidades=$_GET['unidades'];
		$id_articulo=$_GET['codigo'];
		
	}

	if (isset($_GET['alta_sede'])) {

		$alta_sede=$_GET['alta_sede'];
		$nuevo_codigo_sede=$_GET['nuevo_codigo_sede'];
		$nuevo_nombre=$_GET['nuevo_nombre'];
		$nueva_descripcion=$_GET['nueva_descripcion'];
		$nueva_direccion=$_GET['nueva_direccion'];
		$nuevo_telefono=$_GET['nuevo_telefono'];
		$nuevo_cod_responsable=$_GET['nuevo_cod_responsable'];
		$nuevo_plan_vtas=$_GET['nuevo_plan_vtas'];
		$nuevo_vtas_realizadas=$_GET ['nuevo_vtas_realizadas'];

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

		 	$resultado = mysqli_query($con, "SELECT  HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_TIPO_MOVIMIENTO, PRE_CODIGO, PRE_DESCRIPCION
		 		 FROM historico 
		 		 LEFT JOIN precios ON HIS_CODIGO = PRE_CODIGO
		 		 WHERE HIS_CODIGO >= '$desdecodigo' AND HIS_CODIGO >= '$desdealmacen' AND SUBSTRING(HIS_TIPO_MOVIMIENTO, 1, 8) = 'TRASLADO'
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
			$table .= '<th class="col-sm-0">CONTRA</th>';
			$table .= '<th class="col-sm-0">UNIDADES</th>';
			$table .= '<th class="col-sm-0">TIPO </th>';
			$table .= '</tr>';

			if ($resultado) { 

				while ($fila = mysqli_fetch_assoc($resultado)) {

					$table .= '<tr>';
					$table .= '<td id="'.$halmacen.$fila['HIS_CODIGO'].'">' . $fila['HIS_ALMACEN'] . '</td>';
					$table .= '<td id="'.$hcodigo.$fila['HIS_CODIGO'].'">' . $fila['HIS_CODIGO'] . '</td>';
					$table .= '<td id="'.$hdescripcion.$fila['HIS_CODIGO'].'" style="white-space:nowrap">' . htmlentities($fila['PRE_DESCRIPCION']) . '</td>';
					$table .= '<td id="'.$hfecha.$fila['HIS_CODIGO'].'">' . $fila['HIS_FECHA'] . '</td>';
					$table .= '<td id="'.$horden.$fila['HIS_CODIGO'].'">' . $fila['HIS_ORDEN'] . '</td>';
					$table .= '<td id="'.$hdocumento.$fila['HIS_CODIGO'].'">' . $fila['HIS_DOCUMENTO'] . '</td>';
					$table .= '<td id="'.$halmacen_contra.$fila['HIS_CODIGO'].' ">' . $fila['HIS_ALMACEN_CONTRA'] . '</td>';
					$table .= '<td id="'.$hunidades.$fila['HIS_CODIGO'].'">' . $fila['HIS_UNIDADES'] . '</td>';
					$table .= '<td id="'.$htipo.$fila['HIS_CODIGO'].'">' . $fila['HIS_TIPO_MOVIMIENTO'] . '</td>';
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

	if ($graba_historico_o=="si") {

		$tipo_mov="TRASLADO_SALIDA";
		$resultado=mysqli_query($con, "INSERT INTO historico
		 (HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_TIPO_MOVIMIENTO, HIS_SALDO_ANTERIOR) 
		 VALUES
		 ('$almacen_o', '$id_articulo', '$fecha', '$orden', '$documento', '$almacen_d', '$unidades', '$tipo_mov', '$existencia_o')");

		if ($resultado) {
			echo mysqli_affected_rows($con).$almacen_d."_". $id_articulo."_". $fecha."_". $orden."_". $documento."_". $almacen_o."_". $unidades."_". $tipo_mov;
		} else {
			echo "error ".mysqli_error($con);
		}
		mysqli_close($con);
	}

	if ($graba_historico_d=="si") {

		$orden++;

		$tipo_mov="TRASLADO_ENTRADA";

		$resultado=mysqli_query($con, "INSERT INTO historico
		 (HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_TIPO_MOVIMIENTO, HIS_SALDO_ANTERIOR) 
		 VALUES
		 ('$almacen_d', '$id_articulo', '$fecha', '$orden', '$documento', '$almacen_o', '$unidades', '$tipo_mov', '$existencia_d')");

		if ($resultado) {
			echo mysqli_affected_rows($con);
		} else {
			echo "error ".mysqli_error($con).$almacen_d."_". $id_articulo."_". $fecha."_". $orden."_". $documento."_". $almacen_o."_". $unidades."_". $tipo_mov;
		}
		mysqli_close($con);
	}

	if ($graba_stocks_o=="si") {

		
		$resultado=mysqli_query($con, "UPDATE stocks SET STOCKS_EXISTENCIAS = STOCKS_EXISTENCIAS - '$unidades', STOCKS_UNI_SALIDA = STOCKS_UNI_SALIDA +'$unidades' WHERE STOCKS_ALMACEN = '$almacen_o' AND STOCKS_CODIGO = '$id_articulo' ");

		if ($resultado) {
			echo mysqli_affected_rows($con);
		} else {
			echo "error ".mysqli_error($con);
		}
		mysqli_close($con);

	}

	if ($graba_stocks_d=="si") {

		$resultado=mysqli_query($con, "UPDATE stocks SET STOCKS_EXISTENCIAS = STOCKS_EXISTENCIAS + '$unidades', STOCKS_UNI_ENTRADA= STOCKS_UNI_ENTRADA +'$unidades' WHERE STOCKS_ALMACEN = '$almacen_d' AND STOCKS_CODIGO = '$id_articulo' ");

		if ($resultado) {
			echo mysqli_affected_rows($con);
		} else {
			echo "error ".mysqli_error($con);
		}
		mysqli_close($con);
	}

	if ($graba_ref=="si") {

		$id_usuario=$_SESSION["id_usuario"];

		$resultado=mysqli_query($con, "UPDATE referencias SET ORDEN = ORDEN + 2 WHERE ID_USUARIO= '$id_usuario'");

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
		
	if($alta_sede=="si") {

		$plan_vtas_float=(float)$nuevo_plan_vtas;
		$vtas_realizadas_float=(float)$nuevo_vtas_realizadas;

		$resultado=mysqli_query($con, "INSERT INTO sedes (SEDE_CODIGO, SEDE_NOMBRE, SEDE_DESCRIPCION, SEDE_DIRECCION, SEDE_TELEFONO, SEDE_COD_RESPONSABLE, SEDE_PLAN_VENTAS, SEDE_VENTAS_REALIZADAS) VALUES ('$nuevo_codigo_sede', '$nuevo_nombre', '$nueva_descripcion', '$nueva_direccion', '$nuevo_telefono','$nuevo_cod_responsable', '$plan_vtas_float', '$vtas_realizadas_float')");

		if ($resultado) {
			echo "correcto";
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
			  		$datos_stocks= new stdClass();
					$datos_stocks->stock_existencia="0";
					$datos_stocks->stock_descripcion='INEXISTENTE';
					$json=json_encode($datos_stocks);
					echo $json;
					}
		} else {
			  		$datos_stocks= new stdClass();
					$datos_stocks->stock_existencia="0";
					$datos_stocks->stock_descripcion='INEXISTENTE';
					$json=json_encode($datos_stocks);
					echo $json;
					}	

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

		$resultado=mysqli_query($con, "INSERT INTO stocks (STOCKS_ALMACEN, STOCKS_CODIGO, STOCKS_EXISTENCIAS, STOCKS_MINIMO, STOCKS_PUNTO_PEDIDO, STOCKS_FALTAS, STOCKS_UBI_CALLE, STOCKS_UBI_PASILLO, STOCKS_UBI_NUMERO, STOCKS_UNI_ENTRADA, STOCKS_UNI_SALIDA) VALUES ('$id_almacen_d', '$id_articulo', 0, 0, 0, 0, ' ', ' ', ' ', 0, 0)");
		if ($resultado) {
			echo mysqli_affected_rows($con);
		} else { 
			echo "error".mysqli_error($con);
		}
		mysqli_close($con);
	}
?>


