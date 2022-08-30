<?php 
	require "conexion.php";
  
	$cuentas="";
	$tamanio=15;
	$acontar="no";
	$pagina=0;
	$num_paginas=0; 
	$desde=0;
	$decuenta=""; 
	$desdefecha="";
	$desdeasto="";
	$hastafecha="";
	$hastaasto="";
	$inicio="";   
	$num_filas=0;
	$diario="";
	$gasto="";
	$total_apuntes=0;
	 
	if (isset($_GET['inicio'])){
		$inicio=$_GET['inicio'];
	}
	if (isset($_GET['diario'])) {
		$diario = $_GET['diario'];
		$pagina=$_GET['pagina'];
		$desdefecha=$_GET['desdefecha'];
		$desdeasto=$_GET['desdeasto'];
		$hastafecha=$_GET['hastafecha'];
		$hastaasto=$_GET['hastaasto'];
		$num_paginas=$_GET['num_paginas'];
		}

	if (isset($_GET['acontar'])) {
		$acontar=$_GET['acontar'];
		$desdefecha=$_GET['desdefecha'];
		$desdeasto=$_GET['desdeasto'];
		$hastafecha=$_GET['hastafecha'];
		$hastaasto=$_GET['hastaasto'];
		}
	

	if ($acontar=="si") {
		
		$contador=0;
		$desde_fechaconver=strtotime($desdefecha);
		$desde_fechaconver=date('Y-m-d', $desde_fechaconver);
		$hasta_fechaconver=strtotime($hastafecha);
		$hasta_fechaconver=date('Y-m-d', $hasta_fechaconver);

		$resultado = mysqli_query($con, "SELECT * FROM diario LEFT JOIN cuentas ON DIARIO_CUENTA = CODIGO_CUENTA WHERE DIARIO_FECHA  >= '$desde_fechaconver' AND DIARIO_ASIENTO >= '$desdeasto'  AND DIARIO_APUNTE >= '0' AND DIARIO_FECHA <= '$hasta_fechaconver' AND DIARIO_ASIENTO <='$hastaasto'" );
	//	while ($fila = mysqli_fetch_assoc($resultado)) {
	//		$contador++;
	//	}

		$total_apuntes=mysqli_num_rows($resultado);
		echo $total_apuntes;
		mysqli_close($con);
	}	

	if ($inicio=="si") {

			$table='<div class = "container">';
			$table.= "</div>";
			echo $table; 
		}

	if($diario=="si") {
		
		$desde=(($pagina-1)*$tamanio);
		$desde_fechaconver=strtotime($desdefecha);
		$desde_fechaconver=date('Y-m-d', $desde_fechaconver);
		$hasta_fechaconver=strtotime($hastafecha);
		$hasta_fechaconver=date('Y-m-d', $hasta_fechaconver);
		$sw_inicio=0;
		$total_debeas=0;
		$total_haberas=0;
		$gasto=0;

		$resultado = mysqli_query($con, "SELECT * FROM diario LEFT JOIN cuentas ON DIARIO_CUENTA = CODIGO_CUENTA WHERE DIARIO_FECHA   >= '$desde_fechaconver' AND DIARIO_ASIENTO >= '$desdeasto'  AND DIARIO_APUNTE >= '0' AND DIARIO_FECHA <= '$hasta_fechaconver' AND DIARIO_ASIENTO <='$hastaasto' LIMIT  $desde,$tamanio" );

		
			$table = '<div class = "container">';
			$table .=  '<table class = "table table-striped table-hover table-condensed table-responsive">';
			
			$table .= '<tr>';
			$table .= '<th class="col-sm-0">Fecha</th>';
			$table .= '<th class="col-sm-0"> Asiento </th>';
			$table .= '<th class="col-sm-0"> Apunte </th>';
			$table .= '<th class="col-sm-2" style="text-align:center"> Documento</th>';
			$table .= '<th class="col-sm-1" style="text-align:center">Cuenta</th>';
			$table .= '<th class="col-sm-3">Titulo</th>';
			$table .= '<th class="col-sm-3">Concepto</th>';
			$table .= '<th class="col-sm-0"> Debe </th>';
			$table .= '<th class="col-sm-0"></th>';
			$table .= '<th class="col-sm-0"> Haber </th>';
			$table .= '</tr>'; 

			while ($fila = mysqli_fetch_assoc($resultado)) {

			$table .= '<tr>';
			
				
			if ( $fila['DIARIO_CONCEPTO']=="RESUMEN") {

				$table.='<tr>';
				$table.='<td></td>';
				$table.='<td></td>';
				$table.='<td></td>';
				$table.='<td></td>';
				$table.='<td></td>';
				$table.='<td></td>';
				
				$table.='<td style="background-color:#AACFCF; color:white;"> Total Asiento: '.$fila['DIARIO_ASIENTO'].'</td>';
				$table.='<td style="background-color:#AACFCF; color:white;" align="right">'.number_format($fila['DIARIO_IMPORTE_DEBE'], 2, ',','.').'</td>';
				$table.='<td style="background-color:#AACFCF; color:white;"></td>';
				$table.='<td style="background-color:#AACFCF; color:white;" align="right">'.number_format($fila['DIARIO_IMPORTE_HABER'], 2, ',','.').'</td>';
				$table.='<tr>';
			} else {

			if ($fila['DIARIO_ASIENTO']!=$gasto) {

			$lafecha=date('d/m/Y',strtotime($fila['DIARIO_FECHA']));
			$table .= '<td style="background-color:#AACFCF; color:white;">' . $lafecha . '</td>';
			$table .= '<td style="background-color:#AACFCF; color:white; text-align:center;">' . $fila['DIARIO_ASIENTO'] . '</td>';
			
				}  else {
					$table.='<td></td>';
					$table.='<td></td>';
				}

			$gasto=$fila['DIARIO_ASIENTO'];
			$table .= '<td style="text-align:center;">' . $fila['DIARIO_APUNTE'] . '</td>';
			$table .= '<td>' . $fila['DIARIO_DOCUMENTO'] . '</td>';
		 	$table.='<td>'.$fila['CODIGO_CUENTA'].'</td>';
		 	$table.='<td NOWRAP>'.$fila['TITULO'].'</td>';
			$table .= '<td NOWRAP>' . $fila['DIARIO_CONCEPTO'] . '</td>';
		
			if ($fila['DIARIO_DEBE_HABER']=="DEBE"){
				$table .='<td align="right">' . number_format($fila['DIARIO_IMPORTE_DEBE'], 2, ',','.') . '</td>';
				$table .='<td></td>';
				$table .='<td align="right">' . number_format(0, 2, ',','.') . '</td>';
				$total_debeas+=$fila['DIARIO_IMPORTE_DEBE'];
				$el_debe_haber=1;
			} else {
					$table .='<td align="right">' .number_format(0, 2, ',','.'). '</td>';
					$table .='<td></td>';
				 	$table .='<td align="right">' . number_format($fila['DIARIO_IMPORTE_HABER'], 2, ',','.'). '</td>';
					$total_haberas+=$fila['DIARIO_IMPORTE_HABER'];
					$el_debe_haber=2;
					}
			
			$table .= '</tr>';
			}
		}
		$table.= '</table>';
		$table.='</div>';
		$table.='<div>';
		$table.="<h4>Mostrar Página:<span id='mostrandopaginadia'> </span></h4>";
		$table.="<button class='botones' onclick="."'retrocedoPagina()'>"."<"."</button>";
		$eligepagina="1-".$num_paginas;
		$table.='<input type="text" id="eligepaginaext" size="3" maxlength="3" placeholder="'.$eligepagina.'">';
		$table.="<button class='botones' onclick="."'iraPagina()'>"."Ir a pagina "."</button>";
		$table.="<button  class='botones' onclick="."'avanzoPagina()'>".">"."</button>";
		$table.="<button  class='botones' onclick="."'imprimir()'>".">"."</button>";
		$table.= "</div>";
		echo $table;
		mysqli_close($con);
	} 
	
?>
		