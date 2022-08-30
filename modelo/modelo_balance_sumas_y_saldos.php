<?php 
	require "conexion.php";
    
   
	$cuentas="";
	$filtracodigo_cuenta="";
	$filtratitulo="";
	$filtramasa_patrimonial="";
	$filtragrado="";
	$codigo_cuentaActualizada="";
	$titulo_Actualizo="";
	$masa_patrimonialActualizada="";
	$gradoActualizado="";
	$referenciaIDEliminada=""; 
	$nuevaCuenta="";
	$nuevoTitulo="";
	$nuevaMasaPatrimonial="";
	$nuevoGrado=""; 
	$nuevaFecha="";
	$nuevoAsiento="";
	$acontar="no";
	$pagina=0;
	$num_paginas=0;
	$desde=0;
	$fechaHoy=0;
	$retrocedo="inicio";
	$saldosdeudores=0;
	$saldosacreedores=0;
	$totaldebe=0;
	$totalhaber=0;


	if (isset($_GET['cuentas'])) {
		$cuentas = $_GET['cuentas'];
		$pagina=$_GET['pagina'];
		$num_paginas=$_GET['num_paginas'];
		$totaldebe=$_GET['totaldebe'];
		$totalhaber=$_GET['totalhaber'];
		$saldosdeudores=$_GET['saldosdeudores'];
		$saldosacreedores=$_GET['saldosacreedores'];
		}
	if (isset($_GET['acontar'])) {
		$acontar="si";
		
		} else {
			$acontar="no";
		}
	
	if (isset($_GET['nuevaCuenta'])) {

		$nuevaCuenta=$_GET['nuevaCuenta'];
		$nuevoTitulo=$_GET['nuevoTitulo'];
		$nuevaMasaPatrimonial=$_GET['nuevaMasaPatrimonial'];
		$nuevoGrado=$_GET['nuevoGrado'];
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

	if (isset($_GET['refeliminada'])) {
		$referenciaIDEliminada=$_GET['refeliminada'];
	 	}


	$codigo_cuenta = "CODIGO_CUENTA";
	$titulo = "TITULO";
	$fecha_alta = "FECHA_ALTA";
	$apertura_debe="APERTURA_DEBE";
	$apertura_haber="APERTURA_HABER";
	$debe_anio="DEBE_ANIO";
	$haber_anio="HABER_ANIO";
	$masa_patrimonial="MASA_PATRIMONIAL";
	$grado="GRADO";

	$actualizar ="ACTUALIZAR";
	$borrar = "BORRAR";
	$tamanio=12;
	
	if ($acontar=="si") {
		$saldodeudor=0;
		$saldoacreedor=0;
		$totaldebe=0;
		$totalhaber=0;
		$num_filas=0;

		$resultado = mysqli_query($con, "SELECT * FROM cuentas");
		$num_filas = mysqli_num_rows($resultado);

		if ($resultado) {

			while ($fila = mysqli_fetch_assoc($resultado)) {

					$saldo=$fila['DEBE_ANIO']-$fila['HABER_ANIO'];
					$totaldebe+=$fila['DEBE_ANIO'];
					$totalhaber+=$fila['HABER_ANIO'];

				if($saldo>0) {
						$saldodeudor+=$saldo;
					} else {
							$saldoacreedor+=$saldo;
						}
			}
					$datos_balance= new stdClass();
					$datos_balance->saldosdeudores=$saldodeudor;
					$datos_balance->saldosacreedores=$saldoacreedor;
					$datos_balance->totalesdebe=$totaldebe;
					$datos_balance->totaleshaber=$totalhaber;
					$datos_balance->num_filas=$num_filas;
					$json=json_encode($datos_balance);
					echo $json;

		} else echo "NO EXISTEN REGISTROS";
		mysqli_close($con);
	}


	if($cuentas==="cuentas") {

			
			$desde=(($pagina-1)*$tamanio);

		 	$resultado = mysqli_query($con, "SELECT * FROM cuentas LIMIT $desde,$tamanio");


			$table = '<div class = "container">';
			

			$table .=  '<table class = "table table-striped  table-hover table-condensed table-responsive">';
			$table .= '<tr>';
			$table .= '<th class="col-sm-0" style="text-align:center;">Codigo</th>';
			$table .= '<th class="col-sm-3" style="text-align:center;">Titulo</th>';
			$table .= '<th class="col-sm-3 style="text-align:center;">Debe </th>';
			$table .= '<th class="col-sm-3" style="text-align:center;">Haber </th>';
			$table .= '<th class="col-sm-3" style="text-align:center;">S. Deudor</th>';
			$table .= '<th class="col-sm-3" style="text-align:center;">S. Acreed</th>';
			$table .= '<th class="col-sm-0">Masa</th>';
			$table .= '</tr>';

			while ($fila = mysqli_fetch_assoc($resultado)) {

			
			$table .= '<tr>';
			$table .= '<td>' . $fila['CODIGO_CUENTA'] . '</td>';
			$table .= '<td style="white-space:nowrap">' . $fila['TITULO'] . '</td>';
			$table .= '<td align="right">' .number_format($fila['DEBE_ANIO'], 2, ',','.') . '</td>';
			$table .= '<td align="right">'.number_format($fila['HABER_ANIO'], 2, ',','.'). '</td>';
			$saldo=$fila['DEBE_ANIO']-$fila['HABER_ANIO'];
			if($saldo>0) {
				$table .= '<td align="right">'.number_format($saldo, 2, ',', '.').'</td>';
				$table .= '<td align="right">'.number_format(0, 2, ',', '.').'</td>';
			} else {
				$table .= '<td align="right">'.number_format(0, 2, ',', '.').'</td>';
				$table .= '<td align="right">'.number_format($saldo, 2, ',', '.').'</td>';
			}

			$table .= '<td style="white-space:nowrap">' . $raiz=substr($fila['MASA_PATRIMONIAL'], 4) . '</td>';
 			$texto="'";
			$table .= '</tr>';

			if ($fila['GRADO']<3 ){ $table.= '<tr></tr>';}

		}
		$table.= '</table>';
		$table .=  '<table border="1">';
			$table .= '<tr>';
			$table .= '<th style="text-align:center;" width="118"></th>';
			$table .= '<th style="text-align:center;" width="240"></th>';
			$table .= '<th style="text-align:center;" width="90"></th>';
			$table .= '<th style="text-align:center;" width="158">Debe </th>';
			$table .= '<th style="text-align:center;" width="158">Haber </th>';
			$table .= '<th style="text-align:center;" width="160">Saldos Deudores</th>';
			$table .= '<th style="text-align:center;" width="160">Saldos Acreedores</th>';
			$table .= '</tr>';
			$table .= '<tr>';
			$table .= '<td>' . "". '</td>';
			$table .= '<td style="text-align:center;font-weight:bold">' . "TOTALES".'</td>';
			$table .= '<td></td>';
			$table .= '<td align="right">' .number_format($totaldebe, 2, ',','.') . '</td>';
			$table .= '<td align="right">' .number_format($totalhaber, 2, ',','.'). '</td>';
			$table .= '<td align="right">' .number_format($saldosdeudores, 2, ',','.'). '</td>';
			$table .= '<td align="right">' .number_format($saldosacreedores, 2, ',','.') . '</td>';
		$table.= '</table>';
		$table.="<h4>Mostrar Página:<span id='mostrandopagina'> </span></h4>";
		$table.="<button class='botones' onclick="."'retrocedoPagina()'>"."<"."</button>";
		$eligepagina="1-".$num_paginas;
		$table.='<input type="text" id="eligepagina" size="3" maxlength="3" placeholder="'.$eligepagina.'">';
		$table.="<button class='botones' onclick="."'iraPagina()'>"."Ir a pagina "."</button>";
		$table.="<button  class='botones' onclick="."'avanzoPagina()'>".">"."</button>";
		$table.= "</div>";
		$table.= "</div>";
		echo $table;
		mysqli_close($con);
	} 


		if(!empty($codigo_cuentaActualizada)) {

		$filtracodigo_cuenta=mysqli_real_escape_string($con, $codigo_cuentaActualizada);
		$filtratitulo=mysqli_real_escape_string($con, $tituloActualizado);
		$filtramasa_patrimonial=mysqli_real_escape_string($con, $masa_patrimonialActualizada);
		$filtragrado=mysqli_real_escape_string($con, $gradoActualizado);

	
		$query="UPDATE cuentas SET TITULO = '$filtratitulo', MASA_PATRIMONIAL = '$filtramasa_patrimonial', GRADO = '$filtragrado' WHERE  CODIGO_CUENTA =  $filtracodigo_cuenta";
		 

		if (mysqli_query($con, $query)) {
			echo "correcto";
		} else { 
			echo "No correcto". mysqli_error($con);
		}
		mysqli_close($con); 
	}
		
		
		if(!empty($referenciaIDEliminada)){

		$referencia=mysqli_real_escape_string($con, $referenciaIDEliminada);
		$resultado=mysqli_query($con, "DELETE FROM referencias WHERE ID_USUARIO = $referencia");
		mysqli_close($con);

		} 
		
		if(!empty($nuevaCuenta)) {


		$query="INSERT INTO cuentas(CODIGO_CUENTA, TITULO, FECHA_ALTA, MASA_PATRIMONIAL, GRADO) VALUES ('$nuevaCuenta', '$nuevoTitulo', '2020-10-23', '$nuevaMasaPatrimonial', '$nuevoGrado')";

		if (mysqli_query($con, $query)) {
			echo "correcto";
		} else { 
			echo "No ejecutado".mysqli_error($con);
		}
		
		mysqli_close($con);
	} 

?>

