<?php 
	require "conexion.php";
    
  
	$cuentas="";
	$filtracodigo_cuenta="";
	$filtratitulo="";
	$filtramasa_patrimonial="";
	$filtragrado="";
	$filtradesarrollo="";
	$filtracon_enlace="";
	$codigo_cuentaActualizada="";
	$titulo_Actualizo="";  
	$masa_patrimonialActualizada="";
	$gradoActualizado=""; 
	$desarrolloActualizado="";
	$con_enlaceActualizado="";
	 
	$referenciaIDEliminada=""; 
	$nuevaCuenta="";
	$nuevoTitulo="";
	$nuevaMasaPatrimonial="";
	$nuevoGrado="";
	$nuevoDesarrollo="";
	$nuevoConEnlace="";
	$nuevaFecha="";
	$nuevoAsiento="";
	$acontar="no";
	$pagina=0;
	$num_paginas=0;
	$desde=0;
	$fechaHoy=0;
	$retrocedo="inicio";
	$decuenta="";
	$hacuenta="";
	$desdefecha="";
	$desdeasto="";
	$hastafecha="";
	$hastaasto="";
	$inicio="";
	$extractos="";
	$concilio="";
	$valor_concilio="";
	$num_filas=0;
	$consultar="";

	if (isset($_GET['concilio'])) {

		$concilio=$_GET['concilio'];
		$cta=$_GET['cta'];
		$fec=$_GET['fec'];
		$asto=$_GET['asto'];
		$apu=$_GET['apu'];
	}
	
	if (isset($_GET['inicio'])){
		$inicio=$_GET['inicio'];
	}
	if (isset($_GET['extractos'])) {
		$extractos = $_GET['extractos'];
		$pagina=$_GET['pagina'];
		$desdefecha=$_GET['desdefecha'];
		$desdeasto=$_GET['desdeasto'];
		$hastafecha=$_GET['hastafecha'];
		$hastaasto=$_GET['hastaasto'];
		$num_paginas=$_GET['num_paginas'];
		$decuenta=$_GET['decuenta'];
		$hacuenta=$_GET['hacuenta'];
		}

	if (isset($_GET['acontar'])) {
		$acontar=$_GET['acontar'];
		$desdefecha=$_GET['desdefecha'];
		$desdeasto=$_GET['desdeasto'];
		$hastafecha=$_GET['hastafecha'];
		$hastaasto=$_GET['hastaasto'];
		$decuenta=$_GET['decuenta'];
		$hacuenta=$_GET['hacuenta'];
		}
	
	
	if (isset($_GET['nuevaCuenta'])) {

		$nuevaCuenta=$_GET['nuevaCuenta'];
		$nuevoTitulo=$_GET['nuevoTitulo'];
		$nuevaMasaPatrimonial=$_GET['nuevaMasaPatrimonial'];
		$nuevoGrado=$_GET['nuevoGrado'];
		$nuevoDesarrollo=$_GET['nuevoDesarrollo'];
		$nuevoConEnlace=$_GET['nuevoConEnlace'];

	}

	if (isset($_GET['param1'])) {
		$codigo_cuentaActualizada = $_GET['param1'];
		}
	if (isset($_GET['param2'])){
		$tituloActualizado = $_GET['param2'];
		}
	if (isset($_GET['param3'])) {
		$masa_patrimonialActualizada = $_GET['param3'];
		}
	if (isset($_GET['param4'])){
		$gradoActualizado = $_GET['param4'];
		}
	if (isset($_GET['param5'])){
		$desarrolloActualizado = $_GET['param5'];
		}
	if (isset($_GET['param6'])){
		$con_enlaceActualizado = $_GET['param6'];
		}

	if (isset($_GET['refeliminada'])) {
		$referenciaIDEliminada=$_GET['refeliminada'];
	 	}


	$ext_cuenta = "EXT_CUENTA";
	$ext_fecha = "EXT_FECHA";
	$ext_asto="EXT_ASIENTO";
	$ext_apunte="EXT_APUNTE";
	$ext_documento="EXT_DOCUMENTO";
	$ext_concepto="EXT_CONCEPTO";
	$ext_debe_o_haber="EXT_DEBE_HABER";
	$ext_importe_debe="EXT_IMPORTE_DEBE";
	$ext_importe_haber="EXT_IMPORTE_HABER";
	$ext_saldo="EXT_SALDO";
	$ext_conciliado="EXT_CONCILIADO";
	$ext_saldo_anterior="EXT_SALDO_ANTERIOR";
	$tamanio=12;

	if ($acontar=="si") {
		
		$desde_fechaconver=strtotime($desdefecha);
		$desde_fechaconver=date('Y-m-d', $desde_fechaconver);
		$hasta_fechaconver=strtotime($hastafecha);
		$hasta_fechaconver=date('Y-m-d', $hasta_fechaconver);

		
 				$resultado = mysqli_query($con, "SELECT * FROM extractos WHERE EXT_CUENTA >='$decuenta' AND EXT_CUENTA <='$hacuenta' AND EXT_FECHA  >= '$desde_fechaconver' AND EXT_ASIENTO >= '$desdeasto' AND EXT_APUNTE >= '00' AND EXT_FECHA <= '$hasta_fechaconver' AND EXT_ASIENTO <='$hastaasto'");
 		
/*		$resultado = mysqli_query($con, "SELECT * FROM extractos WHERE EXT_CUENTA='$decuenta' AND EXT_FECHA  >= '$desde_fechaconver' AND EXT_ASIENTO >= '$desdeasto' AND EXT_APUNTE >= '00' AND EXT_FECHA <= '$hasta_fechaconver' AND EXT_ASIENTO <='$hastaasto'"); */

		if ($resultado) {
						$num_filas = mysqli_num_rows($resultado); 
					} else {
							$num_filas="no hay ?";
						}

		echo $num_filas;
	}	

	if ($inicio=="si") {

			$table='<div class = "container">';
			$table.= "</div>";
			echo $table; 
		}

	if($extractos=="si") {
		
		$desde=(($pagina-1)*$tamanio);
		
		$desde_fechaconver=strtotime($desdefecha);
		$desde_fechaconver=date('Y-m-d', $desde_fechaconver);
		$hasta_fechaconver=strtotime($hastafecha);
		$hasta_fechaconver=date('Y-m-d', $hasta_fechaconver);
		
 				$resultado = mysqli_query($con, "SELECT * FROM extractos WHERE EXT_CUENTA >='$decuenta' AND EXT_CUENTA <='$hacuenta' AND EXT_FECHA  >= '$desde_fechaconver' AND EXT_ASIENTO >= '$desdeasto' AND EXT_APUNTE >= '00' AND EXT_FECHA <= '$hasta_fechaconver' AND EXT_ASIENTO <='$hastaasto'");
 		
			$table = '<div class = "container">';
			$table .=  '<table class = "table table-striped table-hover table-condensed table-responsive">';
			$table .= '<tr>';
			$table .= '<th class="col-sm-0">Fecha</th>';
			$table .= '<th class="col-sm-0">Asiento</th>';
			$table .= '<th class="col-sm-0">Apunte</th>';
			$table .= '<th class="col-sm-1">Documento</th>';
			$table .= '<th class="col-sm-3">Concepto</th>';
			$table .= '<th class="col-sm-0">Debe/Haber</th>';
			$table .= '<th class="col-sm-2" style="text-align:right">S. Anterior</th>';
			$table .= '<th class="col-sm-2" style="text-align:right"> Debe </th>';
			$table .= '<th class="col-sm-2" style="text-align:right"> Haber </th>';
			$table .= '<th class="col-sm-2" style="text-align:right"> Saldo </th>';
			$table .= '</tr>'; 

			$colecciono="";
			$cuenta_registros=0;
 			$sw_inicio=0;

			while ($fila = mysqli_fetch_assoc($resultado)) {

			$texto="'";
			$comilla='"';
			$coma=",";
			$table .= '<tr>';
			
			$cuenta_registros++;
			$gcuenta=$fila['EXT_CUENTA'];
			$gfecha=$fila['EXT_FECHA'];
			$gasto=$fila['EXT_ASIENTO'];
			$gapu=$fila['EXT_APUNTE'];
			$ext_id=$fila['EXT_CUENTA'].$fila['EXT_FECHA'].$fila['EXT_ASIENTO'].$fila['EXT_APUNTE'];
			$table .= '<td id="'.$ext_fecha.$ext_id.'">' . date('d/m/Y',strtotime($fila['EXT_FECHA'])) . '</td>';
			$table .= '<td id="'.$ext_asto.$ext_id.'">' . $fila['EXT_ASIENTO'] . '</td>';
			$table .= '<td id="'.$ext_apunte.$ext_id.'">' . $fila['EXT_APUNTE'] . '</td>';
			$table .= '<td id="'.$ext_documento.$ext_id.'">' . $fila['EXT_DOCUMENTO'] . '</td>';
			$table .= '<td NOWRAP id="'.$ext_concepto.$ext_id.'">' . $fila['EXT_CONCEPTO'] . '</td>';
			$table .= '<td id="'.$ext_debe_o_haber.$ext_id.'">' . $fila['EXT_DEBE_HABER'] . '</td>';
			
			if ($fila['EXT_DEBE_HABER']=="DEBE"){
				$saldo=$fila['EXT_SALDO_ANTERIOR']+$fila['EXT_IMPORTE_DEBE'];
				$table .= '<td id="'.$ext_saldo_anterior.$ext_id.'" align="right">' . number_format($fila['EXT_SALDO_ANTERIOR'], 2, ',','.') . '</td>';
				$table .='<td id="'.$ext_importe_debe.$ext_id.'" align="right" style="font-weight:bold;">' . number_format($fila['EXT_IMPORTE_DEBE'], 2, ',','.') . '</td>';
				$table .='<td id="'.$ext_importe_haber.$ext_id.' "align="right" style="font-weight:bold;">' . number_format(0, 2, ',','.') . '</td>';
				 
				$el_debe_haber=1;
			} else {
					$saldo=$fila['EXT_SALDO_ANTERIOR']-$fila['EXT_IMPORTE_HABER'];
					
					$table .= '<td id="'.$ext_saldo_anterior.$ext_id.'" align="right">' . number_format($fila['EXT_SALDO_ANTERIOR'], 2, ',','.'). '</td>';
					$table .='<td id="'.$ext_importe_debe.$ext_id.'" align="right" style="font-weight:bold;" >' . number_format(0, 2, ',','.') . '</td>';
				 	$table .='<td id="'.$ext_importe_haber.$ext_id.'" align="right" style="font-weight:bold;">' . number_format($fila['EXT_IMPORTE_HABER'], 2, ',','.'). '</td>';
				 	
					$el_debe_haber=2;
					}

			
			$table .= '<td id="'.$ext_saldo.$ext_id.'" align="right">' . number_format($saldo, 2, ',','.') . '</td>';
 					
 					if ($fila['EXT_CONCILIADO']!="si") {
						$table .= '<td><input id="'.$ext_conciliado.$ext_id.'" onclick="conciliarExtracto('.$cuenta_registros.')" type = "button" id="boton" value ="Conciliar" class = "btn btn-success"></td>'; 
					} else { 
						$table .= '<td><input id="'.$ext_conciliado.$ext_id.'" onclick="desconciliarExtracto('.$cuenta_registros.')" type = "button" id="boton" value ="No concilio" class = "btn btn-info"></td>'; 
					}
			
			$table .= '</tr>';
			$table .= '<input type="hidden" id="cuenta'.$cuenta_registros.'" value='.$gcuenta.'>';
			$table .= '<input type="hidden" id="fecha'.$cuenta_registros.'" value='.$gfecha.'>';
			$table .= '<input type="hidden" id="asiento'.$cuenta_registros.'" value='.$gasto.'>';
			$table .= '<input type="hidden" id="apunte'.$cuenta_registros.'" value='.$gapu.'>';
			$sw_inicio=1;
			}
		$table.= '</table>';
		//$table.='</div>';
		//$table.='<div>';
		$table.="<h4>Mostrar Página:<span id='mostrandopaginaext'> </span></h4>";
		$table.="<button class='botones' onclick="."'retrocedoPagina()'>"."<"."</button>";
		$eligepagina="1-".$num_paginas;
		$table.='<input type="text" id="eligepaginaext" size="3" maxlength="3" placeholder="'.$eligepagina.'">';
		$table.="<button class='botones' onclick="."'iraPagina()'>"."Ir a pagina "."</button>";
		$table.="<button  class='botones' onclick="."'avanzoPagina()'>".">"."</button>";
		//$table.= "</div>";

		echo $table;
		mysqli_close($con);
	} 

		

	if($cuentas==="cuentas") {

			$desde=(($pagina-1)*$tamanio);

			 $resultado = mysqli_query($con, "SELECT * FROM cuentas ORDER BY $ordenado LIMIT $desde,$tamanio");

			$table = '<div class = "container">';
			$table .=  '<table class = "table table-striped table-bordered table-hover table-condensed table-responsive">';
			$table .= '<tr>';
			if ($ordenado=="CODIGO_CUENTA") {
				$table .= '<th class="col-sm-2">Codigo Id</th>';
				$table .= '<th class="col-sm-12">Titulo</th>';
			 } else {
					$table .= '<th class="col-sm-12">Titulo</th>';
					$table .= '<th class="col-sm-2">Codigo Id</th>';
			 }

			$table .= '<th class="col-sm-2">Seleccionar</th>';
			$table .= '</tr>';
			
			while ($fila = mysqli_fetch_assoc($resultado)) {

			$table .= '<tr>';
			if ($ordenado=="CODIGO_CUENTA") {
				$table .= '<td id="'.$codigo_cuenta.$fila['CODIGO_CUENTA'].'">' . $fila['CODIGO_CUENTA'] . '</td>';
				$table .= '<td id="'.$titulo.$fila['CODIGO_CUENTA'].'">' . $fila['TITULO'] . '</td>'; 
			} else {
				$table .= '<td id="'.$titulo.$fila['CODIGO_CUENTA'].'">' . $fila['TITULO'] . '</td>'; 
				$table .= '<td id="'.$codigo_cuenta.$fila['CODIGO_CUENTA'].'">' . $fila['CODIGO_CUENTA'] . '</td>';
			}

			$texto="'";
			if ($param_edicion=="edicion"){
					$table .= '<td><input id="'.$seleccionar.$fila['CODIGO_CUENTA'].'" onclick = "seleccionarCuentaEdicion('.$texto.$fila['CODIGO_CUENTA'].$texto.')" type = "button" value ="Seleccionar" class = "btn btn-success" ></td>'; 
			} else {
	  		$table .= '<td><input id="'.$seleccionar.$fila['CODIGO_CUENTA'].'" onclick = "seleccionarCuenta('.$texto.$fila['CODIGO_CUENTA'].$texto.')" type = "button" value ="Seleccionar" class = "btn btn-success" ></td>'; }
			$table .= '</tr>';
	}
		$table.= '</table>';
		$table.="<h4>Mostrar Página:</h4>".$ordenado."<=";
		
		if ($param_edicion=="edicion") {
				$table.="<button class='botones' onclick="."'retrocedoPaginaB()'>"."<"."</button>";
				$table.="<button  class='botones' onclick="."'avanzoPaginaB()'>".">"."</button>";
				} else {
				$table.="<button class='botones' onclick="."'retrocedoPaginaC()'>"."<"."</button>";
				$table.="<button  class='botones' onclick="."'avanzoPaginaC()'>".">"."</button>";
				}
		$table.= "</div>";
		echo $table;
		mysqli_close($con);
	} 


	$codigo_cuenta = "CODIGO_CUENTA";
	$titulo = "TITULO";
	$seleccionar ="SELECCIONAR";
	$borrar = "BORRAR";
	$tamanio=12;
	
	if (isset($_GET['concilio'])) {

		if ($concilio=="si"){
			$valor_concilio="si";
		} else { 
				$valor_concilio =""; 
				}

		$resultado = mysqli_query($con, "UPDATE extractos SET EXT_CONCILIADO= '$valor_concilio' WHERE EXT_CUENTA='$cta' AND EXT_FECHA = '$fec' AND EXT_ASIENTO= '$asto' AND EXT_APUNTE='$apu'");


		if ($resultado) {
						$num_filas = mysqli_affected_rows($con); 
					} else {
							$num_filas="no hay ?".mysqli_error($con);
						}

		echo $num_filas." parametro concilio: ".$concilio." valor concilio: ".$valor_concilio." cuenta:".$cta."fec:".$fec."Asto:".$asto."Apu:".$apu." rows: ".mysqli_affected_rows($con);
		mysqli_close($con);
	}
?>
		