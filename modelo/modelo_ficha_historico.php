<?php 
	session_start();
	require "conexion.php";
 
	$sedes="";

	$acontar_historico="";
	$pagina=0;
	$num_paginas=0;
	$desde=0;
	$fechaHoy=0;
	$desdecodigo="";
	$desdealmacen="";
	$id_articulo="";
	$almacen="";
	$unidades="";
	$documento="";
	$leer_ref="";
	$fecha;
	$orden=0;
	$precio="";
	$precios="";
	$historico="";
	$busca_precio="";
	$id_almacen="";
	$busca_almacen="";
	$busca_articulo="";
	$desde_fecha="";
	$hasta_fecha="";

	if (isset($_GET['busca_articulo'])) {

		$busca_articulo=$_GET['busca_articulo'];
		$id_articulo=$_GET['id_articulo'];
		$id_almacen=$_GET['id_almacen'];
	}

	if (isset($_GET['busca_precio'])) {

		$busca_precio=$_GET['busca_precio'];
		$id_articulo=$_GET['id_articulo'];
	}

	if (isset($_GET['busca_almacen'])) {

		$busca_almacen=$_GET['busca_almacen'];
		$id_almacen=$_GET['id_almacen'];
	}

	if (isset($_GET['leer_ref'])) {

		$leer_ref=$_GET['leer_ref'];

	}
	

	if (isset($_GET['historico'])) {

		$historico = $_GET['historico'];
		$pagina=$_GET['pagina'];
		$num_paginas=$_GET['num_paginas'];
		$desde_fecha=$_GET['desde_fecha'];
		$hasta_fecha=$_GET['hasta_fecha'];
		$id_articulo=$_GET['id_articulo'];
		$id_almacen=$_GET['id_almacen'];
		
		}

	if (isset($_GET['acontar_sedes'])) {

		$acontar_sedes="si";

		} 

	
	if (isset($_GET['acontar_historico'])) {

		$acontar_historico="si";
		$desde_fecha=$_GET['desde_fecha'];
		$hasta_fecha=$_GET['hasta_fecha'];
		$id_articulo=$_GET['id_articulo'];
		$id_almacen=$_GET['id_almacen'];

		}
	

	$sede_codigo = "SEDE_CODIGO";
	$sede_nombre = "SEDE_NOMBRE";
	$sede_descripcion = "SEDE_DESCRIPCION";
	$tamanio=14;
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
	$hsaldoanterior="HIS_SALDO_ANTERIOR";
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

	
	if ($acontar_historico=="si") {

			

					$resultado = mysqli_query($con, "SELECT  HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_PRECIO, HIS_TIPO_MOVIMIENTO, PRE_CODIGO, PRE_DESCRIPCION
					 		 FROM historico 
					 		 LEFT JOIN precios ON HIS_CODIGO = PRE_CODIGO
					 		 WHERE HIS_FECHA BETWEEN '$desde_fecha' AND '$hasta_fecha'
					 		 AND HIS_ALMACEN ='$id_almacen' 
					 		 AND HIS_CODIGO = '$id_articulo'
					 		 ");
					if ($resultado) { echo mysqli_num_rows($resultado); } 
						else {
							echo mysqli_error($con);
						}
		
			}
	
	if ($historico=="si") {
			
			$desde=(($pagina-1)*$tamanio);

					 	$resultado = mysqli_query($con, "SELECT  HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_PRECIO, HIS_TIPO_MOVIMIENTO, HIS_SALDO_ANTERIOR, PRE_CODIGO, PRE_DESCRIPCION
					 		 FROM historico 
					 		 LEFT JOIN precios ON HIS_CODIGO = PRE_CODIGO
					 		 WHERE HIS_FECHA BETWEEN '$desde_fecha' AND '$hasta_fecha'
					 		 AND HIS_ALMACEN = '$id_almacen'
					 		 AND HIS_CODIGO = '$id_articulo'
					 		 ORDER BY HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN LIMIT $desde,$tamanio ");
 				
			$table = '<div class = "container">';
			$table .=  '<table class = "table table-striped table-hover table-bordered table-condensed table-responsive">';
			$table .= '<tr>';
			$table .= '<th class="col-sm-0">FECHA</th>';
			$table .= '<th class="col-sm-0">ORDEN</th>';
			$table .= '<th class="col-sm-0">DOCUMENTO</th>';
			$table .= '<th class="col-sm-0">PRECIO</th>';
			$table .= '<th class="col-sm-0">SALDO ANT.</th>';
			$table .= '<th class="col-sm-0">TIPO </th>';
			$table .= '<th class="col-sm-0">UNIDADES</th>';
			$table .= '<th class="col-sm-0">EXISTENCIAS</th>';
			$table .= '</tr>';

			if ($resultado) { 

				while ($fila = mysqli_fetch_assoc($resultado)) {

					$table .= '<tr>';
					$codigo_linea=$fila['HIS_CODIGO'].$fila['HIS_ALMACEN'].$fila['HIS_FECHA'].$fila['HIS_ORDEN'];
					
					if ($fila['HIS_TIPO_MOVIMIENTO']=='TRASLADO_ENTRADA'||$fila['HIS_TIPO_MOVIMIENTO']=='COMPRAS')
								{
									$existencia_hoy=$fila['HIS_SALDO_ANTERIOR']+$fila['HIS_UNIDADES'];

							} else {
									$existencia_hoy=$fila['HIS_SALDO_ANTERIOR']-$fila['HIS_UNIDADES'];
							}
					
					$table .= '<td id="'.$hfecha.$codigo_linea.'">' . $fila['HIS_FECHA'] . '</td>';
					$table .= '<td id="'.$horden.$codigo_linea.'">' . $fila['HIS_ORDEN'] . '</td>';
					$table .= '<td id="'.$hdocumento.$codigo_linea.'">' . $fila['HIS_DOCUMENTO'] . '</td>';
					$table .= '<td id="'.$hprecio.$codigo_linea.'">' . $fila['HIS_PRECIO'] . '</td>';
					$table .= '<td id="'.$hsaldoanterior.$codigo_linea.'">' . $fila['HIS_SALDO_ANTERIOR'] . '</td>';
					$table .= '<td id="'.$htipo.$codigo_linea.'">' . $fila['HIS_TIPO_MOVIMIENTO'] . '</td>';
					
					$table .= '<td id="'.$hunidades.$codigo_linea.'">' . $fila['HIS_UNIDADES'] . '</td>';
					$table .= '<td id="'.$hunidades.$codigo_linea.'">' . $existencia_hoy . '</td>';
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

?>


