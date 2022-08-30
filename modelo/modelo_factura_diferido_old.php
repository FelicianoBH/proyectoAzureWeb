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
	$graba_ref_numero_alb="";
	$precios="";
	$historico="";
	$busca_precio="";
	$alta_stock="";
	$id_almacen_d="";
	$alb_lineas="";
	$acontar_alblineas="";
	$alb_lineas="";
	$numero_albaran=0;
	$numer_albaran=0;
	$crear_albaran="";

	$graba_linea="";
	$gr_numero_albaran=0;
	$gr_numero_linea=0;
	$gr_almacen_ori="";
	$gr_articulo="";
	$gr_descripcion="";
	$gr_unidades=0.0;
	$gr_precio=0.0;
	$gr_tipo_iva=0.0;
	$gr_iva_por=0.0;
	$gr_iva_importe=0.0;
	$gr_descuento_por=0.0;
	$gr_descuento_importe=0.0;
	$gr_importe_linea=0.0;
	$gr_precio_sin_iva=0.0;

	$rg_regraba_cab="";
	$rg_numero_albaran=0;
	$rg_importe_neto=0;
	$rg_descuento_importe=0;
	$rg_iva_importe=0;
	$rg_importe_total=0;
	$albaran_nueva="";
	$crear_cabecera="";
	$grabar_cabecera="";
	$alb_tipo="";
	$alb_tipo="";
	$alb_numero="";
	$alb_fecha="";
	$alb_estado="";
	$alb_usuario="";
	$alb_domicilio_entrega="";
	$alb_tlf="";
	$alb_cliente="";
	$alb_almacen_vta="";
	$alb_observaciones="";
	$alb_domicilio_entrega="";
	$busca_cliente="";
	$id_cliente="";
	$veo_cab="";
	$opciones="";
	$editar_cabecera="";
	$regrabar_cabecera="";
	$detalle_linea="";	
	$muestra_linea="";
	$numero_linea="";

	$actualiza_cab="";
	$old_importe_neto="";
	$new_importe_neto="";
	$old_descuento_importe="";
	$new_descuento_importe="";
	$old_iva_importe="";
	$new_iva_importe="";
	$old_importe_total="";
	$new_importe_total="";

	$regraba_linea="";
	$act_numero_albaran="";
	$act_almacen_ori="";
	$act_articulo="";
	$act_descripcion="";
	$act_unidades="";
	$act_precio="";
	$act_tipo_iva="";
	$act_iva_por="";
	$act_iva_importe="";
	$act_descuento_por="";
	$act_descuento_importe="";
	$act_importe_linea="";
	$act_numero_linea="";
	$act_precio_sin_iva="";
	$borrar_linea="";
	$genera_factura_cab="";
	$genera_factura_lineas="";
	$nuevo_numero="";
	$numero_pedido="";
	$genera_historico_pedido_cab="";
	$genera_historico_pedido_lin="";
	$borra_ped_cab="";
	$borra_ped_lin="";
	$graba_ref_numero_fac="";

	if (isset($_GET['borra_ped_cab'])) {
		$borra_ped_cab=$_GET['borra_ped_cab'];
		$numero_pedido=$_GET['numero_pedido'];
	}
	if (isset($_GET['borra_ped_lin'])) {
		$borra_ped_lin=$_GET['borra_ped_lin'];
		$numero_pedido=$_GET['numero_pedido'];
	}
	if (isset($_GET['genera_historico_pedido_lin'])) {
		$genera_historico_pedido_lin=$_GET['genera_historico_pedido_lin'];
		$numero_pedido=$_GET['numero_pedido'];
		$nuevo_numero=$_GET['nuevo_numero'];
	}
	if (isset($_GET['genera_historico_pedido_cab'])) {
		$genera_historico_pedido_cab=$_GET['genera_historico_pedido_cab'];
		$numero_pedido=$_GET['numero_pedido'];
		$nuevo_numero=$_GET['nuevo_numero'];
	}
	if (isset($_GET['genera_factura_lineas'])) {
		$genera_factura_lineas=$_GET['genera_factura_lineas'];
		$numero_pedido=$_GET['numero_pedido'];
		$nuevo_numero=$_GET['nuevo_numero'];
	}
	if (isset($_GET['genera_factura_cab'])) {
		$genera_factura_cab=$_GET['genera_factura_cab'];
		$numero_pedido=$_GET['numero_pedido'];
		$nuevo_numero=$_GET['nuevo_numero'];
	}
	
	if (isset($_GET['borrar_linea'])) {
		$borrar_linea=$_GET['borrar_linea'];
		$num_albaran=$_GET['num_albaran'];
		$num_linea=$_GET['num_linea'];
	}
	if (isset($_GET['actualiza_cab'])) {
		$actualiza_cab=$_GET['actualiza_cab'];
		$numero_albaran=$_GET['numero_albaran'];
		$old_importe_neto=$_GET['old_importe_neto'];
		$new_importe_neto=$_GET['new_importe_neto'];
		$old_descuento_importe=$_GET['old_descuento_importe'];
		$new_descuento_importe=$_GET['new_descuento_importe'];
		$old_iva_importe=$_GET['old_iva_importe'];
		$new_iva_importe=$_GET['new_iva_importe'];
		$old_importe_total=$_GET['old_importe_total'];
		$new_importe_total=$_GET['new_importe_total'];
	}

	if (isset($_GET['muestra_linea'])) {
		$muestra_linea=$_GET['muestra_linea'];
		$numero_albaran=$_GET['num_albaran'];
		$numero_linea=$_GET['num_linea'];
	}

	if (isset($_GET['regrabar_cabecera'])) {
		$regrabar_cabecera=$_GET['regrabar_cabecera'];
		$alb_cliente=$_GET['alb_cliente'];
		$alb_numero=$_GET['alb_numero'];
		$alb_almacen_vta=$_GET['alb_almacen_vta'];
		$alb_observaciones=$_GET['alb_observaciones'];
		$alb_domicilio_entrega=$_GET['alb_domicilio_entrega'];
		$alb_tlf=$_GET['alb_tlf'];
	}

	if (isset($_GET['detalle_linea'])) {
	 	$detalle_linea=$_GET['detalle_linea'];
	 }	
	 if (isset($_GET['editar_cabecera'])) {
	 	$editar_cabecera=$_GET['editar_cabecera'];
	 }	
	if (isset($_GET['opciones'])) {
	 	$opciones=$_GET['opciones'];
	 }	

	if (isset($_GET['veo_cab'])) {
	 	$veo_cab=$_GET['veo_cab'];
	 	$numer_albaran=$_GET['numero_albaran'];
	 }	

	 if (isset($_GET['busca_cliente'])) {
	 	$busca_cliente=$_GET['busca_cliente'];
	 	$id_cliente=$_GET['id_cliente'];
	 }	

	if (isset($_GET['grabar_cabecera'])) {
		$grabar_cabecera=$_GET['grabar_cabecera'];
		$alb_tipo=$_GET['alb_tipo'];
		$alb_cliente=$_GET['alb_cliente'];
		$alb_numero=$_GET['alb_numero'];
		$alb_fecha=$_GET['alb_fecha'];
		$alb_estado=$_GET['alb_estado'];
		$alb_usuario=$_GET['alb_usuario'];
		$alb_almacen_vta=$_GET['alb_almacen_vta'];
		$alb_almacen_vta=$_GET['alb_almacen_vta'];
		$alb_observaciones=$_GET['alb_observaciones'];
		$alb_domicilio_entrega=$_GET['alb_domicilio_entrega'];
		$alb_tlf=$_GET['alb_tlf'];
	}

	if (isset($_GET['albaran_nueva'])) {
		$albaran_nueva=$_GET['albaran_nueva'];
	}

	if (isset($_GET['regraba_linea'])) {

		$regraba_linea=$_GET['regraba_linea'];
		$act_numero_albaran=$_GET['numero_albaran'];
		$act_almacen_ori=$_GET['almacen_ori'];
		$act_articulo=$_GET['articulo'];
		$act_descripcion=$_GET['descripcion'];
		$act_unidades=$_GET['unidades'];
		$act_precio=$_GET['precio'];
		$act_tipo_iva=$_GET['tipo_iva'];
		$act_iva_por=$_GET['iva_por'];
		$act_iva_importe=$_GET['iva_importe'];
		$act_descuento_por=$_GET['descuento_por'];
		$act_descuento_importe=$_GET['descuento_importe'];
		$act_importe_linea=$_GET['importe_linea'];
		$act_numero_linea=$_GET['numero_linea'];
		$act_precio_sin_iva=$_GET['precio_sin_iva'];
	}

	if (isset($_GET['graba_linea'])) {

		$graba_linea=$_GET['graba_linea'];
		$gr_numero_albaran=$_GET['numero_albaran'];
		$gr_almacen_ori=$_GET['almacen_ori'];
		$gr_articulo=$_GET['articulo'];
		$gr_descripcion=$_GET['descripcion'];
		$gr_unidades=$_GET['unidades'];
		$gr_precio=$_GET['precio'];
		$gr_tipo_iva=$_GET['tipo_iva'];
		$gr_iva_por=$_GET['iva_por'];
		$gr_iva_importe=$_GET['iva_importe'];
		$gr_descuento_por=$_GET['descuento_por'];
		$gr_descuento_importe=$_GET['descuento_importe'];
		$gr_importe_linea=$_GET['importe_linea'];
		$gr_numero_linea=$_GET['numero_linea'];
		$gr_precio_sin_iva=$_GET['precio_sin_iva'];
	}
	if (isset($_GET['regraba_cab'])) {

		$rg_regraba_cab=$_GET['regraba_cab'];
		$rg_numero_albaran=$_GET['numero_albaran'];
		$rg_importe_neto=$_GET['importe_neto'];
		$rg_descuento_importe=$_GET['descuento_importe'];
		$rg_iva_importe=$_GET['iva_importe'];
		$rg_importe_total=$_GET['importe_total'];
		
	}

	if (isset($_GET['alta_stock'])) {

		$alta_stock=$_GET['alta_stock'];
		$id_almacen_d=$_GET['id_almacen_d'];
		$id_articulo=$_GET['id_articulo'];
		
	}

	if (isset($_GET['crear_albaran'])) {

		$crear_albaran=$_GET['crear_albaran'];
		
	}

	if (isset($_GET['crear_cabecera'])) {

		$crear_cabecera=$_GET['crear_cabecera'];
		
	}
	if (isset($_GET['leer_ref'])) {

		$leer_ref=$_GET['leer_ref'];

	}
	if (isset($_GET['graba_ref'])) {

		$graba_ref=$_GET['graba_ref'];
		$gr_numero_linea=$_GET['numero_linea'];

	}
	if (isset($_GET['graba_ref_numero_fac'])) {

		$graba_ref_numero_fac=$_GET['graba_ref_numero_fac'];

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

	if (isset($_GET['alb_lineas'])) {
		$alb_lineas = $_GET['alb_lineas'];
		$pagina=$_GET['pagina'];
		$numero_albaran=$_GET['numero_albaran'];
		$num_paginas=$_GET['num_paginas'];
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

	if (isset($_GET['acontar_alblineas'])) {

		$acontar_alblineas="si";
		$numero_albaran=$_GET['numero_albaran'];

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
	$tamanio=8;
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

	$fcodigo="ALIN_CODIGO_ART";
	$fdescripcion="ALIN_DESCRIPCION";
	$funidades="ALIN_UNIDADES";
	$fprecio="ALIN_PRECIO";
	$fiva="ALIN_IVA_POR";
	$fimporte="FIMPORTE";
	$fdescuento="ALIN_DESCUENTO_POR";
	$fimporte="ALIN_IMPORTE_LINEA";
	$fdetalle="DETALLE";
	$feditar="EDITAR";
	$fborrar="BORRAR";


	if($leer_ref=="si") {

			$user=$_SESSION["usuario"];

			$id_usuario=$_SESSION["id_usuario"];

			$query="SELECT * FROM referencias WHERE ID_USUARIO = '$id_usuario'";

			$resultado = mysqli_query($con, $query);

			if (mysqli_num_rows($resultado)> 0) {

			$fila = mysqli_fetch_assoc($resultado);
			
					$datos_ref= new stdClass();
					$datos_ref->fechaRef_ed=date('d/m/Y',strtotime($fila['FECHA_CONTABLE']));
					$datos_ref->fechaRef=$fila['FECHA_CONTABLE'];
					$datos_ref->ordenRef=$fila['ORDEN'];
					$datos_ref->numero_albaran=$fila['NUM_ALBARAN'];
					$datos_ref->iva_1=$fila['REF_IVA_TIPO_1'];
					$datos_ref->iva_2=$fila['REF_IVA_TIPO_2'];
					$datos_ref->iva_3=$fila['REF_IVA_TIPO_3'];
					$datos_ref->iva_4=$fila['REF_IVA_TIPO_4'];
					$datos_ref->iva_5=$fila['REF_IVA_TIPO_5'];
					$datos_ref->iva_6=$fila['REF_IGIC_TIPO_1'];
					$datos_ref->iva_7=$fila['REF_IGIC_TIPO_2'];
					$json=json_encode($datos_ref);
					echo $json;

			} else {
					echo "INEXISTENTE". " el id de usuario es: ".$id_usuario;
					} 
		}

	if ($muestra_linea=="si") {

		$resultado = mysqli_query($con, "SELECT * FROM albaran_lineas LEFT JOIN sedes ON ALIN_ALMACEN_ORI = SEDE_CODIGO WHERE ALIN_NUMERO_ALBARAN = '$numero_albaran' AND ALIN_NUMERO_LINEA = '$numero_linea'");

		if ($resultado) { 

			$fila = mysqli_fetch_assoc($resultado);

					$datos_linea= new stdClass();
					$datos_linea->numero_albaran=$fila['ALIN_NUMERO_ALBARAN'];
					$datos_linea->numero_linea=$fila['ALIN_NUMERO_LINEA'];
					$datos_linea->alm_ori=$fila['ALIN_ALMACEN_ORI'];
					$datos_linea->codigo=$fila['ALIN_CODIGO_ART'];
					$datos_linea->descripcion=$fila['ALIN_DESCRIPCION'];
					$datos_linea->almacen_descripcion=$fila['SEDE_NOMBRE'];
					$datos_linea->unidades=$fila['ALIN_UNIDADES'];
					$datos_linea->precio=$fila['ALIN_PRECIO'];
					$datos_linea->tipo_iva=$fila['ALIN_TIPO_IVA'];
					$datos_linea->iva_porcentaje=$fila['ALIN_IVA_POR'];
					$datos_linea->importe_iva=$fila['ALIN_IMPORTE_IVA'];
					$datos_linea->descuento_por=$fila['ALIN_DESCUENTO_POR'];
					$datos_linea->descuento_importe=$fila['ALIN_DESCUENTO_IMPORTE'];
					$datos_linea->precio_sin_iva=$fila['ALIN_PRECIO_SIN_IVA'];
					$datos_linea->importe_linea=$fila['ALIN_IMPORTE_LINEA'];
					$json=json_encode($datos_linea);
					echo $json;
		 } 
		else {echo mysqli_error($con);}
		mysqli_close($con);
	}

	if ($acontar_precios=="si") {

		$resultado = mysqli_query($con, "SELECT * FROM precios");
		$num_filas = mysqli_num_rows($resultado);
		echo $num_filas;
		mysqli_close($con);
	}

	if ($acontar_historico=="si") {

		$resultado = mysqli_query($con, "SELECT * FROM historico WHERE HIS_CODIGO >= '$desdecodigo' AND HIS_CODIGO >= '$desdealmacen' AND SUBSTRING(HIS_TIPO_MOVIMIENTO, 1, 8) = 'TRASLADO'");

		if ($resultado) { echo mysqli_num_rows($resultado); } 
		else {echo mysqli_error($con);}
		mysqli_close($con);
	}
	
	if ($acontar_alblineas=="si") {

		$resultado = mysqli_query($con, "SELECT * FROM pedido_lineas WHERE PLIN_NUMERO_PEDIDO = '$numero_albaran'");

		if ($resultado) { echo mysqli_num_rows($resultado); } 
		else {echo mysqli_error($con);}
		mysqli_close($con);

	}
		

	if ($alb_lineas=="si") {
			
			$desde=(($pagina-1)*$tamanio);

		 	$resultado = mysqli_query($con, "SELECT  * FROM pedido_lineas WHERE PLIN_NUMERO_PEDIDO = '$numero_albaran' ORDER BY PLIN_NUMERO_PEDIDO DESC, PLIN_NUMERO_LINEA DESC "); 
 
			$table = '<div class = "container">'; 
			$table .=  '<table class = "table table-striped table-hover table-bordered table-condensed table-responsive">';
			$table .= '<tr>';
			$table .= '<th class="col-sm-0">C.Articulo</th>';
			$table .= '<th class="col-sm-0">Descripcion</th>';
			$table .= '<th class="col-sm-0">Unidades</th>';
			$table .= '<th class="col-sm-0">Precio</th>';
			$table .= '<th class="col-sm-0">Iva %</th>';
			$table .= '<th class="col-sm-0">Dto %</th>';
			$table .= '<th class="col-sm-0">Total:</th>';
			$table .= '<th class="col-sm-0">Detalle:</th>';
			$table .= '<th class="col-sm-0">Editar:</th>';
			$table .= '<th class="col-sm-0">Borrar:</th>';
			//$table .= '<th class="col-sm-0">Borrar</th>';
			//$table .= '<th class="col-sm-0">Editar</th>';
			
			$table .= '</tr>';

			if ($resultado) { 

				while ($fila = mysqli_fetch_assoc($resultado)) {

					$table .= '<tr>';
					$table .= '<td id="'.$fcodigo.$fila['PLIN_NUMERO_PEDIDO'].$fila['PLIN_NUMERO_LINEA'].'">' . $fila['PLIN_CODIGO_ART'] . '</td>';
					$table .= '<td id="'.$fdescripcion.$fila['PLIN_NUMERO_PEDIDO'].$fila['PLIN_NUMERO_LINEA'].'">' . $fila['PLIN_DESCRIPCION'] . '</td>';
					$table .= '<td id="'.$unidades.$fila['PLIN_NUMERO_PEDIDO'].$fila['PLIN_NUMERO_LINEA'].'" style="white-space:nowrap">' . $fila['PLIN_UNIDADES']. '</td>';
					$table .= '<td id="'.$fprecio.$fila['PLIN_NUMERO_PEDIDO'].$fila['PLIN_NUMERO_LINEA'].'">' . $fila['PLIN_PRECIO'] . '</td>';
					$table .= '<td id="'.$fiva.$fila['PLIN_NUMERO_PEDIDO'].$fila['PLIN_NUMERO_LINEA'].'">' . $fila['PLIN_IVA_POR'] . '</td>';

				//	$importe_linea=$fila['PLIN_UNIDADES']*($fila['PLIN_PRECIO']+$fila['PLIN_IMPORTE_IVA']);
				//	$table .= '<td id="'.$fimporte.$fila['PLIN_NUMERO_PEDIDO'].['PLIN_NUMERO_LINEA'].'">' . $importe_linea . '</td>';

					$table .= '<td id="'.$fdescuento.$fila['PLIN_NUMERO_PEDIDO'].$fila['PLIN_NUMERO_LINEA'].'">' . $fila['PLIN_DESCUENTO_POR'] . '</td>';
					$table .= '<td id="'.$fimporte.$fila['PLIN_NUMERO_PEDIDO'].$fila['PLIN_NUMERO_LINEA'].'">' . $fila['PLIN_IMPORTE_LINEA'] . '</td>';
					$table .= '<td id="'.$fdetalle.$fila['PLIN_NUMERO_PEDIDO'].$fila['PLIN_NUMERO_LINEA'].'"><button class = "btn btn-info" onclick="detallesLinea('.$fila['PLIN_NUMERO_PEDIDO'].','.$fila['PLIN_NUMERO_LINEA'].')">Detalles</button></td>';
					$table .= '<td id="'.$fdetalle.$fila['PLIN_NUMERO_PEDIDO'].$fila['PLIN_NUMERO_LINEA'].'"><button class = "btn btn-success" onclick="editarLinea('.$fila['PLIN_NUMERO_PEDIDO'].','.$fila['PLIN_NUMERO_LINEA'].')">Editar</button></td>';
					$table .= '<td id="'.$fdetalle.$fila['PLIN_NUMERO_PEDIDO'].$fila['PLIN_NUMERO_LINEA'].'"><button class = "btn btn-danger" onclick="borrarLinea('.$fila['PLIN_NUMERO_PEDIDO'].','.$fila['PLIN_NUMERO_LINEA'].')">Borrar</button></td>';
		 			$table .= '</tr>';
				}

				$table.= '</table>';
				$table.= '<button onclick="agregarLineas()" class="btn btn-primary">AGREGAR LINEAS</button>';
				$table.= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				$table.= '<button onclick="generarLaFactura()" class="btn btn-success">GENERAR FACTURA </button>';
				$table.="<br><br>";
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

	if ($albaran_nueva=="si") {

				$table= '</table>';
				$table.= '<button onclick="agregarLineas()" class="btn btn-primary">AGREGAR LINEAS</button>';
				$table.="<br>";
				$table.="<button class='botones' onclick="."'retrocedoPaginaHistorico()'>"."<"."</button>";
				$eligepagina="1-".$num_paginas;
				$table.=' Pagina: <input type="text" id="eligepagina" size="3" maxlength="3" placeholder="'.$eligepagina.'">';
				$table.="<button class='botones' onclick="."'iraPaginaHistorico()'>"."Ir"."</button>";
				$table.="<button  class='botones' onclick="."'avanzoPaginaHistorico()'>".">"."</button>";
			 
			 	echo $table;

	}

if ($editar_cabecera=="si") {

		$vista='<div class="container-fluid">';

			$vista.='<div class="row">';
					$vista.='<div class="col-md-4">';
						$vista.='<div>';
							$vista.='Cliente código:
							<input type="text" id="ed_cliente" size="6" maxlength="6"/>';
						$vista.='</div>';		
					$vista.='</div>';
					$vista.='<div class="col-md-6">';
						$vista.='<div>';
							$vista.='<input type="text" id="ed_cliente_nombre" size="40" />';
						$vista.='</div>';		
					$vista.='</div>';
			$vista.='</div>';
			$vista.='<hr>';
			$vista.='<div class="row">';		
					$vista.='<div class="col-md-3">';
						$vista.='<div>';
							$vista.='Nif :<input type="text" id="ed_cliente_nif" size="10" />';
						$vista.='</div>';		
					$vista.='</div>';
					$vista.='<div class="col-md-4">';
						$vista.='<div>';
							$vista.='Direccion :<input type="text" id="ed_cliente_direccion" size="40" />';
						$vista.='</div>';		
					$vista.='</div>';
					$vista.='<div class="col-md-3">';
						$vista.='<div>';
							$vista.='Tlf :<input type="text" id="ed_cliente_tlf" size="10" />';
						$vista.='</div>';		
					$vista.='</div>';
			$vista.='</div>';
			$vista.='<hr>';
			$vista.='<div class="row">';
					$vista.='<div class="col-md-3">';
						$vista.='<div>';
							$vista.='Alm vta:
							<input type="text" id="ed_alm_vta" size="3" maxlength="3"/>';
						$vista.='</div>';		
					$vista.='</div>';
					$vista.='<div class="col-md-4">';
						$vista.='<div>';
							$vista.='<input type="text" id="ed_alm_descripcion" size="40" />';
						$vista.='</div>';		
					$vista.='</div>';
					
			$vista.='</div>';
			$vista.='<hr>';

			$vista.='<div class="row">';
					$vista.='<div class="col-md-6">';
						$vista.='<div>';
							$vista.='Observaciones:
							<input type="text" id="ed_observaciones" size="40" maxlength="40"/>';
						$vista.='</div>';		
					$vista.='</div>';
			$vista.='</div>';
			$vista.='<hr>';
			$vista.='<div class="row">';	
					$vista.='<div class="col-md-4">';
						$vista.='<div>';
							$vista.='';
						$vista.='</div>';
					$vista.='</div>';		
					$vista.='<div class="col-md-4">';
						$vista.='<div>';
							$vista.='<button class = "btn btn-info" onclick="consultaClientes()">CONSULTA CLIENTES</button>';
						$vista.='</div>';
					$vista.='</div>';		
					$vista.='<div class="col-md-4">';
						$vista.='<div>';
							$vista.='<button class = "btn btn-success" onclick="guardarCambiosCabecera()">GRABAR CAMBIOS</button>';
						$vista.='</div>';		
					$vista.='</div>';
			$vista.='</div>';
			

		$vista.='</div>';

	$vista.='</div>';		
			echo $vista;   

	}

	if ($crear_cabecera=="si") {

		$vista='<div class="container-fluid">';

			$vista.='<div class="row">';
					$vista.='<div class="col-md-4">';
						$vista.='<div>';
							$vista.='Cliente código:
							<input type="text" id="cc_cliente" size="6" maxlength="6"/>';
						$vista.='</div>';		
					$vista.='</div>';
					$vista.='<div class="col-md-6">';
						$vista.='<div>';
							$vista.='<input type="text" id="cc_cliente_nombre" size="40" />';
						$vista.='</div>';		
					$vista.='</div>';
			$vista.='</div>';
			$vista.='<hr>';
			$vista.='<div class="row">';		
					$vista.='<div class="col-md-3">';
						$vista.='<div>';
							$vista.='Nif :<input type="text" id="cc_cliente_nif" size="10" />';
						$vista.='</div>';		
					$vista.='</div>';
					$vista.='<div class="col-md-4">';
						$vista.='<div>';
							$vista.='Direccion :<input type="text" id="cc_cliente_direccion" size="40" />';
						$vista.='</div>';		
					$vista.='</div>';
					$vista.='<div class="col-md-3">';
						$vista.='<div>';
							$vista.='Tlf :<input type="text" id="cc_cliente_tlf" size="10" />';
						$vista.='</div>';		
					$vista.='</div>';
			$vista.='</div>';
			$vista.='<hr>';
			$vista.='<div class="row">';
					$vista.='<div class="col-md-3">';
						$vista.='<div>';
							$vista.='Alm vta:
							<input type="text" id="cc_alm_vta" size="3" maxlength="3"/>';
						$vista.='</div>';		
					$vista.='</div>';
					$vista.='<div class="col-md-4">';
						$vista.='<div>';
							$vista.='<input type="text" id="cc_alm_descripcion" size="40" />';
						$vista.='</div>';		
					$vista.='</div>';
					
			$vista.='</div>';
			$vista.='<hr>';

			$vista.='<div class="row">';
					$vista.='<div class="col-md-6">';
						$vista.='<div>';
							$vista.='Observaciones:
							<input type="text" id="cc_observaciones" size="40" maxlength="40"/>';
						$vista.='</div>';		
					$vista.='</div>';
			$vista.='</div>';
			$vista.='<hr>';
			$vista.='<div class="row">';	
					$vista.='<div class="col-md-4">';
						$vista.='<div>';
							$vista.='';
						$vista.='</div>';
					$vista.='</div>';		
					$vista.='<div class="col-md-4">';
						$vista.='<div>';
							$vista.='<button class = "btn btn-info" onclick="consultaClientes()">CONSULTA CLIENTES</button>';
						$vista.='</div>';
					$vista.='</div>';		
					$vista.='<div class="col-md-4">';
						$vista.='<div>';
							$vista.='<button class = "btn btn-success" onclick="grabarCabecera()">GRABAR CABECERA</button>';
						$vista.='</div>';		
					$vista.='</div>';
			$vista.='</div>';
			

		$vista.='</div>';

	$vista.='</div>';		
			echo $vista;   

	}

	if ($crear_albaran=="si"||$detalle_linea=="si") {

	$vista='<div class="container-fluid">';
			$vista.='<div class="row">';
					$vista.='<div class="col-md-4">';
						$vista.='<div>';
							$vista.='Alm Origen:<input type="text" id="fl_almacen_ori" size="3" maxlength="3"/>';
						$vista.='</div>';		
					$vista.='</div>';
					$vista.='<div class="col-md-6">';
						$vista.='<div>';
							$vista.='<input type="text" id="fl_almacen_descripcion" size="40" />';
						$vista.='</div>';		
					$vista.='</div>';
			$vista.='</div>';
			$vista.='<hr>';
			$vista.='<div class="row">';
					$vista.='<div class="col-md-4">';
						$vista.='<div>';
							$vista.='Artículo:<input type="text" id="fl_codigo" maxlength="12"  size="12"/>';
						$vista.='</div>';		
					$vista.='</div>';
					$vista.='<div class="col-md-6">';
						$vista.='<div>';
							$vista.='<input id="fl_descripcion" type="text"  size="40" />';
						$vista.='</div>';		
					$vista.='</div>';
					
			$vista.='</div>';
			$vista.='<hr>';
			$vista.='<div class="row">';
					$vista.='<div class="col-md-4">';
						$vista.='<div>';
							$vista.='Precio:<input type="text" id="fl_precio"  size="10"/>';
						$vista.='</div>';		
					$vista.='</div>';
					$vista.='<div class="col-md-4">';
						$vista.='<div>';
							$vista.='Dto %:<input type="text" id="fl_dto_porcentaje"  size="12"/>';
						$vista.='</div>';		
					$vista.='</div>';
					$vista.='<div class="col-md-4">';
						$vista.='<div>';
							$vista.='Dto imp.:<input type="text" id="fl_dto_importe" size="12"/>';
						$vista.='</div>';		
					$vista.='</div>';
			$vista.='</div>';
			$vista.='<hr>';
			$vista.='<div class="row">';
					$vista.='<div class="col-md-4">';
						$vista.='<div>';
							$vista.='Iva tipo:<input type="text" id="fl_tipo_iva"  size="10"/>';
						$vista.='</div>';		
					$vista.='</div>';
					$vista.='<div class="col-md-4">';
						$vista.='<div>';
							$vista.='Iva %:<input type="text" id="fl_iva_porcentaje" readonly="readonly" size="10"/>';
						$vista.='</div>';		
					$vista.='</div>';
					$vista.='<div class="col-md-4">';
						$vista.='<div>';
							$vista.='Iva importe:<input type="text" id="fl_iva_importe" size="12"/>';
						$vista.='</div>';		
					$vista.='</div>';
			$vista.='</div>';
			$vista.='<hr>';
			$vista.='<div class="row">';
					$vista.='<div class="col-md-6">';
						$vista.='<div>';
							$vista.='Precio c/dto:<input type="text" id="fl_precio_con_dto"   size="12"/>';
						$vista.='</div>';		
					$vista.='</div>';
					$vista.='<div class="col-md-6">';
						$vista.='<div>';
							$vista.='Precio final:<input type="text" id="fl_precio_final"   size="12"/>';
						$vista.='</div>';		
					$vista.='</div>';
			$vista.='</div>';		
			$vista.='<hr>';
			$vista.='<div class="row">';
					$vista.='<div class="col-md-6">';
						$vista.='<div>';
							$vista.='<strong>Unidades:</strong><input type="text" id="fl_unidades"  size="10"/>';
						$vista.='</div>';		
					$vista.='</div>';
					$vista.='<div class="col-md-6">';
						$vista.='<div>';
							$vista.='Tot. Linea:<input type="text" id="fl_total_linea" size="12"/>';
						$vista.='</div>';		
					$vista.='</div>';
			$vista.='</div>';		
			$vista.='<hr>';
				if ($detalle_linea!="si") {
						$vista.='<div class="row">';
								$vista.='<div class="col-md-6">';	
									$vista.='<div>';
										$vista.=' ';
									$vista.='</div>';		
								$vista.='</div>';		
								$vista.='<div class="col-md-3">';	
									$vista.='<div>';
										$vista.='<input  onclick="consultaPrecios()" type = "button" value ="Ver Artículos" class = "btn btn-info" >';
									$vista.='</div>';		
								$vista.='</div>';
								$vista.='<div class="col-md-3">';
									$vista.='<div>';
										$vista.='<input  onclick="grabarLinea()" id="fl_grabar_linea" type = "button" value ="Grabar Linea" class = "btn btn-success" >';
									$vista.='</div>';		
								$vista.='</div>';
						$vista.='</div>';
						}
	$vista.='</div>';		
			echo $vista;   

	}

	if ($borra_ped_cab=="si") {

			$resultado = mysqli_query($con, "DELETE FROM pedido_cab WHERE PED_NUMERO ='$numero_pedido' ");
			if ($resultado) {
					echo mysqli_affected_rows($con);
				} else { 
						echo mysqli_error($con);
					} 
				mysqli_close($con);
		}

	if ($borra_ped_lin=="si") {

			$resultado = mysqli_query($con, "DELETE FROM pedido_lineas WHERE PLIN_NUMERO_PEDIDO ='$numero_pedido' ");
			if ($resultado) {
					echo mysqli_affected_rows($con);
				} else { 
						echo mysqli_error($con);
					} 
				mysqli_close($con);
		}

	if ($borrar_linea=="si") {

			$resultado = mysqli_query($con, "DELETE FROM albaran_lineas WHERE ALIN_NUMERO_ALBARAN ='$num_albaran' AND ALIN_NUMERO_LINEA = '$num_linea'");
			if ($resultado) {
					echo mysqli_affected_rows($con);
				} else { 
						echo mysqli_error($con);
					} 
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
		mysqli_close($con);
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
		

		} else { $mensaje=" Pues no, ".mysqli_error($con); }
 
		mysqli_close($con);

	} 

		if ($veo_cab=="si") {

		
		$resultado=mysqli_query($con, "SELECT * FROM pedido_cab WHERE PED_NUMERO = '$numer_albaran' ");

		if ($resultado) {
			$fila = mysqli_fetch_assoc($resultado);

			if (mysqli_num_rows($resultado) > 0) {

					$datos_cab= new stdClass();
					$datos_cab->cliente=$fila['PED_CLIENTE'];
					$datos_cab->estado=$fila['PED_ESTADO'];
					$datos_cab->fecha=$fila['PED_FECHA'];
					$datos_cab->importe_neto=$fila['PED_IMPORTE_NETO'];
					$datos_cab->importe_iva=$fila['PED_IMPORTE_IVA'];
					$datos_cab->importe_dto=$fila['PED_IMPORTE_DESCUENTO'];
					$datos_cab->importe_total=$fila['PED_IMPORTE_TOTAL'];
					$datos_cab->almacen_vta=$fila['PED_ALMACEN_VENTA'];
					$datos_cab->tlf=$fila['PED_TLF'];
					$datos_cab->domicilio=$fila['PED_DOMICILIO_ENTREGA'];
					$datos_cab->observaciones=$fila['PED_OBSERVACIONES'];
					$json=json_encode($datos_cab);
					echo $json;
					
				} else {
					echo "INEXISTENTE"." numero; ".$numer_albaran;
				}
		} else { 
			echo "INEXISTENTE ".mysqli_error($con)." numero ".$numer_albaran;
		}
			mysqli_close($con);
	}


	if ($graba_historico_o=="si") {

		$tipo_mov="TRASLADO_SALIDA";
		$resultado=mysqli_query($con, "INSERT INTO historico
		 (HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_TIPO_MOVIMIENTO) 
		 VALUES
		 ('$almacen_o', '$id_articulo', '$fecha', '$orden', '$documento', '$almacen_d', '$unidades', '$tipo_mov')");

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
		 (HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_TIPO_MOVIMIENTO) 
		 VALUES
		 ('$almacen_d', '$id_articulo', '$fecha', '$orden', '$documento', '$almacen_o', '$unidades', '$tipo_mov')");

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

	if ($graba_ref_numero_fac=="si") {

		$id_usuario=$_SESSION["id_usuario"];

		$resultado=mysqli_query($con, "UPDATE referencias SET NUM_FACTURA =  NUM_FACTURA+1 WHERE ID_USUARIO= '$id_usuario'");

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
		$resultado = mysqli_query($con, "SELECT STOCKS_ALMACEN, STOCKS_CODIGO, PRE_CODIGO, PRE_DESCRIPCION FROM stocks LEFT JOIN precios ON PRE_CODIGO = STOCKS_CODIGO
			 WHERE STOCKS_ALMACEN = '$id_almacen' AND STOCKS_CODIGO = '$id_articulo'");
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

	if ($busca_cliente=="si") {

		$resultado=mysqli_query($con, "SELECT * FROM clientes WHERE CLI_CODIGO = '$id_cliente' ");
		if ($resultado) {
			$fila = mysqli_fetch_assoc($resultado);

			if (mysqli_num_rows($resultado) > 0) {

					$datos_cli= new stdClass();
					$datos_cli->nombre=$fila['CLI_NOMBRE'];
					$datos_cli->direccion=$fila['CLI_DIRECCION'];
					$datos_cli->nif=$fila['CLI_NIF'];
					$datos_cli->tlf=$fila['CLI_TELEFONO'];
					$json=json_encode($datos_cli);
					echo $json;
					 
				} else {
					echo "INEXISTENTE";
				}
		} else { 
			echo "INEXISTENTE ".mysqli_error($con);
		}
		mysqli_close($con);
	}

	if ($busca_precio=="si") {

		$resultado=mysqli_query($con, "SELECT * FROM precios WHERE PRE_CODIGO = '$id_articulo' ");
		if ($resultado) {
			$fila = mysqli_fetch_assoc($resultado);
			if (mysqli_num_rows($resultado) > 0) {

					$datos_pre= new stdClass();
					$datos_pre->descripcion=$fila['PRE_DESCRIPCION'];
					$datos_pre->precio_1=$fila['PRE_PRECIO_1'];
					$datos_pre->tipo_iva=$fila['PRE_TIPO_IVA'];
					$json=json_encode($datos_pre);
					echo $json;
					
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

	if ($graba_linea=="si") {

		$resultado=mysqli_query($con, "INSERT INTO albaran_lineas 
			(ALIN_NUMERO_ALBARAN, ALIN_NUMERO_LINEA, ALIN_ALMACEN_ORI, ALIN_CODIGO_ART, ALIN_DESCRIPCION, ALIN_UNIDADES, ALIN_PRECIO, ALIN_TIPO_IVA, ALIN_IVA_POR, ALIN_IMPORTE_IVA, ALIN_DESCUENTO_POR, ALIN_DESCUENTO_IMPORTE, ALIN_PRECIO_SIN_IVA, ALIN_IMPORTE_LINEA) 
			VALUES 
			('$gr_numero_albaran', '$gr_numero_linea', '$gr_almacen_ori', '$gr_articulo', '$gr_descripcion', '$gr_unidades', '$gr_precio', '$gr_tipo_iva', '$gr_iva_por', '$gr_iva_importe', '$gr_descuento_por', '$gr_descuento_importe', '$gr_precio_sin_iva', '$gr_importe_linea')");

		if ($resultado) {
			echo mysqli_affected_rows($con);
		} else {
			echo "error ".mysqli_error($con)." la variable contiene= ".$gr_articulo;
		}
		mysqli_close($con);
	}

	if ($genera_historico_pedido_cab=="si") {

		$resultado=mysqli_query($con, "INSERT INTO historico_pedido_cab (HPED_TIPO, HPED_NUMERO, HPED_FECHA, HPED_CLIENTE, HPED_ESTADO, HPED_USUARIO, HPED_IMPORTE_NETO, HPED_IMPORTE_IVA, HPED_IMPORTE_DESCUENTO, HPED_IMPORTE_TOTAL, HPED_NUMERO_LINEAS, HPED_ALMACEN_VENTA, HPED_DOMICILIO_ENTREGA, HPED_OBSERVACIONES, HPED_TIPO_VENTA) SELECT PED_TIPO, PED_NUMERO, PED_FECHA, PED_CLIENTE, PED_ESTADO, PED_USUARIO, PED_IMPORTE_NETO, PED_IMPORTE_IVA, PED_IMPORTE_DESCUENTO, PED_IMPORTE_TOTAL, PED_NUMERO_LINEAS, PED_ALMACEN_VENTA, PED_DOMICILIO_ENTREGA, PED_OBSERVACIONES, PED_TIPO_VENTA FROM pedido_cab WHERE PED_NUMERO='$numero_pedido' ");

		if ($resultado) {
				echo mysqli_affected_rows($con)."nuevo numero: ".$nuevo_numero." numero pedido: ".$numero_pedido;
			} else {
				echo "error ".mysqli_error($con);
			}
		mysqli_close($con);

	}

	if ($genera_factura_cab=="si") {

		$resultado=mysqli_query($con, "INSERT INTO factura_cab (FAC_TIPO, FAC_NUMERO, FAC_FECHA, FAC_CLIENTE, FAC_ESTADO, FAC_USUARIO, FAC_IMPORTE_NETO, FAC_IMPORTE_IVA, FAC_IMPORTE_DESCUENTO, FAC_IMPORTE_TOTAL, FAC_NUMERO_LINEAS, FAC_ALMACEN_VENTA, FAC_DOMICILIO_ENTREGA, FAC_OBSERVACIONES, FAC_TIPO_VENTA) SELECT PED_TIPO, '$nuevo_numero', PED_FECHA, PED_CLIENTE, PED_ESTADO, PED_USUARIO, PED_IMPORTE_NETO, PED_IMPORTE_IVA, PED_IMPORTE_DESCUENTO, PED_IMPORTE_TOTAL, PED_NUMERO_LINEAS, PED_ALMACEN_VENTA, PED_DOMICILIO_ENTREGA, PED_OBSERVACIONES, PED_TIPO_VENTA FROM pedido_cab WHERE PED_NUMERO='$numero_pedido' ");

		if ($resultado) {
				echo mysqli_affected_rows($con)."nuevo numero: ".$nuevo_numero." numero pedido: ".$numero_pedido;
			} else {
				echo "error ".mysqli_error($con);
			}
		mysqli_close($con);

	}


	if ($genera_historico_pedido_lin=="si") {

		$resultado=mysqli_query($con, "INSERT INTO historico_pedido_lineas (HPLIN_NUMERO_PEDIDO, HPLIN_NUMERO_LINEA, HPLIN_ALMACEN_ORI, HPLIN_CODIGO_ART, HPLIN_DESCRIPCION, HPLIN_UNIDADES, HPLIN_PRECIO, HPLIN_TIPO_IVA, HPLIN_IVA_POR, HPLIN_IMPORTE_IVA, HPLIN_DESCUENTO_POR, HPLIN_DESCUENTO_IMPORTE, HPLIN_PRECIO_SIN_IVA, HPLIN_IMPORTE_LINEA) SELECT PLIN_NUMERO_PEDIDO, PLIN_NUMERO_LINEA, PLIN_ALMACEN_ORI, PLIN_CODIGO_ART, PLIN_DESCRIPCION, PLIN_UNIDADES, PLIN_PRECIO, PLIN_TIPO_IVA, PLIN_IVA_POR, PLIN_IMPORTE_IVA, PLIN_DESCUENTO_POR, PLIN_DESCUENTO_IMPORTE, PLIN_PRECIO_SIN_IVA, PLIN_IMPORTE_LINEA FROM pedido_lineas WHERE PLIN_NUMERO_PEDIDO='$numero_pedido' ");

		if ($resultado) {
				echo mysqli_affected_rows($con)."nuevo numero: ".$nuevo_numero." numero pedido: ".$numero_pedido;
			} else {
				echo "error ".mysqli_error($con);
			}
		mysqli_close($con);

	}

	if ($genera_factura_lineas=="si") {

		$resultado=mysqli_query($con, "INSERT INTO factura_lineas (FLIN_NUMERO_FACTURA, FLIN_NUMERO_LINEA, FLIN_ALMACEN_ORI, FLIN_CODIGO_ART, FLIN_DESCRIPCION, FLIN_UNIDADES, FLIN_PRECIO, FLIN_TIPO_IVA, FLIN_IVA_POR, FLIN_IMPORTE_IVA, FLIN_DESCUENTO_POR, FLIN_DESCUENTO_IMPORTE, FLIN_PRECIO_SIN_IVA, FLIN_IMPORTE_LINEA) SELECT '$nuevo_numero', PLIN_NUMERO_LINEA, PLIN_ALMACEN_ORI, PLIN_CODIGO_ART, PLIN_DESCRIPCION, PLIN_UNIDADES, PLIN_PRECIO, PLIN_TIPO_IVA, PLIN_IVA_POR, PLIN_IMPORTE_IVA, PLIN_DESCUENTO_POR, PLIN_DESCUENTO_IMPORTE, PLIN_PRECIO_SIN_IVA, PLIN_IMPORTE_LINEA FROM pedido_lineas WHERE PLIN_NUMERO_PEDIDO='$numero_pedido' ");

		if ($resultado) {
				echo mysqli_affected_rows($con)."nuevo numero: ".$nuevo_numero." numero pedido: ".$numero_pedido;
			} else {
				echo "error ".mysqli_error($con);
			}
		mysqli_close($con);

	}


	if ($grabar_cabecera=="si") {

		$resultado=mysqli_query($con, "INSERT INTO albaran_cab (ALB_TIPO, ALB_NUMERO, ALB_FECHA, ALB_CLIENTE, ALB_ESTADO, ALB_USUARIO, ALB_IMPORTE_NETO, ALB_IMPORTE_IVA, ALB_IMPORTE_DESCUENTO, ALB_IMPORTE_TOTAL, ALB_NUMERO_LINEAS, ALB_ALMACEN_VENTA, ALB_DOMICILIO_ENTREGA, ALB_OBSERVACIONES, ALB_TIPO_VENTA) 
			VALUES 
			('$alb_tipo', '$alb_numero', '$alb_fecha', '$alb_cliente', '$alb_estado', '$alb_usuario', '0.0', '0.0', '0.0', '0.0', '0', '$alb_almacen_vta', '$alb_domicilio_entrega', '$alb_observaciones', '')");

		if ($resultado) {
			echo mysqli_affected_rows($con);
		} else {
			echo "error ".mysqli_error($con)." la variable contiene= ".$gr_articulo;
		}
		mysqli_close($con);
	}

	if ($regraba_linea=="si") {

		$resultado=mysqli_query($con, "UPDATE albaran_lineas SET

			ALIN_ALMACEN_ORI = '$act_almacen_ori', ALIN_CODIGO_ART = '$act_articulo', ALIN_DESCRIPCION = '$act_descripcion', ALIN_UNIDADES = '$act_unidades', ALIN_PRECIO = '$act_precio', ALIN_TIPO_IVA = '$act_tipo_iva', ALIN_IVA_POR = '$act_iva_por', ALIN_IMPORTE_IVA = '$act_iva_importe', ALIN_DESCUENTO_POR = '$act_descuento_por', ALIN_DESCUENTO_IMPORTE = '$act_descuento_importe', ALIN_PRECIO_SIN_IVA = '$act_precio_sin_iva', ALIN_IMPORTE_LINEA = '$act_importe_linea' WHERE ALIN_NUMERO_ALBARAN = '$act_numero_albaran' AND ALIN_NUMERO_LINEA = '$act_numero_linea'");

		if ($resultado) {
			echo mysqli_affected_rows($con);
		} else {
			echo "error ".mysqli_error($con)." la variable contiene= ".$gr_articulo;
		}
		mysqli_close($con);
	}


	if ($rg_regraba_cab=="si") {

		$resultado=mysqli_query($con, "	UPDATE albaran_cab SET ALB_IMPORTE_NETO = ALB_IMPORTE_NETO + '$rg_importe_neto', ALB_IMPORTE_DESCUENTO = ALB_IMPORTE_DESCUENTO + '$rg_descuento_importe', ALB_IMPORTE_IVA= ALB_IMPORTE_IVA + ' $rg_iva_importe', ALB_IMPORTE_TOTAL = ALB_IMPORTE_TOTAL + '$rg_importe_total', ALB_NUMERO_LINEAS = ALB_NUMERO_LINEAS + 1 WHERE ALB_NUMERO = '$rg_numero_albaran' ");

		if ($resultado) {
				echo mysqli_affected_rows($con);
			} else {
				echo "error ".mysqli_error($con);
			}
		mysqli_close($con);
	}

	if ($actualiza_cab=="si") {

		$resultado=mysqli_query($con, "	UPDATE albaran_cab SET 
			ALB_IMPORTE_NETO = ALB_IMPORTE_NETO - '$old_importe_neto' + '$new_importe_neto',
			ALB_IMPORTE_DESCUENTO = ALB_IMPORTE_DESCUENTO - '$old_descuento_importe' + '$new_descuento_importe',
			ALB_IMPORTE_IVA= ALB_IMPORTE_IVA - ' $old_iva_importe' + '$new_iva_importe',
			ALB_IMPORTE_TOTAL = ALB_IMPORTE_TOTAL - '$old_importe_total' + '$new_importe_total'
			WHERE ALB_NUMERO = '$numero_albaran' ");

		
		if ($resultado) {
				echo mysqli_affected_rows($con);
			} else {
				echo "error ".mysqli_error($con);
			}
		mysqli_close($con);
	}

	if ($opciones=="si") {

		$vista='<div class="col-md-2">';
						$vista.='<div>';
							$vista.='<button class = "btn btn-success" onclick="editarCabecera(this.id)">Editar Cabecera</button>';
						$vista.='</div>';		
		$vista.='</div>';
		$vista.='<div class="col-md-2">';
					$vista.='<div>';
							$vista.='<button class = "btn btn-success" onclick="detallesLinea(this.id)">Imprimir</button>';
						$vista.='</div>';		
		$vista.='</div>';
		$vista.='<div class="col-md-2">';
					$vista.='<div>';
							$vista.='<button class = "btn btn-success" onclick="editarOtroAlbaran()">Editar Otro Alb.</button>';
						$vista.='</div>';		
		$vista.='</div>';
		$vista.='<div class="col-md-2">';
					$vista.='<div>';
							$vista.='<button class = "btn btn-success" onclick="Inicio()">Ultimo Albaran</button>';
						$vista.='</div>';		
		$vista.='</div>';
		$vista.='<div class="col-md-2">';
					$vista.='<div>';
							$vista.='<button class = "btn btn-success" onclick="crearCabecera(this.id)">Albaran Nuevo</button>';
						$vista.='</div>';		
		$vista.='</div>';
		echo $vista;

	}

	if ($regrabar_cabecera=="si") {

		$resultado=mysqli_query($con, "UPDATE  albaran_cab SET 	ALB_CLIENTE = '$alb_cliente', ALB_DOMICILIO_ENTREGA = '$alb_domicilio_entrega', ALB_TLF = '$alb_tlf', ALB_ALMACEN_VENTA = '$alb_almacen_vta', ALB_OBSERVACIONES = '$alb_observaciones' WHERE ALB_NUMERO = '$alb_numero' ");
			
		if ($resultado) {
			echo mysqli_affected_rows($con);
		} else {
			echo "error ".mysqli_error($con)." la variable contiene= ".$gr_articulo;
		}
		mysqli_close($con);
	}


?>
