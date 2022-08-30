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
	
	if (isset($_GET['leer_ref'])) {

		$leer_ref=$_GET['leer_ref'];

	}
	

	if (isset($_GET['historico'])) {

		$historico = $_GET['historico'];
		$pagina=$_GET['pagina'];
		$num_paginas=$_GET['num_paginas'];
		$desde_fecha=$_GET['desde_fecha'];
		$hasta_fecha=$_GET['hasta_fecha'];
		$desde_almacen=$_GET['desde_almacen'];
		$hasta_almacen=$_GET['hasta_almacen'];
		$desde_articulo=$_GET['desde_articulo'];
		$hasta_articulo=$_GET['hasta_articulo'];
		$desde_documento=$_GET['desde_documento'];
		$hasta_documento=$_GET['hasta_documento'];
		$clasificado=$_GET['clasificado'];
		$opcion=$_GET['opcion'];
		$ascendente=$_GET['ascendente'];
		
		}

	if (isset($_GET['acontar_sedes'])) {

		$acontar_sedes="si";

		} 

	
	if (isset($_GET['acontar_historico'])) {

		$acontar_historico="si";
		$desde_fecha=$_GET['desde_fecha'];
		$hasta_fecha=$_GET['hasta_fecha'];
		$desde_almacen=$_GET['desde_almacen'];
		$hasta_almacen=$_GET['hasta_almacen'];
		$desde_articulo=$_GET['desde_articulo'];
		$hasta_articulo=$_GET['hasta_articulo'];
		$desde_documento=$_GET['desde_documento'];
		$hasta_documento=$_GET['hasta_documento'];
		$clasificado=$_GET['clasificado'];
		$opcion=$_GET['opcion'];

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

			if ($opcion=="seleccion") {

					$resultado = mysqli_query($con, "SELECT  HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_PRECIO, HIS_TIPO_MOVIMIENTO, PRE_CODIGO, PRE_DESCRIPCION
					 		 FROM historico 
					 		 LEFT JOIN precios ON HIS_CODIGO = PRE_CODIGO
					 		 WHERE SUBSTRING(HIS_TIPO_MOVIMIENTO, 1, 7) = 'COMPRAS' 
					 		 AND HIS_FECHA BETWEEN '$desde_fecha' AND '$hasta_fecha'
					 		 AND HIS_ALMACEN BETWEEN '$desde_almacen' AND '$hasta_almacen' 
					 		 AND HIS_CODIGO BETWEEN '$desde_articulo' AND '$hasta_articulo' 
					 		 AND HIS_DOCUMENTO BETWEEN '$desde_documento' AND '$hasta_documento' 
					 		 ");
					if ($resultado) { echo mysqli_num_rows($resultado); } 
						else {
							echo mysqli_error($con);
						}
				
			} else {

				$resultado = mysqli_query($con, "SELECT * FROM historico WHERE SUBSTRING(HIS_TIPO_MOVIMIENTO, 1, 7) = 'COMPRAS'");

				if ($resultado) { 
								echo mysqli_num_rows($resultado);
							   } 
						else {
								echo mysqli_error($con);
						}
			}
	}

	if ($historico=="si") {
			
			$desde=(($pagina-1)*$tamanio);
		
			if ($opcion=="seleccion") {

				if ($clasificado=="almacen_y_articulo" && $ascendente=="si") {

					 	$resultado = mysqli_query($con, "SELECT  HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_PRECIO, HIS_TIPO_MOVIMIENTO, PRE_CODIGO, PRE_DESCRIPCION
					 		 FROM historico 
					 		 LEFT JOIN precios ON HIS_CODIGO = PRE_CODIGO
					 		 WHERE SUBSTRING(HIS_TIPO_MOVIMIENTO, 1, 7) = 'COMPRAS' 
					 		 AND HIS_FECHA BETWEEN '$desde_fecha' AND '$hasta_fecha'
					 		 AND HIS_ALMACEN BETWEEN '$desde_almacen' AND '$hasta_almacen' 
					 		 AND HIS_CODIGO BETWEEN '$desde_articulo' AND '$hasta_articulo' 
					 		 AND HIS_DOCUMENTO BETWEEN '$desde_documento' AND '$hasta_documento'
					 		 ORDER BY HIS_ALMACEN ASC, HIS_CODIGO ASC LIMIT $desde,$tamanio ");

 							}
 				if ($clasificado=="almacen_y_articulo" && $ascendente=="no") {

					 	$resultado = mysqli_query($con, "SELECT  HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_PRECIO, HIS_TIPO_MOVIMIENTO, PRE_CODIGO, PRE_DESCRIPCION
					 		 FROM historico 
					 		 LEFT JOIN precios ON HIS_CODIGO = PRE_CODIGO
					 		 WHERE SUBSTRING(HIS_TIPO_MOVIMIENTO, 1, 7) = 'COMPRAS' 
					 		 AND HIS_FECHA BETWEEN '$desde_fecha' AND '$hasta_fecha'
					 		 AND HIS_ALMACEN BETWEEN '$desde_almacen' AND '$hasta_almacen' 
					 		 AND HIS_CODIGO BETWEEN '$desde_articulo' AND '$hasta_articulo' 
					 		 AND HIS_DOCUMENTO BETWEEN '$desde_documento' AND '$hasta_documento'
					 		 ORDER BY HIS_ALMACEN DESC, HIS_CODIGO DESC LIMIT $desde,$tamanio ");

 							}

 				if ($clasificado=="articulo_y_almacen" && $ascendente=="si") {

					 	$resultado = mysqli_query($con, "SELECT  HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_PRECIO, HIS_TIPO_MOVIMIENTO, PRE_CODIGO, PRE_DESCRIPCION
					 		 FROM historico 
					 		 LEFT JOIN precios ON HIS_CODIGO = PRE_CODIGO
					 		 WHERE SUBSTRING(HIS_TIPO_MOVIMIENTO, 1, 7) = 'COMPRAS' 
					 		 AND HIS_FECHA BETWEEN '$desde_fecha' AND '$hasta_fecha'
					 		 AND HIS_ALMACEN BETWEEN '$desde_almacen' AND '$hasta_almacen' 
					 		 AND HIS_CODIGO BETWEEN '$desde_articulo' AND '$hasta_articulo' 
					 		 AND HIS_DOCUMENTO BETWEEN '$desde_documento' AND '$hasta_documento'
					 		 ORDER BY  HIS_CODIGO ASC, HIS_ALMACEN ASC LIMIT $desde,$tamanio ");

 							}
 				if ($clasificado=="articulo_y_almacen" && $ascendente=="no") {

					 	$resultado = mysqli_query($con, "SELECT  HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_PRECIO, HIS_TIPO_MOVIMIENTO, PRE_CODIGO, PRE_DESCRIPCION
					 		 FROM historico 
					 		 LEFT JOIN precios ON HIS_CODIGO = PRE_CODIGO
					 		 WHERE SUBSTRING(HIS_TIPO_MOVIMIENTO, 1, 7) = 'COMPRAS' 
					 		 AND HIS_FECHA BETWEEN '$desde_fecha' AND '$hasta_fecha'
					 		 AND HIS_ALMACEN BETWEEN '$desde_almacen' AND '$hasta_almacen' 
					 		 AND HIS_CODIGO BETWEEN '$desde_articulo' AND '$hasta_articulo' 
					 		 AND HIS_DOCUMENTO BETWEEN '$desde_documento' AND '$hasta_documento'
					 		 ORDER BY  HIS_CODIGO DESC, HIS_ALMACEN DESC LIMIT $desde,$tamanio ");

 							}			

 				if ($clasificado=="orden_cronologico" && $ascendente=="si") {

					 	$resultado = mysqli_query($con, "SELECT  HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_PRECIO, HIS_TIPO_MOVIMIENTO, PRE_CODIGO, PRE_DESCRIPCION
					 		 FROM historico 
					 		 LEFT JOIN precios ON HIS_CODIGO = PRE_CODIGO
					 		 WHERE SUBSTRING(HIS_TIPO_MOVIMIENTO, 1, 7) = 'COMPRAS' 
					 		 AND HIS_FECHA BETWEEN '$desde_fecha' AND '$hasta_fecha'
					 		 AND HIS_ALMACEN BETWEEN '$desde_almacen' AND '$hasta_almacen' 
					 		 AND HIS_CODIGO BETWEEN '$desde_articulo' AND '$hasta_articulo' 
					 		 AND HIS_DOCUMENTO BETWEEN '$desde_documento' AND '$hasta_documento'
					 		 ORDER BY HIS_ORDEN ASC LIMIT $desde,$tamanio ");
 							}	
 				if ($clasificado=="orden_cronologico" && $ascendente=="no") {

					 	$resultado = mysqli_query($con, "SELECT  HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_PRECIO, HIS_TIPO_MOVIMIENTO, PRE_CODIGO, PRE_DESCRIPCION
					 		 FROM historico 
					 		 LEFT JOIN precios ON HIS_CODIGO = PRE_CODIGO
					 		 WHERE SUBSTRING(HIS_TIPO_MOVIMIENTO, 1, 7) = 'COMPRAS' 
					 		 AND HIS_FECHA BETWEEN '$desde_fecha' AND '$hasta_fecha'
					 		 AND HIS_ALMACEN BETWEEN '$desde_almacen' AND '$hasta_almacen' 
					 		 AND HIS_CODIGO BETWEEN '$desde_articulo' AND '$hasta_articulo' 
					 		 AND HIS_DOCUMENTO BETWEEN '$desde_documento' AND '$hasta_documento'
					 		 ORDER BY HIS_ORDEN DESC LIMIT $desde,$tamanio ");
 							}		

 				if ($clasificado=="documento" && $ascendente=="si" ) {

					 	$resultado = mysqli_query($con, "SELECT  HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_PRECIO, HIS_TIPO_MOVIMIENTO, PRE_CODIGO, PRE_DESCRIPCION
					 		 FROM historico 
					 		 LEFT JOIN precios ON HIS_CODIGO = PRE_CODIGO
					 		 WHERE SUBSTRING(HIS_TIPO_MOVIMIENTO, 1, 7) = 'COMPRAS' 
					 		 AND HIS_FECHA BETWEEN '$desde_fecha' AND '$hasta_fecha'
					 		 AND HIS_ALMACEN BETWEEN '$desde_almacen' AND '$hasta_almacen' 
					 		 AND HIS_CODIGO BETWEEN '$desde_articulo' AND '$hasta_articulo' 
					 		 AND HIS_DOCUMENTO BETWEEN '$desde_documento' AND '$hasta_documento' 
					 		 ORDER BY HIS_DOCUMENTO ASC	LIMIT $desde,$tamanio ");
 							}
 					if ($clasificado=="documento" && $ascendente=="no" ) {

					 	$resultado = mysqli_query($con, "SELECT  HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_PRECIO, HIS_TIPO_MOVIMIENTO, PRE_CODIGO, PRE_DESCRIPCION
					 		 FROM historico 
					 		 LEFT JOIN precios ON HIS_CODIGO = PRE_CODIGO
					 		 WHERE SUBSTRING(HIS_TIPO_MOVIMIENTO, 1, 7) = 'COMPRAS' 
					 		 AND HIS_FECHA BETWEEN '$desde_fecha' AND '$hasta_fecha'
					 		 AND HIS_ALMACEN BETWEEN '$desde_almacen' AND '$hasta_almacen' 
					 		 AND HIS_CODIGO BETWEEN '$desde_articulo' AND '$hasta_articulo' 
					 		 AND HIS_DOCUMENTO BETWEEN '$desde_documento' AND '$hasta_documento' 
					 		 ORDER BY HIS_DOCUMENTO DESC LIMIT $desde,$tamanio ");
 							}		
 				} else {

 				if ($clasificado=="almacen_y_articulo" && $ascendente=="si" ) {

					 	$resultado = mysqli_query($con, "SELECT  HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_PRECIO, HIS_TIPO_MOVIMIENTO, PRE_CODIGO, PRE_DESCRIPCION
					 		 FROM historico 
					 		 LEFT JOIN precios ON HIS_CODIGO = PRE_CODIGO
					 		 WHERE SUBSTRING(HIS_TIPO_MOVIMIENTO, 1, 7) = 'COMPRAS' 
					 		 ORDER BY HIS_ALMACEN ASC, HIS_CODIGO ASC LIMIT $desde,$tamanio ");
 							}
 				if ($clasificado=="almacen_y_articulo" && $ascendente=="no" ) {

					 	$resultado = mysqli_query($con, "SELECT  HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_PRECIO, HIS_TIPO_MOVIMIENTO, PRE_CODIGO, PRE_DESCRIPCION
					 		 FROM historico 
					 		 LEFT JOIN precios ON HIS_CODIGO = PRE_CODIGO
					 		 WHERE SUBSTRING(HIS_TIPO_MOVIMIENTO, 1, 7) = 'COMPRAS' 
					 		 ORDER BY HIS_ALMACEN DESC, HIS_CODIGO DESC LIMIT $desde,$tamanio ");
 							}		

 				if ($clasificado=="articulo_y_almacen" && $ascendente=="si" ) {

					 	$resultado = mysqli_query($con, "SELECT  HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_PRECIO, HIS_TIPO_MOVIMIENTO, PRE_CODIGO, PRE_DESCRIPCION
					 		 FROM historico 
					 		 LEFT JOIN precios ON HIS_CODIGO = PRE_CODIGO
					 		 WHERE SUBSTRING(HIS_TIPO_MOVIMIENTO, 1, 7) = 'COMPRAS'
					 		 ORDER BY  HIS_CODIGO ASC LIMIT $desde,$tamanio ");
 							}

 				if ($clasificado=="articulo_y_almacen" && $ascendente=="no" ) {

					 	$resultado = mysqli_query($con, "SELECT  HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_PRECIO, HIS_TIPO_MOVIMIENTO, PRE_CODIGO, PRE_DESCRIPCION
					 		 FROM historico 
					 		 LEFT JOIN precios ON HIS_CODIGO = PRE_CODIGO
					 		 WHERE SUBSTRING(HIS_TIPO_MOVIMIENTO, 1, 7) = 'COMPRAS'
					 		 ORDER BY  HIS_CODIGO DESC LIMIT $desde,$tamanio ");
 							}		

 				if ($clasificado=="orden_cronologico"  && $ascendente=="si" ) {

					 	$resultado = mysqli_query($con, "SELECT  HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_PRECIO, HIS_TIPO_MOVIMIENTO, PRE_CODIGO, PRE_DESCRIPCION
					 		 FROM historico 
					 		 LEFT JOIN precios ON HIS_CODIGO = PRE_CODIGO
					 		 WHERE SUBSTRING(HIS_TIPO_MOVIMIENTO, 1, 7) = 'COMPRAS' 
					 		 ORDER BY HIS_ORDEN ASC LIMIT $desde,$tamanio ");
 							}	

 				if ($clasificado=="orden_cronologico"  && $ascendente=="no" ) {

					 	$resultado = mysqli_query($con, "SELECT  HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_PRECIO, HIS_TIPO_MOVIMIENTO, PRE_CODIGO, PRE_DESCRIPCION
					 		 FROM historico 
					 		 LEFT JOIN precios ON HIS_CODIGO = PRE_CODIGO
					 		 WHERE SUBSTRING(HIS_TIPO_MOVIMIENTO, 1, 7) = 'COMPRAS' 
					 		 ORDER BY HIS_ORDEN DESC LIMIT $desde,$tamanio ");
 							}

 				if ($clasificado=="documento" && $ascendente=="si" ) {

					 	$resultado = mysqli_query($con, "SELECT  HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_PRECIO, HIS_TIPO_MOVIMIENTO, PRE_CODIGO, PRE_DESCRIPCION
					 		 FROM historico 
					 		 LEFT JOIN precios ON HIS_CODIGO = PRE_CODIGO
					 		 WHERE SUBSTRING(HIS_TIPO_MOVIMIENTO, 1, 7) = 'COMPRAS' 
					 		 ORDER BY HIS_DOCUMENTO ASC LIMIT $desde,$tamanio ");
 							}

 				if ($clasificado=="documento" && $ascendente=="no" ) {

					 	$resultado = mysqli_query($con, "SELECT  HIS_ALMACEN, HIS_CODIGO, HIS_FECHA, HIS_ORDEN, HIS_DOCUMENTO, HIS_ALMACEN_CONTRA, HIS_UNIDADES, HIS_PRECIO, HIS_TIPO_MOVIMIENTO, PRE_CODIGO, PRE_DESCRIPCION
					 		 FROM historico 
					 		 LEFT JOIN precios ON HIS_CODIGO = PRE_CODIGO
					 		 WHERE SUBSTRING(HIS_TIPO_MOVIMIENTO, 1, 7) = 'COMPRAS' 
					 		 ORDER BY HIS_DOCUMENTO DESC LIMIT $desde,$tamanio ");
 							}			
 				}
 				
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
			$table .= '<th class="col-sm-0">PROVEEDOR </th>';
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

?>


