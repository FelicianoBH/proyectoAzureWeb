<?php 
	require "conexion.php";
    
    
	$cuentas="";
	$pagina=0;
	$num_paginas=0;
	$retrocedo="inicio";
	$saldosdeudores=0;
	$saldosacreedores=0;
	$totaldebe=0; 
	$totalhaber=0;
	$activo=""; 
	$acontar="";
	$mostrar="";
	$tamanio=12;
	$sw_imprimir=false;

	if (isset($_GET['acontar'])) {
		$acontar="si";
		$sw_grado=$_GET['grado'];
	}

	if (isset($_GET['mostrar'])) {
		$mostrar="si";
		$sw_grado=$_GET['grado'];
		$sw_imprimir=$_GET['sw_imprimir'];
	}

	
		if ($acontar=="si") {
				
				$num_filas=0;

					$resultado = mysqli_query($con, "SELECT * FROM cuentas WHERE GRADO ='$sw_grado'");

					if ($resultado) {
					$num_filas = mysqli_num_rows($resultado);
					echo $num_filas." grado: ".$sw_grado;
					} else echo "NO EXISTEN REGISTROS"; 
					
					mysqli_close($con);
			}


 

		if($mostrar=="si") {

					

					$desde=(($pagina-1)*$tamanio);
					$resultado = mysqli_query($con, "SELECT * FROM cuentas WHERE GRADO <= '$sw_grado' ORDER BY MASA_ID, CODIGO_CUENTA ");

					 if ($resultado) {

					 			$totales=array();
								$totales[1000]=0;
									$totales[1100]=0;
										$totales[1110]=0;
										$totales[1120]=0;
										$totales[1130]=0;
											$totales[1131]=0;
											$totales[1132]=0;
											$totales[1133]=0;
									$totales[1200]=0;
										$totales[1210]=0;
										$totales[1220]=0;
											$totales[1221]=0;
											$totales[1222]=0;
											$totales[1223]=0;
										$totales[1230]=0;

								$totales[2000]=0;
									$totales[2100]=0;
										$totales[2110]=0;
										$totales[2120]=0;
									$totales[2200]=0;
										$totales[2210]=0;
										$totales[2220]=0;
											$totales[2221]=0;
											$totales[2222]=0;


								$titulo=array();

								$titulo[1000]='ACTIVO';
									$titulo[1100]='ACTIVO NO CORRIENTE';
										$titulo[1110]='INMOVILIZADO INTANGIBLE';
										$titulo[1120]='INMOVILIZADO FINANCIERO';
										$titulo[1130]='INMOVILIZADO MATERIAL';
											$titulo[1131]='MAQUINARIA';
											$titulo[1132]='ELE. TRANSPORTE';
											$titulo[1133]='MOBILIARIO';
									$titulo[1200]='ACTIVO CORRIENTE';
										$titulo[1210]='EXISTENCIAS';
										$titulo[1220]='REALIZABE';
											$titulo[1221]='CLIENTES';
											$titulo[1222]='INVERSIONES A C.P.';
											$titulo[1223]='BANCOS';
										$titulo[1230]='DISPONIBLE CAJA';

								$titulo[2000]='PASIVO';
									$titulo[2100]='CAPITAL NETO';
										$titulo[2110]='CAPITAL SOCIAL';
										$titulo[2120]='RESULTADO DEL EJERCICIO';
									$titulo[2200]='PASIVO EXIGIBLE';
										$titulo[2210]='NO CORRIENTE DEUDAS A L.P.';
										$titulo[2220]='PASIVO CORRIENTE';
											$titulo[2221]='PROVEEDORES';
											$titulo[2222]='ACREEDORES';

							 	$inicio=0;
							 	$gmasa="";
							 	$gmasa_nombre="";
							 	$total_activo=0;
							 	$total_pasivo=0;
							 	$total_masa_debe=0;
								$total_masa_haber=0;

								$table = '<div class = "container">';
								$table .=  '<table class = "table table-striped  table-hover table-condensed table-responsive">';
								$table .= '<tr>';
								$table .= '<th class="col-sm-0" style="text-align:center;">Codigo</th>';
								$table .= '<th class="col-sm-3" style="text-align:center;">Titulo</th>';
								$table .= '<th class="col-sm-3" style="text-align:center;">Saldos Deudores</th>';
								$table .= '<th class="col-sm-3" style="text-align:center;">Saldos Acreedores</th>';
								$table .= '</tr>';

								while ($fila = mysqli_fetch_assoc($resultado)) {

										$saldo=$fila['DEBE_ANIO']-$fila['HABER_ANIO'];
										$raiz=substr($fila['MASA_PATRIMONIAL'], 0, 4);

										if ($fila['GRADO']=='1') {

													$totales[$raiz]+=$saldo;
												 
													if ($raiz=='1131' || $raiz== '1132' || $raiz == '1133') {
													$totales[1130]+=$saldo;

													}
													if ($raiz=='1221' || $raiz== '1222' || $raiz == '1223') {
													$totales[1220]+=$saldo;
													}
													if ($raiz=='2221' || $raiz== '2222') {
													$totales[2220]+=$saldo;
													}
													if(substr($fila['MASA_PATRIMONIAL'], 0, 2)=='11') {
														$totales[1100]+=$saldo;
														$totales[1000]+=$saldo;
													}
													if(substr($fila['MASA_PATRIMONIAL'], 0, 2)=='12') {
														$totales[1200]+=$saldo;
														$totales[1000]+=$saldo;
													}
													if(substr($fila['MASA_PATRIMONIAL'], 0, 2)=='21') {
														$totales[2100]+=$saldo;
														$totales[2000]+=$saldo;
													}
													if(substr($fila['MASA_PATRIMONIAL'], 0, 2)=='22') {
														$totales[2200]+=$saldo;
														$totales[2000]+=$saldo;
													}
										}	

											if ($inicio==0){

												$table .= '</tr>';
															$table .= '<tr style="height:35px;">';
															$table .= '<td><td>';
															$table .= '<td><td>';
															$table .= '<td><td>';
															$table .= '<td><td>';
															$table .= '</tr>';
											}


											if ($fila['MASA_ID']!=$gmasa) {

													if ($inicio!=0)  {

															$table .= '<td></td>';
															$table .= '<td style="background-color:#AACFCF; color:white;">TOTAL '.substr($gmasa_nombre, 4).'</td>';
															$saldo=$totales[$gmasa];

															if($saldo>0) {
																	$table .= '<td align="right" style="background-color:#AACFCF; color:white;">'.number_format($saldo, 2, ',', '.').'</td>';
																	$table .= '<td align="right" style="background-color:#AACFCF; color:white;">'.number_format(0, 2, ',', '.').'</td>';
																	} else {
																		$table .= '<td align="right" style="background-color:#AACFCF; color:white;">'.number_format(0, 2, ',', '.').'</td>';
																		$table .= '<td align="right" style="background-color:#AACFCF; color:white;">'.number_format($saldo, 2, ',', '.').'</td>';
																	}
																	
															$table .= '</tr>';
															$table .= '<tr style="height:35px;">';
															$table .= '<td><td>';
															$table .= '<td><td>';
															$table .= '<td><td>';
															$table .= '<td><td>';
															$table .= '</tr>';
															
													} 
														$inicio=1;
														$table .= '<td></td>';
														$table .= '<td style="white-space:nowrap; background-color:#AACFCF; color:white;">' . substr($fila['MASA_PATRIMONIAL'],4) . '</td>';
														$table .= '<td></td>';
														$table .= '<td align="right"></td>';
														$table .= '<td align="right"></td>';
														$table .= '<td align="right"></td>';
														$table .= '<td align="right"></td>';
																	
														$table .= '</tr>';
														
														
											}
													$gmasa=substr($fila['MASA_PATRIMONIAL'],0,4);
													$gmasa_nombre=$fila['MASA_PATRIMONIAL'];
													$table .= '<tr>';
													$table .= '<td>' . $fila['CODIGO_CUENTA'] . '</td>';
													$table .= '<td style="white-space:nowrap">' . $fila['TITULO'] . '</td>';
													$saldo=$fila['DEBE_ANIO']-$fila['HABER_ANIO'];
													if($saldo>0) {
														$table .= '<td align="right">'.number_format($saldo, 2, ',', '.').'</td>';
														$table .= '<td align="right">'.number_format(0, 2, ',', '.').'</td>';
														} else {
															$table .= '<td align="right">'.number_format(0, 2, ',', '.').'</td>';
															$table .= '<td align="right">'.number_format($saldo, 2, ',', '.').'</td>';
														}
													$table .= '</tr>';

													if ($fila['GRADO']<3 ){ $table.= '<tr></tr>';}
								}		


										$table .=  '<table class = "table table-striped  table-hover table-condensed table-responsive">';
										$table .= '<tr>';
										$table .= '<th class="col-sm-3" style="text-align:center;"></th>';
										$table .= '<th class="col-sm-3" style="text-align:center;"></th>';
										$table .= '<th class="col-sm-1" style="text-align:center;"></th>';
										$table .= '<th class="col-sm-3" style="text-align:center;"></th>';
										$table .= '<th class="col-sm-3" style="text-align:center;"></th>';
										$table .= '<th class="col-sm-1" style="text-align:center;"></th>';
										$table .= '</tr>';

										$table .= '<tr style="height:20px;">';
										$table .= '<td><td>';
										$table .= '<td><td>';
										$table .= '<td><td>';
										$table .= '<td><td>';
										$table .= '</tr>';


										$table .= '<tr>';
										$table .='<td></td>';
										$table .='<td></td>';
										$table .= '<td style="background-color:#AACFCF; color:white; white-space:nowrap;">TOTAL ACTIVO</td>';
										$table .= '<td align="right">'.number_format($totales[1000], 2, ',', '.').'</td>';
										$table .= '<td style="background-color:#AACFCF; color:white; white-space:nowrap;"> TOTAL PASIVO</td>';
										$table .= '<td align="right">'.number_format($totales[2000], 2, ',', '.').'</td>';
										$table .= '</tr>';

										$table .= '<tr style="height:50px;">';
										$table .= '<td><td>';
										$table .= '<td><td>';
										$table .= '<td><td>';
										$table .= '<td><td>';
										$table .= '</tr>';
										$table.= '</table>';


									
										$table_dos='<hr style="height:4px; background-color:#679B9B;">';
										$table_dos .=  '<table class = "table table-striped table-hover table-condensed table-responsive">';
										$table_dos .= '<tr>';
										$table_dos .= '<th class="col-sm-2" style="text-align:center;"></th>';
										$table_dos .= '<th class="col-sm-2" style="text-align:center;"></th>';
										$table_dos .= '<th class="col-sm-1" style="text-align:center;"></th>';
										$table_dos .= '<th class="col-sm-2" style="text-align:center;"></th>';
										$table_dos .= '<th class="col-sm-2" style="text-align:center;"></th>';
										$table_dos .= '<th class="col-sm-1" style="text-align:center;"></th>';
										$table_dos .= '</tr>';
										$table_dos .= '<tr style="height:50px;">';
										$table_dos .= '<td><td>';
										$table_dos .= '<td><td>';
										$table_dos .= '<td><td>';
										$table_dos .= '<td><td>';
										$table_dos .= '</tr>';
										$table_dos .= '<tr>';
										$table_dos.='<td colspan="7" style="background-color:#679B9B; color:white; white-space:nowrap; text-align:center;">BALANCE DE SITUACION: RESUMEN</td>';	
										$table_dos .= '<td><td>';
										$table_dos .= '<td><td>';
										$table_dos .= '</tr>';
										$table_dos .= '<tr style="height:75px;">';
										$table_dos .= '<td><td>';
										$table_dos .= '<td><td>';
										$table_dos .= '<td><td>';
										$table_dos .= '<td><td>';
										$table_dos .= '</tr>';
										$table_dos .= '<tr>';


									

										$table_dos .= '<td style="background-color:#679B9B; color:white; white-space:nowrap;">'.$titulo[1100].'</td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .= '<td align="right">'.number_format($totales[1100], 2, ',', '.').'</td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .= '</tr>';

 										$table_dos .= '<tr>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .= '</tr>';

										$table_dos .= '<tr>';
										$table_dos .='<td></td>';
										$table_dos .= '<td style="font-weight:bold; white-space:nowrap;">'.$titulo[1110].'</td>';	
										$table_dos .='<td></td>';
										$table_dos .= '<td align="right">'.number_format($totales[1110], 2, ',', '.').'</td>';
										$table_dos .='<td></td>';          
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .= '</tr>';

										$table_dos .= '<tr>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .= '</tr>';


										$table_dos .= '<tr>';
										$table_dos .='<td></td>';
										$table_dos .= '<td style="font-weight:bold; white-space:nowrap;">'.$titulo[1120].'</td>';	
										$table_dos .='<td></td>';
										$table_dos .= '<td align="right">'.number_format($totales[1120], 2, ',', '.').'</td>';
										$table_dos .= '<td style="background-color:#679B9B; color:white; white-space:nowrap;">'.$titulo[2100].'</td>';	
										$table_dos .='<td></td>';
										$table_dos .= '<td align="right">'.number_format($totales[2100], 2, ',', '.').'</td>';
										$table_dos .= '</tr>';

										$table_dos .= '<tr>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .= '</tr>';


										$table_dos .= '<tr>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';	

										$table_dos .= '<td style="font-weight:bold; white-space:nowrap;">'.$titulo[2110].'</td>';	
										$table_dos .= '<td align="right">'.number_format($totales[2110], 2, ',', '.').'</td>';
										$table_dos .= '<tr>';	

										$table_dos .= '<tr>';
										$table_dos .='<td></td>';
										$table_dos .= '<td style="font-weight:bold; white-space:nowrap;">'.$titulo[1130].'</td>';	
										$table_dos .='<td></td>';
										$table_dos .= '<td align="right">'.number_format($totales[1130], 2, ',', '.').'</td>';
										$table_dos .='<td></td>';
										$table_dos .= '<td style="font-weight:bold; white-space:nowrap;">'.$titulo[2120].'</td>';	
										$table_dos .= '<td align="right">'.number_format($totales[2120], 2, ',', '.').'</td>';
										$table_dos .= '</tr>';

										$table_dos .= '<tr>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .= '</tr>';


										$table_dos .= '<tr>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .= '<td style="font-weight:bold; white-space:nowrap;">'.$titulo[1131].'</td>';	
										$table_dos .= '<td align="right">'.number_format($totales[1131], 2, ',', '.').'</td>';	
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';	
										$table_dos .= '</tr>';

										$table_dos .= '<tr>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .= '<td style="font-weight:bold; white-space:nowrap;">'.$titulo[1132].'</td>';	
										$table_dos .= '<td align="right">'.number_format($totales[1132], 2, ',', '.').'</td>';	
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';	
										$table_dos .= '</tr>';


										$table_dos .= '<tr>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .= '<td style="font-weight:bold; white-space:nowrap;">'.$titulo[1133].'</td>';	
										$table_dos .= '<td align="right">'.number_format($totales[1133], 2, ',', '.').'</td>';	
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';	
										$table_dos .= '</tr>';


										$table_dos .= '<tr>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .= '<td style="background-color:#679B9B; color:white; white-space:nowrap;">'.$titulo[2200].'</td>';	
										$table_dos .='<td></td>';
										$table_dos .= '<td align="right">'.number_format($totales[2200], 2, ',', '.').'</td>';
										$table_dos .= '</tr>';

										$table_dos .= '<tr>';
										$table_dos .= '<td style="background-color:#679B9B; color:white; white-space:nowrap;">'.$titulo[1200].'</td>';	
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .= '<td align="right">'.number_format($totales[1200], 2, ',', '.').'</td>';
										$table_dos .='<td></td>';
										$table_dos .= '<td style="font-weight:bold; white-space:nowrap;">'.$titulo[2210].'</td>';	
										$table_dos .= '<td align="right">'.number_format($totales[2210], 2, ',', '.').'</td>';
										$table_dos .= '</tr>';


										$table_dos .= '<tr>';
										$table_dos .='<td></td>';
										$table_dos .= '<td style="font-weight:bold; white-space:nowrap;">'.$titulo[1210].'</td>';	
										$table_dos .='<td></td>';
										$table_dos .= '<td align="right">'.number_format($totales[1210], 2, ',', '.').'</td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .= '</tr>';

										$table_dos .= '<tr>';
										$table_dos .='<td></td>';
										$table_dos .= '<td style="font-weight:bold; white-space:nowrap;">'.$titulo[1220].'</td>';	
										$table_dos .='<td></td>';
										$table_dos .= '<td align="right">'.number_format($totales[1220], 2, ',', '.').'</td>';
										$table_dos .='<td></td>';
										$table_dos .= '<td style="font-weight:bold; white-space:nowrap;">'.$titulo[2220].'</td>';	
										$table_dos .= '<td align="right">'.number_format($totales[2220], 2, ',', '.').'</td>';
										$table_dos .= '</tr>';


										$table_dos .= '<tr>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .= '<td style="font-weight:bold; white-space:nowrap;">'.$titulo[1221].'</td>';	
										$table_dos .= '<td align="right">'.number_format($totales[1221], 2, ',', '.').'</td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .= '</tr>';

										$table_dos .= '<tr>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .= '<td style="font-weight:bold; white-space:nowrap;">'.$titulo[1222].'</td>';	
										$table_dos .= '<td align="right">'.number_format($totales[1222], 2, ',', '.').'</td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .= '</tr>';

										$table_dos .= '<tr>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .= '<td style="font-weight:bold; white-space:nowrap;">'.$titulo[1223].'</td>';	
										$table_dos .= '<td align="right">'.number_format($totales[1223], 2, ',', '.').'</td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .= '</tr>';


										$table_dos .= '<tr>';
										$table_dos .='<td></td>';
										$table_dos .= '<td style="font-weight:bold; white-space:nowrap;">'.$titulo[1230].'</td>';	
										$table_dos .='<td></td>';
										$table_dos .= '<td align="right">'.number_format($totales[1230], 2, ',', '.').'</td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .='<td></td>';
										$table_dos .= '</tr>';

										$table_dos .= '<tr>';
										$table_dos .='<td></td>';
										$table_dos .= '<td style="background-color:#679B9B; color:white; white-space:nowrap;">'.$titulo[1000].'</td>';
										$table_dos .='<td></td>';
										$table_dos .= '<td align="right">'.number_format($totales[1000], 2, ',', '.').'</td>';
										$table_dos .='<td></td>';
										$table_dos .= '<td style="background-color:#679B9B; color:white; white-space:nowrap;">'.$titulo[2000].'</td>';	
										$table_dos .= '<td align="right">'.number_format($totales[2000], 2, ',', '.').'</td>';
										$table_dos .= '</tr>';


									$table_dos.='</table>';
									$table_dos.='<hr style="height:4px; background-color:#AACFCF;">';
									if (!$sw_imprimir) {
										$table_dos.='<button style="background-color:#AACFCF; color:white; width:100px; height:40px;" onclick="location.reload()">Volver</button>';
									$table_dos.='<br><br><br>';
									$table_dos.='<br><br><br>';
									$table_dos.='<br><br><br>';
										}
									$table_dos.= "</div>";
									if ($sw_grado=='4') {
										echo $table_dos;
										} else {
											echo $table.$table_dos;
										}

					}	else echo "rian de rian";

						mysqli_close($con);
		}		

		

?>

